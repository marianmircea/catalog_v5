<h2>KISSMVC Demo</h2>
<p>
This application demostrates the use of the KISSMVC Model.<br />
You can try them out from the "Manage Users" tab.
</p>
<?php
	if (isset($_SESSION['authuid'])) {
		echo$_SESSION['authuid'];
	} else echo "nu avem sesiune ...";
