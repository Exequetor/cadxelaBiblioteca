<?php
	function alert($title, $message, $type) {
		echo('<div class="alert '. $type .' alert-dismissible fade show" role="alert">');
		echo('<strong>'.$title.'</strong> '.$message);
		echo('</div>');
	}
?>