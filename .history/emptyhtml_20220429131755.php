<?php
function emptyhtml($selector)
{
	$command = 'elt = document.querySelector("' + $selector + '");';
    $command = $command + 'elt.parentNode.re'
    $command = '<script>' + $command + '<script>';
	echo $command;
}
