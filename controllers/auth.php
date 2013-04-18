<?php

class auth
{

	function index()
	{
		global $request;
		global $_errors;
		if (isset ($_SESSION['session_expired'])) {
			$_errors[] = "Sessioon on aegunud!";
			unset($_SESSION['session_expired']);
		}
		if (isset ($_POST['username'])) {
			$username = $_POST['username'];
			$password = $_POST['password'];
			$user_id = get_one("SELECT user_id FROM user WHERE username='$username' AND password='$password'");
			if (! empty($user_id)) {
				$_SESSION['user_id'] = $user_id;
				var_dump($user_id);
				$request->redirect('tests');
			}
			$_errors[] = "Vale kasutajanimi või parool.";
			var_dump($user_id);
		}
		require 'views/auth_view.php';

	}

	function logout()
	{
		global $request;
		session_destroy();
		$request->redirect('auth');
	}
}