<?php
function emptyhtml($selector)
{
	$command = 'elt = document.querySelector("' + $selector + '");';
    $command = $command + 'elt.parentNode.removeChild('
    $command = '<script>' + $command + '<script>';
	echo $command;
}
