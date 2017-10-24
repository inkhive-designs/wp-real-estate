<?php if (get_theme_mod('wpre_fpages_enable') && is_front_page() ) : ?>
	
	<div class="featured-pages-section">
	<?php $pages_ids = array(0);
		
		  if ( get_theme_mod('wpre_fpages_page1')) { $pages_ids[] = get_theme_mod('wpre_fpages_page1'); }
		  if ( get_theme_mod('wpre_fpages_page2')) { $pages_ids[] = get_theme_mod('wpre_fpages_page2'); }	
		  
		$args = array( 
        	'post_type' => 'page',
        	'posts_per_page' => 4, 
        	'post__in' => $pages_ids,
        	'orderby' => 'post__in',
    	);
        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : 
        
        	$loop->the_post(); ?>
				<div class="featured-page container">
					<div class="featured-page-inner">
					
					<div class="col-md-5 col-sm-5 featured-image">
						<?php echo the_post_thumbnail('full'); ?>
					</div>
					
					<div class="col-md-7 col-sm-7 textual-info">
						<div class="feature-title title-font"><?php the_title(); ?></div>
						<div class="feature-content"><?php the_content(); ?></div>
						<a class="feature-link title-font" href="<?php the_permalink(); ?>"><?php _e('Learn More','wp-real-estate'); ?></a>
					</div>
				</div>	
				</div>
				
		<?php endwhile; ?>		
	
	<?php wp_reset_postdata(); ?>
	</div>
<?php endif; ?>