 <footer>
     <?php get_template_part('templates_part/modal-contact'); ?>
     <?php wp_nav_menu([
            'theme_location' => 'footer-menu',
            'container' => false,
            'menu_class' => 'footer-menu',
        ]) ?>
     <?php wp_footer(); ?>
 </footer>
 </body>

 </html>