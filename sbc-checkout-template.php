<?php
/**
 * Template Name: SmartBizCalcs Checkout
 *
 * ─────────────────────────────────────────────────────────────────────────────
 * SETUP INSTRUCTIONS
 *
 * 1. Upload this file to:
 *      /wp-content/themes/YOUR-CHILD-THEME/page-templates/sbc-checkout-template.php
 *
 * 2. Upload css/sbc-page.css to:
 *      /wp-content/themes/YOUR-CHILD-THEME/css/sbc-page.css
 *
 * 3. Upload js/sbc-page.js to:
 *      /wp-content/themes/YOUR-CHILD-THEME/js/sbc-page.js
 *
 * 4. Set your product ID on the line below.
 *    Find it: WP Admin → Products → hover the product name → the URL shows
 *    "post=XXXX" — that number is your product ID.
 *
 * 5. In WP Admin, go to the existing SmartBizCalcs product page (or create a
 *    new page at the same URL slug). Under Page Attributes → Template, select
 *    "SmartBizCalcs Checkout". Publish/update.
 *
 * 6. Add these two lines to your child theme's functions.php:
 *
 *      // Tell WooCommerce this page is the checkout so it loads correctly
 *      add_filter( 'woocommerce_is_checkout', function() {
 *          return is_page_template( 'page-templates/sbc-checkout-template.php' ) ? true : is_checkout();
 *      });
 *
 * ─────────────────────────────────────────────────────────────────────────────
 */

// ── SET YOUR PRODUCT ID HERE ──────────────────────────────────
$sbc_product_id = 100194;   // ← Replace 0 with your WooCommerce product ID
// ─────────────────────────────────────────────────────────────

if ( ! function_exists( 'wc_get_product' ) ) {
    wp_redirect( home_url() ); exit;
}

// ── Pull real variation data from WooCommerce ─────────────────
$product = wc_get_product( $sbc_product_id );

$plans = array(
    'pro'  => array( 'key' => 'pro',  'label' => 'SmartBizCalcs &ndash; PRO',  'price' => 0, 'setup_fee' => 0, 'var_id' => 0, 'attr_val' => '' ),
    'plus' => array( 'key' => 'plus', 'label' => 'SmartBizCalcs &ndash; PLUS', 'price' => 0, 'setup_fee' => 0, 'var_id' => 0, 'attr_val' => '' ),
);

if ( $product && $product->is_type( 'variable' ) ) {
    foreach ( $product->get_available_variations() as $v ) {
        $attr_val  = strtolower( reset( $v['attributes'] ) );
        $price     = isset( $v['display_price'] ) ? floatval( $v['display_price'] ) : 0;
        $setup_fee = floatval( get_post_meta( $v['variation_id'], '_subscription_sign_up_fee', true ) );
        $key       = ( strpos( $attr_val, 'plus' ) !== false ) ? 'plus' : 'pro';
        $plans[ $key ]['price']     = $price;
        $plans[ $key ]['setup_fee'] = $setup_fee;
        $plans[ $key ]['var_id']    = intval( $v['variation_id'] );
        $plans[ $key ]['attr_val']  = esc_attr( reset( $v['attributes'] ) );
    }
}

$currency = html_entity_decode( get_woocommerce_currency_symbol() );

// ── URL-based plan pre-selection ──────────────────────────────
// Supports: ?plan=pro  or  ?plan=plus
// Uses 'plan' (not 'product') to avoid clashing with WordPress's
// built-in ?product= query var which WooCommerce uses for product slugs.
// Falls back to 'plus' if the parameter is absent or unrecognised.
$url_plan    = isset( $_GET['plan'] ) ? strtolower( sanitize_text_field( wp_unslash( $_GET['plan'] ) ) ) : '';
$active_plan = in_array( $url_plan, array( 'pro', 'plus' ), true ) ? $url_plan : 'plus';

// ── Auto-add to cart ──────────────────────────────────────────
// [woocommerce_checkout] only shows billing + payment when the cart has items.
// We add the URL-selected (or default PLUS) variation to the cart.
if ( $product && WC()->cart ) {

    // Remove any existing instance of this product from cart
    foreach ( WC()->cart->get_cart() as $key => $item ) {
        if ( (int) $item['product_id'] === $sbc_product_id ) {
            WC()->cart->remove_cart_item( $key );
        }
    }

    // Use the URL-selected plan (fallback chain: active → plus → pro)
    $default_var_id    = $plans[ $active_plan ]['var_id']
                         ?: $plans['plus']['var_id']
                         ?: $plans['pro']['var_id'];
    $default_var_attrs = array();

    foreach ( $product->get_available_variations() as $v ) {
        if ( (int) $v['variation_id'] === $default_var_id ) {
            $default_var_attrs = $v['attributes'];
            break;
        }
    }

    if ( $default_var_id ) {
        WC()->cart->add_to_cart( $sbc_product_id, 1, $default_var_id, $default_var_attrs );
    }
}

// ── Enqueue assets ────────────────────────────────────────────
wp_enqueue_style(
    'bootstrap-icons',
    'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css',
    array(), '1.11.3'
);
wp_enqueue_script(
    'sbc-page',
    get_stylesheet_directory_uri() . '/js/sbc-page.js',
    array( 'jquery' ), '1.0.9', true
);
wp_localize_script( 'sbc-page', 'sbcConfig', array(
    'currency'    => $currency,
    'productId'   => $sbc_product_id,
    'ajaxUrl'     => admin_url( 'admin-ajax.php' ),
    'nonce'       => wp_create_nonce( 'sbc_switch_plan' ),
    'initialPlan' => $active_plan,
    'plans'       => array(
        'pro'  => array( 'label' => 'SmartBizCalcs – PRO',  'price' => $plans['pro']['price'],  'setupFee' => $plans['pro']['setup_fee'],  'varId' => $plans['pro']['var_id'],  'attrVal' => $plans['pro']['attr_val']  ),
        'plus' => array( 'label' => 'SmartBizCalcs – PLUS', 'price' => $plans['plus']['price'], 'setupFee' => $plans['plus']['setup_fee'], 'varId' => $plans['plus']['var_id'], 'attrVal' => $plans['plus']['attr_val'] ),
    ),
) );

get_header();
?>

<div class="sbc-page">

  <!-- ════════════════════════════════════════════════════════════
       PAGE HEADER
  ═════════════════════════════════════════════════════════════ -->
  <div class="sbc-page-header">
    <div class="sbc-container">
      <nav class="sbc-breadcrumb" aria-label="Breadcrumb">
        <a href="<?php echo esc_url( home_url() ); ?>">Home</a>
        <span> / </span>
        <span>SmartBizCalcs</span>
      </nav>
      <div class="sbc-header-row">
        <h1 class="sbc-page-title">Smart Biz Calculators</h1>
        <span class="sbc-badge-sale">SALE</span>
        <span class="sbc-badge-trial">
          <i class="bi bi-gift"></i> 60-day free trial
        </span>
      </div>
      <p class="sbc-page-subtitle">
        Interactive business calculators for your firm's website — drive traffic, build trust, and become the go-to advisor.
      </p>
    </div>
  </div>

  <!-- ════════════════════════════════════════════════════════════
       MAIN CONTENT — 2-column grid
  ═════════════════════════════════════════════════════════════ -->
  <div class="sbc-container">
    <div class="sbc-grid">

      <!-- ── LEFT COLUMN ──────────────────────────────────────── -->
      <div class="sbc-col-main">

        <!-- ── STEP 1: Plan selection ── -->
        <div class="sbc-panel" id="sbc-step-plans">
          <div class="sbc-panel-header">
            <span class="sbc-step-badge">1</span>
            <h2 class="sbc-panel-title">Choose your plan</h2>
          </div>

          <div class="sbc-trial-banner">
            <i class="bi bi-shield-check"></i>
            <div>
              <strong>60-day free trial included</strong>
              <span> &mdash; no charge today, cancel anytime</span>
            </div>
          </div>

          <div class="sbc-plans">

            <!-- PRO card -->
            <div class="sbc-plan-card<?php echo $active_plan === 'pro' ? ' sbc-selected' : ''; ?>"
                 data-plan="pro"
                 data-var-id="<?php echo esc_attr( $plans['pro']['var_id'] ); ?>"
                 data-price="<?php echo esc_attr( $plans['pro']['price'] ); ?>"
                 data-setup-fee="<?php echo esc_attr( $plans['pro']['setup_fee'] ); ?>"
                 data-attr-val="<?php echo esc_attr( $plans['pro']['attr_val'] ); ?>">

              <div class="sbc-plan-row">
                <div>
                  <div class="sbc-plan-name">PRO</div>
                  <div class="sbc-plan-sub">Standard plan</div>
                </div>
                <div class="sbc-plan-radio<?php echo $active_plan === 'pro' ? ' sbc-checked' : ''; ?>"><i class="bi bi-check2"></i></div>
              </div>

              <div class="sbc-plan-price-row">
                <span class="sbc-plan-price">
                  <?php echo esc_html( $currency . ( $plans['pro']['price'] ?: '--' ) ); ?>
                </span>
                <span class="sbc-plan-period">/month</span>
              </div>

              <?php if ( $plans['pro']['setup_fee'] > 0 ) : ?>
              <div class="sbc-plan-setup-fee">
                <i class="bi bi-tools"></i>
                <?php echo esc_html( $currency . $plans['pro']['setup_fee'] ); ?> one-time setup fee
              </div>
              <?php endif; ?>

              <ul class="sbc-feature-list">
                <li><i class="bi bi-check-circle-fill"></i> Full calculator suite</li>
                <li><i class="bi bi-check-circle-fill"></i> Embed on your website</li>
                <li><i class="bi bi-check-circle-fill"></i> Regular updates</li>
                <li><i class="bi bi-check-circle-fill"></i> Email support</li>
                <li class="sbc-dim"><i class="bi bi-x-circle"></i> Custom branding</li>
              </ul>
            </div>

            <!-- PLUS card -->
            <div class="sbc-plan-card<?php echo $active_plan === 'plus' ? ' sbc-selected' : ''; ?>"
                 data-plan="plus"
                 data-var-id="<?php echo esc_attr( $plans['plus']['var_id'] ); ?>"
                 data-price="<?php echo esc_attr( $plans['plus']['price'] ); ?>"
                 data-setup-fee="<?php echo esc_attr( $plans['plus']['setup_fee'] ); ?>"
                 data-attr-val="<?php echo esc_attr( $plans['plus']['attr_val'] ); ?>">

              <span class="sbc-plan-popular-badge">Most Popular</span>

              <div class="sbc-plan-row">
                <div>
                  <div class="sbc-plan-name">PLUS</div>
                  <div class="sbc-plan-sub">With custom branding</div>
                </div>
                <div class="sbc-plan-radio<?php echo $active_plan === 'plus' ? ' sbc-checked' : ''; ?>"><i class="bi bi-check2"></i></div>
              </div>

              <div class="sbc-plan-price-row">
                <span class="sbc-plan-price">
                  <?php echo esc_html( $currency . ( $plans['plus']['price'] ?: '--' ) ); ?>
                </span>
                <span class="sbc-plan-period">/month</span>
              </div>

              <?php if ( $plans['plus']['setup_fee'] > 0 ) : ?>
              <div class="sbc-plan-setup-fee">
                <i class="bi bi-tools"></i>
                <?php echo esc_html( $currency . $plans['plus']['setup_fee'] ); ?> one-time setup fee
              </div>
              <?php endif; ?>

              <ul class="sbc-feature-list">
                <li><i class="bi bi-check-circle-fill"></i> Full calculator suite</li>
                <li><i class="bi bi-check-circle-fill"></i> Embed on your website</li>
                <li><i class="bi bi-check-circle-fill"></i> Regular updates</li>
                <li><i class="bi bi-check-circle-fill"></i> Priority support</li>
                <li><i class="bi bi-check-circle-fill"></i> Custom branding</li>
              </ul>
            </div>

          </div><!-- /sbc-plans -->

          <!--
            Hidden WooCommerce variation form.
            Our plan cards sync their selection to this form so WooCommerce
            knows which variation to add to the cart.
            Kept hidden — users interact with our cards, not this dropdown.
          -->
          <div class="sbc-wc-hidden-form">
            <?php
            if ( $product ) {
                // Output the standard WC variation/add-to-cart form
                woocommerce_template_single_add_to_cart();
            }
            ?>
          </div>

          <p class="sbc-setup-note">
            <i class="bi bi-clock"></i>
            Setup within 48 hours of subscribing (allow up to 96 hrs for the PLUS custom-branded option).
          </p>
        </div><!-- /step 1 -->

        <!-- ── STEPS 2 + 3: WooCommerce checkout form ── -->
        <!--
          The WooCommerce checkout shortcode outputs the complete billing form
          and payment section. Our CSS below styles each part to match the
          prototype panels (Step 2: Your details, Step 3: Payment).
          We wrap it in .sbc-checkout-wrap so CSS is scoped cleanly.
        -->
        <div class="sbc-checkout-wrap">
          <?php echo do_shortcode( '[woocommerce_checkout]' ); ?>
        </div>

      </div><!-- /sbc-col-main -->

      <!-- ── RIGHT COLUMN: Summary + Testimonial ──────────────── -->
      <div class="sbc-col-side">

        <!-- Order summary card -->
        <div class="sbc-summary-card" id="sbcSummaryCard">
          <div class="sbc-summary-head">
            <h3>Order summary</h3>
            <span class="sbc-summary-free-badge">
              <i class="bi bi-gift"></i> Free trial active
            </span>
          </div>
          <div class="sbc-summary-body">

            <div class="sbc-summary-plan-row">
              <div>
                <div class="sbc-summary-plan-name" id="sbcSummaryName">
                  <?php echo $plans[ $active_plan ]['label']; ?>
                </div>
                <div class="sbc-summary-plan-sub">Monthly subscription</div>
              </div>
              <div class="sbc-summary-price" id="sbcSummaryPrice">
                <?php echo esc_html( $currency . $plans[ $active_plan ]['price'] ); ?>/mo
              </div>
            </div>

            <div class="sbc-summary-row sbc-discount">
              <span><i class="bi bi-gift"></i> 60-day free trial</span>
              <span>&minus;<span id="sbcSummaryDiscount">
                <?php echo esc_html( $currency . $plans[ $active_plan ]['price'] ); ?>
              </span></span>
            </div>

            <?php if ( $plans[ $active_plan ]['setup_fee'] > 0 ) : ?>
            <div class="sbc-summary-row sbc-summary-setup-fee" id="sbcSummarySetupFeeRow">
              <span><i class="bi bi-tools"></i> Setup fee</span>
              <span id="sbcSummarySetupFee">
                <?php echo esc_html( $currency . $plans[ $active_plan ]['setup_fee'] ); ?>
              </span>
            </div>
            <?php else : ?>
            <div class="sbc-summary-row sbc-summary-setup-fee" id="sbcSummarySetupFeeRow" style="display:none">
              <span><i class="bi bi-tools"></i> Setup fee</span>
              <span id="sbcSummarySetupFee"><?php echo esc_html( $currency ); ?>0</span>
            </div>
            <?php endif; ?>

            <hr class="sbc-divider">

            <div class="sbc-summary-row">
              <span>Due today</span>
              <span class="sbc-due-today" id="sbcSummaryDueToday">
                <?php
                $due_today = $plans[ $active_plan ]['setup_fee'];
                echo esc_html( $due_today > 0 ? ( $currency . $due_today ) : ( $currency . '0.00' ) );
                ?>
              </span>
            </div>
            <div class="sbc-summary-row">
              <span>After trial (monthly)</span>
              <span id="sbcSummaryRecurring">
                <?php echo esc_html( $currency . $plans[ $active_plan ]['price'] ); ?>/mo
              </span>
            </div>

            <p class="sbc-after-trial-note">
              <?php if ( $plans[ $active_plan ]['setup_fee'] > 0 ) : ?>
                Only the one-time setup fee is charged today. Your subscription starts after the 60-day trial.
              <?php else : ?>
                You won&rsquo;t be charged until your 60-day trial ends.
              <?php endif; ?>
            </p>

            <hr class="sbc-divider">

            <ul class="sbc-trust-list">
              <li><i class="bi bi-shield-lock-fill"></i> SSL encrypted &amp; secure checkout</li>
              <li><i class="bi bi-arrow-counterclockwise"></i> Cancel anytime &mdash; no lock-in</li>
              <li><i class="bi bi-clock-history"></i> Setup within days</li>
              <li><i class="bi bi-headset"></i> Dedicated customer support</li>
            </ul>

            <hr class="sbc-divider">

            <div class="sbc-pay-logos-wrap">
              <div class="sbc-pay-logos-label">Accepted payments</div>
              <div class="sbc-pay-logos">
                <span class="sbc-pay-badge">VISA</span>
                <span class="sbc-pay-badge">Mastercard</span>
                <span class="sbc-pay-badge">Amex</span>
                <span class="sbc-pay-badge">Bank</span>
              </div>
            </div>

          </div>
        </div><!-- /summary card -->

      </div><!-- /sbc-col-side -->

    </div><!-- /sbc-grid -->
  </div><!-- /sbc-container -->

</div><!-- /sbc-page -->

<?php get_footer(); ?>
