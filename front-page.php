<?php get_header( ); ?>
	<section id="featured">
		<div class="container">
			<div class="row">
				<div class="heading">
					<?php 

						if(get_field('featured_media_heading')) :
							the_field('featured_media_heading');
						endif;

					 ?>
				</div>
			</div>
		</div>
	</section>
	<section id="frontPage">
		<div class="ft_media">
			<?php

				$iframe = get_field('media');


				preg_match('/src="(.+?)"/', $iframe, $matches);
				$src = $matches[1];


				$params = array(
				    'controls'    => 0,
				    'hd'        => 1,
				    'autohide'    => 1
				);

				$new_src = add_query_arg($params, $src);

				$iframe = str_replace($src, $new_src, $iframe);


				// add extra attributes to iframe html
				$attributes = 'frameborder="0" width=100%';

				$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);


				// echo $iframe
				echo $iframe;

				?>
		</div>
		<div id="connected">
			<div class="container">
				<div class="row">
					<div class="heading">
						<?php 

							if(get_field('cta_heading')) :
								the_field('cta_heading');
							endif;
						 ?> 
					</div>
					<div class="subheading">
						<?php 

							if(get_field('cta_subheading')) :
								the_field('cta_subheading');
							endif;
						 ?>
					</div>
					<div class="form">
						<?php 

							$form = get_field('cta_form');
							if (! empty($form)) : 
								echo do_shortcode($form );
							endif;
						 ?>
					</div>
				</div>
			</div>
			<div class="container">
					<div class="row">
				<!-- ============  events ============ -->
					<div id="upcoming_events">
						<div class="heading">
							<h3>Upcoming Shows</h3>
						</div>
						<script type='text/javascript' src='http://widget.bandsintown.com/javascripts/bit_widget.js'></script><a href="http://www.bandsintown.com/m4" class="bit-widget-initializer" data-prefix="fbjs" data-artist="m4">m4 Tour Dates</a>
					</div>
				</div>
			</div>
		</div>	
	</section>
<?php get_footer( ); ?>