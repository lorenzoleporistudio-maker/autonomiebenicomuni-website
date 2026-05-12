<?php

add_action( 'wp_enqueue_scripts', 'enqueue_parent_theme_style' );
function enqueue_parent_theme_style() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style(
        'google-fonts-merriweather',
        'https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&display=swap',
        array(),
        null
    );
}

/* Nasconde la vecchia header image del tema padre (JPG 2018) */
add_filter( 'theme_mod_header_image', '__return_empty_string' );

/**
 * Logo SVG inline — marchio tipografico + nome bilingue
 * Inline per SEO, animato via CSS, zero richieste HTTP extra.
 */
function abc_logo_svg() {
    $home_url  = esc_url( home_url( '/' ) );
    $site_name = esc_attr( get_bloginfo( 'name', 'display' ) );
    echo <<<SVG
<a href="{$home_url}" class="abc-logo-link" rel="home" aria-label="{$site_name}">
<svg id="abc-logo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 268 64"
     role="img" aria-hidden="true" focusable="false">
  <title>Autonomie Beni Comuni · Vallée d'Aoste</title>
  <style>
    .lm {
      transform-box: fill-box;
      transform-origin: center;
      animation: lmIn .6s cubic-bezier(.34,1.56,.64,1) both;
    }
    .lt {
      animation: ltIn .45s ease both;
      animation-delay: .25s;
    }
    @keyframes lmIn {
      from { transform: scale(0); opacity: 0; }
      to   { transform: scale(1); opacity: 1; }
    }
    @keyframes ltIn {
      from { transform: translateX(-6px); opacity: 0; }
      to   { transform: translateX(0);    opacity: 1; }
    }
    @media (prefers-reduced-motion: reduce) {
      .lm, .lt { animation: none; }
    }
  </style>

  <!-- Marchio tipografico -->
  <g class="lm">
    <rect x="0" y="3" width="56" height="56" rx="9" fill="#23598b"/>
    <rect x="0" y="56" width="56" height="3" rx="1.5" fill="#ef8201"/>
    <text x="28" y="39"
          text-anchor="middle"
          font-family="system-ui,-apple-system,'Helvetica Neue',Arial,sans-serif"
          font-size="22" font-weight="800">
      <tspan fill="#ef8201">a</tspan><tspan fill="white">bc</tspan>
    </text>
  </g>

  <!-- Nome bilingue -->
  <g class="lt" font-family="system-ui,-apple-system,'Helvetica Neue',Arial,sans-serif">

    <text y="21" font-size="13.5">
      <tspan x="70" fill="#ef8201" font-weight="700">a</tspan>
      <tspan fill="#1a1a1a">utonomie </tspan>
      <tspan fill="#ef8201" font-weight="700">b</tspan>
      <tspan fill="#1a1a1a">eni </tspan>
      <tspan fill="#ef8201" font-weight="700">c</tspan>
      <tspan fill="#1a1a1a">omuni</tspan>
    </text>

    <text y="38" font-size="13.5">
      <tspan x="70" fill="#ef8201" font-weight="700">a</tspan>
      <tspan fill="#1a1a1a">utonomies </tspan>
      <tspan fill="#ef8201" font-weight="700">b</tspan>
      <tspan fill="#1a1a1a">iens </tspan>
      <tspan fill="#ef8201" font-weight="700">c</tspan>
      <tspan fill="#1a1a1a">ommuns</tspan>
    </text>

    <text x="70" y="53" font-size="10" fill="#6b6b6b" letter-spacing="0.06em">
      vallée d'aoste · valle d'aosta
    </text>

  </g>
</svg>
</a>
SVG;
}
