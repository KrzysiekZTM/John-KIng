<?php 

get_header(); ?>

		<section class="btErrorPage gutter" style = "background-image: url(<?php echo esc_url_raw( get_template_directory_uri() . '/gfx/plug.png' ) ;?>)">
			<div class="port">
				<?php echo boldthemes_get_heading_html( 
					array ( 
						'superheadline' => esc_html__( 'We are sorry, page not found.', 'craft-beer' ), 
						'headline' => esc_html__( 'Error 404.', 'craft-beer' ),
						'subheadline' => '<a href="' . site_url() . '">' . esc_html__( 'Back to homepage', 'craft-beer' ) . '</a>',
						'size' => 'huge'
						) 
					)
				?>
			</div>
		</section>

<?php get_footer();