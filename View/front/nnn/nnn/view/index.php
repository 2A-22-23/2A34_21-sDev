<!DOCTYPE html>
<html>
<head>
    <title>Streaming et enregistrement</title>
    <style>
        video {
            width: 640px;
            height: 480px;
        }
    </style>
</head>
<body>
    <h1>Streaming et enregistrement</h1>
    <div>
        <button id="start-stream">Démarrer le streaming</button>
        <button id="stop-stream">Arrêter le streaming</button>
        <button id="start-recording">Enregistrer</button>
        <button id="stop-recording">Stop</button>
    </div>
    <div id="video-container">
        <video id="video" autoplay></video>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="view/mainS.js"></script>
</body>
</html>
