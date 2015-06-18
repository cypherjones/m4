<?php get_header( ); ?>
	<section id="contact">
		<div class="container">
			<div class="row">
				<div class="heading">
					Contact M4
				</div>
			</div>
			<div class="row">
				<div class="subheading">
					For booking & other Inquiries
				</div>
			</div>
			<div class="row">
				<div class="envelope">
					<a href=""><i class="fa fa-envelope"></i></a>
				</div>
			</div>
			<div class="contactform">
				<?php echo do_shortcode('[gravityform id="2" title="false"]' ); ?>
			</div>
		</div>
	</section>
<?php get_footer( ); ?>