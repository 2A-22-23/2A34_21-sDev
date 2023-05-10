document.addEventListener("DOMContentLoaded", () => {
    const video = document.getElementById("video");
    const startStreamButton = document.getElementById("start-stream");
    const stopStreamButton = document.getElementById("stop-stream");
    const startRecordingButton = document.getElementById("start-recording");
    const stopRecordingButton = document.getElementById("stop-recording");
    let mediaStream = null;
    let mediaRecorder = null;
    let recordedChunks = [];
  
    // Lien vers le fichier streaming.php
    const url = "controllerstreamingD.php";
  
    startStreamButton.addEventListener("click", () => {
      // Demander l'autorisation d'accès à la caméra
      navigator.mediaDevices.getUserMedia({ video: true })
        .then((stream) => {
          mediaStream = stream;
          video.srcObject = stream;
          video.play();
  
          // Appeler l'action "startStreaming" dans le fichier streaming.php
          axios.post(url, { action: "startStreaming" })
            .then(response => {
              console.log(response.data);
              if (response.data.success) {
                startStreamButton.disabled = true;
                stopStreamButton.disabled = false;
              }
            })
            .catch(error => {
              console.error(error);
            });
        })
        .catch(error => {
          console.error(error);
        });
    });
  
    stopStreamButton.addEventListener("click", () => {
      // Arrêter le flux vidéo de la caméra
      if (mediaStream) {
        mediaStream.getTracks().forEach(track => track.stop());
        mediaStream = null;
        video.srcObject = null;
      }
  
      // Appeler l'action "stopStreaming" dans le fichier streaming.php
      axios.post(url, { action: "stopStreaming" })
        .then(response => {
          console.log(response.data);
          if (response.data.success) {
            startStreamButton.disabled = false;
            stopStreamButton.disabled = true;
          }
        })
        .catch(error => {
          console.error(error);
        });
    });
  
    startRecordingButton.addEventListener("click", () => {
      // Vérifier si le flux vidéo est en cours de diffusion
      if (!mediaStream) {
        console.error("Aucun flux vidéo n'est en cours de diffusion.");
        return;
      }
  
      // Créer un nouvel enregistreur de média
      mediaRecorder = new MediaRecorder(mediaStream, { mimeType: "video/webm" });
  
      // Événement déclenché lorsqu'un morceau de données est disponible
      mediaRecorder.ondataavailable = (event) => {
        if (event.data && event.data.size > 0) {
          recordedChunks.push(event.data);
        }
      };
  
      // Démarrer l'enregistrement
      mediaRecorder.start();
  
      // Appeler l'action "startRecording" dans le fichier streaming.php
      axios.post(url, { action: "startRecording" })
        .then(response => {
          console.log(response.data);
          if (response.data.success) {
            startRecordingButton.disabled = true;
            stopRecordingButton.disabled = false;
          }
        })
        .catch(error => {
          console.error(error);
        });
    });
  
    stopRecordingButton.addEventListener("click", () => {
      // Arrêter l'enregistrement
      if (mediaRecorder) {
        mediaRecorder.stop();
      }
  
      // Appeler l'action "stopRecording" dans le fichier streaming.php
     
      axios.post(url, { action: "stopRecording" })
      .then(response => {
      console.log(response.data);
      if (response.data.success) {
      startRecordingButton.disabled = false;
      stopRecordingButton.disabled = true;      // Télécharger la vidéo enregistrée
      const blob = new Blob(recordedChunks, { type: "video/webm" });

      // Convertir la vidéo de webm à mp4
      const videoFile = new File([blob], "enregistrement.mp4", { type: "video/mp4" });

      // Créer une URL pour le téléchargement
      const url = URL.createObjectURL(videoFile);

      // Créer un lien de téléchargement
      const a = document.createElement("a");
      a.href = url;
      a.download = "enregistrement.mp4";
      a.click();

      // Révoquer l'URL pour libérer les ressources
      URL.revokeObjectURL(url);
    }
  })
  .catch(error => {
    console.error(error);
  });
});
});