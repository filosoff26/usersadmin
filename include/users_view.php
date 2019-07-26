<?php
/* users view template */
require_once('include/mysql.php');

function add_param($url, $arg, $val)
{
	if (parse_url($url, PHP_URL_QUERY)) {
		$url .= "&$arg=$val";
	} else {
		$url .= "?$arg=$val";
	}
	return  $url;
}
/* New GET Query, new URL for links */
$newget = [];
$newurl = $_SERVER[SCRIPT_NAME];

/* Fields */
/*
$fields = [
	['name' => 'login', 'label' => 'Login'],
	['name' => 'password', 'label' => 'Password'],
	['name' => 'name', 'label' => 'Name'],
]; 
*/

$fields = [
	'login' => 'Login',
	'name' => 'Name',
	'surname' => 'Surname',
	'gender' => 'Gender',
	'birthdate' => 'Birth Date',
];
$names = array_keys($fields);
$labels = array_values($fields);

$names_str = implode(',', $names);
$labels_str = implode(',', $labels);

$q = "SELECT $names_str FROM users";

/* sorting */
$sorting = filter_input(INPUT_GET, sort, FILTER_SANITIZE_STRING) ? : 'login';
$order = filter_input(INPUT_GET, order, FILTER_SANITIZE_STRING) ? : 'asc';
$oldurl = $newurl; // remember url
$q .= " ORDER BY $sorting $order";
foreach ($fields as $name => $label) {
	if ($name != $sorting) {
		$sorturl = add_param($oldurl, 'sort', $name);
		$fields[$name] = "<a href='$sorturl'>$label</a>";
	} else {
		$newurl = add_param($newurl, 'sort', $name);
	}
}

/* Pagination */
$pagination_size = 3; // default value, can be changed
$start = filter_input(INPUT_GET, start, FILTER_SANITIZE_NUMBER_INT) ? : 0;
$q .= " LIMIT $start,$pagination_size";
$res = $mysqli->query("SELECT COUNT(*) FROM users");
$all_count = intval($res->fetch_row()[0]);

/* main */
$res = $mysqli->query($q);
$count = $res->num_rows;
ob_start();

?>
<table border=1>
	<tr>
	<?php foreach ($fields as $name => $label): ?>
		<th><?= $label ?></th>
	<?php endforeach; ?>
	</tr>
	<?php foreach ($res as $row): ?>
	<tr>
		<?php foreach ($row as $key => $value): ?>
		<td>
			<?php if ($key == 'login'): ?>
				<a href="users.php?login=<?= $value ?>&action=edit"><?= $value ?></a>
			<?php else: ?>
				<?= $value ?>
			<?php endif; ?>
		</td>
		<?php endforeach; ?>
	</tr>
	<?php endforeach; ?>
</table>

<!-- Page widget -->
<?php 
$prevlink = 'Prev';
$nextlink = 'Next';
if ($start > 0) {
	$newstart = $start < $pagination_size ? 0 : $start-$pagination_size;
	$prevurl = add_param($newurl, 'start', $newstart);
	$prevlink = "<a href='$prevurl'>Prev</a>";
}
if ($start+$count < $all_count) {
	$newstart = $start+$count;
	$nexturl = add_param($newurl, 'start', $newstart);
	$nextlink = "<a href='$nexturl'>Next</a>";
}
?>
<p><?= $prevlink ?> | <?= $nextlink ?></p>
<p>Showing <?= $start+1 ?> - <?= $start+$count ?> of <?= $all_count ?></p>

<?php
$page_content = ob_get_contents();
ob_end_clean();