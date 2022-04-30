<?php
function emptyhtml($selector)
{
	$command = 'document.query';
    $command = '<script>' + $command + '<script>';
	echo $command;
}
