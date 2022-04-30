<?php
function emptyhtml($selector)
{
	$command = 'elt = document.querySelector("' + $selector + '")';
    $command = '<script>' + $command + '<script>';
	echo $command;
}
