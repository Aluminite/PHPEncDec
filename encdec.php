<?php
echo "<h2>AES-256 Encryptor/Decryptor</h2><br>Just because there weren't any good ones elsewhere on the internet.";
echo file_get_contents('resources/encdec-frontend.html');

if ($_POST['text'] != NULL) {
  $preText = $_POST['text'];
} else if ($_POST['url'] != NULL) {
  $preText = file_get_contents($_POST['url']);
}
if ($preText != NULL && $_POST['encOrDec'] == 'dec') {
  $key = $_POST['key'];
  $method = 'aes-256-cbc';
  $key = substr(hash('sha256', $key, true), 0, 32);
  $iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);
  $postText = openssl_decrypt(base64_decode($preText), $method, $key, OPENSSL_RAW_DATA, $iv);
}
if ($preText != NULL && $_POST['encOrDec'] == 'enc') {
  $key = $_POST['key'];
  $method = 'aes-256-cbc';
  $key = substr(hash('sha256', $key, true), 0, 32);
  $iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);
  $postText = base64_encode(openssl_encrypt($preText, $method, $key, OPENSSL_RAW_DATA, $iv));
  echo $postText;
}
if ($postText != NULL && $_POST['isCSV'] == false && $_POST['encOrDec'] == 'dec') {
  echo '<pre><code>' . nl2br(htmlspecialchars($postText)) . '</code></pre>';
}
if ($postText != NULL && $_POST['isCSV'] == true && $_POST['encOrDec'] == 'dec') {
  $postText = str_ireplace(',', '</td><td>', $postText);
  $postText = preg_split("/\\r\\n|\\r|\\n/", $postText);
  $i = 0;
  echo '<table>';
  while ($i <= count($postText)) {
    echo '<tr><td>' . $postText[$i] . '</td></tr>';
    $i = $i + 1;
  }
  echo '</table>';
}