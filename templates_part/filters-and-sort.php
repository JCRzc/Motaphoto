<div class="filters-container">
    <div class="selects-container">
        <ul class="select category-select">
            <li class="category">Catégories<img class="category-chevron" src="<?= get_template_directory_uri(); ?>/assets/images/chevron-down.png" alt="chevron down"></li>
            <?php
            $terms = get_terms(
                array(
                    'taxonomy' => 'categorie',
                    'hide_empty' => false,
                )
            );
            foreach ($terms as $term) :
            ?>
                <li class="category-list" data-value="<?= $term->slug ?>"><?= $term->name ?></li>
            <?php endforeach; ?>
        </ul>

        <ul class="select format-select">
            <li class="format">Formats<img class="format-chevron" src="<?= get_template_directory_uri(); ?>/assets/images/chevron-down.png" alt="chevron down"></li>
            <?php
            $terms = get_terms(
                array(
                    'taxonomy' => 'format',
                    'hide_empty' => false,
                )
            );
            foreach ($terms as $term) :
            ?>
                <li class="format-list" data-value="<?= $term->slug ?>"><?= $term->name ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="container-date-select">
        <ul class="select date-select">
            <li class="sort-by">Trier par<img class="sort-by-chevron" src="<?= get_template_directory_uri(); ?>/assets/images/chevron-down.png" alt="fleche"></li>
            <li class="sort-by-list" data-value="DESC">Plus récentes aux plus anciennes</li>
            <li class="sort-by-list" data-value="ASC">Plus anciennes aux plus récentes</li>
        </ul>
    </div>
</div>