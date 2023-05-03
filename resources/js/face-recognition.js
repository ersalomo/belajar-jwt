import * as faceapi from 'face-api.js'
import {
    getVisitors,
    getVisitorsHavaAppointment,
    postVisitToCheckin
} from "./fect-data";

const video = document.getElementById('video');

const startWebCam = () =>  {
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
    // const labels = await getVisitors()
    const labels = await getVisitorsHavaAppointment()
    return Promise.all(
        labels.map(async (label) => {
            const {id, firstname, email, picture } = label.visitor
            const idAppointment = label.id
            const visitor = JSON.stringify(
                Object.assign(label.visitor, {idAppointment})
            )
            const descriptions = [];
            const img = await faceapi.fetchImage(`.${picture}`)
            const detections = await faceapi
                .detectSingleFace(img, new faceapi.TinyFaceDetectorOptions())
                // .detectAllFaces(img)
                .withFaceLandmarks()
                .withFaceDescriptor()

            if (detections !== undefined) {
                const { descriptor } = detections
                descriptions.push(descriptor);
            }
            if(descriptions.length){
                return new faceapi.LabeledFaceDescriptors(visitor, descriptions);
            }
        })
    );
}

const faceRecognition = () => {
    video.addEventListener('playing', async () => {
        console.log('playing')
        const labeledFaceDescriptions = (await getLabeledFaceDescriptions()).filter((d) => d !== undefined);
        const faceMatcher = new faceapi.FaceMatcher(labeledFaceDescriptions, 0.6);
        const canvas = faceapi.createCanvasFromMedia(video)
        document.body.append(canvas)

        const displaySize = {
            width: video.width,
            height: video.height
        }

        faceapi.matchDimensions(canvas, displaySize)
        const runFaceDetection = async () => {
            const detections = await faceapi
                .detectAllFaces(video, new faceapi.TinyFaceDetectorOptions())
                .withFaceLandmarks()
                .withFaceDescriptors()
            // jika tidak sesuai dengan gambar pada webcame maka akan menampilkan array [] sehingga mmebuat descriptor menjadi null
            const resizedDetections = faceapi.resizeResults(detections, displaySize)

            canvas.getContext('2d').clearRect(0, 0, canvas.width, canvas.height)
            faceapi.draw.drawDetections(canvas, resizedDetections)

            // get users picture for comparing
            const {labeledDescriptors} = faceMatcher

            labeledDescriptors.forEach((label) => {

                const faceDescriptor = label.descriptors[0]
                const appointment = JSON.parse(label.label)
                const {id, firstname, email, idAppointment} = appointment
                const resizedFloat32Array = resizedDetections[0]
                if (resizedFloat32Array) {
                    const bestMatch = faceapi.euclideanDistance(
                        faceDescriptor,
                        resizedFloat32Array.descriptor
                    )
                    if (bestMatch < 0.6) {
                        const box = resizedFloat32Array.detection.box;
                        const drawBox = new faceapi.draw.DrawBox(box, {label: firstname})
                        drawBox.draw(canvas)
                        stop()
                        const answer = confirm(`This is you ${firstname}`)
                        console.log('exucuting running', answer)
                        if (answer) {
                             postVisitToCheckin({
                                "id_appmt"      : idAppointment,
                                 "visit_date"   : "2023-04-26",
                                 "checkin"      : 1,
                                 "checkout"     : 0,
                                 "notes"        : "",
                            })
                                 .then((res) => {
                                     const {id: idVisit} = res.data.visit
                                     window.location.href = 'face-verified?id_visit=' + idVisit
                                 })
                                 .catch(e => console.log(e))
                        }else{
                            start()
                        }
                    }
                }
            })
        }

        let intervalId
        function start() {
          intervalId = setInterval(runFaceDetection, 1000)
            console.log(intervalId)
        }
        // start()
        function stop() {
            clearInterval(intervalId)
        }

    })
}

Promise.all([
    faceapi.nets.tinyFaceDetector.loadFromUri('/weights'),
    faceapi.nets.ssdMobilenetv1.loadFromUri('/weights'),
    faceapi.nets.faceRecognitionNet.loadFromUri('/weights'),
    faceapi.nets.faceLandmark68Net.loadFromUri('/weights'),
])
    .then(startWebCam)
    .then(faceRecognition);


