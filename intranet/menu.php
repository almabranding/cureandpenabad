<header>
    <div class="header_logo">
        <div id="logo">
            <img src="<?php echo BASE;?>images/logo.png">
        </div>
    </div>
    <div class="header_admin">
        <div class="header_admin_title">Administration panel</div>
        <div class="header_login"><img src="<?php echo BASE;?>images/account_ico.png">My account <a onClick="location.href='<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?logout=1';?>'"><img src="<?php echo BASE;?>images/logout_ico.png">Logout</a></div>
    </div>    
    <nav id="sidebarnav">
        <ul class="header_menu" >
            <li>Practice
                <ul>
                    <li><a href="home.php?practice=comercial">Comercial</a></li>
                    <li><a href="home.php?practice=institutional">Institutional</a></li>
                    <li><a href="home.php?practice=residential">Residential</a></li>
                    <li><a href="home.php?practice=urban">Urban design</a></li>
                </ul>
            </li>
            <li>Content
                <ul>
                    <li><a href="content.php?content=inspiration">Inspiration</a></li>
                </ul>
            </li><!--
            <li class="last">About Us</li>
            <li><a href="crop.php">Proyectos</a></li>
            <li class="last"><a href="Gallery">Galerias</a></li>-->
        </ul>
    </nav>
    <div class="header_shadow"></div>
</header>