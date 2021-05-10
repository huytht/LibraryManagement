<?php
require_once('voicerss_tts.php');
if (isset($_REQUEST["source"])){
  $tts = new VoiceRSS;
  $voice = $tts->speech([
      'key' => '7f3a6aac73d047c1ba6b8aeceda39fef',
      'hl' => 'vi-vn',
      'v' => 'Chi',
      'src' => $_REQUEST["source"],
      'r' => '0',
      'c' => 'mp3',
      'f' => '44khz_16bit_stereo',
      'ssml' => 'false',
      'b64' => 'true'
  ]);
  echo $voice['response'];
}

?>