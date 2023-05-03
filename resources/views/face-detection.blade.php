<!doctype html>
<html lang="en">
<head>
    <title>Face Recognition</title>
    @vite(['resources/js/face-recognition.js'])
    <style>
        body{
            padding: 0;
            margin: 0;
            width: 100vw;
            height: 100vh;
            /*display:flex;*/
            align-items: center;
            justify-content: center;
        }
        main{
            /*align-items: center;*/
            /*justify-items: center;*/
            /*justify-content: center;*/
            /*display: flex;*/
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        h1{
            font-size: 30px;
        }
        p {
            max-width: 600px;
        }
        canvas {
            position: absolute;
        }
        video {
            border: #0ad561 6px solid;
        }
    </style>
</head>
<body>
    <main>
        <div>
        <h1>Align your face to camera</h1>
{{--            <p>Please make sure your face is well-lit and centered in the camera frame.--}}
{{--                Remove any glasses, hats, or accessories that might obstruct your face.--}}
{{--                </p>--}}
{{--            <p>Look directly at the camera and try to keep a neutral expression.</p>--}}
        <video id="video" width="640" height="480" autoplay></video>
        </div>
    </main>
</body>
</html>
