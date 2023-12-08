<?php get_header(); ?>

<?php if (have_posts()) : ?>
	<section class="post-section-photo">
		<div class="post-photo-content">
			<div class="post-col-left">
				<h2>
					<?php the_title() ?>
				</h2>
				<div class="post-desc">
					<div class="single-photo-desc">Référence :
						<span id="ref-photo">
							<?= get_field('reference'); ?>
						</span>
					</div>
					<div class="single-photo-desc">Catégorie :
						<?php taxo_get_the_terms('categorie'); ?>
					</div>
					<div class="single-photo-desc">Format :
						<?php taxo_get_the_terms('format'); ?>
					</div>
					<div class="single-photo-desc">Type :
						<?= get_field('type'); ?>
					</div>
					<div class="single-photo-desc">Année :
						<?= get_the_date('Y'); ?> <!-- only to display the year  -->
					</div>
				</div>
			</div>
			<div class="post-col-right">
				<a href="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>" data-lightbox="image" class="image-link">
					<?php the_post_thumbnail('large', ['style' => 'width: 100%; height: auto;']) ?>
					<svg class="view-fullscreen" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-expand">
						<path d="m21 21-6-6m6 6v-4.8m0 4.8h-4.8" />
						<path d="M3 16.2V21m0 0h4.8M3 21l6-6" />
						<path d="M21 7.8V3m0 0h-4.8M21 3l-6 6" />
						<path d="M3 7.8V3m0 0h4.8M3 3l6 6" />
					</svg>
				</a>
			</div>
		</div>
		<div class="post-content-contact">
			<div class="post-col-left">
				<p>Cette photo vous intéresse ?</p>
				<button id="single-post-contact-button" type="button" class="post-contact-button">Contact</button>
			</div>
			<div class="post-col-right ">
				<!-- Display thumbnail with navigation arrows -->
				<div class="thumbnail-container">
					<?php
					next_post_link('%link', '<img class="right-arrow" src="' . get_template_directory_uri() . '/assets/images/arrow_right.png" alt="flèche de navigation de droite">');

					if (get_next_post() != null) {
						echo get_the_post_thumbnail(get_next_post(), 'thumbnail', ['style' => 'width: 80px; height: 70px; objectif-fit: cover;', 'class' => 'next-image']);
					}

					previous_post_link('%link', '<img class="left-arrow" src="' . get_template_directory_uri() . '/assets/images/arrow_left.png" alt="flèche de navigation de gauche">');

					if (get_previous_post() != null) {
						echo get_the_post_thumbnail(get_previous_post(), 'thumbnail', ['style' => 'width: 80px; height: 70px; objectif-fit: cover;', 'class' => 'previous-image']);
					}
					?>
				</div>
			</div>
		</div>
		</div>
	</section>
	<section class="photo-block">
		<?php get_template_part('templates_part/photo_block'); ?>
	</section>
<?php endif; ?>
<?php get_footer(); ?>