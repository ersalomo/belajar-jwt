import * as faceapi from 'face-api.js'
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
const getLabeledFaceDescriptions = () => {
    const labels = ['ersalomo','ersalomo-1'];

    return Promise.all(
        labels.map(async (label) => {
            const descriptions = [];
            // for(let i = 0 ; i<=2; i++){
                const img = await faceapi.fetchImage('./storage/users/VISITOR10216814715879156.jpg')
                console.log(img)
                const detections = await faceapi
                    .detectSingleFace(img)
                    .withFaceLandmarks()
                    .withFaceDescriptor()
                descriptions.push(detections.descriptor);
            // }
            return new faceapi.LabeledFaceDescriptors(label, descriptions);
        })
    );
}

const faceRecognition = async () => {
    const labeledFaceDescriptions = await getLabeledFaceDescriptions();
    const faceMatcher = new faceapi.FaceMatcher(labeledFaceDescriptions);

    video.addEventListener('playing', () => {
        location.reload();
    })

    const canvas = faceapi.createCanvasFromMedia(video)
    document.body.append(canvas)

    faceapi.matchDimensions(canvas, {
        width: video.width,
        height: video.height
    })

    setInterval(async () => {
        const detections = await faceapi
            .detectAllFaces(video)
            .withFaceLandmarks()
            .withFaceDescriptors()
        const resizedDetections = faceapi.resizeResults(detections, {
            width: video.width,
            height: video.height
        })

        canvas.getContext('2d').clearRect(0,0,canvas.width,canvas.height)

        const results = resizedDetections.map((d) => {
            return faceMatcher.findBestMatch(d.descriptor)
        })

        results.forEach((result,i ) => {
            const box = resizedDetections[i].detection.box;
            const drawBox = new faceapi.draw.DrawBox(box, {
                label: result,
            })
            drawBox.draw(canvas)
        })
    }, 100)
}

Promise.all([
    faceapi.nets.tinyFaceDetector.loadFromUri('/weights'),
    faceapi.nets.ssdMobilenetv1.loadFromUri('/weights'),
    faceapi.nets.faceRecognitionNet.loadFromUri('/weights'),
    faceapi.nets.faceLandmark68Net.loadFromUri('/weights'),
]).then(startWebCam)
    .then(faceRecognition);


