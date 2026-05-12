<?php
/**
 * Front page template — hero + griglia editoriale
 *
 * @package ColourMag Child
 */
get_header(); ?>

<div class="frontpage-wrapper inner-wrap">

    <?php
    $hero_query = new WP_Query( [ 'posts_per_page' => 1, 'post_status' => 'publish' ] );
    if ( $hero_query->have_posts() ) :
        $hero_query->the_post();
        $has_thumb = has_post_thumbnail();
        $cats      = get_the_category();
    ?>
    <section class="fp-hero<?php echo $has_thumb ? ' fp-hero--has-image' : ''; ?>">
        <?php if ( $has_thumb ) : ?>
        <div class="fp-hero__image">
            <a href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
                <?php the_post_thumbnail( 'large' ); ?>
            </a>
        </div>
        <?php endif; ?>

        <div class="fp-hero__content">
            <?php if ( $cats ) : ?>
            <span class="fp-hero__cat">
                <a href="<?php echo esc_url( get_category_link( $cats[0]->term_id ) ); ?>">
                    <?php echo esc_html( $cats[0]->name ); ?>
                </a>
            </span>
            <?php endif; ?>

            <h1 class="fp-hero__title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h1>

            <?php
            $excerpt = get_the_excerpt();
            if ( $excerpt ) : ?>
            <p class="fp-hero__excerpt"><?php echo wp_trim_words( $excerpt, 35 ); ?></p>
            <?php endif; ?>

            <div class="fp-hero__meta">
                <span class="fp-hero__date"><?php echo get_the_date(); ?></span>
                <a href="<?php the_permalink(); ?>" class="fp-hero__readmore">
                    Leggi &rarr;
                </a>
            </div>
        </div>
    </section>
    <?php
    wp_reset_postdata();
    endif;
    ?>

    <div class="fp-body">

        <main class="fp-main" id="primary">

            <?php if ( is_active_sidebar( 'colormag_front_page_content_top_section' ) ) : ?>
            <div class="fp-widget-area">
                <?php dynamic_sidebar( 'colormag_front_page_content_top_section' ); ?>
            </div>
            <?php endif; ?>

            <div class="fp-section-header">
                <h2 class="fp-section-title">Ultimi articoli</h2>
            </div>

            <div class="fp-grid">
            <?php
            $grid_query = new WP_Query( [
                'posts_per_page' => 6,
                'offset'         => 1,
                'post_status'    => 'publish',
            ] );
            while ( $grid_query->have_posts() ) :
                $grid_query->the_post();
                $cats = get_the_category();
            ?>
                <article class="fp-card">
                    <?php if ( has_post_thumbnail() ) : ?>
                    <a href="<?php the_permalink(); ?>" class="fp-card__image-wrap" tabindex="-1" aria-hidden="true">
                        <?php the_post_thumbnail( 'medium_large', [ 'class' => 'fp-card__image' ] ); ?>
                    </a>
                    <?php endif; ?>

                    <div class="fp-card__body">
                        <?php if ( $cats ) : ?>
                        <span class="fp-card__cat">
                            <a href="<?php echo esc_url( get_category_link( $cats[0]->term_id ) ); ?>">
                                <?php echo esc_html( $cats[0]->name ); ?>
                            </a>
                        </span>
                        <?php endif; ?>

                        <h2 class="fp-card__title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>

                        <?php
                        $excerpt = get_the_excerpt();
                        if ( $excerpt ) : ?>
                        <p class="fp-card__excerpt">
                            <?php echo wp_trim_words( $excerpt, 20 ); ?>
                        </p>
                        <?php endif; ?>

                        <span class="fp-card__date"><?php echo get_the_date(); ?></span>
                    </div>
                </article>
            <?php
            endwhile;
            wp_reset_postdata();
            ?>
            </div>

            <?php if ( is_active_sidebar( 'colormag_front_page_content_bottom_section' ) ) : ?>
            <div class="fp-widget-area">
                <?php dynamic_sidebar( 'colormag_front_page_content_bottom_section' ); ?>
            </div>
            <?php endif; ?>

        </main>

        <?php get_sidebar(); ?>

    </div>

</div>

<?php get_footer(); ?>
