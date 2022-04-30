<?php
function emptyhtml($selector)
{
	$command = 'document.';
    $command = '<script>' + $command + '<script>';
	echo $command;
}
