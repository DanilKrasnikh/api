<?php

	//POST module
	
	require('consts.php');
	
	function post() {
		//echo "RUHUHUHUE";
		$upfile = FILE_DIR . basename($_FILES['userfile']['name']);
		$post_par = trim(basename($_SERVER['REQUEST_URI']), "?");
		$_write =  (!file_exists($upfile)) || ($post_par  == 'rewrite');
		if ($_write)
		{
			if (move_uploaded_file($_FILES['userfile']['tmp_name'], $upfile)) {
				echo CODE_201;
			}
			else
			{
				echo CODE_404;
			}
		}
		else
		{
			echo CODE_403;
		}
	}
	
?>