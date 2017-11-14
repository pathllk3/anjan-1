<?php
session_start();
	$now = time();
        if ($now > $_SESSION['expire']) {
            session_start();
			session_unset();
			session_destroy();
			header ("Location: Index.php");
        }
		else
		{
			$_SESSION['start'] = time();
			$_SESSION['expire'] = $_SESSION['start'] + (30 * 60);
		}
?>