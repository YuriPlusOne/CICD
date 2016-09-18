<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

	<div class="middle">

		<div class="container">
			<main class="content">
				<div class="content-blocks first animated fadeIn">
					<h1 class="page-title">Обо мне</h1>
						<div class="user-pic">
							<img src="/public/userdata/user-<?php print $user['uid']; ?>/userpic/<?php print $user['userpic']; ?>" />
						</div>
						<div class="user-info">
        					<h2><?php print $user['fullname']; ?> <sup>(<?php print mdate('%d.%m.%Y', $user['bdate']); ?>)</sup></h2>
                			<?php print $user['office']; ?>
        				</div>
        				<div class="user-about">
        					<?php print $user['about']; ?>
        				</div>
				</div>
			</main><!-- .content -->
		</div><!-- .container-->