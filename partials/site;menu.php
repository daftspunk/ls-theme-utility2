<?
    // The $current_tab variable should be defined in the PRE Action Code field of all pages in the following way:
    // $this->data['current_tab'] = 'news';
    //
    $current_tab = isset($current_tab) ? $current_tab : 'home';
?>
<div class="contain-to-grid">
    <nav class="top-bar">
        <ul>
            <li class="name"><h1><a href="<?=root_url('/')?>">Foundation</a></h1></li>
            <li class="toggle-topbar"><a href="#"></a></li>
        </ul>
        <section>
            <ul class="left">
                <li class="home <?= $current_tab == 'home' ? 'active' : null ?>"><a href="<?=root_url('/')?>" class="main">Home</a></li>
                <li class="store <?= $current_tab == 'store' ? 'active' : null ?> has-dropdown">
                    <a href="<?=root_url('/store')?>" class="main">Store</a>
                    <? 
                        $categories = Shop_Category::create()->list_root_children('front_end_sort_order'); 
                    ?>
                    <ul class="dropdown">
                        <? foreach ($categories as $category):  ?>
                        <li>
                            <a href="<?= $category->page_url('/store/category') ?>"><?= $category->name ?></a>
                        </li>
                        <? endforeach; ?>
                    </ul>
                </li>
                <li class="news <?= $current_tab == 'news' ? 'active' : null ?>"><a href="<?=root_url('/news')?>" class="main">News</a></li>
            </ul>

            <ul class="right">
                <li class="cart <?= $current_tab == 'cart' ? 'active' : null ?>"><a href="<?=root_url('/store/cart')?>" class="main">My Cart</a></li>
                <li class="divider"></li>
                <? if (!$this->customer): ?>
                    <li class="login <?= $current_tab == 'login' ? 'active' : null ?>"><a href="<?=root_url('/account/login')?>" class="main">Login</a></li>
                <? else: ?>
                    <li class="account <?= $current_tab == 'account' ? 'active' : null ?>"><a href="<?=root_url('/account')?>" class="main">My Account</a></li>
                    <li class="logout <?= $current_tab == 'logout' ? 'active' : null ?>"><a href="<?=root_url('/account/logout')?>" class="main">Logout</a></li>
                <? endif ?>
                <li class="divider"></li>
                <li class="search">
                    <form method="get" action="<?= root_url('/store/search') ?>">
                        <input type="search" placeholder="Find products" name="query" value="<?= isset($query) ? $query : null ?>"/>
                    </form>
                </li>            
            </ul>
        </section>
    </nav>
</div>