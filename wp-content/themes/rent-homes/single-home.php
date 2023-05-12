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
								<p class="meta-date">Homes visits: <?php echo get_post_meta(get_the_ID(), 'visits_counts', true); ?></p>
								<span class="meta-location"><?php echo rent_display_single_term(get_the_ID(), 'location'); ?></span>
								<span class="meta-total-area">Price: 0,000 €/sq.m</span>
							</div>

							<div class="property-details grid">
								<div class="property-details-card">
									<div class="property-details-card-title">
										<h3>Rooms: <?php echo rent_display_single_term(get_the_ID(), 'room'); ?></h3>
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
							<?php  the_content(); ?>
						</div>
					</div>
				</div>
			</main>
			<aside class="property-secondary">
				<div class="property-image property-image-single">
					<?php 
					if (has_post_thumbnail()) {
						the_post_thumbnail('homes-thumbnail');
					} else {
						echo '<img src="wp-content\themes\rent-homes\assets\images\bedroom.jpg" alt="property image">';
					}
					?>
				</div>
				<a id="<?php echo get_the_ID(); ?>" class="button button-wide" href="#">Like the property (<?php echo get_post_meta( get_the_ID(), 'likes', true) ?>)</a>				
			</aside>
		</div>
		
		<h2 class="section-heading">Other similar properties:</h2>
		<?php rent_update_homes_visit_count(get_the_ID()); ?>		
		<ul class="properties-listing">
			<?php echo rent_display_other_homes_per_location(get_the_ID()); ?>
		</ul>
	<?php endwhile; ?>

<?php endif; ?>

<?php get_footer(); ?>