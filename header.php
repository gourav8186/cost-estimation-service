<header class="d-flex justify-content-between align-items-center px-3 py-2">
    <figure class="logo mb-0">
        <a href="<?= SITE_URL; ?>">
            <img src="<?= SITE_LOGO; ?>" alt="">
        </a>
    </figure>
    <aside class="right d-flex justify-conten   t-between align-items-center">
        <nav class="pt-3 px-4 sideHam">
            <ul class="d-flex ps-0">
                <li class="navLogo">
                    <figure class="logo mb-0">
                        <a href="<?= SITE_URL; ?>">
                            <img src="<?= SITE_LOGO; ?>" alt="">
                        </a>
                    </figure>
                </li>
                <li><a href="<?= SITE_URL; ?>">Home</a></li>
                <li><a href="#mobiles">Spare Parts</a></li>
                <li><a href="<?=ACCESSORIES;?>">Accessories</a></li>
                <li><a href="#support">Support</a></li>
            </ul>
        </nav>
        <div class="searchIcon" id="search">
            <img src="./assets/image/icons/search-interface-symbol.png" alt="Search Icon">
            <div class="searchBar">
                <div class="searchText">
                    <form action="" id="myform">
                        <input type="text" placeholder="Search" id="serach">
                    </form>
                    <span class="closeSearch" id="closeIcon">
                        <img src="./assets/image/icons/close.png" alt="">
                    </span>
                </div>
                <div class="searchContent p-4"></div>
            </div>
        </div>
        <div class="toggleMenu" id="hamBurger">
            <img src="./assets/image/icons/hamburger.png" alt="Toggle Menu">
        </div>
        <div class="sideBg" id="bgParent"></div>
    </aside>
</header>