<?php
	function _login() {
		$username = trim($_POST['user']);
		$password = $_POST['pw'];

		$user = new User();
		$user->retrieve_one('user_id=?', $username);
		if (!$user->exists()) {
			unset($_SESSION['authuid']);
			redirect('main/login/'.$username,'Login Failed!');
		}
		if ($password != $user->get('user_pw')) {
			unset($_SESSION['authuid']);
			redirect('main/login/'.$username,'Wrong Password!');
		}
	//Login Succeeded
		$_SESSION['authuid'] = $user->get('id');
		redirect('main', 'Login Successful!');
	}