<!doctype html>
<html>
<head>
    <title>Face Recognition</title>
    @vite(['resources/js/face-recognition.js'])
    <style>
        body{
            padding: 0;
            margin: 0;
            width: 100vw;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        canvas {
            position: absolute;
        }
    </style>
</head>
<body>
    <video id="video" width="640" height="480" autoplay></video>
{{--    <canvas id="canvas" width="640" height="480"></canvas>--}}
{{--    <div id="results" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"></div>--}}
</body>
</html>
