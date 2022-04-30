<?php
function emptyhtml($selector)
{
	$command = 'elt = document.querySelector("' + $selector + '");';
    $command = $command +
    $command = '<script>' + $command + '<script>';
	echo $command;
}
