<?php get_header(); ?>
<?php if (have_posts()) : ?>
	<?php while (have_posts()) :  ?>
		<?php the_post(); ?>
		<div class="property-single">
			<main class="property-main">
				<div class="property-card">
					<div class="property-primary">
						<header class="property-header">
							<h2 class="property-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<h3><a href="<?php the_permalink(); ?>">
									<?php the_category(); ?>
								</a></h3>
							<div class="property-meta">
								<span class="meta-location">Ovcha Kupel, Sofia</span>
								<span class="meta-total-area">Price: 1,100 €/sq.m</span>
							</div>

							<div class="property-details grid">
								<div class="property-details-card">
									<div class="property-details-card-title">
										<h3>Rooms</h3>
									</div>
									<div class="property-details-card-body">
										<ul>
											<li>2 Bedrooms</li>
											<li>1 Bathroom</li>
											<li>1 Living room</li>
											<li>Separated kitchen</li>
										</ul>
									</div>
								</div>
								<div class="property-details-card">
									<div class="property-details-card-title">
										<h3>Additional Details</h3>
									</div>
									<div class="property-details-card-body">
										<ul>
											<li>Floor: 6</li>
											<li>Elevator/Lift</li>
											<li>Brick-built</li>
											<li>Electricity</li>
											<li>Water Supply</li>
											<li>Heating</li>
										</ul>
									</div>
								</div>
							</div>

						</header>

						<div class="property-body">
							<?php the_content(); ?>
						</div>
					</div>
				</div>
			</main>
			<aside class="property-secondary">
				<div class="property-image property-image-single">

					<?php
					if (has_post_thumbnail()) {
						the_post_thumbnail();
					} else {
						echo '<img src="wp-content\themes\rent-homes\assets\images\bedroom.jpg" alt="property image">';
					}
					?>

				</div>
				<a href="#" class="button button-wide">Like the property</a>
			</aside>
		</div>

		<h2 class="section-heading">Other similar properties:</h2>

		<ul class="properties-listing">
			<?php get_template_part('template-parts/property'); ?>
		</ul>
	<?php endwhile; ?>

<?php endif; ?>

<?php get_footer(); ?>