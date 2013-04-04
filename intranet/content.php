<?PHP
require_once 'auth.php';
if (!isset($_SESSION))
    session_start(); $_SESSION['lang'] = 'ES';
include_once("../functions/functions.php");
$consulta = new Consulta();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 
    foreach($_POST['foo'] as $key=>$value){
        echo 'UPDATE content SET orden="'.$key.'" WHERE id="'.$value.'"';
         $consulta=new Consulta();
         $consulta->setConsulta('UPDATE content SET orden="'.$key.'" WHERE id="'.$value.'"');
    }
    if (isset($_POST['id'])) {
        list($column, $id) = explode("_", $_POST['id']);
        $consulta->setConsulta('UPDATE content SET ' . $column . '="' . $_POST['value'] . '" WHERE id=' . $id);
        $consulta->setConsulta('SELECT * FROM content WHERE id=' . $id);
        echo $consulta->getData($column);
        exit;
    }
    if (isset($_POST['idImg'])) {
        $consulta->setConsulta('DELETE FROM content WHERE id=' . $_POST['idImg']);
        unlink('../uploads/'.$consulta->getData('img'));
    }
    if (isset($_POST['idRef'])) {
        echo "Upload: " . $_FILES["file"]["name"] . "<br>";
        $fileName=$_FILES["file"]["name"];
        echo $fileName;
        echo 'UPDATE content SET img="' . $_FILES["file"]["name"] . '" WHERE id=' . $_POST['idRef'];
        move_uploaded_file($_FILES["file"]["tmp_name"],"../uploads/" . $_FILES["file"]["name"]);
        $consulta->setConsulta('UPDATE project SET img="' . $_FILES["file"]["name"] . '" WHERE id=' . $_POST['idRef']);
    }
}
?>
<!DOCTYPE html>
<head>
    <?php include 'head.php'; ?>
    <script>
        $(document).ready(function() {
            $('.edit_area').editable('home.php', {
                type: 'textarea',
                cancel: 'Cancel',
                submit: 'OK',
                onblur: 'none',
                indicator: '<img src="img/indicator.gif">',
                tooltip: ''
            });
        });
$(function() {
   $('#sortable').sortable({
        start: function(event, ui) {
            $(ui.helper).addClass("sortable-drag-clone");
        },
        stop: function(event, ui) {
            $(ui.helper).removeClass("sortable-drag-clone");
        },
        update: function(event, ui) {
            updateListItem($(ui.item).attr('rel'), $(this).attr('rel'));
        },
        tolerance: "pointer",
        connectWith: "#sortable",
        placeholder: "sortable-draggable-placeholder",
        forcePlaceholderSize: true,
        appendTo: 'body',
        helper: 'clone',
        zIndex: 666
    }).disableSelection();
    //var sorted = $( "#sortable" ).sortable( "serialize", { key: "sort" } );    
});
function updateListItem(itemId, newStatus) {
    //var sorted = $( "#sortable" ).sortable( "toArray" );
    var sorted = $( "#sortable" ).sortable( "serialize" );
    console.log(sorted);
    $.post('content.php',sorted+'&action=updateOrder').done(function(data) {});
  }
</script>
</head>
 <?php
$section = (isset($_GET['content'])) ? $_GET['content'] : '';
$consulta->setConsulta('SELECT * FROM content WHERE section="' . $section . '" ORDER BY orden');
?>
<body>
    <div id="wrapper">
        <?php include 'menu.php'; ?>
        <div id="mainarea">
            <h2 class="edit_area" id="<?php echo 'name_' . $section; ?>"><?php echo $section; ?></h2>
            <div id="container"> 
                <ul id="sortable" class="ui-sortable" rel="cosa">
                <?php
                if($consulta->num) do{
                ?>
                        <li id="foo_<?php echo $consulta->getData('id'); ?>" class="ui-state-default">
                            <img src="../uploads/<?php echo $consulta->getData('img'); ?>">
                            <form action="" method="post">
                            <input id="save" class="btn" type="submit" style="background: #bb0000;margin:0;" onclick="" value="Delete">
                            <input type="hidden" id="img" name="idImg" value="<?php echo $consulta->getData('id'); ?>"/>
                            </form>
                        </li>
                <?php }while($consulta->nextRow());?>
                    </ul>
                <div id="dropbox">
                    <input id="project" type="hidden" value="<?php echo $section; ?>">
                    <input id="uploadType" type="hidden" value="content">
                    <input id="bbdd" type="hidden" value="content">
                    <span class="message">Drop images here to upload. <br /><i>(they will only be visible to you)</i></span>
                </div>
            </div>
        </div>
    </div>    
    <?php include 'footer.php'; ?>
</body>