<?php
function emptyhtml($selector)
{
	$command = 'el = document.querySelector("' + $selector + '")';
    $command = '<script>' + $command + '<script>';
	echo $command;
}
