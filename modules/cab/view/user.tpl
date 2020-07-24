<div class="body-page">
	<div class="user">
		Страница пользователя
	</div>
	<?php if (isset($_SESSION['user']['login'])) { ?>
	<div class="activate-text">
		Добрый день, <?php echo hc($_SESSION['user']['login']); ?>
	</div>
	<div class="user-exit">
		<a href="/cab/exit">ВЫХОД</a>
	</div>
	<?php }  ?>
</div>
