<?php
/**
 * Search form — moderno, accessibile
 * @package ColourMag Child
 */
$unique_id = 'search-' . uniqid();
?>
<form role="search" method="get" class="abc-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label for="<?php echo esc_attr( $unique_id ); ?>" class="screen-reader-text">Cerca</label>
    <div class="abc-search-form__wrap">
        <input
            type="search"
            id="<?php echo esc_attr( $unique_id ); ?>"
            class="abc-search-form__input"
            name="s"
            placeholder="Cerca articoli, documenti, leggi…"
            value="<?php echo esc_attr( get_search_query() ); ?>"
            autocomplete="off"
        >
        <button type="submit" class="abc-search-form__btn" aria-label="Cerca">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                 fill="none" stroke="currentColor" stroke-width="2.5"
                 stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <circle cx="11" cy="11" r="8"/>
                <line x1="21" y1="21" x2="16.65" y2="16.65"/>
            </svg>
        </button>
    </div>
</form>
