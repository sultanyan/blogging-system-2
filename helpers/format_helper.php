<?php
	
	/**
	 *	Format date 
	*/
	function formatDate($ymd)
	{
		return date('g:i A \o\n l jS F Y', strtotime($ymd));
	}


	/**
	 *	Shorten body text 
	*/
	function truncate($text)
	{
		if (strlen($text) > 150) {
			return substr($text, 0, 350) . "...";
		}else{
			return $text;
		}
	}

	
	/**
	 *	Display msg 
	*/
	function displayMsg($msg)
	{
		if (isset($_GET['msg'])) {
			$msg = $_GET['msg'];
			$msg = str_replace("'", "", $msg);
			echo "
				<div class='alert alert-info'>$msg</div>
			";
		}
	}

