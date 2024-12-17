<?php
$accept_text = __("Accept",'bizink');
$reject_text = __("Reject",'bizink');
$cookie_text = __("We use cookies to improve your experience on our website. By browsing this website, you agree to our use of cookies.",'bizink');
$cookie_link_text = __("Learn more",'bizink');
$cookie_link_url = get_privacy_policy_url() ?: "#";
$settings_text = __("Settings",'bizink');

if (function_exists('get_field')) {
    $accept_text = get_field('accept_cookies_button_text', 'option') ?: $accept_text;
    $reject_text = get_field('reject_cookies_button_text', 'option') ?: $reject_text;
    $cookie_text = get_field('cookie_message', 'option') ?: $cookie_text;
    $policy_link_text = get_field('view_policy_page_text', 'option') ?: $cookie_link_text;
    $settings_text = get_field('cookie_settings_button_text', 'option') ?: $settings_text;
}
?>
<div class="cookie_banner">
    <div class="container">
        <div class="row">
            <div class="col col-md-8 cookie_text">
                <p><?php echo $cookie_text; ?></p>
            </div>
            <div class="col col-md-4">
                <div class="cookie_buttons">
                    <!-- <button class="btn yellow-btn cookie_reject"><?php echo $reject_text; ?></button> -->
                    <button class="btn yellow-btn cookie_accept"><?php echo $accept_text; ?></button>
                    <button class="btn navyblue-btn cookie_settings" data-bs-toggle="modal" data-bs-target="#cookie_settings"><?php echo $settings_text; ?></button>
                    <a class="btn cookie_policy" href="<?php echo $cookie_link_url; ?>"><?php echo $cookie_link_text; ?></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="cookie_settings" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="cookie_settings_Label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="cookie_settings_Label"><?php _e('Cookie Settings','bizink'); ?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p><?php echo $cookie_text; ?></p>
        <form id="cookie_settings_form" action="GET" class="cookie_settings_form">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="necessary_cookies" name="necessary_cookies" checked disabled>
                <label class="form-check-label" for="necessary_cookies"><?php _e('Necessary Cookies','bizink'); ?></label>
            </div>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="analytics_cookies" name="analytics_cookies" checked>
                <label class="form-check-label" for="analytics_cookies"><?php _e('Analytics Cookies','bizink'); ?></label>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary cookie_settings_close" data-bs-dismiss="modal"><?php _e('Close','bizink'); ?></button>
        <button type="button" class="btn btn-primary cookie_settings_save" data-bs-dismiss="modal"><?php _e('Save Settings','bizink'); ?></button>
      </div>
    </div>
  </div>
</div>