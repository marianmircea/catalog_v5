<form method = "post" action = "<?php echo myUrl('users/ops_update')?>">
	<input type = "hidden" name = "id" value = "<?php echo $user->get('id')?>" />
		<table>
			<tr><th colspan = "2"><?php echo $form_heading?></th></tr>
			<tr>
				<td>Nume</td>
				<td><input type = "text" name ="nume" style = "width:150px" value="<?php echo $user->get('nume')?>" /></td>
			</tr>
			<tr>
				<td>Prenume</td>
				<td><input type = "text" name ="prenume" style="width:150px" value="<?php echo $user->get('prenume')?>" /></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type = "text" name ="email" style="width:150px" value="<?php echo $user->get('email')?>" /></td>
			</tr>
			<tr>
				<td>Parola</td>
				<td><input type = "text" name ="user_pw" style = "width:150px" value="<?php echo $user->get('user_pw')?>" /></td>
			</tr>
			
			<tr>
				<td colspan ="2" style ="text-align:right">
				<input type = "button" value = "Submit" onclick = "validateForm(this.form);return false;" /></td>
			</tr>	
		</table>
		
</form>