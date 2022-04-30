<?php
function empty($selector)
{
	$command = 'console.log(' . json_encode($data, JSON_HEX_TAG) . ');';
    $command = '<script>' + $command + '<script>';
	echo $command;
}
