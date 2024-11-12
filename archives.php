<?php
/*
Template Name: archives
*/
?>
<?php get_header(); ?> 
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<main>
			<div class="Qb Rb J Sb Fb Tb">
				<div class="m kb">
				<?php archives_list_SHe(); ?>
			   </div>
			</div>
		 </main>
	<?php endwhile; endif; ?>
<?php get_footer(); ?>



