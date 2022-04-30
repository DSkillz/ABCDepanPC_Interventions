<?php
function emptyhtml($selector)
{
	$command = 'elt = document.querySelector("' + $selector + '");';
    $command = $command + 'elt.parent'
    $command = '<script>' + $command + '<script>';
	echo $command;
}
