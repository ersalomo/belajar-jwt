import * as faceapi from "face-api.js";
import {checkInVisitor, getVisitors} from "../fect-data";
import {MODEL_URL, SECOND} from "../utis";

class FaceRecognition {
    constructor(elementVideo) {
        this.element = elementVideo
        this.displaySize = {
            width: this.element.width,
            height: this.element.height
        }
        this._faceApi = faceapi
    }

    _initialWebcam() {
        try {
            this.element.srcObject = navigator
                .mediaDevices
                .getUserMedia({
                    video: true,
                    audio: false
                })

        } catch (e) {
            console.log(e);
        }

    }

    async _getLabelDescriptors() {
        const res = await getVisitors()
        const {data: visitors} = res.data
        return Promise.all(
            visitors.map(async (value) => {
                const visitor = JSON.stringify(value)
                const descriptions = [];
                const img = await this._faceApi.fetchImage(`${value["visitor_picture"]}`)
                const detections = await this.detectSingleFace(img)

                if (detections !== undefined) {
                    const {descriptor} = detections
                    descriptions.push(descriptor);
                }
                if (descriptions.length) {
                    return new this._faceApi.LabeledFaceDescriptors(visitor, descriptions);
                }
            })
        );
    }

    _loadModel() {
        return Promise.all([
            this._faceApi.nets.tinyFaceDetector.loadFromUri(MODEL_URL),
            this._faceApi.nets.ssdMobilenetv1.loadFromUri(MODEL_URL),
            this._faceApi.nets.faceRecognitionNet.loadFromUri(MODEL_URL),
            this._faceApi.nets.faceLandmark68Net.loadFromUri(MODEL_URL),
        ])
    }

    detect() {
        this.element.addEventListener('play', async () => {
            const labeledFaceDescriptions = (await this._getLabelDescriptors()).filter((d) => d !== undefined);
            const faceMatcher = new this._faceApi.FaceMatcher(labeledFaceDescriptions, 0.6);
            const canvas = this.createCanvasElement()

            const intervalId = setInterval(async () => {
                const faceDescriptions = await this.drawDetectedFaces(canvas)

                // get users picture for comparing
                faceMatcher.labeledDescriptors.forEach((label, i) => {
                    const faceDescriptor = label.descriptors[0]
                    const visitor = JSON.parse(label.label)
                    const {visit_id, emp_id, visitor_name, visitor_id} = visitor

                    if (faceDescriptions[0]) {
                        const bestMatch = this._faceApi.euclideanDistance(
                            faceDescriptor,
                            faceDescriptions[0].descriptor
                        )
                        if (bestMatch < 0.6) {
                            const box = faceDescriptions[0].detection.box;
                            const drawBox = new this._faceApi.draw.DrawBox(box, {label: visitor_name})
                            drawBox.draw(canvas)
                            clearInterval(intervalId)
                            checkInVisitor(visit_id).then((res) => {
                                let timerInterval
                                if (res.statusText === "OK") {
                                    Swal.fire({
                                        title: 'Checkin Success',
                                        html: "Yeay! You have successfully checked in.<br> redirect in <b></b> milliseconds.",
                                        icon: 'success',
                                        timer: 2000,
                                        timerProgressBar: true,
                                        didOpen: () => {
                                            Swal.showLoading()
                                            const b = Swal.getHtmlContainer().querySelector('b')
                                            timerInterval = setInterval(() => {
                                                b.textContent = Swal.getTimerLeft()
                                            }, 500)
                                        },
                                        willClose: () => {
                                            clearInterval(timerInterval)
                                            window.location.href = `/oa/view-visitations-checkin/${visit_id}`
                                        }
                                    });
                                }
                            }).catch(err => console.log(err))
                        }
                    }
                })
            }, SECOND)
        })

    }

    runDetection(callback) {
        this._loadModel()
            .then(this._initialWebcam)
            .then(callback)
    }

    createCanvasElement() {
        const canvas = this
            ._faceApi
            .createCanvasFromMedia(this.element)
        this.element.insertAdjacentElement("afterend", canvas)
        this._faceApi.matchDimensions(canvas, this.displaySize)

        return canvas
    }
    async drawDetectedFaces(canvas) {
        const faceDetection = await this.detectAllFaces()
        // jika tidak sesuai dengan gambar pada webcame maka akan menampilkan array [] sehingga mmebuat descriptor menjadi null
        const faceDescriptions = this._faceApi.resizeResults(faceDetection, this.displaySize)
        canvas.getContext('2d').clearRect(0, 0, canvas.width, canvas.height)
        this._faceApi.draw.drawDetections(canvas, faceDescriptions)
        this._faceApi.draw.drawFaceLandmarks(canvas, faceDescriptions)
        return faceDescriptions
    }

    async detectAllFaces() {
        return this._faceApi
            .detectAllFaces(this.element, new this._faceApi.TinyFaceDetectorOptions())
            .withFaceLandmarks()
            .withFaceDescriptors();
    }

    async detectSingleFace(htmlImageEl) {
        return this._faceApi
            .detectSingleFace(htmlImageEl, new this._faceApi.TinyFaceDetectorOptions())
            .withFaceLandmarks()
            .withFaceDescriptor()
    }

}
