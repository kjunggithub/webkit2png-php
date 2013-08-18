<?php

/**
* PHP wrapper class for the webkit2png application.
*/
class webkit2png
{	
	protected $paths;
	protected $url;

	/*
	 * Initialize the class
	 */
	function __construct()
	{	
		// set the path so you have access to webkit2png within PHP
		// if you installed webkit2png via homebrew, include the following path.
		$this->paths = putenv("PATH=" . $_env["path"] .':/usr/local/bin');

		$webkit2png = trim(shell_exec('type -P webkit2png'));

		if (empty($webkit2png)){
		    die('Unable to find webkit2png. Please check your environment paths to ensure that PHP has access to the webkit2png binary.');
		}

		// var_dump($webkit2png);
	}
}