<?php
	require('consts.php');
	$method = $_SERVER['REQUEST_METHOD'];
	
	switch ($method):
		Case 'GET':
			require('get.php');
			foreach($_GET as $funcname => $value){
			get($funcname);
			}
			break;
		Case 'POST':
			require('post.php');
			post();
			break;
		default: echo CODE_405;
	endswitch;

?>