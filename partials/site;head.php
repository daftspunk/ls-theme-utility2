<script> var require = {baseUrl: "<?=theme_resource_url('javascript')?>"}; </script>
<script data-main="frameworks/main" src="<?=theme_resource_url('javascript/require-jquery.js')?>"></script>
<?= $this->js_combine(array(
    'ls_core_jquery',

    // '@javascript/frameworks/main.js',
    '@javascript/app.js',
    '@javascript/phpr.js',

    // '@javascript/foundation/modernizr.foundation.js',
    // '@javascript/frameworks/foundation/jquery.foundation.orbit.js',
    // '@javascript/frameworks/foundation/jquery.foundation.reveal.js',
    // '@javascript/foundation/jquery.foundation.forms.js',
    // '@javascript/foundation/jquery.foundation.alerts.js',
    // '@javascript/foundation/jquery.placeholder.js',
    // '@javascript/foundation/app.js',

    // '@vendor/ui/jquery-ui.js', 
    // '@vendor/carousel/js/jquery.jcarousel.js',

    // '@javascript/utility/jquery.utility.statusbar.js',
    // '@javascript/utility/jquery.utility.stars.js',
    // '@javascript/utility/jquery.utility.forms.js',
    // '@javascript/frameworks/utility/jquery.utility.popup.js',
    // '@javascript/utility/app.js',
    '@javascript/pages/store_product.js',
), array('src_mode'=>true)) ?>

<?= $this->css_combine(array(
    // '@css/global.css',
    // '@css/carousel_skin.css',
    '@vendor/carousel/css/skin.css',
    'ls_styles',
    '@css/ui.css',
    '@css/templates.css',
    '@css/pages.css',
    '@css/app.css',
), array('src_mode'=>true)) ?>
<link href="<?= root_url('news/rss') ?>" type="application/rss+xml" rel="alternate" title="News" />