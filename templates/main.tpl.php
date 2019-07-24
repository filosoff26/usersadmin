<!DOCTYPE html>
<html>
<head>
	<title><?= $page_title ?></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<header>
		<h1>Users administration page</h1>
		<nav>
			<a href="users.php">list all</a> |
			<a href="logout.php">logout</a>
		</nav>
		<?php if ($warnings): ?>
			<?php foreach ($warnings as $msg): ?>
				<div class='warning'>Warning: <?= $msg ?></div>
			<?php endforeach; ?>
		<?php endif; ?>
		<?php if ($errors): ?>
			<?php foreach ($errors as $msg): ?>
				<div class='error'>Error: <?= $msg ?></div>
			<?php endforeach; ?>
		<?php endif; ?>

	</header>
	<?= $page_content ?>
	<footer>
		&copy; 2019 Alexey Stepanenko
	</footer>
</body>
</html>