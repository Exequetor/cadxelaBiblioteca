<?php
class Utils {
	function alert_builder ($message, $type) {
		$html = '<div class="alert alert-'. $type .' alert-dismissible fade show" role="alert">';
		$html .= $message.'</div>';
		return $html;
	}
}
?>