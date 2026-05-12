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

/**
 * Logo SVG inline — autonomie beni comuni / autonomies biens communs
 * Renderizzato inline per SEO e animazioni CSS.
 */
function abc_logo_svg() {
    $home_url  = esc_url( home_url( '/' ) );
    $site_name = esc_attr( get_bloginfo( 'name', 'display' ) );
    echo <<<SVG
<a href="{$home_url}" class="abc-logo-link" rel="home" aria-label="{$site_name}">
<svg id="abc-logo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 268 65"
     role="img" aria-hidden="true" focusable="false">
  <title>Autonomie Beni Comuni · Vallée d'Aoste</title>
  <style>
    .lm {
      transform-box: fill-box;
      transform-origin: center;
      animation: lmIn .65s cubic-bezier(.34,1.56,.64,1) both;
    }
    .lt {
      animation: ltIn .48s ease both;
      animation-delay: .28s;
    }
    @keyframes lmIn {
      from { transform: scale(0); opacity: 0; }
      to   { transform: scale(1); opacity: 1; }
    }
    @keyframes ltIn {
      from { transform: translateX(-7px); opacity: 0; }
      to   { transform: translateX(0);    opacity: 1; }
    }
    @media (prefers-reduced-motion: reduce) {
      .lm, .lt { animation: none; }
    }
  </style>

  <!-- Cerchio abc -->
  <g class="lm">
    <circle cx="30" cy="33" r="29" fill="#23598b"/>
    <text x="30"  y="27" text-anchor="middle"
          font-family="Georgia,'Times New Roman',serif"
          font-size="17" font-weight="700" fill="#ef8201">B</text>
    <text x="15"  y="49" text-anchor="middle"
          font-family="Georgia,'Times New Roman',serif"
          font-size="16" font-weight="700" fill="rgba(255,255,255,0.93)">A</text>
    <text x="45"  y="49" text-anchor="middle"
          font-family="Georgia,'Times New Roman',serif"
          font-size="16" font-weight="700" fill="rgba(255,255,255,0.88)">C</text>
  </g>

  <!-- Testo -->
  <g class="lt" font-family="'Inter','Helvetica Neue',Arial,sans-serif">

    <!-- Italiano -->
    <text y="22" font-size="13.5">
      <tspan x="70" fill="#ef8201" font-weight="700">a</tspan>
      <tspan fill="#1a1a1a">utonomie </tspan>
      <tspan fill="#ef8201" font-weight="700">b</tspan>
      <tspan fill="#1a1a1a">eni </tspan>
      <tspan fill="#ef8201" font-weight="700">c</tspan>
      <tspan fill="#1a1a1a">omuni</tspan>
    </text>

    <!-- Francese -->
    <text y="39" font-size="13.5">
      <tspan x="70" fill="#ef8201" font-weight="700">a</tspan>
      <tspan fill="#1a1a1a">utonomies </tspan>
      <tspan fill="#ef8201" font-weight="700">b</tspan>
      <tspan fill="#1a1a1a">iens </tspan>
      <tspan fill="#ef8201" font-weight="700">c</tspan>
      <tspan fill="#1a1a1a">ommuns</tspan>
    </text>

    <!-- Sottotitolo -->
    <text x="70" y="54"
          font-size="10" fill="#6b6b6b" letter-spacing="0.06em">
      vallée d'aoste · valle d'aosta
    </text>

  </g>
</svg>
</a>
SVG;
}
