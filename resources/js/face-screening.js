import * as F from "face-api.js"
import {faceScreening} from "./fect-data";
import {loadModel} from "./load-model";
import {SECOND} from "./utis";

const video = document.getElementById('video');

export const startWebCam = () => {
    navigator.mediaDevices.getUserMedia({
        video: true,
        audio: false
    }).then((stream) => {
        video.srcObject = stream;
    }).catch((error) => {
        console.log(error);
    });
}

function detect() {
    console.log(video)
    video.addEventListener("play", async () => {
        const canvas = F.createCanvasFromMedia(video)
        const displaySize = {
            width: video.width,
            height: video.height
        }
        video.insertAdjacentElement("afterend", canvas)
        F.matchDimensions(canvas, displaySize)
        const second = 800;
        const intervalId = setInterval(async () => {
            const faceDetection = await F
                .detectAllFaces(video, new F.TinyFaceDetectorOptions())
                .withFaceLandmarks()
                .withFaceDescriptors()

            // jika tidak sesuai dengan gambar pada webcame maka akan menampilkan array [] sehingga mmebuat descriptor menjadi null
            const faceDescriptions = F.resizeResults(faceDetection, displaySize)
            canvas.getContext('2d').clearRect(0, 0, canvas.width, canvas.height)
            F.draw.drawDetections(canvas, faceDescriptions)
            F.draw.drawFaceLandmarks(canvas, faceDescriptions)
            if (faceDescriptions[0]) {
                const {box, classScore} = faceDescriptions[0].detection;
                const drawBox = new F.draw.DrawBox(box)
                drawBox.draw(canvas)
                const transhold = 0.9
                if (classScore >= transhold) {
                    clearInterval(intervalId)
                    const data = {
                        image_size: JSON.stringify(displaySize),
                        image_base64: canvas.toDataURL("image/png"),
                        image_descriptor: JSON.stringify(faceDescriptions[0]),
                    };
                    faceScreening(data)
                        .then((res) => {
                            let timerInterval
                            Swal.fire({
                                title: 'Face Detected',
                                html: "Yeay! Your face descriptor has been saved.<br> redirect in <b></b> milliseconds.",
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
                                    window.location.href = `/oa`
                                }
                            });
                        }).catch((res) => {
                        const {message} = res.responseJSON
                        let timerInterval
                        Swal.fire({
                            title: 'Error',
                            html: `${message} <br> redirect in <b></b> milliseconds.`,
                            icon: 'error',
                            timer: 4000,
                            timerProgressBar: true,
                            didOpen: () => {
                                Swal.showLoading()
                                const b = Swal.getHtmlContainer().querySelector('b')
                                timerInterval = setInterval(() => {
                                    b.textContent = Swal.getTimerLeft()
                                }, 200)
                            },
                            willClose: () => {
                                clearInterval(timerInterval)
                                window.location.href = `/oa`
                            }
                        });
                    })
                    return;
                }
            }
        }, second)
    })
}

setTimeout(() => {
    loadModel()
        .then(startWebCam)
        .then(detect)
}, SECOND)

