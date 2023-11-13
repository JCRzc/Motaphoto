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
				<?php the_post_thumbnail('large', ['style' => 'width: 100%; height: auto;']) ?>
			</div>
		</div>
		<div class="post-content-contact">
			<div class="post-col-left">
				<p>Cette photo vous intéresse ?</p>
				<button id="single-post-contact-button" type="button" class="post-contact-button">Contact</button>
			</div>
			<div class="post-col-right">
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