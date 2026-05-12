	</div><!-- .inner-wrap -->
	</div><!-- #main -->
   <?php if ( is_active_sidebar('colormag_advertisement_above_the_footer_sidebar') ) { ?>
      <div class="advertisement_above_footer">
         <div class="inner-wrap">
            <?php dynamic_sidebar('colormag_advertisement_above_the_footer_sidebar'); ?>
         </div>
      </div>
   <?php } ?>
	<?php do_action( 'colormag_before_footer' ); ?>
		<footer id="colophon" class="clearfix">
			<?php get_sidebar( 'footer' ); ?>
			<div class="footer-socket-wrapper clearfix" style="padding-bottom: 20px;">
				<div class="inner-wrap">
					<div class="footer-socket-area">
                  <div class="footer-socket-right-section">
   						<?php if( get_theme_mod( 'colormag_social_link_activate', 0 ) == 1 ) { colormag_social_links(); } ?>
                  </div>
                  <div class="footer-socket-left-section">
                  </div>
<div id="footer">
    <p>Autonomies Biens Communs Vallée d’Aoste – Autonomie Beni Comuni Valle d’Aosta</p>
    <p>Via Avondo, 8 – 11100 – AOSTA &nbsp;·&nbsp; C.F. 91069090073 &nbsp;·&nbsp; <a href="mailto:info@autonomiebenicomuni.eu">info@autonomiebenicomuni.eu</a></p>
</div>
					</div>
				</div>
			</div>
		</footer>
		<a href="#masthead" id="scroll-up"><i class="fa fa-chevron-up"></i></a>
	</div><!-- #page -->
	<?php wp_footer(); ?>
</body>
</html>