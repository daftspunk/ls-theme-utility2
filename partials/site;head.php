<?= $this->js_combine(array(
    '@javascript/jquery-1.5.1.min.js', 
    'ls_core_jquery',
    '@javascript/jquery.jcarousel.min.js',
    '@javascript/jquery.fancybox-1.3.4.pack.js',
    '@javascript/jquery-ui-1.8.11.custom.min.js',
    '@javascript/jquery.ui.stars.js',
    '@javascript/jquery.livequery.js',
    '@javascript/jquery.placeholder.js',

    '@javascript/global.js',
    '@javascript/app.js',
    '@javascript/phpr.js',

    '@javascript/foundation/modernizr.foundation.js',
    '@javascript/foundation/jquery.placeholder.js',
    '@javascript/foundation/jquery.foundation.orbit.js',
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
    '@css/app.css',
    '@css/pages.css',
    '@css/templates.css',
    '@css/ui.css',
), array('src_mode'=>true)) ?>

<link href="<?= root_url('news/rss') ?>" type="application/rss+xml" rel="alternate" title="News" />
