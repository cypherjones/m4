<?php get_header( ); ?>
	<section id="bios">
		<div class="container">
			<div class="row">
				<div class="bandbios">
					<?php

	        $query = new WP_Query( 
	          array(
	            'post_type' => 'm4-members'
	            	            )
	          );           

	        ?>
	        <?php if ($query->have_posts()) : $i = 0;

	         while ( $query->have_posts()) : $query->the_post(); 

	         $i++;

	         if ( $i < 4 ) : ?>

					<div class="bio_box">
						<div class="member_box">
							<div class="image">
								<img src="<?php the_field('member_image') ?>" alt="">
							</div>
						</div>
						<div class="meta_box">
							<div class="shortbio">
								<div class="title">
									<?php the_title( ); ?>
								</div>
								<div class="meta">
									<span class="age" >Age</span> <?php the_field('age')?><span class="comma" >,</span> <?php the_field('instrument') ?>
								</div>
								<div class="link">
									<a href="<?php the_permalink(); ?>">
										<ul>
											<li>
												<i class="fa fa-share-alt-square"></i>
											</li>
											<li>
												<i class="fa fa-plus-square"></i>
											</li>
										</ul>
									</a>
								</div>
							</div>
						</div>
					</div>

					<?php else : ?>

					<div class="bio_box">
					<div class="meta_box">
						<div class="shortbio">
							<div class="title">
								<?php the_title( ); ?>
							</div>
							<div class="meta">
								<span class="age" >Age</span> <?php the_field('age')?><span class="comma" >,</span> <?php the_field('instrument') ?>
							</div>
							<div class="link">
								<a href="<?php the_permalink(); ?>">
									<ul>
										<li>
											<i class="fa fa-share-alt-square"></i>
										</li>
										<li>
											<i class="fa fa-plus-square"></i>
										</li>
									</ul>
								</a>
							</div>
						</div>
					</div>
					<div class="member_box">
						<div class="image">
							<img src="<?php the_field('member_image') ?>" alt="">
						</div>
					</div>
					</div>

				<?php endif; ?>

					<?php endwhile; endif; ?>
				</div>
			</div>
		</div>
	</section>
	<section id="bios_large">
		<div class="container">
			<div class="row">
				<div class="line"></div>
			</div>
			<div class="row">
				<?php

	        $query = new WP_Query( 
	          array(
	            'post_type' => 'm4-members',
	            'order'     => 'ASC'
	            )
	          );           

	        ?>
	        
					<div class="flexslider">
						<ul class="slides">
		        <?php if ($query->have_posts()) : while ( $query->have_posts()) : $query->the_post(); ?>
						<li>
		        	<div class="bio_box">
		        		<div class="image">
		        			<img src="<?php the_field('member_image') ?>" alt="">
		        		</div>
		        		<div class="content">
		        			<div class="heading">
		        				Get to Know:
		        			</div>
		        			<div class="title">
		        				<?php the_title( ); ?>
		        			</div>
		        			<div class="bio">
		        				<?php the_field('bio') ?>
		        			</div>
		        			<div class="links">
		        				<ul>
		        					<li>
		        						<a href="<?php the_field('twitter') ?>">
		        							<i class="fa fa-twitter circle"></i>
		        						</a>
		        					</li>
		        					<li>
		        						<a href="<?php the_field('instagram') ?>">
		        							<i class="fa fa-instagram circle"></i>
		        						</a>
		        					</li>
		        				</ul>
		        			</div>
		        		</div>
		        	</div>
						</li>
	        <?php endwhile; endif; ?>

					</ul>
	      </div>
			</div>
		</div>
	</section>
	<section id="about_the_band">
		<div class="container">
			<div class="row">
				<div class="header">
					<i class="fa fa-list"></i> About the Band
				</div>
			</div>
			<div class="row">
				<div class="about_box">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php the_content( ); ?>
				<?php endwhile; endif; ?>

				</div>
			</div>
		</div>
	</section>
<?php get_footer( ); ?>