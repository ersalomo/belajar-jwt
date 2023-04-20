<!doctype html>
<html>
<head>
    <title>Face Recognition</title>
    @vite(['resources/js/face-recognition.js'])
</head>
<body>
<div style="position: relative;">
    <video id="video" width="640" height="480" autoplay muted></video>
    <canvas id="canvas" width="640" height="480"></canvas>
    <div id="results" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"></div>
</div>
</body>
{{--<script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs-core"></script>--}}
{{--<script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs-converter"></script>--}}
{{--<script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs-backend-webgl"></script>--}}
{{--<script src="https://cdn.jsdelivr.net/npm/face-api.js"></script>--}}
</html>
