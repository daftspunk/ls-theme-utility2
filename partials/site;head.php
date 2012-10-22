<script> var require = {baseUrl: "<?=theme_resource_url('javascript')?>"}; </script>
<?= $this->js_combine(array(
    '@javascript/jquery.js',
    'ls_core_jquery',
    '@vendor/ui/jquery-ui.js', 
    '@vendor/carousel/js/jquery.jcarousel.js',

    // Foundation
    '@javascript/frameworks/foundation/modernizr.foundation.js',
    '@javascript/frameworks/foundation/jquery.foundation.orbit.js',
    '@javascript/frameworks/foundation/jquery.foundation.reveal.js',
    '@javascript/frameworks/foundation/jquery.foundation.forms.js',
    '@javascript/frameworks/foundation/jquery.foundation.alerts.js',
    '@javascript/frameworks/foundation/jquery.placeholder.js',
    '@javascript/frameworks/foundation/app.js',

    // Utility
    '@javascript/frameworks/utility/jquery.utility.statusbar.js',
    '@javascript/frameworks/utility/jquery.utility.portfolio.js',
    '@javascript/frameworks/utility/jquery.utility.stars.js',
    '@javascript/frameworks/utility/jquery.utility.forms.js',
    '@javascript/frameworks/utility/jquery.utility.popup.js',
    '@javascript/frameworks/utility/app.js',

    '@javascript/app.js',
    '@javascript/phpr.js',
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