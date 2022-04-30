<?php
function emptyhtml($selector)
{
	$command = 'elt = document.querySelector("' + $selector + '");';
    $command = $command + 'elt.parentNode.removeChild(elt);';
    $command = '<script>' + $command + '<script>';
	echo $command;
}
