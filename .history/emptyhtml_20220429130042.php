<?php
function console_log($data)
{
	$command = 'console.log(' . json_encode($data, JSON_HEX_TAG) . ');</script>';
    $command = '<script>' + $command + '<script>';
	echo $command;
}
