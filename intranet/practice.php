<?PHP
require_once 'auth.php';
if (!isset($_SESSION))
    session_start(); $_SESSION['lang'] = 'ES';
include_once("../functions/functions.php");
$consulta = new Consulta();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['foo'])) {   
    foreach($_POST['foo'] as $key=>$value){
         $consulta=new Consulta();
         $consulta->setConsulta('UPDATE gallery SET orden="'.$key.'" WHERE id="'.$value.'"');
         exit;   
}}
    if (isset($_POST['idDescription'])) {   
        $id=$_POST['idDescription'];
        $consulta->setConsulta('UPDATE project SET description="' .$_POST['description'] . '" WHERE id=' . $id);
    }
    if (isset($_POST['id'])) {   
        list($column, $id) = explode("_", $_POST['id']);
        $consulta->setConsulta('UPDATE project SET ' . $column . '="' . $_POST['value'] . '" WHERE id=' . $id);
        $consulta->setConsulta('SELECT * FROM project WHERE id=' . $id);
        echo $consulta->getData($column);
        exit;
    }
    if (isset($_POST['idImg'])) {
        $consulta->setConsulta('SELECT * FROM gallery WHERE id=' . $_POST['idImg']);
        unlink('../uploads/'.$consulta->getData('img'));
        $consulta->setConsulta('DELETE FROM gallery WHERE id=' . $_POST['idImg']);
    }
    if (isset($_POST['idRef'])) {
        echo "Upload: " . $_FILES["file"]["name"] . "<br>";
        $fileName=$_FILES["file"]["name"];
        move_uploaded_file($_FILES["file"]["tmp_name"],"../uploads/" . $_FILES["file"]["name"]);
        $consulta->setConsulta('UPDATE project SET img="' . $_FILES["file"]["name"] . '" WHERE id=' . $_POST['idRef']);
    }
}
$project = (isset($_GET['project'])) ? $_GET['project'] : '';
$consulta->setConsulta('SELECT * FROM project WHERE id="' . $project . '"');
?>
<!DOCTYPE html>
<head>
    <?php include 'head.php'; ?>
     <script>
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
    $.post('',sorted+'&action=updateOrder').done(function(data) {});
    
  }

    </script>
    <script>
 window.onload = function() {
        editor=CKEDITOR.replace('description');
    };
function saveText(){
    var data='id=description_<?php echo $project;?>&value='+encodeURIComponent(editor.getData());
    $.ajax({
        url: 'practice.php',
    type: "POST",
    data: data,
  });
location.reload(true);
}
</script>
</head>

<body>
    <div id="wrapper">
        <?php include 'menu.php'; ?>
        <div id="mainarea">
            <h2 class="edit_area" id="<?php echo 'name_' . $project; ?>"><?php echo $consulta->getData('name'); ?></h2>
            <div id="container">  
                <img style="max-width: 800px;" src="../uploads/<?php echo $consulta->getData('img'); ?>">
                <form action="" method="post" enctype="multipart/form-data">
                <input type="file" name="file" id="file">
                <input type="hidden" id="img" name="idRef" value="<?php echo $consulta->getData('id'); ?>"/>
                <input id="save" class="btn" type="submit" style="background: #bb0000;margin:0;" onclick="" value="Upload">
                </form>
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden"  name="idDescription" value="<?php echo $project; ?>"/>
                    <textarea id='description' class='description' name="description"><?php echo $consulta->getData('description'); ?></textarea>
                    <input  id="save" class="btn" type="submit" value="Save" style="">
                </form>
                <ul id="sortable" class="ui-sortable" rel="cosa">
                <?php
                $consulta->setConsulta('SELECT * FROM gallery WHERE project="' . $project . '" ORDER BY orden');
                if($consulta->num) do{
                ?>
                        <li id="foo_<?php echo $consulta->getData('id'); ?>" class="ui-state-default" onclick="location.href = 'project.php?id=6'">
                            <img src="../uploads/<?php echo $consulta->getData('img'); ?>">
                            <form action="" method="post">
                            <input id="save" class="btn" type="submit" style="background: #bb0000;margin:0;" onclick="" value="Delete">
                            <input type="hidden" id="img" name="idImg" value="<?php echo $consulta->getData('id'); ?>"/>
                            </form>
                        </li>
                <?php }while($consulta->nextRow());?>
                    </ul>
                <div id="dropbox">
                    <input id="project" type="hidden" value="<?php echo $project; ?>">
                    <input id="uploadType" type="hidden" value="practice">
                    <input id="bbdd" type="hidden" value="gallery">
                    <span class="message">Drop images here to upload. <br /><i>(they will only be visible to you)</i></span>
                </div>
            </div>
        </div>
    </div>    
    <?php include 'footer.php'; ?>
</body>