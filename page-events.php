<?php get_header( ); ?>
	<section id="upcoming_shows">
		<div class="container">
			<div class="row">
				<div id="upcoming_events">
					<div class="heading">
						<h3>Upcoming Shows</h3>
					</div>
					<script type='text/javascript' src='http://widget.bandsintown.com/javascripts/bit_widget.js'></script><a href="http://www.bandsintown.com/m4" class="bit-widget-initializer" data-prefix="fbjs" data-artist="m4">m4 Tour Dates</a>
				</div>
			</div>
		</div>
	</section>
	<section id="newsletter">
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
	</section>
<?php get_footer( ); ?>