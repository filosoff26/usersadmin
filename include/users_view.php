<?php
/* users view template */
require_once('include/mysql.php');

/* Fields */
$fields = [
	['name' => 'login', 'label' => 'Login'],
	['name' => 'password', 'label' => 'Password'],
];

$names = [];
foreach ($fields as $field) {
	$names[] = $field['name'];
}

$labels = [];
foreach ($fields as $field) {
	$labels[] = $field['label'];
}

/* Pagination */
$start = filter_input(INPUT_GET, start, FILTER_SANITIZE_NUMBER_INT);
$start--; // rows starting at 0

$labels_str = implode(',', $labels);
$q = "SELECT $labels_str FROM users LIMIT $start,5";
$mysqli->query($q);
ob_start();

?>
<table border=1>
	<tr>
	<?php foreach ($labels as $label): ?>
		<th><?= $label ?></th>
	<?php endforeach; ?>
	</tr>
</table>