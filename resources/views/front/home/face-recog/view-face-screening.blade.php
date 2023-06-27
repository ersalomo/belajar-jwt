<x-app-layout pageTitle="Face Recognition">
    @vite(['resources/js/face-screening.js'])
    <meta name="x-token" content="{{csrf_token()}}">
    <style>
        div#body {
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
            left: 0;
            top: 0;
            position: absolute;
        }

        video {
            border: #272b27 6px solid;
        }
    </style>
    <div id="body">
        <main id="main">
            <div style="position: relative;">
                <h1>Align your face to camera</h1>
                <video id="video" width="450" height="340" autoplay></video>
            </div>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</x-app-layout>
