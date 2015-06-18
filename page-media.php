<?php get_header( ); ?>
	<section id="media_gallery">
		<div class="container">
			<div class="row">
				<div class="ig">
					<div id="instafeed">
						
					</div>
				</div>
			</div>
			<div class="row">
				<div class="header">
					Video Gallery
				</div>
			</div>
			<div class="row">
				
				<div class="media_box">
					<ul>
					<?php

						// ACF Loop
						if( have_rows( 'videos' ) ) : while( have_rows( 'videos' ) ): the_row(); ?>                  
						    
						<li class="col-md-6">
									<?php

									$iframe = get_sub_field('video');


									preg_match('/src="(.+?)"/', $iframe, $matches);
									$src = $matches[1];


									$params = array(
									    'controls'    => 0,
									    'hd'        => 1,
									    'autohide'    => 1,
									    'title' => hide
									);

									$new_src = add_query_arg($params, $src);

									$iframe = str_replace($src, $new_src, $iframe);


									// add extra attributes to iframe html
									$attributes = 'frameborder="0"';

									$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);


									// echo $iframe
									echo $iframe;

									?>
						</li>

						  <?php endwhile; endif;?>

					</ul>
				</div>
				
			</div>
		</div>
	</section>
	<section id="media_divider">
	</section>
	<section id="tracks">
		<div class="container">
			<div class="row">
				<div class="header">
					Track Listing
				</div>
			</div>
			<div class="row">
				<div class="track_list">
					<ul>
					<?php if (have_rows('tracks')) : while (have_rows('tracks')) : the_row(); ?>
						
						<li>
							<div class="track_box">
								<ul>
									<li class="title">
										<?php the_sub_field('track_title') ?>
									</li>
									<li class="divider">
										/
									</li>
									<li class="album">
										<?php the_sub_field('album') ?>
									</li>
									<li class="itunes">
											<a href="<?php the_sub_field('itunes_url') ?>">
												Preview in itunes
											</a> 
											<i class="fa fa-music circle"></i>
									</li>
								</ul>
							</div>
						</li>

					<?php endwhile; endif; ?>
					</ul>
				</div>
			</div>
		</div>
	</section>


<?php get_footer( ); ?>