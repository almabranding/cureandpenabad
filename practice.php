<?PHP
if (!isset($_SESSION))session_start();  $_SESSION['lang']='ES';
include_once("functions/functions.php");
$gallery=new Consulta;
$project=new Consulta();
$practice=$_GET['practice'];
$project->setConsulta("SELECT * FROM project WHERE practice='".$practice."' ORDER BY orden");
$chars=820;
?>
<div style="width:80000px" id="overview">
    <ul class="sections">
        <?php 
            if($project);do{
            $gallery->setConsulta("SELECT * FROM gallery WHERE project='".$project->getData('id')."' ORDER BY orden");
        ?>
        <li>
            <ul class="slider">
                <li>            
                    <div class="yellow_text" style="float:none;">
                        
                        <h1><?php echo $project->getData('name');?></h1>
                        <div id="col_<?php echo $project->getData('id');?>" class="columns">
                            <?php     
                            $text=$project->getData('description');
                            $columns=intval(strlen($text)/$chars); 
                            print convert2columns($text, $chars, 0);?>
                        </div>
                        <?php ;if($columns>1) echo '<div class="rMore" onclick="readMore(this);">Read more</div>';?>
                    </div>
                    <div class="image_box">
                        <img src="uploads/<?php echo $project->getData('img');?>">
                    </div>
                </li>
                <?php  if($gallery->num) do{ ?>
                <li>
                    <div class="big_image_box">
                        <img src="uploads/<?php echo $gallery->getData('img');?>">
                    </div>
                </li>
                    <?php }while($gallery->nextRow()); ?>  
            </ul>
        </li>
        <?php }while($project->nextRow());?>
        
        
    </ul>
</div>
