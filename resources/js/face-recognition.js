import * as faceapi from 'face-api.js'
import {
    getVisitors,
    checkInVisitor
} from "./fect-data";

const video = document.getElementById('video');
const startWebCam = () => {
    navigator.mediaDevices.getUserMedia({
        video: true,
        audio: false
    }).then((stream) => {
        video.srcObject = stream;
    }).catch((error) => {
        console.log(error);
    });
}


const getLabeledFaceDescriptions = async () => {
    const res = await getVisitors()
    const{data:visitors} = res.data
    return Promise.all(
        visitors.map(async (value) => {
            const visitor = JSON.stringify(value)
            const descriptions = [];
            const img = await faceapi.fetchImage(`${value["visitor_picture"]}`)
            const detections = await faceapi
                .detectSingleFace(img, new faceapi.TinyFaceDetectorOptions())
                // .detectAllFaces(img)
                .withFaceLandmarks()
                .withFaceDescriptor()

            if (detections !== undefined) {
                const {descriptor} = detections
                descriptions.push(descriptor);
            }
            if (descriptions.length) {
                return new faceapi.LabeledFaceDescriptors(visitor, descriptions);
            }
        })
    );
}

function run() {
    video.addEventListener('playing', async () => {
        const labeledFaceDescriptions = (await getLabeledFaceDescriptions()).filter((d) => d !== undefined);
        const faceMatcher = new faceapi.FaceMatcher(labeledFaceDescriptions, 0.6);
        const canvas = faceapi.createCanvasFromMedia(video)

        const displaySize = {
            width: video.width,
            height: video.height
        }

        // document.body.append(canvas)
        video.insertAdjacentElement("afterend", canvas)
        faceapi.matchDimensions(canvas, displaySize)
        const second = 800;
        const intervalId = setInterval(async () => {
            console.log('run')
            const faceDetection = await faceapi
                .detectAllFaces(video, new faceapi.TinyFaceDetectorOptions())
                .withFaceLandmarks()
                .withFaceDescriptors()

            // jika tidak sesuai dengan gambar pada webcame maka akan menampilkan array [] sehingga mmebuat descriptor menjadi null
            const faceDescriptions = faceapi.resizeResults(faceDetection, displaySize)
            canvas.getContext('2d').clearRect(0, 0, canvas.width, canvas.height)
            faceapi.draw.drawDetections(canvas, faceDescriptions)
            faceapi.draw.drawFaceLandmarks(canvas, faceDescriptions)

            // get users picture for comparing
            faceMatcher.labeledDescriptors.forEach((label, i) => {
                const faceDescriptor = label.descriptors[0]
                const visitor = JSON.parse(label.label)
                const {visit_id, emp_id, visitor_name, visitor_id} = visitor

                if (faceDescriptions[0]) {
                    const bestMatch = faceapi.euclideanDistance(
                        faceDescriptor,
                        faceDescriptions[0].descriptor
                    )
                    if (bestMatch < 0.6) {
                        const box = faceDescriptions[0].detection.box;
                        const drawBox = new faceapi.draw.DrawBox(box, {label: visitor_name})
                        drawBox.draw(canvas)
                        clearInterval(intervalId)
                        checkInVisitor(visit_id).then((res)=> {
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
        }, second)
    })
}

const MODEL_URL = '/weights'
Promise.all([
    faceapi.nets.tinyFaceDetector.loadFromUri(MODEL_URL),
    faceapi.nets.ssdMobilenetv1.loadFromUri(MODEL_URL),
    faceapi.nets.faceRecognitionNet.loadFromUri(MODEL_URL),
    faceapi.nets.faceLandmark68Net.loadFromUri(MODEL_URL),
])
    .then(startWebCam)
    .then(run);


