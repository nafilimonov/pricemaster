<div class="row">
	<div class="col-12 col-md-8">
		<div class="form-block shadow p-5 mt-5">
			<h2 class="mt-0">Вход</h2>
			<? if ($message) : ?>
				<h3 class="message">
					<?= $message; ?>
				</h3>
			<? endif; ?>
			<?= Form::open('/user/login'); ?>

			<div class="form-group">
				<?= Form::label('username', 'Логин'); ?>
				<?= Form::input('username', HTML::chars(Arr::get($_POST, 'username'))); ?>
			</div>
			<div class="form-group">
				<?= Form::label('password', 'Пароль'); ?>
				<?= Form::password('password'); ?>
			</div>

			<div class="form-group form-check">
				<?= Form::checkbox('remember', NULL, false, array("class" => 'form-check-input')); ?>
				<?= Form::label('remember', 'Запомните меня', array("class" => 'form-check-label')); ?>
			</div>

			<?= Form::submit('login', 'Вход', array("class" => 'btn btn1')); ?>
			<?= Form::close(); ?>

			<?/*
			<p>Or <?= HTML::anchor('/user/create', 'create a new account'); ?></p>
			*/?>
		</div>
	</div>
</div>
