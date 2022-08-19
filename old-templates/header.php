<header class="header">
  <div class="container">
    <div class="account-links">
     <a href="https://bizinkonline.com/marketing-content-home/">Content Pack</a> | <a href="https://bizinkonline.com/my-account/">My Account</a>
	</div>

    <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo('name') ?>" class="header_logo">
      <svg class="header_logoShape header_logoShape-md">
        <use xlink:href="#shape-bizink" />
      </svg>
      <svg class="header_logoShape header_logoShape-sm">
        <use xlink:href="#shape-bizink-square" />
      </svg>
    </a><!-- /.header_logo -->

    <nav class="navbar navbar-right">

      <button type="button" class="navbar_toggle burgerButton collapsed" data-toggle="collapse" data-target="#primary-navbar" aria-expanded="false">
        <span class="sr-only"><?php _e('Toggle navigation', 'bizink'); ?></span>
        <span class="burgerButton_bar"></span>
        <span class="burgerButton_bar"></span>
        <span class="burgerButton_bar"></span>
      </button><!-- /.navbar_toggle -->

      <div class="navbar_nav collapse navbar-collapse" id="primary-navbar">
        <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav']);
        endif;
        ?>
        <a class="navbar_button btn btn-primary" href="#book-online-demo" data-toggle="modal" data-target="#bookDemoModal" role="button"><?php _e('Book online demo', 'bizink'); ?></a>
      </div><!-- /.navbar_nav -->

    </nav><!-- /.navbar -->

  </div><!-- /.container -->
</header><!-- /.header -->
