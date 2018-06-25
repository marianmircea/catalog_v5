<h2>KISSMVC Demo</h2>
<p>
This application demostrates the use of the KISSMVC Model.<br />
You can try them out from the "Manage Users" tab.
</p>
	<h3><p>
<?php
	if (isset($_SESSION['authuid'])) {
		echo "Bine ati venit, datele d-voastra de identificare sunt: ";
		echo $_SESSION['authuid'];
		$user = new User();
?>
		<table id="date_identificare">
			<tr>
				<th>Nume</th>
				<th>Prenume</th> 
				<th>email</th>
				<th>data creare cont</th>
			</tr>
			<tr>
				<td>
<?php
	require_login();    
		$msg = '';
		$uid = max(0, intval($_SESSION['authuid']));
		$user = new User();
		if ($uid) {
			$user->retrieve($uid);
		}
	echo $user->get('nume');
?>
				</td>
				<td>
<?php
	echo $user->get('prenume');
?>
				</td>
				<td>
<?php
	echo $user->get('email');
?>
				</td>
				<td>
<?php
	echo $user->get('created_dt');
?>					
				</td>
			</tr>
		</table>
<?php	
	}
		else echo "nu avem sesiune ...";
?>
	</p></h3>