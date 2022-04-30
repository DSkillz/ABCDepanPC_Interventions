<?php
function emptyhtml($selector)
{
	$command = 'eldocument.querySelector("' + $selector + '")';
    $command = '<script>' + $command + '<script>';
	echo $command;
}
