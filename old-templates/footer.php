<footer class="footer" role="contentinfo">

  <div class="container">

    <div class="footer_topRow">

      <div class="footer_bizinkCol">

        <h3 class="footer_colHeading hidden-xs"><?php _e('BizInk', 'bizink'); ?></h3>

        <button type="button" class="navbar_toggle navbar_toggle-noFloat burgerButton burgerButton-sm burgerButton-fluid collapsed" data-toggle="collapse" data-target="#footer-bizink-navbar" aria-expanded="false">
          <span class="sr-only"><?php _e('Toggle navigation', 'bizink'); ?></span>
          <span class="burgerButton_text"><?php _e('BizInk', 'bizink'); ?></span>

        </button><!-- /.navbar_toggle -->

        <div class="navbar_nav navbar_nav-centered navbar_nav-leftUnderline navbar_nav-vertical navbar_nav-noPadding collapse navbar-collapse js-footer-collapse" id="footer-bizink-navbar">
          <?php
          if (has_nav_menu('footer_bizink_navigation')) :
            wp_nav_menu(['theme_location' => 'footer_bizink_navigation', 'menu_class' => 'nav navbar-nav navbar-nav-noUppercase']);
          endif;
          ?>
        </div><!-- /.navbar_nav -->

      </div><!-- /.footer_bizinkCol -->

      <div class="footer_connectCol">

        <h3 class="footer_colHeading hidden-xs"><?php _e('Connect', 'bizink'); ?></h3>

        <button type="button" class="navbar_toggle navbar_toggle-noFloat burgerButton burgerButton-sm burgerButton-fluid collapsed" data-toggle="collapse" data-target="#footer-connect-navbar" aria-expanded="false">
          <span class="sr-only"><?php _e('Toggle navigation', 'bizink'); ?></span>
          <span class="burgerButton_text"><?php _e('Connect', 'bizink'); ?></span>

        </button><!-- /.navbar_toggle -->

        <div class="navbar_nav navbar_nav-centered navbar_nav-leftUnderline navbar_nav-vertical navbar_nav-noPadding collapse navbar-collapse js-footer-collapse" id="footer-connect-navbar">
          <?php
          if (has_nav_menu('footer_connect_navigation')) :
            wp_nav_menu(['theme_location' => 'footer_connect_navigation', 'menu_class' => 'nav navbar-nav navbar-nav-noUppercase']);
          endif;
          ?>
        </div><!-- /.navbar_nav -->

      </div><!-- /.footer_connectCol -->

      <div class="footer_blogCol">

        <h3 class="footer_colHeading footer_colHeading-lgBottomMargin hidden-xs">
          <?php _e('From our blog', 'bizink'); ?>
        </h3>

        <button type="button" class="navbar_toggle navbar_toggle-noFloat burgerButton burgerButton-sm burgerButton-fluid collapsed" data-toggle="collapse" data-target="#footer-blog-body" aria-expanded="false">
          <span class="sr-only"><?php _e('Toggle navigation', 'bizink'); ?></span>
          <span class="burgerButton_text"><?php _e('From our blog', 'bizink'); ?></span>
        </button><!-- /.navbar_toggle -->

        <div class="footer_blogBody collapse js-footer-collapse" id="footer-blog-body">
  
          <?php query_posts('showposts=1'); ?>
          <?php while (have_posts()) : the_post(); ?>
          <h4>
            <?php the_title(); ?>
          </h4>
          <?php the_excerpt(); ?>
          <?php endwhile; ?>

          <?php wp_reset_query(); ?>

        </div><!-- /.footer_blogBody -->

      </div><!-- /.footer_blogCol -->

      <div class="footer_newsletterCol">

        <?php 
          $form = GFAPI::get_form( 1 );
        ?>
        <h3 class="footer_colHeading footer_colHeading-lgBottomMargin hidden-xs"><?php echo $form['title']; ?></h3>

        <button type="button" class="navbar_toggle navbar_toggle-noFloat burgerButton burgerButton-sm burgerButton-fluid collapsed" data-toggle="collapse" data-target="#footer-newsletter-body" aria-expanded="false">
          <span class="sr-only"><?php _e('Toggle navigation', 'bizink'); ?></span>
          <span class="burgerButton_text">
            <?php echo $form['title']; ?>
          </span>
        </button><!-- /.navbar_toggle -->

        <div class="footer_newsletterBody collapse js-footer-collapse" id="footer-newsletter-body">
          <?php gravity_form( 1, false, true, false, null, true, 8 ); ?>
        </div><!-- /.footer_newsletterBody -->

      </div><!-- /.footer_newsletterCol -->

    </div><!-- /.footer_topRow -->

    <div class="footer_bottomRow">

      <div class="footer_bottomRowLeft">

        <button type="button" class="navbar_toggle navbar_toggle-noFloat burgerButton burgerButton-fluid collapsed" data-toggle="collapse" data-target="#footer-navbar" aria-expanded="false">
          <span class="sr-only"><?php _e('Toggle navigation', 'bizink'); ?></span>
          <span class="burgerButton_bars">
            <span class="burgerButton_bar"></span>
            <span class="burgerButton_bar"></span>
            <span class="burgerButton_bar"></span>
          </span>
          <span class="burgerButton_text"><?php _e('Navigation', 'bizink'); ?></span>

        </button><!-- /.navbar_toggle -->

        <div class="navbar_nav navbar_nav-centered navbar_nav-noPadding collapse navbar-collapse js-footer-collapse" id="footer-navbar">
          <?php
          if (has_nav_menu('footer_horizontal_navigation')) :
            wp_nav_menu(['theme_location' => 'footer_horizontal_navigation', 'menu_class' => 'nav navbar-nav']);
          endif;
          ?>
        </div><!-- /.navbar_nav -->

      </div><!-- /.footer_bottomRowLeft -->

      <div class="footer_bottomRowRight">
        <?php if (get_field('footer_text', 'options')): ?>
          <?php the_field('footer_text', 'options'); ?>
        <?php endif; ?>
      </div><!-- /.footer_bottomRowRight -->

    </div><!-- /.footer_bottomRow -->

  </div><!-- /.container -->

</footer><!-- /.footer -->

