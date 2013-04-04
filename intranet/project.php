<?PHP
require_once 'auth.php';
header ("Expires: Thu, 27 Mar 1980 23:59:00 GMT"); //la pagina expira en una fecha pasada
header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); //ultima actualizacion ahora cuando la cargamos
header ("Cache-Control: no-cache, must-revalidate"); //no guardar en CACHE
header ("Pragma: no-cache");
if (!isset($_SESSION))session_start();  $_SESSION['lang']='ES';
include_once("../functions/functions.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$rel = $_POST['rel'];
        $targ_w = $_POST['w'];
        $targ_h = $_POST['h'];
        $file = $_POST['file'];
        $ext = $_POST['ext'];
        $id = $_POST['id'];
        $name = $_POST['name'];
        $photographer = $_POST['photographer'];
        $production = $_POST['production'];
        $agency = $_POST['agency'];
        $location = $_POST['location'];
        
	$jpeg_quality = 90;

	$src ='Gallery/uploads/'.$file.$ext;
        $srcD='Gallery/uploads/'.$file.'_avatar'.$ext;
	$img_r = imagecreatefromjpeg($src);
	$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

	imagecopyresampled($dst_r,$img_r,0,0,$_POST['x']*$rel,$_POST['y']*$rel,
	$targ_w,$targ_h,$_POST['w']*$rel,$_POST['h']*$rel);
        $consulta=new Consulta();
        $consulta->setConsulta('UPDATE project SET name="'.$name.'",avatar="'.$file.'_avatar'.$ext.'",photo="'.$photographer.'",prod="'.$production.'",agency="'.$agency.'",location="'.$location.'" WHERE idProject="'.$id.'"');
	//header('Content-Type: image/jpeg');
	imagejpeg($dst_r,$srcD,$jpeg_quality);
}

// If not a POST request, display page below:

?><!DOCTYPE html>
<html lang="en">
<head>
  <?php include 'head.php'; ?>
<script type="text/javascript">
  jQuery(function($){
    // Create variables (in this scope) to hold the API and image size
    var jcrop_api,
        boundx,
        boundy,

        // Grab some information about the preview pane
        $preview = $('#preview-pane'),
        $pcnt = $('#preview-pane .preview-container'),
        $pimg = $('#preview-pane .preview-container img'),

        xsize = $pcnt.width(),
        ysize = $pcnt.height();
    
    $('#target').Jcrop({
      onChange: updatePreview,
      onSelect: updatePreview,
      aspectRatio: 0
    },function(){
      // Use the API to get the real image size
      var bounds = this.getBounds();
      boundx = bounds[0];
      boundy = bounds[1];
      // Store the API in the jcrop_api variable
      jcrop_api = this;

      // Move the preview into the jcrop container for css positioning
      $preview.appendTo(jcrop_api.ui.holder);
    });

    function updatePreview(c)
    {
      $('.avatar').css('display','none');
      $('.preview').css('display','inherit');
      if (parseInt(c.w) > 0)
      {
        var rx = c.w / c.w;
        var ry = c.h / c.h;

        $pcnt.css({
          width: Math.round(c.w) + 'px',
          height: Math.round(c.h) + 'px'
        });
        $pimg.css({
          width: Math.round(rx * boundx) + 'px',
          height: Math.round(ry * boundy) + 'px',
          marginLeft: '-' + Math.round(rx * c.x) + 'px',
          marginTop: '-' + Math.round(ry * c.y) + 'px'
        });
      }
      updateCoords(c);
    };
  });
  function updateCoords(c)
  {
      var img = document.getElementById('target');
//or however you get a handle to the IMG
    var width = img.width;
    var height = img.height
    var rel=width/$('#target').width();;
    $('#rel').val(rel);
    $('#x').val(c.x);
    $('#y').val(c.y);
    $('#w').val(c.w);
    $('#h').val(c.h);
    $('#width').text(c.w);
    $('#height').text(c.h);
    if(c.w<300) $('#width').css('color','#ef3333');
    if(c.w<350 && c.w>300 ) $('#width').css('color','#278654');
    if(c.w>350 ) $('#width').css('color','#ffa61a');
    
    if(c.h<200 || c.h>400) $('#height').css('color','#ffa61a');
    else $('#height').css('color','#278654');
  };
  function checkCoords()
  {
    if (parseInt($('#w').val())) return true;
    //alert('Please select a crop region then press submit.');
    return true;
  };
  function hidePreview()
  {
    $preview.stop().fadeOut('fast');
  };
</script>

</head>
<body>
    <div id="wrapper">
        <?php include 'sidebar.php'; ?>
        <?php 
        $id=$_GET['id'];
        $project=new Consulta();
        $project->setConsulta("SELECT * FROM project WHERE idProject='".$id."'");
        $album=new Consulta();
        $album->setConsulta("SELECT * FROM image WHERE album_id='".$id."' ORDER BY order_num LIMIT 1");     
        ?>
        <div id="container"  style="padding-left: 30px;">
            <div class="project_form">
                <form action="" method="post" onsubmit="return checkCoords();" >
                    <p><label for="name">Name</label><input name="name" id="name" type="text" value="<?php echo $project->getData('name');?>"></p>
                    <p><label for="photographer">Photographer</label><input name="photographer" id="photographer" type="text" value="<?php echo $project->getData('photo');?>"></p>
                    <p><label for="production">Production</label><input name="production" id="production" type="text" value="<?php echo $project->getData('prod');?>"></p>
                    <p><label for="agency">Agency</label><input name="agency" id="agency" type="text" value="<?php echo $project->getData('agency');?>"></p>
                    <p><label for="location">Location</label><input name="location" id="location" type="text" value="<?php echo $project->getData('location');?>"></p>
                    <input type="hidden" id="file" name="file" value="<?php echo $album->getData('raw_name');?>"/>
                    <input type="hidden" id="ext" name="ext" value="<?php echo $album->getData('file_ext');?>"/>
                    <input type="hidden" id="id" name="id" value="<?php echo $id;?>"/>
                    <input type="hidden" id="rel" name="rel" />
                    <input type="hidden" id="x" name="x" />
                    <input type="hidden" id="y" name="y" />
                    <input type="hidden" id="w" name="w" />
                    <input type="hidden" id="h" name="h" />
                    <label for="save"></label><input type="submit" id="save" value="Save" class="btn" /><input type="button" id="save" value="Cancel" class="btn" />
                </form>
            </div>
            <?php 
            //$avatar=($project->getData('avatar'))?$project->getData('avatar'):$album->getData('name');
            $avatar=$project->getData('avatar');
            $preview=$album->getData('name');
            ?>
            <div id="preview-pane">
                <div class="preview-container">
                <img src="Gallery/uploads/<?php echo $preview;?>" class="preview jcrop-preview" alt="Preview" />
                <img src="Gallery/uploads/<?php echo $avatar;?>" class="avatar" alt="No preview selected" />
                </div>
            </div>
            <img src="Gallery/uploads/<?php echo $album->getData('name');?>" id="target" />
            <div class="size_info">Width:<span id="width">0</span>, Hight:<span id="height">0</span> (Optimal width:300px)</div>
        </div>
    </div>
	<?php include '../footer.php'; ?>
</body>

</html>
