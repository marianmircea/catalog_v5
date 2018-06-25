<script type = "text/javascript">
	function validateForm(f) {
		if (f.nume.value == "") {
			alert("Please enter a username");
			f.nume.focus();
			return false;
		}
		if (f.prenume.value == "") {
			alert("Va rog completati prenumele");
			f.prenume.focus();
			return false;
		}
		if (f.email.value == "") {
			alert("Va rog completati adresa de mail");
			f.email.focus();
			return false;
		}
		if (f.user_pw.value == "") {
			alert("Please enter a password");
			f.user_pw.focus();
			return false;
		}
		f.submit();
	}
</script>