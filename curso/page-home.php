<?php get_header(); ?>

<div class="content-area">
	<main>
		<section class="slide">
			<?php echo do_shortcode('[recent_post_slider design="design-2" limit="5"]'); ?>
		</section>
		<section class="services">
			<div class="container">
				<h1>Our Services</h1>
				<div class="row">
					<div class="col-sm-4">
						<div class="services-item">
						<?php if(is_active_sidebar('services-1')){
							dynamic_sidebar('services-1');
						} ?>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="services-item">
						<?php if(is_active_sidebar('services-2')){
							dynamic_sidebar('services-2');
						} ?>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="services-item">
						<?php if(is_active_sidebar('services-3')){
							dynamic_sidebar('services-3');
						} ?>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="middle-area">
			<div class="container">
				<div class="row">
					<?php get_sidebar('home'); ?>
					<div class="news col-md-8">
						<div class="container">
							<h1>Latest News</h1>
							<div class="row">
							<?php 
								//Primeiro Loop
								$featured = new WP_QUERY( 'post_type=post&post_per_page=1&cat=3,6' );

								if ($featured->have_posts()):
									while($featured->have_posts()): $featured->the_post();
							?>
							<div class="col-12">
							<?php get_template_part('template-parts/content', 'featured'); ?>
							</div>
							<?php
									endwhile;
									wp_reset_postdata();
								endif;
							
								//Segundo Loop
								$args = array(
									'post_type' => 'post',
									'posts_per_page' => 2,
									'category__note_in' => array(5),
									'category__in' => array(3,6),
									'offset' => 2
								);

								$secondary = new WP_QUERY( $args );

								if ($secondary->have_posts()):
									while($secondary->have_posts()): $secondary->the_post();
							?>
							<div class="col-sm-6">
							<?php get_template_part('template-parts/content', 'secondary'); ?>
							</div>
							<?php
									endwhile;
									wp_reset_postdata();
								endif;
							?>

							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="map">
		<iframe
		width="100%"
		height="350"
		frameborder="0" style="border:0"
		src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDd4DzU9PBLDVbcSWeMC4-vS9YaWZBjMTU&q=Space+Needle,Seattle+WA&zoom=15" allowfullscreen>
		</iframe>
		</section>
	</main>
</div>

<?php get_footer(); ?>