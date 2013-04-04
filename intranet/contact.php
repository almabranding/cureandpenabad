<?PHP
require_once 'auth.php';
header ("Expires: Thu, 27 Mar 1980 23:59:00 GMT"); //la pagina expira en una fecha pasada
header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); //ultima actualizacion ahora cuando la cargamos
header ("Cache-Control: no-cache, must-revalidate"); //no guardar en CACHE
header ("Pragma: no-cache");
if (!isset($_SESSION))session_start();  $_SESSION['lang']='ES';
include_once("../functions/functions.php");
$consulta=new Consulta();
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{ 
    $consulta->setConsulta('UPDATE contact SET value="'.$_POST['value'].'" WHERE options="'.$_POST['id'].'"');
    exit;
}   
?>
<!DOCTYPE html>
<head>
     <?php include 'head.php'; ?>
</head>
<body>
    <script>
$(document).ready(function() {
     $('.edit').editable('http://www.example.com/save.php', {
         indicator : 'Saving...',
         tooltip   : 'Click to edit...'
     });
     $('.edit_area').editable('http://borndevelopments.com/imagenation/intranet/contact.php', { 
         type      : 'wysiwyg',
         onblur    : 'ignore',
         cancel    : 'Cancel',
         submit    : 'OK',
         wysiwyg   : { controls : { separator04         : { visible : true },
                               insertOrderedList   : { visible : true },
                               insertUnorderedList : { visible : true }
                }
    }
     });
 });
</script>
    <div id="wrapper">
        <?php include 'sidebar.php'; ?>
        <div id="mainarea">
            <h2>Imagenation</h2>
            <div id="container">
            <div class="edit_area" id="about">
                <?php $consulta->setConsulta('SELECT  * FROM contact WHERE  options =  "about"');
                echo $consulta->getData('value');?>Based in Barcelona, Spain, Image Nation is a full service, multilingual production company specialized in still photography and motion shoots. Our clients include Adidas, Alfa Romeo, Audi, BMW, Citroën, Mercedes AMG, Porsche, Sedus, Toyota, Vodafone, Volkswagen, etc.

The Image Nation team can operate in English, German, French, Spanish and Catalan.

Although Image Nation’s primary focus is to provide top-quality photo and motion production services in Southern Europe, we have now expanded our purview to offer services to international agencies, production companies, photographers and director's worldwide.

At client request, we produce campaigns in North America, South America, Asia, North and South Africa. To this end, Image Nation has built up a network of partners all over the world, giving us access to top-quality production services and facilities wherever we go.

- Full service production in PHOTO and MOTION.

- Worldwide Network of partners.</div>
            </div>
        </div>
    </div>    
    <?php include 'footer.php'; ?>
</body>