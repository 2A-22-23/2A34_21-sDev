<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $action = $_POST['action'];

  if ($action === 'startStreaming') {
    // Code pour démarrer le streaming
    // ...
    $response = array('success' => true);
    echo json_encode($response);
  } elseif ($action === 'stopStreaming') {
    // Code pour arrêter le streaming
    // ...
    $response = array('success' => true);
    echo json_encode($response);
  } elseif ($action === 'startRecording') {
    // Démarrer l'enregistrement avec FFmpeg
    $command = 'ffmpeg -f v4l2 -i /dev/video0 output.mp4 > /dev/null 2>&1 & echo $!';
    $pid = exec($command);
    file_put_contents('record_pid.txt', $pid); // Enregistrer le PID du processus pour l'arrêter plus tard
    $response = array('success' => true);
    echo json_encode($response);
  } elseif ($action === 'stopRecording') {
    // Arrêter l'enregistrement en tuant le processus FFmpeg
    $pid = file_get_contents('record_pid.txt');
    exec("kill $pid");
    unlink('record_pid.txt');
    $response = array('success' => true);
    echo json_encode($response);
  }
  
}
?>
