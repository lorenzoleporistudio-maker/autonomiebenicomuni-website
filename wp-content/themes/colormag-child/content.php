<?php
/**
 * Template per la card articolo — archivio, ricerca, blog
 *
 * @package ColourMag Child
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'cm-card' ); ?>>

    <?php if ( has_post_thumbnail() ) : ?>
    <a href="<?php the_permalink(); ?>" class="cm-card__image-wrap" tabindex="-1" aria-hidden="true">
        <?php the_post_thumbnail( 'medium_large', [ 'class' => 'cm-card__image' ] ); ?>
    </a>
    <?php endif; ?>

    <div class="cm-card__body">

        <?php colormag_colored_category(); ?>

        <header class="entry-header">
            <h2 class="entry-title">
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                    <?php the_title(); ?>
                </a>
            </h2>
        </header>

        <?php colormag_entry_meta(); ?>

        <div class="entry-content clearfix">
            <?php the_excerpt(); ?>
            <a class="more-link" href="<?php the_permalink(); ?>">
                <span><?php _e( 'Leggi', 'colormag' ); ?></span>
            </a>
        </div>

    </div>

</article>
