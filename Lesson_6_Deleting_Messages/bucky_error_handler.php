<?php

set error_handler('buckyErrorHandler', E_ALL);

function buckyErrorHandler($number, $text, $theFile, $theLine){
	if(ob_get_length()) ob_clean();
	$errorMessage = 'Error: ' . $number . chr(10) . 'Message: ' . $text . chr(10) . 'File: ' . $theFile . chr(10) . 'Line: ' . $theLine;
	echo $errorMessage;
	exit;
}

?>