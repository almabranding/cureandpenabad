<?PHP
require_once 'auth.php';
if (!isset($_SESSION))
    session_start(); $_SESSION['lang'] = 'ES';
include_once("../functions/functions.php");
$consulta = new Consulta();
$fileElementName='fileToUpload';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['foo'])) {
    foreach($_POST['foo'] as $key=>$value){
        echo 'UPDATE project SET orden="'.$key.'" WHERE id="'.$value.'"';
         $consulta=new Consulta();
         $consulta->setConsulta('UPDATE project SET orden="'.$key.'" WHERE id="'.$value.'"');

    }
             exit;
    }
    if (isset($_POST['id'])) {
        list($column, $id) = explode("_", $_POST['id']);
        $consulta->setConsulta('UPDATE project SET ' . $column . '="' . $_POST['value'] . '" WHERE id=' . $id);
        $consulta->setConsulta('SELECT * FROM project WHERE id=' . $id);
        echo $consulta->getData($column);
        exit;
    }
    if (isset($_POST['idImg'])) {
        $consulta->setConsulta('DELETE FROM gallery WHERE id=' . $_POST['idImg']);
        unlink('../uploads/'.$consulta->getData('img'));
    }
    if (isset($_POST['idRef'])) {
        echo "Upload: " . $_FILES["file"]["name"] . "<br>";
        $fileName=$_FILES["file"]["name"];
        echo $fileName;
        echo 'UPDATE project SET img="' . $_FILES["file"]["name"] . '" WHERE id=' . $_POST['idRef'];
        move_uploaded_file($_FILES["file"]["tmp_name"],"../uploads/" . $_FILES["file"]["name"]);
        $consulta->setConsulta('UPDATE project SET img="' . $_FILES["file"]["name"] . '" WHERE id=' . $_POST['idRef']);
    }
    if (isset($_POST['delete'])) {
        $consulta->setConsulta('SELECT * FROM project WHERE id=' . $_POST['delete']);
        unlink('../uploads/'.$consulta->getData('img'));
        $consulta->setConsulta('SELECT * FROM gallery WHERE project=' . $_POST['delete']);
        if($consulta->num) do{
            unlink('../uploads/'.$consulta->getData('img'));
        }while($consulta->nextRow());
        $consulta->setConsulta('DELETE FROM gallery WHERE id=' . $_POST['delete']);
        $consulta->setConsulta('DELETE FROM project  WHERE id=' . $_POST['delete']);
    }
    if ($_POST['form']=='insert') {
        foreach($_POST as $key=>$value){
            if($key!='form'){
                $column[]=$key;    
                $insert[]=$value;
            }
        }
        if(empty($_FILES[$fileElementName]['tmp_name']) || $_FILES[$fileElementName]['tmp_name'] == 'none')
        {
            
        }else 
        {
            $pathinfo = pathinfo($_FILES[$fileElementName]["name"]);
            $ext='.'.$pathinfo['extension'];
            $file = uniqid($pathinfo['filename'].'_');
            $nameFile=$file.$ext;

            $column[]='img';    
            $insert[]=$nameFile;
            $columna='';
            $inserta='';
            foreach($column as $key=>$value){
                $columna.=$value.","; 
            }
            foreach($insert as $key=>$value){
                $inserta.="'".$value."',"; 
            }
            $inserta=substr ( $inserta , 0, -1 );
            $columna=substr ( $columna , 0, -1 );
            echo 'INSERT INTO project ('.$columna.') VALUES  ('.$inserta.')';
            $consulta->setConsulta('INSERT INTO project ('.$columna.') VALUES  ('.$inserta.')');	
            $uploads_dir.='../uploads';
            move_uploaded_file($_FILES[$fileElementName]['tmp_name'], "$uploads_dir/$nameFile");
        }
       
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
    $.post('',sorted+'&action=updateOrder').done(function(data) {});
    
  }

    </script>
</head>
<?php 
$consulta->setConsulta('SELECT * FROM practice WHERE type="' . $_GET['practice'] . '"');
?>
<body>
    <div id="wrapper">
        <?php include 'menu.php'; ?>
        <div id="mainarea">
            <div class="white_full hide" onclick="$('.hide').css('display','none')"></div>
            <div class="white_box hide">
                 <h2 style="width:100%">New Project</h2>
                 <form name="form" action="" method="POST" enctype="multipart/form-data">
                    <input name="form" id="name" type="hidden" value="insert">
                    <input name="practice" id="" type="hidden" value="<?php echo $_GET['practice'];?>">
                    <p><label for="name">Name</label><input name="name" id="name" type="text" value=""></p>
                    <p><label for="name">Information</label><textarea name="description"></textarea></p>
                    <div class="field" style="clear:both; height: 40px;width: 100%;">
                        <label class="file-upload">
                            <span><strong>Image</strong></span>
                            <input type="file" name="fileToUpload" />
                        </label>
                    </div>
                    <div><label for="save"></label><input type="submit" id="save" value="Save" class="btn" /><input type="button" id="save" value="Cancel" class="btn" onclick="$('.hide').css('display','none')"/></div>
                </form>
            </div>
            <h2><?php echo $consulta->getData('name');?></h2>
            <div id="container">  
                <div class="project_list">
                    <ul id="sortable" class="ui-sortable">
                        <?php
                        $consulta->setConsulta('SELECT * FROM project WHERE practice="' . $_GET['practice'] . '" order by orden');
                        do {
                            echo '<li id="foo_'.$consulta->getData('id').'" class="ui-state-default" style="width: 185px;"><a href="practice.php?practice=' . $_GET['practice'] . '&project=' . $consulta->getData('id') . '"><img style="width: 180px;" src="../uploads/'.$consulta->getData('img').'"><p>' . $consulta->getData('name') . '</p></a>';  ?>
                            <form action="" method="post">
                            <input id="save" class="btn" type="submit" style="background: #bb0000;margin:0;" onclick="" value="Delete">
                            <input type="hidden" id="img" name="delete" value="<?php echo $consulta->getData('id'); ?>"/>
                            </form>
                            <?php echo '</li>';
                            
                        } while ($consulta->nextRow());
                        ?>
                    </ul>
                </div>
                <div style="text-align: right;">
                       <input type="button" id="save" value="Upload" onclick="$('.hide').css('display','block')" class="btn" />
                    </div>  
            </div>
        </div>
    </div>    
    <?php include 'footer.php'; ?>
</body>