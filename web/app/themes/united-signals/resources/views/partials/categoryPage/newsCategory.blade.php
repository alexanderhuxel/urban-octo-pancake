<div class="flex px-10 w-full flex-col border-8">
	<h2 class="text-h2 font-bold mb-5 text-primary">News</h2>
	<div class="flex flex-col lg:flex-row mb-11">

		<div class="w-full md:w-1/2">
			<?php
            get_template_part( 'template-parts/article', get_post_type() );
            ?>
		</div>


	</div>
</div>