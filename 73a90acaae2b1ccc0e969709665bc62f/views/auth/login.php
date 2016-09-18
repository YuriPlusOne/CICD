<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="wrapper auth">

	<div class="auth-container animated fadeInDown">

		<header class="header">
			<div class="logo"><i class="fa fa-paper-plane" aria-hidden="true"></i></div>
			<div class="logo-desc">CodeIgniter Developers<br />Contest</div>
		</header><!-- .header-->

		<div class="middle">

			<div class="container">
				<main class="content">

					<div class="messages"><?php print validation_errors(); ?></div>

					<?php print form_open('auth/login', array('id' => 'authform', 'method' => 'post')); ?>
						<?php print form_input('login', $login, array('id' => 'loginfield', 'placeHolder' => 'Логин')); ?>
						<?php print form_password('password', '', array('type' => 'password', 'id' => 'loginpassword', 'placeHolder' => 'Пароль')); ?>
						<?php print form_submit('auth', 'Войти', array('id' => 'loginsubmit')); ?>

					</form>
				</main><!-- .content -->
			</div><!-- .container-->

		</div><!-- .middle-->

	</div>

</div><!-- .wrapper -->
