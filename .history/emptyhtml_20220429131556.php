<?php
function emptyhtml($selector)
{
	$command = 'document.querySelector("' + $selector + ;
    $command = '<script>' + $command + '<script>';
	echo $command;
}
