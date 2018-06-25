<?php
	class User extends Model {
		function __construct($id='') {
			parent::__construct('id', 'users'); //primary key = uid; tablename = users
			$this->rs['id'] = '';
			$this->rs['nume'] = '';
			$this->rs['prenume'] = '';
			$this->rs['email'] = '';
			$this->rs['user_id'] = '';
			$this->rs['user_pw'] = '';
			$this->rs['created_dt'] = '';
			if ($id)
				$this->retrieve($id);
		}

		function create() {
			$this->rs['created_dt']=date('Y-m-d H:i:s');
			return parent::create();
		}
	}