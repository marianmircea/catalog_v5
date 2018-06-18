<?php
	function _login() {
		if (empty($_POST['user']) && empty($_POST['pw'])) {
			unset($_SESSION['authuid']);
			redirect('main/login/'.$username,'Missing User and Password!');
		}
		if (empty($_POST['user'])) {
			unset($_SESSION['authuid']);
			redirect('main/login/'.$username,'Missing User-name!');
		}
		if (empty($_POST['pw'])) {
			unset($_SESSION['authuid']);
			redirect('main/login/'.$username,'Missing password!');
		}
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
		//session_start();
		$_SESSION['authuid'] = $user->get('id');
		redirect('main', 'Login Successful!');
		
	}