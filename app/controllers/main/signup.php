<?php
	function _signup($username='') {
		$data['pagename'] = 'Inscrie-te';
		$data['body'][] = '<h2>Va rugam completati formularul de mai jos</h2><br />';
		$data['body'][] = View::do_fetch(VIEW_PATH.'main/signup_form.php', array('username' => $username));
		/*$data['body'][] = '<p>You can login with username="admin" and password="test123"...</p>';*/
		View::do_dump(VIEW_PATH.'layouts/mainlayout.php', $data);
	}
