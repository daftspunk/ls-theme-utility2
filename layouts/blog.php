<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width">
        <title><?= h($this->page->title) ?> | Foundation</title>
        <meta name="description" content="<?= h($this->page->description) ?>"/>
        <meta name="keywords" content="<?= h($this->page->keywords) ?>"/>
        <? $this->render_partial('site:head') ?>
        <? $this->render_head() ?>
    </head>
    <body class="blog page-<?=str_replace('/', '-', substr($this->page->url, 1));?>">
        <div class="container" id="header">
            <div class="row">
                <header class="twelve columns" role="banner">
                    <? $this->render_partial('site:header') ?>
                </header>
            </div>
        </div>
        <div class="container" id="mainnav">
            <div class="row">
                <nav class="twelve columns" role="navigation">
                    <?=$this->render_partial('site:menu')?>
                </nav>
            </div>
        </div>
        <div class="container" id="title">
            <div class="row">
                <div class="twelve columns">
                    <? $this->render_block('title_block') ?>
                </div>
            </div>
        </div>
        <div class="container" id="content">
            <div class="row">
                <div class="twelve columns">
                    <div class="page_breadcrumb">
                         <? $this->render_partial('site:breadcrumb') ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="nine columns">
                    <div class="separator right">
                        <div class="page_header">
                            <h1><?= h($this->page->title) ?></h1>
                        </div>
                        <? $this->render_page() ?>
                    </div>
                </div>
                <div class="three columns">
                    <? $this->render_partial('blog:sidebar') ?>
                </div>
            </div>
        </div>
        <div id="footer">
            <footer>
                <?=$this->render_partial('site:footer')?>
            </footer>
        </div>
    </body>
</html>