<?php
/**
 * Plugin Name: MIM Services
 * Plugin URI:        http://codebanyan.com/product/mim-services
 * Description:       MIM Services Plugin for WordPress
 * Version:           1.0.1
 * Author:            Al Imran Akash
 * Author URI:        http://im.medhabi.com
 * Text Domain:       services
 * Domain Path:       /languages
 */

/**
* 
*/
if ( !class_exists( MIM_Services ) ) :

	class MIM_Services {
		
		function __construct()
		{
			self::define();
			self::inc();
			self::hooks();
		}

		public function define() {
			define( 'MIM_SERVICES', __FILE__ );
		}

		public function inc() {
			require_once dirname( MIM_SERVICES ) . '/inc/cpt.php';
			require_once dirname( MIM_SERVICES ) . '/vendor/admin/mim-services-settings.php';
			require_once dirname( MIM_SERVICES ) . '/vendor/metabox/mim-services-metabox.php';
		}

		public function hooks() {
			add_action( 'after_setup_theme', array( $this, 'setup' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ), 98 );
			// add_filter( 'the_content', 'readmore' );
			add_shortcode( 'services', array( $this, 'mim_services' ) );
		}

		public function setup() {
			load_theme_textdomain( 'services', get_template_directory() . '/languages' );
		}

		public function enqueue_scripts() {
			wp_enqueue_style( 'mim-imagehover', plugins_url( '/assets/css/imagehover.min.css', MIM_SERVICES ) );
			wp_enqueue_style( 'mim-awesome', plugins_url( '/assets/css/font-awesome.min.css', MIM_SERVICES ) );
			wp_enqueue_style( 'mim-style', plugins_url( '/assets/css/mim-services.css', MIM_SERVICES ) );



			wp_enqueue_script( 'jquery' );
			wp_enqueue_script( 'mim-script', plugins_url( '/assets/js/mim-services.js', MIM_SERVICES ), array(), '1.0', true );
			wp_enqueue_script( 'mim-parallax', plugins_url( '/assets/js/parallax.min.js', MIM_SERVICES ), array(), '1.0', true );
		}

		// public function readmore( $content ) {
		// 	$word_limit =22;
		// 	$all_words = explode( ' ', $content );
		// 	$first_limit_words = implode( ' ', array_slice( $all_words, 0, $word_limit ) );
		// 	return $first_limit_words;
		// }

		function mim_services( $atts, $content ) {
			$atts = shortcode_atts( array(
				'' => ''
			), $atts );
			ob_start(); ?>


			<section id="mim-services" class="parallax-window" data-parallax="scroll" data-image-src="http://www.mountainguides.com/photos/everest-south/c2_2011b.jpg">
				<div class="mim-services">
					<div class="mim-services-title">
						<H2>MIM  Services</H2>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat.</p>
					</div>
					<?php 
					$args = array( 
						'post_type'			=>	'mim-services',
						'posts_per_page'	=>	-1,
						'order'				=>	'ASC'
					);
					$services = new WP_Query( $args );
					if ( $services->have_posts() ) : while ( $services->have_posts() ) : $services->the_post();

							$servicesstyle = mdc_get_option( 'servicesstyle', 'mim_services' );

							switch ( $servicesstyle ) {

								case 'style1':
									?>
										<div class="mim-services-body">
											<div class="mim-services-content">
												<?php the_post_thumbnail(); ?>
												<h4><?php the_title(); ?></h4>
												<?php the_excerpt(); ?>
												<div class="readmore-btn">
									                <a href="#"><i class="fa fa-long-arrow-right"></i></a>
									            </div>
											</div>
										</div>
									<?php
								break;

								case 'style2':
									?>
										<div class="mim-services-body">
											<div class="mim-services-content">
												<div class="mim-services-icon">
													<i class="fa fa-umbrella"></i>
												</div>
												<h4><?php the_title(); ?></h4>
												<?php the_excerpt(); ?>
												<div class="readmore-btn">
									                <a href="#"><i class="fa fa-long-arrow-right"></i></a>
									            </div>
											</div>
										</div>
									<?php
								break;

								case 'style3':
									?>
										<div class="mim-services-body">
											<div class="mim-services-content">
												<div class="mim-services-icon-style3">
													<i class="fa fa-umbrella"></i>
												</div>
												<h4><?php the_title(); ?></h4>
												<?php the_excerpt(); ?>
												<div class="readmore-btn">
									                <a href="#"><i class="fa fa-long-arrow-right"></i></a>
									            </div>
											</div>
										</div>
									<?php
								break;

								case 'style4':
									?>
										<div class="mim-services-body style4">
											<figure class="imghvr-flip-vert">
											    <div class="mim-services-content style4">
													<div class="mim-services-icon">
														<i class="fa fa-umbrella"></i>
													</div>
													<h4><?php the_title(); ?></h4>
													<?php the_excerpt(); ?>
												</div>
											    <figcaption>
											    	<div class="style4-hover">
											    		<h3><?php the_title(); ?></h3>
												        <?php the_content(); ?>
												        <div class="readmore-btn">
											                <a href="#"><i class="fa fa-long-arrow-right"></i></a>
											            </div>
											    	</div>
											    </figcaption>
											</figure>
										</div>
									<?php
								break;

								case 'style5':
									?>
										<div class="mim-services-body style4">
											<figure class="imghvr-flip-vert">
											    <div class="mim-services-content style4">
													<div class="mim-services-icon-style5">
														<i class="fa fa-umbrella"></i>
													</div>
													<h4><?php the_title(); ?></h4>
													<?php the_excerpt(); ?>
												</div>
											    <figcaption>
											    	<div class="style4-hover">
											    		<h3><?php the_title(); ?></h3>
												        <?php the_content(); ?>
												        <div class="readmore-btn">
											                <a href="#"><i class="fa fa-long-arrow-right"></i></a>
											            </div>
											    	</div>
											    </figcaption>
											</figure>
										</div>
									<?php
								break;
								
								default:
									?>
										<div class="mim-services-body">
											<div class="mim-services-content">
												<?php the_post_thumbnail(); ?>
												<h4><?php the_title(); ?></h4>
												<?php the_excerpt(); ?>
												<div class="readmore-btn">
									                <a href="#"><i class="fa fa-long-arrow-right"></i></a>
									            </div>
											</div>
										</div>
									<?php
								break;
							}
						endwhile; else : ?>
						<p><?php _e( 'Sorry, no posts.' ); ?></p>
					<?php endif; ?>
				</div>
			</section>

			<?php return ob_get_clean(); 
		}
	}
endif;
new MIM_Services;