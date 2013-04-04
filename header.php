<?php
$consulta=new Consulta;
$practice=Array();
$consulta->setConsulta('SELECT * FROM practice');
if($consulta->num) do{
    $clase='class="';
    $clase.=($consulta->getData('id')==0)?' menuSelected ':'';
    $clase.=($consulta->getData('id')==1)?' last ':'';
    $clase.='"';
    $practice[]='<li onclick="show(\'practice.php?practice='.$consulta->getData('type').'\',\'row_complete\');practice('.$consulta->getData('id').');" '.$clase.' >'.$consulta->getData('name').'</li>'; 
}while($consulta->nextRow());
?>
<header class="header">
    <nav class="menu menu_sup">
        <ul>
            <li onclick="show('overview.php','row_sup');menu('overview_menu','submenu_sup');recorre('0','sup');">Profile</li>
            <li onclick="show('practice.php?practice=comercial','row_complete');menu('comercial_menu','submenu_sup');practice(0);">Practice</li>
        </ul>
    </nav>
    <nav id="overview_menu" class="menu submenu submenu_sup hidden">
        <ul>
            <li onclick="recorre('0','sup');" class="menuSelected">Overview</li>
            <li onclick="recorre('2','sup');" class="clast">Adib Cure</li>
            <li onclick="recorre('3','sup');">Carie penabad</li>
            <li onclick="recorre('4','sup');">Carlos Berrios</li>
        </ul>
    </nav>    
    <nav id="comercial_menu" class="menu submenu submenu_pratice submenu_sup hidden">
        <ul>
            <?php 
            foreach($practice as $k => $v )
                echo $v;
            ?>
        </ul>
    </nav>
    <nav id="comercial_nav" class="menu submenu navegacion submenu_complete hidden">  
    </nav>
    <div class="clr"></div>
    <div id="fingers"><br>Touch area</div>
    <a href="index.php">
        <div class="logo_img" id="logo_img">
            <img src="images/CURE_PENABAD.png">
        </div>
    </a>
    
    <nav id="awards_menu" class="menu submenu submenu_inf hidden">
        <ul>
            <li onclick="recorre('0','inf');" class="menuSelected">Awards</li>
            <li onclick="recorre('2','inf');">Publications</li>
        </ul>
    </nav>
    <nav class="menu menu_inf">
        <ul>            
            <li onclick="show('awards.php','row_inf');menu('awards_menu','submenu_inf');recorre('0','inf');">Awards & Publications</li>
            <li  onclick="show('inspiration.php','row_inf');menu(null,'submenu_inf');">Inspiration</li>
        </ul>
    </nav>
    <div class="clr"></div>
</header>
