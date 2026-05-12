<?php
/**
 * Front page — Split hero OceanWP style + griglia articoli
 *
 * @package ColourMag Child
 */
get_header();
?>

<div class="fp-wrap">

    <?php
    /* ── HERO SPLIT ─────────────────────────────────── */
    $fp_hero = new WP_Query( [ 'posts_per_page' => 1, 'post_status' => 'publish' ] );
    if ( $fp_hero->have_posts() ) :
        $fp_hero->the_post();
        $fp_cats      = get_the_category();
        $fp_has_thumb = has_post_thumbnail();
    ?>
    <section class="fp-hero-split">

        <!-- sinistra: articolo principale -->
        <div class="fp-hero-main <?php echo $fp_has_thumb ? 'fp-has-img' : 'fp-no-img'; ?>">

            <?php if ( $fp_has_thumb ) : ?>
            <a href="<?php the_permalink(); ?>" class="fp-hero-main__img-link" tabindex="-1" aria-hidden="true">
                <?php the_post_thumbnail( 'large', [ 'class' => 'fp-hero-main__img' ] ); ?>
            </a>
            <?php endif; ?>

            <div class="fp-hero-main__body">
                <?php if ( $fp_cats ) : ?>
                <a href="<?php echo esc_url( get_category_link( $fp_cats[0]->term_id ) ); ?>" class="fp-badge">
                    <?php echo esc_html( $fp_cats[0]->name ); ?>
                </a>
                <?php endif; ?>

                <h2 class="fp-hero-main__title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h2>

                <?php $fp_excerpt = get_the_excerpt(); if ( $fp_excerpt ) : ?>
                <p class="fp-hero-main__excerpt">
                    <?php echo wp_trim_words( $fp_excerpt, 30 ); ?>
                </p>
                <?php endif; ?>

                <div class="fp-hero-main__meta">
                    <span class="fp-hero-main__date"><?php echo get_the_date(); ?></span>
                    <a href="<?php the_permalink(); ?>" class="fp-hero-main__cta">Leggi l'articolo &rarr;</a>
                </div>
            </div>

        </div><!-- .fp-hero-main -->

        <!-- destra: lista articoli recenti -->
        <div class="fp-hero-list">
            <div class="fp-hero-list__header">Ultimi articoli</div>

            <?php
            wp_reset_postdata();
            $fp_list = new WP_Query( [ 'posts_per_page' => 4, 'offset' => 1, 'post_status' => 'publish' ] );
            while ( $fp_list->have_posts() ) :
                $fp_list->the_post();
                $fp_cats = get_the_category();
            ?>
            <article class="fp-list-item">

                <?php if ( has_post_thumbnail() ) : ?>
                <a href="<?php the_permalink(); ?>" class="fp-list-item__thumb" tabindex="-1" aria-hidden="true">
                    <?php the_post_thumbnail( 'thumbnail', [ 'class' => 'fp-list-item__img' ] ); ?>
                </a>
                <?php endif; ?>

                <div class="fp-list-item__body">
                    <?php if ( $fp_cats ) : ?>
                    <a href="<?php echo esc_url( get_category_link( $fp_cats[0]->term_id ) ); ?>" class="fp-badge fp-badge--sm">
                        <?php echo esc_html( $fp_cats[0]->name ); ?>
                    </a>
                    <?php endif; ?>
                    <h3 class="fp-list-item__title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h3>
                    <span class="fp-list-item__date"><?php echo get_the_date(); ?></span>
                </div>

            </article>
            <?php endwhile; wp_reset_postdata(); ?>

        </div><!-- .fp-hero-list -->

    </section><!-- .fp-hero-split -->
    <?php endif; ?>

    <?php
    /* ── GRIGLIA ARTICOLI + SIDEBAR ─────────────────── */
    ?>
    <div class="fp-body">

        <main class="fp-main">

            <div class="fp-section-label">In evidenza</div>

            <div class="fp-grid">
            <?php
            $fp_grid = new WP_Query( [ 'posts_per_page' => 6, 'offset' => 5, 'post_status' => 'publish' ] );
            while ( $fp_grid->have_posts() ) :
                $fp_grid->the_post();
                $fp_cats = get_the_category();
            ?>
                <article class="fp-card">
                    <?php if ( has_post_thumbnail() ) : ?>
                    <a href="<?php the_permalink(); ?>" class="fp-card__img-wrap" tabindex="-1" aria-hidden="true">
                        <?php the_post_thumbnail( 'medium_large', [ 'class' => 'fp-card__img' ] ); ?>
                    </a>
                    <?php endif; ?>
                    <div class="fp-card__body">
                        <?php if ( $fp_cats ) : ?>
                        <a href="<?php echo esc_url( get_category_link( $fp_cats[0]->term_id ) ); ?>" class="fp-badge fp-badge--sm">
                            <?php echo esc_html( $fp_cats[0]->name ); ?>
                        </a>
                        <?php endif; ?>
                        <h2 class="fp-card__title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>
                        <span class="fp-card__date"><?php echo get_the_date(); ?></span>
                    </div>
                </article>
            <?php endwhile; wp_reset_postdata(); ?>
            </div>

        </main>

        <?php get_sidebar(); ?>

    </div><!-- .fp-body -->

</div><!-- .fp-wrap -->

<?php get_footer(); ?>
