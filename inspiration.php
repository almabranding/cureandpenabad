<?PHP
if (!isset($_SESSION))
    session_start(); $_SESSION['lang'] = 'ES';
include_once("functions/functions.php");
if(isset($_POST['section'])) $section=$_POST['section'];
$section='inspiration';
$consulta=new Consulta();
$consulta->setConsulta("SELECT * FROM content WHERE section='".$section."' ORDER BY orden");
?>
<div style="width:80000px" id="awards">
    <ul class="slider">
        <li>     
            <div class="grey_text">
                <h1>INSPIRATION</h1>
                <div class="">
                    <?php
                    $text = '<p>For us, inspiration is everywhere.  It is in the vernacular and the academic; in the ancient and the contemporary; the commonplace and the extraordinary.  This collection of images serves as a visual library that fuels our imagination and propels us to think of our work both within a global context and as a particular response to a regional reality.  The photographs and drawings are a record of our trips throughout the globe and run as a parallel band to the images of our practice, emphasizing the duality and inextricable link between inspiration and realization.</p>';
                    $column_spacing = 0;
                    $columns = intval(strlen($text) / 450);
                    if ($columns > 1)
                        print convert2columns($text, $columns, $column_spacing);
                    else
                        echo '<div style="width:500px;">' . $text . '</div>';
                    ?>
                    </div>
            </div>
        </li>
        <?php
        if($consulta->num) do{?>
        <li>            
            <div class="Overviewimage_box">
                <img src="uploads/<?php echo $consulta->getData('img')?>">
            </div>
        </li>
            
        <?php }while($consulta->nextRow());
        ?> 
    </ul>
</div>

