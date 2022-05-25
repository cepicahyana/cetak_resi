

	<?php
	$ses_level = session("level");

	if ($ses_level == "SUPERADMIN") {
		echo view("temp_user/navbar_superadmin");
	} elseif ($ses_level == "ADMIN" ||  $ses_level == "QUALITY") {
		echo view("temp_user/navbar_admin");
	} else {
		echo view("temp_user/navbar");
	}
	
	?>