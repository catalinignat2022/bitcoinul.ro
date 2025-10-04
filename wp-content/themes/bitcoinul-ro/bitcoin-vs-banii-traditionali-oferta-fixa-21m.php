<?php
/*
 * Template dedicat pentru articolul:
 * Bitcoin vs. banii tradiționali: de ce contează oferta fixă de 21M
 * Rutează către single.php pentru a păstra EXACT același layout/design ca „mituri-bitcoin-romania-2025”.
 */

// Încarcă direct single.php pentru consistență de layout cu toate articolele
$single = locate_template('single.php');
if ($single) {
    include $single;
    return;
}

// Fallback minimal (în caz extrem în care single.php nu există)
get_header();
if (have_posts()) :
    while (have_posts()) : the_post(); ?>
        <main id="primary" class="site-main">
            <section class="container">
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <?php the_title('<h1 class="entry-title">','</h1>'); ?>
                        <?php if (has_post_thumbnail()) : ?>
                            <figure class="post-thumbnail">
                                <?php the_post_thumbnail('large'); ?>
                            </figure>
                        <?php endif; ?>
                    </header>
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>
                </article>
            </section>
        </main>
    <?php endwhile;
endif;
get_footer();
