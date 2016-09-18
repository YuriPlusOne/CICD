<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

	<div class="middle">

		<div class="container">
			<main class="content">
				<div class="content-blocks animated fadeIn">
					<h1 class="page-title">Новостная лента (архив)</h1>
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