<?php
ob_start();
?>
<form method="post" action="users.php?action=save">
	<?php foreach ($data as $key => $value): ?>
		<p><?= $key ?><input type="<?= $key=='password' ? 'password' : ($key=='birthdate' ? 'date' : 'text') ?>" name="<?= $key ?>" value="<?= $value ?>"></p>
	<?php endforeach; ?>
	<input type="submit" value="Save"><br>
	<a href="javascript:history.back()">Cancel</a><br>
	<?php if ($allow_delete): ?>
		<a href="users.php?action=delete&login=<?= $id ?>" onclick="return confirm('Are you sure?');">Delete user</a>
	<?php endif; ?>
</form>
<?
$page_content .= ob_get_contents();
ob_end_clean();