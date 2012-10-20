<?= $this->js_combine(array(
    '@javascript/jquery.js', 
    '@javascript/vendor/ui/jquery-ui.js', 
    'ls_core_jquery',

    '@javascript/app.js',
    '@javascript/phpr.js',

    '@javascript/foundation/modernizr.foundation.js',
    '@javascript/foundation/jquery.foundation.orbit.js',
    '@javascript/foundation/jquery.foundation.forms.js',
    '@javascript/foundation/jquery.foundation.alerts.js',
    '@javascript/foundation/jquery.placeholder.js',
    '@javascript/foundation/app.js',

    '@javascript/utility/jquery.utility.statusbar.js',
    '@javascript/utility/jquery.utility.stars.js',
    '@javascript/utility/jquery.utility.forms.js',
    '@javascript/utility/app.js',
), array('src_mode'=>true)) ?>

<?= $this->css_combine(array(
    // '@css/global.css',
    '@css/carousel_skin.css',
    'ls_styles',
    '@css/ui.css',
    '@css/templates.css',
    '@css/pages.css',
    '@css/app.css',
), array('src_mode'=>true)) ?>

<link href="<?= root_url('news/rss') ?>" type="application/rss+xml" rel="alternate" title="News" />
