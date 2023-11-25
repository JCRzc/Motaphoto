<div class="photo-wrapper">
    <?php the_post_thumbnail('large', [
        'class' => 'post-photo-list',
        'style' => 'height: 100%; max-height: 52vh; width: 100%; object-fit:cover;'
    ]);
    get_template_part('templates_part/overlay');
    ?>

</div>