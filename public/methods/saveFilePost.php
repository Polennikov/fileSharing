<?php
$filename = $_GET['filename'];
// иначе Internet Explorer будет игнорировать Content-Disposition
if (ini_get('zlib.output_compression')) {
    ini_set('zlib.output_compression', 'Off');
}
header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private", false); // нужен для Explorer
header("Content-Disposition: attachment; filename=\"" . basename($filename) . "\";");
header("Content-Transfer-Encoding: binary");
header("Content-Length: " . filesize($filename));
readfile("$filename");
exit();
