<?php

class tests {

	public $requires_auth = TRUE;
	public $scripts = NULL;

	function index()
	{
		//add tests.js to be included in view
		$this->scripts[] = 'tests.js';
		global $request;
		global $_user;
		$tests = get_all("SELECT * FROM test NATURAL JOIN user WHERE test.deleted=0");
		$id = $_SESSION['user_id'];
		$status = get_one("SELECT status FROM user where user_id='$id'");
		var_dump($status);

		require 'views/master_view.php';


	}
	function remove()
	{
		global $request;
		$id = $request->params[0];
		$result = q("UPDATE test SET deleted=1 WHERE test_id='$id'");
		require 'views/master_view.php';

	}
	function add(){
		ob_end_clean();
		$user_id = $_SESSION['user_id'];
		if(isset($_POST['test_name'])){
			$test_id = q("INSERT INTO test SET name='$_POST[test_name]', user_id='$user_id'");
			echo $test_id>0 ? $test_id : 'FAIL';
			exit();
		}
		else{
			exit('Testi nimi puudub!');
		}
	}
	function edit()
	{
		global $request;
		$this->scripts[] = 'addedittests.js';
		$id = $request->params[0];
		$tests = get_all("SELECT * FROM test WHERE test_id = '$id'");
		$questions = get_all("SELECT * FROM question WHERE test_id = '$id'");
		$tests = $tests[0];

		require 'views/master_view.php';
	}
	function remove_question(){

	}
	function view_question(){
		global $request;
		$this->scripts[] = 'addedittests.js';
		$id = $request->params[0];
		$questions = get_all("SELECT * FROM question WHERE test_id = '$id'");

		require 'views/tests_view_question_view.php';
	}
}