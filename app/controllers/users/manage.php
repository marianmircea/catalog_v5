<?php
	function _manage($n=0) {
		require_login(); //verifica daca este setata sseiune, daca nu, redirect la pagina de logare
		$n = (int)$n;
		$data['body'][] = '<h2>Manage Users</h2><br />';
		_make_user_table($n, $data);
		$data['body'][] = '<p><a href = "'.myUrl('users/add').'">Add New User</a></p>';
		View::do_dump(VIEW_PATH.'layouts/mainlayout.php', $data);
	}

	function _make_user_table($n, &$data) {
		$dbh = getdbh();
	  
	  //pagination
		//$stmt = $dbh->query('SELECT count(*) "total" FROM "users"'); --- linia originala ....
		//$stmt = $dbh->query('SELECT count(*) "total" FROM users');
		//$stest = $dbh->query('SELECT count(*) AS "total" FROM users');
		//print_r ($stest);
		//echo "<br>";
		$stmt = $dbh->query('SELECT count(*) "total" FROM users');
		$rs = $stmt->fetch(PDO::FETCH_ASSOC);
		$total = $rs['total'];
		$limit = $GLOBALS['pagination']['per_page'];
		$data['body'][] = '<p>Showing records '.($n+1).' to '.min($total,($n+$limit)).' of '.$total.'</p>';
		$data['body'][] = pagination::makePagination($n, $total, myUrl('users/manage'), $GLOBALS['pagination']);

	  //table
		//$stmt = $dbh->query("SELECT * FROM \"users\" LIMIT $n,$limit"); --- originalll
		$stmt = $dbh->query("SELECT * FROM users LIMIT $n, $limit");
		//$tablearr[] = explode(',','uid,username,password,fullname,created_dt,Action');
		$tablearr[] = explode(',','id, nume, prenume, email, user_id, PASS, data crearii, Actions');
		while ($rs = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$uid = $rs['id'];
			$row = null;
			foreach ($rs as $k => $v)
				$row[$k] = htmlspecialchars($v);
			$row[] = '<a href="'.myUrl("users/edit/$uid").'">Edit</a> | <a href="javascript:jsconfirm(\'Really Delete User?\',\''.myUrl("users/ops_delete/$uid").'\')">Delete</a>';
			$tablearr[] = $row;
			};
		$data['body'][] = table::makeTable($tablearr);
		$data['head'][] = '<script type="text/javascript" src="'.myUrl('js/jsconfirm.js').'"></script>';
	}