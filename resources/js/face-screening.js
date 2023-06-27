import * as F from "face-api.js"

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

function detect() {
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
                    $.ajax({
                        url: "/oa/face-screening",
                        method: "post",
                        data: {
                            image_size: "1000",
                            image_name: "null",
                            image_base64: "null",
                            image_descriptor: JSON.stringify(faceDescriptions[0]),
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="x-token"]').attr('content')
                        },
                        dataType: "json",
                        processData: false,
                        contentType: false,
                        success(res) {
                            let timerInterval
                            if (res.statusText === "OK") {
                                Swal.fire({
                                    title: 'Checkin Success',
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
                                        window.location.href = `/oa/view-visitations-checkin/${visit_id}`
                                    }
                                });
                            }
                        },
                        error(res) {
                            const {message} = res.responseJSON
                            console.log(res)
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
                        }
                    })
                }

            }
        }, second)
    })
}

const MODEL_URL = '/weights'
Promise.all([
    F.nets.tinyFaceDetector.loadFromUri(MODEL_URL),
    F.nets.ssdMobilenetv1.loadFromUri(MODEL_URL),
    F.nets.faceRecognitionNet.loadFromUri(MODEL_URL),
    F.nets.faceLandmark68Net.loadFromUri(MODEL_URL),
])
    .then(startWebCam)
    .then(detect);

