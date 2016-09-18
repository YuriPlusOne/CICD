<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

	<div class="middle">

		<div class="container">
			<main class="content">
				<div class="content-blocks animated fadeIn">
					<h1 class="page-title">Статистика страницы</h1>

    				<?php
    					print $chart['denial'];
    					print $chart['views']; 
    					print $chart['visitors'];
    				?>
					
				</div>
			</main><!-- .content -->
		</div><!-- .container-->