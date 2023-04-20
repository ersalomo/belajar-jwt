import * as tf from '@tensorflow/tfjs-core'
import * as faceapi from 'face-api.js'

// Mendapatkan elemen video dan canvas
const video = document.getElementById('video');
const canvas = document.getElementById('canvas');
const resultsContainer = document.getElementById('results');

// Mengaktifkan kamera
navigator.mediaDevices.getUserMedia({ video: true })
    .then((stream) => {
        video.srcObject = stream;
    });

// Memuat model FaceAPI
Promise.all([
    faceapi.nets.tinyFaceDetector.loadFromUri('/weights'),
    faceapi.nets.faceLandmark68Net.loadFromUri('/weights'),
    faceapi.nets.faceRecognitionNet.loadFromUri('/weights'),
    faceapi.nets.faceExpressionNet.loadFromUri('/weights')
]).then(startRecognition);

// Memulai pengenalan wajah
async function startRecognition() {
    const labeledDescriptors = await loadLabeledDescriptors();
    const faceMatcher = new faceapi.FaceMatcher(labeledDescriptors, 0.6);

    // Mendeteksi wajah dari video
    setInterval(async () => {
        const detections = await faceapi.detectAllFaces(video, new faceapi.TinyFaceDetectorOptions()).withFaceLandmarks().withFaceDescriptors();

        // Mendapatkan deskripsi wajah yang diidentifikasi
        const descriptors = detections.map(detection => detection.descriptor);

        // Mengenali wajah berdasarkan deskripsi yang dihasilkan
        const results = descriptors.map(descriptor => {
            const bestMatch = faceMatcher.findBestMatch(descriptor);
            return {label: bestMatch.label, distance: bestMatch.distance};
        });

        // Menggambar hasil pengenalan wajah ke canvas
        const canvasContext = canvas.getContext('2d');
        canvasContext.clearRect(0, 0, canvas.width, canvas.height);
        results.forEach((result, i) => {
            const box = detections[i].detection.box;
            const drawBox = new faceapi.draw.DrawBox(box, {label: result.label});
            resultsContainer.innerHTML = `<div>${result.label} (${result.distance})</div>`;
            drawBox.draw(canvas);
        });
    }, 100);
}
// Mengambil deskripsi wajah yang ada di database
async function loadLabeledDescriptors() {
    const labeledDescriptors = [];
    const labeledFaces = await fetch('/oa/labeled-faces')
        .then(response => response.json())
        .then(data => data.visitors);
    for (const labeledFace of labeledFaces) {
        console.log(labeledFace);
        const descriptors = [];
        // for (const descriptor of labeledFace.descriptors) {
            // descriptors.push(Float32Array.from(descriptor));
        // }
        // labeledDescriptors.push(new faceapi.LabeledFaceDescriptors(labeledFace.label, descriptors));
    }

    return labeledDescriptors;
}



