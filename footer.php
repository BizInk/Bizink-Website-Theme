<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$container = get_theme_mod('understrap_container_type');
?>

<?php get_template_part('sidebar-templates/sidebar', 'footerfull'); ?>

<footer>

  <div class="<?php echo esc_attr($container); ?>">

    <div class="row">

      <div class="col-md-3">
        <h5>CONTACT US</h5>
        <div class="contact-info">

          <?php
          $link = get_field('email_id', 'option');
          if ($link) :
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
          ?>
            <p><a href="<?php echo esc_url($link_url); ?>"><?php echo esc_html($link_title); ?> </a></p>
          <?php endif; ?>
          <?php if (have_rows('contact_no', 'option')) : ?>
            <p>
              <?php while (have_rows('contact_no', 'option')) : the_row(); ?>
                <?php the_sub_field('country'); ?> <?php the_sub_field('contact_number'); ?> <br>
              <?php endwhile; ?>
            </p>
          <?php endif; ?>
        </div>
      </div>

      <div class="col-md-3">

        <div class="footer-menu">
          <?php
          wp_nav_menu(array(
            'theme_location' => 'my-custom-menu-one',
            'container_class' => 'custom-menu-class'
          ));
          ?>
        </div>

        <div class="bottom-link">
          <?php
          $menuParameters = array(
            'theme_location'  => 'my-custom-menu-two',
            'container'       => false,
            'echo'            => false,
            'items_wrap'      => '%3$s',
            'depth'           => 0,
          );
          echo strip_tags(wp_nav_menu($menuParameters), '<a>');
          ?>
        </div>

      </div>

      <div class="col-md-3">
        <div class="newsletter-wrap">
          <h5>SUBSCRIBE TO OUR NEWSLETTER</h5>
          <?php if (get_field('subscribe_to_newsletter_text', 'option')) { ?>
            <p><?php the_field('subscribe_to_newsletter_text', 'option'); ?></p>
          <?php } ?>
        </div>
      </div>

      <div class="col-md-3">
        <div class="social-media-wrap">
          <h5>FOLLOW US ON:</h5>
          <ul>
            <?php if (get_field('twitter', 'option')) { ?>
              <li><a target="_blank" href="<?php the_field('twitter', 'option'); ?>"><i class="fa fa-twitter"></i></a></li>
            <?php } ?>
            <?php if (get_field('linkdin', 'option')) { ?>
              <li><a target="_blank" href="<?php the_field('linkdin', 'option'); ?>"><i class="fa fa-linkedin"></i></a></li>
            <?php } ?>
            <?php if (get_field('facebook', 'option')) { ?>
              <li><a target="_blank" href="<?php the_field('facebook', 'option'); ?>"><i class="fa fa-facebook-f"></i></a></li>
            <?php } ?>
          </ul>
        </div>
      </div>

      <div class="col-md-12">
        <div class="privacy-policy-wrap">
          <?php if (get_field('copyright_text', 'option')) { ?>
            <p class="mb-0"><?php echo do_shortcode( get_field('copyright_text', 'option') ); ?></p>
          <?php } ?>
        </div>
      </div>

    </div>

  </div>

</footer>

<a href="javascript:" id="return-to-top" class="<?php if (get_field('scroll_to_top_button', 'option') == 'No') {
                                                  echo "no-scroll";
                                                } elseif (get_field('scroll_to_top_button', 'option') == 'Yes') {
                                                  echo "yes-scroll";
                                                } ?> scrollTop" style="display: none;"></a>
</div>
<!-- #page we need this extra closing tag here -->
<div class="modal fade" id="talktous" tabindex="-1" role="dialog" aria-labelledby="talktous" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><?php _e('Talk To Us', 'bizink'); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="select-demo-picker" style="display:none;">
          <div class="video-demo">
            <span><?php _e('Pre Recorded', 'bizink'); ?></span>
            <?php _e('Watch an instant demo of Bizink', 'bizink'); ?>
            <a href="#" class="demo-button"><?php _e('Watch An INSTANT Demo', 'bizink'); ?></a>
          </div>
          <div class="live-demo">
            <span><?php _e('Live with an expert', 'bizink'); ?></span>
            <?php _e('Schedule a live demo of Bizink', 'bizink'); ?>
            <button class="live-button"><?php _e('Schedule A LIVE Demo', 'bizink'); ?></button>
          </div>
        </div>
        <div class="select-country-picker">
          <div class="form-group">
            <h3><?php _e('Select a Region', 'bizink'); ?></h3>
            <button class="btn btn-primary" id="btnausnz"><?php _e('Australia, New Zealand & Asia', 'bizink'); ?></button>
            <button class="btn btn-primary" id="btnusacn"><?php _e('USA and Canada', 'bizink'); ?></button>
            <button class="btn btn-primary" id="btnukir"><?php _e('UK, Ireland & Europe', 'bizink'); ?></button>
            <button class="btn btn-primary" id="btnmideast"><?php _e('Africa & Middle East', 'bizink'); ?></button>
          </div>
        </div>
        <div class="ausnz-container booking-container" style="display: none;">
          <h3><?php _e('Australia, New Zealand & Asia', 'bizink'); ?></h3>
          <button class="btn btn-primary back"><?php _e('Select a different region', 'bizink'); ?></button>
          <!-- Start of Meetings Embed Script -->
          <script type="text/javascript" src="https://static.hsappstatic.net/MeetingsEmbed/ex/MeetingsEmbedCode.js"></script>
          <div class="meetings-iframe-container" data-src="https://meetings.bizinkonline.com/meetings/matt-bizink/bizink-product-demo?embed=true"></div>
          <!-- End of Meetings Embed Script -->
        </div>
        <div class="usacn-container booking-container" style="display: none;">
          <h3><?php _e('USA and Canada', 'bizink'); ?></h3>
          <button class="btn btn-primary back"><?php _e('Select a different region', 'bizink'); ?></button>
          <!-- Start of Meetings Embed Script -->
          <script type="text/javascript" src="https://static.hsappstatic.net/MeetingsEmbed/ex/MeetingsEmbedCode.js"></script>
          <div class="meetings-iframe-container" data-src="https://meetings.bizinkonline.com/meetings/matt-bizink/bizink-product-demo?embed=true"></div>
          <!-- End of Meetings Embed Script -->
        </div>
        <div class="ukir-container booking-container" style="display: none;">
          <h3><?php _e('UK, Ireland & Europe', 'bizink'); ?></h3>
          <button class="btn btn-primary back"><?php _e('Select a different region', 'bizink'); ?></button>
          <!-- Start of Meetings Embed Script -->
          <script type="text/javascript" src="https://static.hsappstatic.net/MeetingsEmbed/ex/MeetingsEmbedCode.js"></script>
          <div class="meetings-iframe-container" data-src="https://meetings.hubspot.com/anthea-bizink/product-demo?embed=true"></div>
          <!-- End of Meetings Embed Script -->
        </div>
        <div class="mideast-container booking-container" style="display: none;">
          <h3><?php _e('Africa & Middle East', 'bizink'); ?></h3>
          <button class="btn btn-primary back"><?php _e('Select a different region', 'bizink'); ?></button>
          <!-- Start of Meetings Embed Script -->
          <script type="text/javascript" src="https://static.hsappstatic.net/MeetingsEmbed/ex/MeetingsEmbedCode.js"></script>
          <div class="meetings-iframe-container" data-src="https://meetings.bizinkonline.com/meetings/matt-bizink/bizink-product-demo?embed=true"></div>
          <!-- End of Meetings Embed Script -->
        </div>
      </div>
    </div>
  </div>
</div>
<?php wp_footer(); ?>
<script defer type="text/javascript">
  // Model JS
  jQuery(document).ready(function() {
    jQuery("body").on("click", ".talk-to-us a, .talk-to-us", () => {
      jQuery("#talktous").modal("show");
    });
    jQuery("body").on("click", ".live-demo a, .live-demo", function() {
      jQuery(".select-demo-picker").hide();
      jQuery(".select-country-picker").fadeIn("slow").show();
    });
    jQuery("#btnausnz").click(function() {
      jQuery(".select-country-picker").hide();
      jQuery(".ausnz-container").fadeIn("slow").show();
    });
    jQuery("#btnusacn").click(function() {
      jQuery(".select-country-picker").hide();
      jQuery(".usacn-container").fadeIn("slow").show();
    });
    jQuery("#btnukir").click(function() {
      jQuery(".select-country-picker").hide();
      jQuery(".ukir-container").fadeIn("slow").show();
    });
    jQuery("#btnmideast").click(function() {
      jQuery(".select-country-picker").hide();
      jQuery(".mideast-container").fadeIn("slow").show();
    });
    jQuery(".booking-container .back").click(function() {
      jQuery(".select-country-picker").fadeIn("slow").show();
      jQuery(".booking-container").hide();
    });
    jQuery("#talktous").on("hidden.bs.modal", function() {
      jQuery(".select-demo-picker").hide();
      jQuery(".select-country-picker").show();
      jQuery(".ausnz-container").hide();
      jQuery(".usacn-container").hide();
      jQuery(".ukir-container").hide();
    });
    jQuery("body").on("click", "#talktous .modal-header .close", function() {
      jQuery("#talktous").modal("toggle");
    });
    jQuery("body").on(
      "click",
      ".collapseBlock a.collapseBlock_header",
      function() {
        if (jQuery(this).next().hasClass("showBlock")) {
          jQuery(this).next().removeClass("showBlock");
          jQuery(this).find(".transformIconPlus_icon-minus").css("opacity", "0");
          jQuery(this).find(".transformIconPlus_icon-plus").css("opacity", "1");
          jQuery(this).next().slideUp().hide();
          jQuery(this).next().css("height", "0px");
        } else {
          jQuery(this).next().addClass("showBlock");
          jQuery(this).next().css("height", "auto");
          jQuery(this).find(".transformIconPlus_icon-minus").css("opacity", "1");
          jQuery(this).find(".transformIconPlus_icon-plus").css("opacity", "0");
          jQuery(this).next().slideDown("fast").show();
        }
      }
    );
    jQuery("#accordion .panel-heading .panel-title a").click(function() {
      var collapseID = jQuery(this).attr("href");
      if (jQuery(collapseID).css("display") == "none") {
        jQuery(collapseID).show().animate({
          height: "100%"
        }, 500);
      } else {
        jQuery(collapseID).hide().animate({
          height: "0px"
        }, 500);
      }
    });
  });
</script>
</body>

</html>