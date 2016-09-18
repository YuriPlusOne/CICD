<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

	<div class="middle">

		<div class="container">
			<main class="content">
				<div class="content-blocks first animated fadeIn">
					<h1 class="page-title">Информация о пользователе</h1>
						<div class="user-pic">
							<img src="/public/userdata/user-<?php print $user['uid']; ?>/userpic/<?php print $user['userpic']; ?>" />
						</div>
						<div class="user-info">
        					<h2><?php print $user['fullname']; ?> <sup>(<?php print mdate('%d.%m.%Y', $user['bdate']); ?>)</sup></h2>
                			<?php print $user['office']; ?>
        				</div>
				</div>

				<div class="content-blocks animated fadeIn">
					<h1 class="page-title">Статистика страницы</h1>
    				
    				<?php
    					print $chart['denial'];
    					print $chart['views']; 
    					print $chart['visitors'];
    				?>
					
				</div>

				<div class="content-blocks animated fadeIn">
					<h1 class="page-title">Новостная лента</h1>
					<div class="by">
						<?php foreach ($news_list as $news_item): ?>
        					<a class="ph" href="#">
     							<span class="dy dh"><?php print mdate('%d.%m.%Y %H:%i', $news_item['postdate']); ?></span>
      							<?php print $news_item['title']; ?>
   							</a>
							<?php endforeach; ?>
					</div>
				</div>
			</main><!-- .content -->
		</div><!-- .container-->