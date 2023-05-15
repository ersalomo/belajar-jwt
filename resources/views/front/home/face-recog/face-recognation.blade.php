<x-app-layout pageTitle="Face Recognition">
    @vite(['resources/js/face-recognition.js'])
    <style>
        div#body {
            padding: 0;
            margin: 0;
            width: 90%;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        main#main {
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

        h1 {
            font-size: 30px;
        }

        p {
            max-width: 600px;
        }

        canvas {
            position: absolute;
        }

        video {
            border: #272b27 6px solid;
        }
    </style>
    <div id="body">
        <main id="main">
            <div>
                <h1>Align your face to camera</h1>
                <video id="video" width="640" height="480" autoplay></video>
            </div>
        </main>
    </div>
</x-app-layout>
