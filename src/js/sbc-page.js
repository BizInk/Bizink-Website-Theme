/**
 * sbc-page.js  —  SmartBizCalcs standalone checkout page
 * Upload to: /wp-content/themes/YOUR-CHILD-THEME/js/sbc-page.js
 */

jQuery( function ( $ ) {

    'use strict';

    var cfg   = window.sbcConfig || {};
    var plans = cfg.plans        || {};

    // One-time flags (static elements that survive WC checkout refresh)
    var step2Done   = false;
    var loginDone   = false;
    var couponDone  = false;

    // Track in-flight plan-switch AJAX
    var switchXhr = null;

    // ── Debug logger ──────────────────────────────────────────────────────────
    function log() {
        if ( window.console && console.log ) {
            var args = Array.prototype.slice.call( arguments );
            args.unshift( '[SBC]' );
            console.log.apply( console, args );
        }
    }
    function warn() {
        if ( window.console && console.warn ) {
            var args = Array.prototype.slice.call( arguments );
            args.unshift( '[SBC]' );
            console.warn.apply( console, args );
        }
    }

    // Dump config on load so we can verify varIds and ajaxUrl
    log( 'Config loaded:', JSON.stringify( cfg ) );

    // ── Helpers ──────────────────────────────────────────────────────────────

    function formatPrice( price ) {
        var n = parseFloat( price ) || 0;
        return ( cfg.currency || '$' ) + ( n % 1 === 0 ? n.toFixed( 0 ) : n.toFixed( 2 ) );
    }

    // ── DOM repositioning ─────────────────────────────────────────────────────

    function repositionElements() {

        if ( ! step2Done ) {
            var $cd = $( '.sbc-checkout-wrap #customer_details' );
            if ( $cd.length && ! $cd.find( '.sbc-step2-header' ).length ) {
                $cd.prepend(
                    '<div class="sbc-step2-header">' +
                        '<span class="sbc-step-badge">2</span>' +
                        '<h2 class="sbc-step2-title">Your details</h2>' +
                        '<span class="sbc-login-inline" id="sbcLoginInline"></span>' +
                    '</div>'
                );
                step2Done = true;
            }
        }

        if ( ! loginDone ) {
            var $loginNotice = $( '.sbc-checkout-wrap .woocommerce-info' ).filter( function () {
                return $( this ).find( 'a.showlogin' ).length > 0;
            } );
            var $loginTarget = $( '#sbcLoginInline' );

            if ( $loginNotice.length && $loginTarget.length ) {
                $loginTarget.html( 'Already a customer? <a href="#" class="sbc-showlogin-link">Log in</a>' );
                $loginNotice.hide();
                $loginTarget.find( '.sbc-showlogin-link' ).on( 'click.sbc', function ( e ) {
                    e.preventDefault();
                    var $form = $( '.sbc-checkout-wrap .login' );
                    if ( $form.length ) {
                        $form.slideToggle( 200 );
                    } else {
                        $loginNotice.find( 'a.showlogin' ).trigger( 'click' );
                    }
                } );
                loginDone = true;
            }
        }

        if ( ! couponDone ) {
            var $couponNotice = $( '.sbc-checkout-wrap .woocommerce-info' ).filter( function () {
                return $( this ).find( 'a.showcoupon' ).length > 0;
            } );
            var $couponForm  = $( '.sbc-checkout-wrap .checkout_coupon' );
            var $orderReview = $( '.sbc-checkout-wrap #order_review' );

            if ( $couponNotice.length && $orderReview.length ) {
                var $section = $( '<div class="sbc-coupon-section"></div>' );
                $section.append( $couponNotice.detach() );
                if ( $couponForm.length ) {
                    $couponForm.hide();
                    $section.append( $couponForm.detach() );
                }
                $orderReview.before( $section );
                couponDone = true;
            }
        }

        var $additionalFields = $( '.sbc-checkout-wrap .woocommerce-additional-fields' );
        var $placeOrder       = $( '.sbc-checkout-wrap .place-order' );
        if ( $additionalFields.length && $placeOrder.length ) {
            if ( ! $placeOrder.prev().is( '.woocommerce-additional-fields' ) ) {
                $placeOrder.before( $additionalFields.detach() );
            }
        }

        $( '.sbc-checkout-wrap select' ).each( function () {
            var name = $( this ).attr( 'name' ) || '';
            if ( name.indexOf( 'attribute_' ) === 0 || name.indexOf( 'variation' ) > -1 ) {
                $( this ).closest( 'p, .form-row, tr, div' ).hide();
            }
        } );
        $( '.sbc-checkout-wrap .form-row, .sbc-checkout-wrap p.form-field' ).each( function () {
            var labelText = $( this ).find( 'label' ).text().toLowerCase();
            if ( labelText.indexOf( 'your plan' ) > -1 || labelText.indexOf( 'plan selection' ) > -1 ) {
                $( this ).hide();
            }
        } );
    }

    // ── Order review wrapper ──────────────────────────────────────────────────
    // WC's fragment system replaces an element matching the fragment key.
    // The Bizink theme uses custom markup (.co-summary-product etc.) instead
    // of the standard .woocommerce-checkout-review-order-table, AND the theme
    // CSS hides that class. So we wrap the order review content in a custom
    // #sbc-order-review-wrap div (no theme CSS conflict) and a PHP filter
    // re-keys WC's fragment to target #sbc-order-review-wrap instead.
    // The fragment HTML itself includes the wrapper, so the ID persists through
    // every replaceWith — this function only needs to create it once.

    function injectReviewWrap() {
        var $review = $( '.sbc-checkout-wrap #order_review' );
        if ( ! $review.length ) { return; }

        // Already wrapped — nothing to do
        if ( $review.find( '#sbc-order-review-wrap' ).length ) { return; }

        var $product = $review.find( '.co-summary-product' ).first();
        if ( ! $product.length ) { return; }

        var $toWrap = $();
        var $node   = $product;
        while ( $node.length && ! $node.is( '#payment' ) ) {
            $toWrap = $toWrap.add( $node );
            $node   = $node.next();
        }

        if ( $toWrap.length ) {
            $toWrap.wrapAll( '<div id="sbc-order-review-wrap"></div>' );
            log( 'injectReviewWrap: wrapped', $toWrap.length, 'elements in #sbc-order-review-wrap' );
        }
    }

    // ── Step 3 heading ────────────────────────────────────────────────────────

    function injectStep3Heading() {
        var $review = $( '.sbc-checkout-wrap #order_review' );
        if ( $review.length && ! $review.find( '.sbc-step3-header' ).length ) {
            $review.find( '#order_review_heading' ).remove();
            $review.prepend(
                '<div class="sbc-step3-header">' +
                    '<span class="sbc-step-badge">3</span>' +
                    '<h2 class="sbc-step3-title">Payment</h2>' +
                '</div>'
            );
        }
    }

    // ── Payment tiles ─────────────────────────────────────────────────────────
    // .payment_box elements are detached from their <li> and appended to a
    // full-width .sbc-payment-details-wrap div placed after the tile row.
    //
    // When our PHP filter suppresses the .woocommerce-checkout-payment fragment,
    // WC does NOT replace #payment on billing field changes, so .sbc-payment-details-wrap
    // and the Stripe iframe inside it survive.  In that case we skip the move
    // and only re-bind click handlers — Stripe stays mounted untouched.
    //
    // When the fragment IS received (first load, or PHP filter bypassed), #payment
    // is replaced entirely and the wrap is gone — we do a full setup.

    function setupPaymentTiles() {
        var $ul = $( '.sbc-checkout-wrap #payment ul.payment_methods' );
        if ( ! $ul.length ) { return; }

        var $existingWrap = $( '.sbc-payment-details-wrap' );

        // If wrap exists and already contains payment boxes, Stripe is mounted.
        // Just re-bind tile click handlers and update the active state — do NOT
        // detach/move boxes (that would destroy Stripe's iframe).
        if ( $existingWrap.length && $existingWrap.find( '.payment_box' ).length ) {
            log( 'setupPaymentTiles: wrap intact, re-binding handlers' );
            showActiveTile( $ul, $existingWrap );
            bindTileClicks( $ul, $existingWrap );
            return;
        }

        // Fresh setup — create wrap, move payment boxes below the tile row.
        $existingWrap.remove();
        var $wrap = $( '<div class="sbc-payment-details-wrap"></div>' );
        $ul.after( $wrap );

        $ul.find( 'li.wc_payment_method' ).each( function () {
            var method = $( this ).find( 'input[type="radio"]' ).val();
            var $box   = $( this ).find( '.payment_box' );
            if ( $box.length && method ) {
                $box.attr( 'data-sbc-method', method );
                $wrap.append( $box.detach() );
            }
        } );

        log( 'setupPaymentTiles: full setup, moved boxes to wrap' );
        showActiveTile( $ul, $wrap );
        bindTileClicks( $ul, $wrap );
    }

    function showActiveTile( $ul, $wrap ) {
        var active = $ul.find( 'input[type="radio"]:checked' ).val();
        $wrap.find( '.payment_box' ).hide();
        if ( active ) {
            $wrap.find( '[data-sbc-method="' + active + '"]' ).show();
        }
        $ul.find( 'li.wc_payment_method' ).each( function () {
            var isActive = $( this ).find( 'input[type="radio"]' ).val() === active;
            $( this ).toggleClass( 'sbc-tile-active', isActive );
        } );
    }

    function bindTileClicks( $ul, $wrap ) {
        $ul.off( 'click.sbcTile' ).on( 'click.sbcTile', 'li.wc_payment_method', function () {
            $( this ).find( 'input[type="radio"]' )
                .prop( 'checked', true )
                .trigger( 'change' );
            showActiveTile( $ul, $wrap );
        } );
    }

    // ── Order summary sidebar ─────────────────────────────────────────────────

    function updateSummary( plan ) {
        var data = plans[ plan ];
        if ( ! data ) { return; }

        var priceStr    = formatPrice( data.price );
        var setupFee    = parseFloat( data.setupFee ) || 0;
        var setupStr    = formatPrice( setupFee );
        var dueTodayStr = setupFee > 0 ? setupStr : ( ( cfg.currency || '$' ) + '0.00' );

        $( '#sbcSummaryName' ).text( data.label );
        $( '#sbcSummaryPrice' ).text( priceStr + '/mo' );
        $( '#sbcSummaryDiscount' ).text( priceStr );
        $( '#sbcSummaryRecurring' ).text( priceStr + '/mo' );

        if ( setupFee > 0 ) {
            $( '#sbcSummarySetupFee' ).text( setupStr );
            $( '#sbcSummarySetupFeeRow' ).show();
        } else {
            $( '#sbcSummarySetupFeeRow' ).hide();
        }

        $( '#sbcSummaryDueToday' ).text( dueTodayStr );
    }

    // ── Plan card UI ──────────────────────────────────────────────────────────

    function updatePlanUI( plan ) {
        $( '.sbc-plan-card' ).each( function () {
            var isTarget = ( $( this ).data( 'plan' ) === plan );
            $( this ).toggleClass( 'sbc-selected', isTarget );
            $( this ).find( '.sbc-plan-radio' ).toggleClass( 'sbc-checked', isTarget );
        } );
    }

    // ── Select plan: update UI + swap cart via AJAX ───────────────────────────

    function selectPlan( plan ) {
        log( 'selectPlan:', plan );

        var data = plans[ plan ];
        if ( ! data ) {
            warn( 'No plan data for:', plan, '— available plans:', Object.keys( plans ) );
            return;
        }

        updatePlanUI( plan );
        updateSummary( plan );

        log( 'varId:', data.varId, '| ajaxUrl:', cfg.ajaxUrl );

        if ( ! data.varId ) {
            warn( 'varId is empty/zero for plan:', plan, '— cannot switch cart. Check sbcConfig.plans' );
            return;
        }
        if ( ! cfg.ajaxUrl ) {
            warn( 'ajaxUrl not set in sbcConfig — cannot switch cart' );
            return;
        }

        if ( switchXhr ) {
            switchXhr.abort();
            switchXhr = null;
        }

        $( '.sbc-plan-card' ).addClass( 'sbc-switching' );

        log( 'POSTing sbc_switch_plan for varId', data.varId );

        switchXhr = $.post( cfg.ajaxUrl, {
            action:     'sbc_switch_plan',
            nonce:      cfg.nonce,
            product_id: cfg.productId,
            var_id:     data.varId
        } );

        switchXhr
            .done( function ( response ) {
                log( 'sbc_switch_plan response:', JSON.stringify( response ) );
                if ( response && response.success ) {
                    log( 'Cart updated — triggering update_checkout' );
                    $( 'body' ).trigger( 'update_checkout' );
                } else {
                    warn( 'sbc_switch_plan returned failure:', JSON.stringify( response ) );
                }
            } )
            .fail( function ( xhr, status ) {
                if ( status !== 'abort' ) {
                    warn( 'sbc_switch_plan network error:', status, xhr.status, xhr.responseText );
                }
            } )
            .always( function () {
                $( '.sbc-plan-card' ).removeClass( 'sbc-switching' );
                switchXhr = null;
            } );
    }

    // ── WC checkout refresh hook ──────────────────────────────────────────────

    $( document.body ).on( 'update_checkout', function () {
        log( 'update_checkout event fired' );
    } );

    // Intercept WC's update_order_review AJAX response and manually apply the
    // order-review fragment to #sbc-order-review-wrap.
    //
    // Why: WC targets '.woocommerce-checkout-review-order-table' with replaceWith,
    // but the Bizink theme hides that class via CSS. Our wrapper uses a custom ID
    // so there's no CSS conflict. Using .html() (not replaceWith) means the wrapper
    // persists through every plan switch — no re-creation required.
    $( document ).ajaxComplete( function ( event, xhr, settings ) {
        var url  = ( settings.url  || '' );
        var data = ( settings.data || '' );
        var isReview = url.indexOf( 'update_order_review' ) > -1 ||
                       data.indexOf( 'update_order_review' ) > -1;
        if ( ! isReview ) { return; }

        log( 'update_order_review AJAX completed, status:', xhr.status );

        try {
            var resp = JSON.parse( xhr.responseText );
            if ( ! resp || ! resp.fragments ) {
                log( 'no fragments in response' );
                return;
            }

            log( 'fragment keys:', Object.keys( resp.fragments ).join( ', ' ) );

            // Support both the original key and a re-keyed version from the PHP filter
            var reviewHTML = resp.fragments[ '#sbc-order-review-wrap' ] ||
                             resp.fragments[ '.woocommerce-checkout-review-order-table' ];

            var $wrap = $( '#sbc-order-review-wrap' );
            if ( reviewHTML && $wrap.length ) {
                $wrap.html( reviewHTML );
                log( 'Applied order review fragment to #sbc-order-review-wrap' );
            } else if ( ! $wrap.length ) {
                log( 'Warning: #sbc-order-review-wrap not found in DOM' );
            }
        } catch ( e ) {
            log( 'Fragment processing error:', e.message );
        }
    } );

    $( document.body ).on( 'updated_checkout', function () {
        log( 'updated_checkout event fired — rebuilding injected elements' );
        // Safety: clear any lingering WC blockUI overlay on the payment section.
        // When our PHP filter suppresses the payment fragment WC may leave the
        // overlay up; this ensures it's always cleared after the update cycle.
        if ( $.fn.unblock ) {
            $( '.sbc-checkout-wrap #payment' ).unblock();
            $( '.sbc-checkout-wrap form.checkout' ).unblock();
        }
        injectStep3Heading();
        repositionElements();
        injectReviewWrap();   // ensure #sbc-order-review-wrap exists for WC fragment targeting
        // Run immediately (setTimeout 0) so boxes are moved while still empty —
        // Stripe then mounts directly into .sbc-payment-details-wrap.
        setTimeout( setupPaymentTiles, 0 );
    } );

    // ── Init ──────────────────────────────────────────────────────────────────

    function init() {
        log( 'init — binding plan card clicks' );

        // Add a hidden field to the checkout form so our PHP filter can detect
        // this page during AJAX update_order_review calls (WC serialises the
        // whole form into post_data, so this field travels with every request).
        var $form = $( '.sbc-checkout-wrap form.checkout' );
        if ( $form.length && ! $( '#sbc_checkout_page' ).length ) {
            $form.append( '<input type="hidden" id="sbc_checkout_page" name="sbc_checkout_page" value="1">' );
            log( 'Hidden field sbc_checkout_page added to checkout form' );
        }

        $( document ).on( 'click', '.sbc-plan-card', function () {
            var plan = $( this ).data( 'plan' );
            log( 'Plan card clicked:', plan );
            selectPlan( plan );
        } );

        var initialPlan = cfg.initialPlan
                          || $( '.sbc-plan-card.sbc-selected' ).data( 'plan' )
                          || 'plus';
        log( 'Initial plan:', initialPlan );
        updateSummary( initialPlan );

        injectStep3Heading();
        repositionElements();
        setTimeout( setupPaymentTiles, 0 );

        log( 'Triggering initial update_checkout' );
        $( 'body' ).trigger( 'update_checkout' );
    }

    init();

} );
