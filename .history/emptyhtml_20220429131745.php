<?php
function emptyhtml($selector)
{
	$command = 'elt = document.querySelector("' + $selector + '");';
    $command = $command + 'elt.parentNode'
    $command = '<script>' + $command + '<script>';
	echo $command;
}
