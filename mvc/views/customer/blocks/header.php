<div class="header">
    <div class="header_top">
        <div class="logo">
            <a href="./HomeController/viewHome"><img src="./public/img/logo_new.png" alt="" /></a>
        </div>
        <div class="header_top_right">
            <div class="search_box">
                <form>
                    <input type="text" placeholder="Search for Products">
                    <input type="submit" value="SEARCH">
                </form>
            </div>
            <div class="shopping_cart">
                <div class="cart">
                    <a href="./CartController/viewHome" title="View my shopping cart" rel="nofollow">
                        <span class="cart_title">Cart</span>
                    </a>
                </div>
            </div>
            <?php if(!isset($_SESSION['id_customer'])): ?>
            <div class="login">
                <span><a href="./UserController/login"><img src="./public/img/login.png" alt="" title="login" /></a></span>
            </div>
            <?php else: ?>
            <div class="name-user">Hi <?= $_SESSION['name_customer'] ?>!</div>
            <div class="logout"><a href="./UserController/logout">Logout</a></div>
            <?php endif;?>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="h_menu">
        <nav>
            <ul class="menu list-unstyled">
                <li><a href="./HomeController/viewHome">HOME</a></li>
                <li><a href="">Category</a></li>
                <li><a href="./HomeController/about">About</a></li>
                <li><a href="./HomeController/contact">CONTACT</a></li>
                <li><a href="./PaymentController/checkLogin">View orders placed</a></li>
                <div class="clear"> </div>
            </ul>
        </nav>
    </div>
</div>