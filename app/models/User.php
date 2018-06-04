<?php
	/*class User extends Model {
		function __construct($id='') {
			parent::__construct('uid', 'users'); //primary key = uid; tablename = users
			$this->rs['uid'] = '';
			$this->rs['username'] = '';
			$this->rs['password'] = '';
			$this->rs['fullname'] = '';
			$this->rs['created_dt'] = '';
			if ($id)
				$this->retrieve($id);
		}

		function create() {
			$this->rs['created_dt']=date('Y-m-d H:i:s');
			return parent::create();
		}
	}*/
	class User extends Model {
		function __construct($id='') {
			parent::__construct('id', 'users'); //primary key = uid; tablename = users
			$this->rs['id'] = '';
			$this->rs['nume'] = '';
			$this->rs['prenume'] = '';
			$this->rs['email'] = '';
			$this->rs['user_id'] = '';
			$this->rs['user_pw'] = '';
			if ($id)
				$this->retrieve($id);
		}

		function create() {
			$this->rs['created_dt']=date('Y-m-d H:i:s');
			return parent::create();
		}
	}