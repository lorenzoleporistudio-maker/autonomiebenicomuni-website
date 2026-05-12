<?php
/**
 * Front page — layout editoriale moderno 2026
 * Hero full-width · Griglia 4 colonne · No sidebar
 *
 * @package ColourMag Child
 */
get_header();
?>

<div class="fp2">

<?php
/* ── HERO ───────────────────────────────────────────── */
$fp_hero = new WP_Query( [ 'posts_per_page' => 1, 'post_status' => 'publish' ] );
if ( $fp_hero->have_posts() ) :
    $fp_hero->the_post();
    $fp_cats      = get_the_category();
    $fp_has_thumb = has_post_thumbnail();
?>
<section class="fp2-hero <?php echo $fp_has_thumb ? 'fp2-hero--img' : 'fp2-hero--text'; ?>">

    <div class="fp2-hero__inner">

        <div class="fp2-hero__body">

            <?php if ( $fp_cats ) : ?>
            <a href="<?php echo esc_url( get_category_link( $fp_cats[0]->term_id ) ); ?>"
               class="fp2-chip"><?php echo esc_html( $fp_cats[0]->name ); ?></a>
            <?php endif; ?>

            <h1 class="fp2-hero__title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h1>

            <?php $fp_exc = get_the_excerpt(); if ( $fp_exc ) : ?>
            <p class="fp2-hero__excerpt"><?php echo wp_trim_words( $fp_exc, 32 ); ?></p>
            <?php endif; ?>

            <div class="fp2-hero__meta">
                <span class="fp2-hero__date"><?php echo get_the_date( 'j F Y' ); ?></span>
                <a href="<?php the_permalink(); ?>" class="fp2-hero__cta">
                    Leggi l'articolo <span aria-hidden="true">&rarr;</span>
                </a>
            </div>

        </div><!-- .fp2-hero__body -->

        <?php if ( $fp_has_thumb ) : ?>
        <div class="fp2-hero__media">
            <a href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
                <?php the_post_thumbnail( 'large', [ 'class' => 'fp2-hero__img' ] ); ?>
            </a>
        </div>
        <?php endif; ?>

    </div><!-- .fp2-hero__inner -->

</section><!-- .fp2-hero -->
<?php
wp_reset_postdata();
endif;
?>

<?php
/* ── BARRA DI RICERCA ────────────────────────────────── */
?>
<section class="fp2-search">
    <div class="fp2-search__inner">
        <p class="fp2-search__label">Cerca tra tutti gli articoli pubblicati</p>
        <?php get_search_form(); ?>
        <p class="fp2-search__hint">
            Consorterie · Beni comuni · Legislazione · Acque e Rûs · Corvées · Autonomia
        </p>
    </div>
</section>

<?php
/* ── GRIGLIA ARTICOLI ────────────────────────────────── */
$fp_grid = new WP_Query( [ 'posts_per_page' => 8, 'offset' => 1, 'post_status' => 'publish' ] );
if ( $fp_grid->have_posts() ) :
?>
<section class="fp2-section">
    <div class="fp2-section__inner">

        <div class="fp2-section__head">
            <span class="fp2-section__label">Ultimi articoli</span>
        </div>

        <div class="fp2-grid">
        <?php while ( $fp_grid->have_posts() ) : $fp_grid->the_post();
            $fp_cats = get_the_category();
        ?>
            <article class="fp2-card">

                <?php if ( has_post_thumbnail() ) : ?>
                <a href="<?php the_permalink(); ?>" class="fp2-card__media"
                   tabindex="-1" aria-hidden="true">
                    <?php the_post_thumbnail( 'medium_large', [ 'class' => 'fp2-card__img' ] ); ?>
                </a>
                <?php endif; ?>

                <div class="fp2-card__body">
                    <?php if ( $fp_cats ) : ?>
                    <a href="<?php echo esc_url( get_category_link( $fp_cats[0]->term_id ) ); ?>"
                       class="fp2-chip fp2-chip--sm">
                        <?php echo esc_html( $fp_cats[0]->name ); ?>
                    </a>
                    <?php endif; ?>

                    <h2 class="fp2-card__title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>

                    <?php $fp_exc = get_the_excerpt(); if ( $fp_exc ) : ?>
                    <p class="fp2-card__excerpt">
                        <?php echo wp_trim_words( $fp_exc, 16 ); ?>
                    </p>
                    <?php endif; ?>

                    <span class="fp2-card__date"><?php echo get_the_date( 'j M Y' ); ?></span>
                </div>

            </article>
        <?php endwhile; wp_reset_postdata(); ?>
        </div><!-- .fp2-grid -->

    </div><!-- .fp2-section__inner -->
</section><!-- .fp2-section -->
<?php endif; ?>

</div><!-- .fp2 -->

<?php get_footer(); ?>
