<div class="container-fluid visible-md-block visible-lg-block about-us">
    <div class="row">
        <div class="our-objects">
            <h2 class="about-us-h2">Примеры некоторых наших объектов за сезон 2016г.</h2>
                <?php $query_obj_gal = new WP_Query(array ( 
                        'category_name' => 'obj_gal',
                        'posts_per_page' => 2,
                        'post_type'  => 'post',
                )); ?>          
                <?php if ($query_obj_gal->have_posts()) : while (       
                    $query_obj_gal->have_posts()) : $query_obj_gal->the_post()?>
                    
                    <h3 class="bold"><?php the_title(); ?></h3>  
                    <?php the_content(); ?>     
                    
                <?php endwhile; ?>
                <?php endif; ?>         
                <?php //wp_corenavi(); ?>

        </div>
    </div>
</div>