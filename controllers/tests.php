<?php

class tests {

	public $requires_auth = TRUE;
	public $scripts = NULL;

	function index()
	{
		global $request;
		global $_user;
		$tests = get_all("SELECT * FROM test NATURAL JOIN user WHERE test.deleted=0");
		require 'views/master_view.php';

	}
}