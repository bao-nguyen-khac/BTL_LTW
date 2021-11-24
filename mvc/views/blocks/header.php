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
            <div class="name-user">Hello Bao!</div>
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
                <li><a href="">Top Brand</a>
                    <ul class="sub-menu list-unstyled sub-menu2">
                        <div class="navg-drop-main">
                            <div class="nav-drop nav-top-brand">
                                <li><a href="">Iphone</a></li>
                                <li><a href="">SamSung</a></li>
                                <li><a href="">HP</a></li>
                                <li><a href="">Dell</a></li>
                                <li><a href="">MacBook</a></li>
                                <li><a href="">Asus</a></li>
                            </div>
                        </div>
                    </ul>
                </li>
                <li><a href="">About</a></li>
                <li><a href="">Faqs</a></li>
                <li><a href="">Delivery</a></li>
                <li><a href="">CONTACT</a></li>
                <li><a href="./PaymentController/checkLogin">View orders placed</a></li>
                <div class="clear"> </div>
            </ul>
        </nav>
    </div>
</div>