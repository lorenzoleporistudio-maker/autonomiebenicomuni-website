<?php
/**
 * Pagina risultati di ricerca — layout moderno
 * @package ColourMag Child
 */
get_header();
$query = get_search_query();
?>

<div class="sr-page">

    <!-- Intestazione ricerca -->
    <div class="sr-header">
        <div class="sr-header__inner">
            <?php if ( have_posts() ) : ?>
            <p class="sr-header__label">Risultati di ricerca</p>
            <h1 class="sr-header__query">&ldquo;<?php echo esc_html( $query ); ?>&rdquo;</h1>
            <p class="sr-header__count">
                <?php
                global $wp_query;
                $total = $wp_query->found_posts;
                printf(
                    $total === 1
                        ? '%d articolo trovato'
                        : '%d articoli trovati',
                    $total
                );
                ?>
            </p>
            <?php else : ?>
            <p class="sr-header__label">Nessun risultato</p>
            <h1 class="sr-header__query">&ldquo;<?php echo esc_html( $query ); ?>&rdquo;</h1>
            <p class="sr-header__count">Nessun articolo corrisponde alla ricerca.</p>
            <?php endif; ?>

            <!-- Nuova ricerca -->
            <div class="sr-header__form">
                <?php get_search_form(); ?>
            </div>
        </div>
    </div><!-- .sr-header -->

    <!-- Risultati -->
    <div class="sr-body">
        <div class="sr-body__inner">

            <?php if ( have_posts() ) : ?>

            <div class="sr-grid">
            <?php while ( have_posts() ) : the_post();
                $sr_cats = get_the_category();
            ?>
                <article class="sr-card">
                    <?php if ( has_post_thumbnail() ) : ?>
                    <a href="<?php the_permalink(); ?>" class="sr-card__media" tabindex="-1" aria-hidden="true">
                        <?php the_post_thumbnail( 'medium_large', [ 'class' => 'sr-card__img' ] ); ?>
                    </a>
                    <?php endif; ?>

                    <div class="sr-card__body">
                        <div class="sr-card__meta">
                            <?php if ( $sr_cats ) : ?>
                            <a href="<?php echo esc_url( get_category_link( $sr_cats[0]->term_id ) ); ?>"
                               class="fp2-chip fp2-chip--sm">
                                <?php echo esc_html( $sr_cats[0]->name ); ?>
                            </a>
                            <?php endif; ?>
                            <span class="sr-card__date"><?php echo get_the_date( 'j F Y' ); ?></span>
                        </div>

                        <h2 class="sr-card__title">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h2>

                        <?php $sr_exc = get_the_excerpt(); if ( $sr_exc ) : ?>
                        <p class="sr-card__excerpt">
                            <?php echo wp_trim_words( $sr_exc, 28 ); ?>
                        </p>
                        <?php endif; ?>

                        <a href="<?php the_permalink(); ?>" class="sr-card__cta">
                            Leggi l'articolo &rarr;
                        </a>
                    </div>
                </article>
            <?php endwhile; ?>
            </div><!-- .sr-grid -->

            <!-- Paginazione -->
            <div class="sr-pagination">
                <?php
                the_posts_pagination( [
                    'mid_size'  => 2,
                    'prev_text' => '&larr; Precedente',
                    'next_text' => 'Successiva &rarr;',
                ] );
                ?>
            </div>

            <?php else : ?>

            <div class="sr-empty">
                <p>Prova con parole chiave diverse. Alcuni suggerimenti:</p>
                <ul>
                    <li>Controlla l'ortografia</li>
                    <li>Usa termini più generali (es. <em>consorterie</em> invece di un nome specifico)</li>
                    <li>Cerca per categoria o argomento (es. <em>legislazione</em>, <em>acque</em>)</li>
                </ul>
            </div>

            <?php endif; ?>

        </div>
    </div><!-- .sr-body -->

</div><!-- .sr-page -->

<?php get_footer(); ?>
