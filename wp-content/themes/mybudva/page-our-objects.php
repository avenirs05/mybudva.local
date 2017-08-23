<?php get_header(); ?>


<div class="container-fluid visible-md-block visible-lg-block about-us">
	<div class="row">
		<div class="our-objects">
			<h2 class="about-us-h2">Примеры некоторых наших объектов за сезон 2016г.</h2>
			<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>
			
			<?php $wp_query = new WP_Query( array (
				'category_name' => 'obj_gal',
				'posts_per_page'=> 2,
				'paged' => $paged,
			) ); ?>
			
			<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>					
				<h3 class="bold"><?php the_title(); ?></h3>  
		        <?php the_content(); ?>   
			<?php endwhile; ?>
			
			<?php the_posts_pagination(); ?>
		</div>
	</div>
</div>

<div class="container-fluid visible-xs-block visible-sm-block about-us">
	<div class="row">
		<div class="our-objects-mob">
			<h3 class="h-mob">Примеры некоторых наших объектов за сезон 2016г.</h3>
				<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>
				
				<?php $wp_query = new WP_Query( array (
					'category_name' => 'obj_gal_mob',
					'posts_per_page'=> 2,
					'paged' => $paged,
				) ); ?>
				
				<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>					
					<h5 class="bold"><?php the_title(); ?></h3>  
			        <?php the_content(); ?>   
				<?php endwhile; ?>
				
				<?php the_posts_pagination(); ?>	
		</div>
	</div>
</div>




<?php get_footer(); ?>