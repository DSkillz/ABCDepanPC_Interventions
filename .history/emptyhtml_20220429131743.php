<?php
function emptyhtml($selector)
{
	$command = 'elt = document.querySelector("' + $selector + '");';
    $command = $command + 'elt.pare'
    $command = '<script>' + $command + '<script>';
	echo $command;
}
