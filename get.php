<?php
	// $_GET module
	
	require('consts.php');
	
	function get($calledFunc)
	{
		switch ($calledFunc):
			Case "getbyname":
				getbyname();
				break;
			case "getmetabyname":
				getmetabyname();
				break;
			case "getlistfiles":
				getlistfiles();
				break;
			case "exist":
				exist();
				break;
			default:
			echo CODE_400;
			break;
		endswitch;
	}
	
	function getbyname()
	{
		$file = FILE_DIR . $_GET['getbyname'];
		
		if (file_exists($file))
		{
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename='.basename($file));
			readfile($file);
			exit;
		}
		else
		{
			echo CODE_404;
		}
	}
	
	function getmetabyname()
	{
		$filename = $_GET['getmetabyname'];
		$file = FILE_DIR . $filename;
		
		if (file_exists($file))
		{
			$statfile = stat($file);
			
			echo "filename: " . $filename . "\n";
			echo "size: " . $statfile[7] . "\n";
			echo "last modification: " . date('d M Y H:i:s', $statfile[9]) . "\n";
		}
		else
		{
			echo CODE_404;
		}
	}
	
	function getlistfiles()
	{
		$dir = scandir(FILE_DIR);
		$listfiles = '';
		$cnt = 0;
		foreach($dir as $file)
		{
			if (!in_array($file, array(".", "..")))
			{
				$cnt++;
				$listfiles = $listfiles . $cnt . '. ' .$file . "\n";
			}
		}
		echo $listfiles;
	}
	
	function exist()
	{
		if (file_exists(FILE_DIR . $_GET['exist']))
		{
			echo CODE_201;
		}
		else
		{
			echo CODE_404;
		}
	}
?>