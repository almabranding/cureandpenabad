<?php
$GLOBALS["directory"]=$_SERVER['DOCUMENT_ROOT'];
$GLOBALS['DB_IP'] = 'DB_IP';
$GLOBALS['DB_USER'] = 'DB_USER';
$GLOBALS['DB_PASS'] = 'DB_PASS';
$GLOBALS['DB_NAME'] = 'DB_NAME';
define('BASE','');
error_reporting(NULL);
//
// Funcion que vamos a usar para realizar la conexion (Acá no se edita nada)
//
function get_db_conn() {
    $conn = mysql_connect($GLOBALS['DB_IP'], $GLOBALS['DB_USER'], $GLOBALS['DB_PASS']);
    mysql_select_db($GLOBALS['DB_NAME'], $conn);
    if (!$conn) {
        echo "No pudo conectarse a la BD: " . mysql_error();
        exit;
    }
    return $conn;
}
function cleanQuery($string){
    if(get_magic_quotes_gpc())   {
        $string = stripslashes($string);
    }
    if (phpversion() >= '4.3.0'){
        $string = mysql_real_escape_string($string);
    }
    else {
        $string = mysql_escape_string($string);
    }
    return $string;
}
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{

    if (PHP_VERSION < 6) {
        $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

    }

    switch ($theType) {
        case "text":
    $theValue=str_replace("'","\'",$theValue);
            $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
            break;    
        case "long":
        case "int":
            $theValue = ($theValue != "") ? intval($theValue) : "NULL";
            break;
        case "double":
            $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
            break;
        case "date":
            $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
            break;
        case "defined":
            $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
            break;
    }
    return $theValue;
}
class Consulta{	
    public $texto_consulta;
    public $resultado;
    public $resultado_aux;
    public $row;
    public $fila;
    public $num;

    public function __construct(){
        $this->conexion=get_db_conn();
        mysql_set_charset('utf8',$this->conexion); 	

    }
    private function __clone(){ }

    public static function getInstance(){
        if (!(self::$_instance instanceof self)){
            self::$_instance=new self();
        }
        return self::$_instance;
    }
   
   public function conectar(){
      /*$this->Flowing = mysql_connect($this->hostname_Flowing, $this->username_Flowing, $this->password_Flowing) or trigger_error(mysql_error(),E_USER_ERROR);
      mysql_select_db($this->database_Flowing,$this->Flowing);
      @mysql_query("SET NAMES 'utf8'");*/
   }
	
    public function setConsulta($consulta){
        $this->texto_consulta=$consulta;
        self::ejecutar();
    }
    function getData($columna){
        return $this->row[$columna];	
    }
    function getNum(){
        echo $this->num;	
    }
    function isEmpty(){
        return $this->num;	
    }
    function nextRow(){
        if ($this->row=@mysql_fetch_assoc($this->resultado_aux)) return true;	
    }

   function ejecutar(){
        if($this->conexion){
            self::__construct();
            $this->resultado=mysql_query($this->texto_consulta) or die(mysql_error());
            $this->resultado_aux=$this->resultado;
            mysql_close();
        }
        if ($this->resultado){
            $this->fila = @mysql_fetch_assoc($this->resultado_aux); 
            $this->row=$this->fila;
            $this->id = @mysql_insert_id();
            $this->num = @mysql_num_rows($this->resultado_aux);
        }
        mysql_close();
    }
    public function siguiente(){
        if ($this->fila=@mysql_fetch_assoc($this->resultado_aux)) return true;		
    }
    public function lastID(){
        return @mysql_insert_id($this->Flowing);
   }	
}
function random_pic($dir ='/images/bg')
{
    $dir=$GLOBALS["directory"].$dir;
    $files = glob($dir . '/*.*');
    $file = array_rand($files);
    return $files[$file];
}
function addShare($url,$title,$desc){
    echo '<div class="addthis_toolbox addthis_default_style "
        addthis:url="'.$url.'"
        addthis:title="'.$title.'"
        addthis:description="'.$desc.'">  
    <a class="addthis" href="http://www.addthis.com/bookmark.php?v=300" onclick="return addthis_open(this, \'\', \''.$url.'\', \''.$title.'\'); return addthis_sendto()">
    <div class="result-list-share-box">Share</div>
    </a>
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js"></script></div>';
}
function addThis($url,$title,$img){
    /*echo '<div class="addthis_toolbox addthis_default_style "
        addthis:url="'.$url.'"
        addthis:title="'.$title.'"
        addthis:description="'.$desc.'">  
    <a class="addthis" href="http://www.addthis.com/bookmark.php?v=300&amp;pubid=ra-510017ae6a934a0a" onclick="return addthis_open(this, \'\', \''.$url.'\', \''.$title.'\'); return addthis_sendto()">
    <div class="result-list-share-box">'.$string['share'].'</div>
    </a>
    <script type="text/javascript">var addthis_config = {"data_track_addressbar":false};</script>
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-510017ae6a934a0a"></script></div>';*/

    echo '<div class="clr"></div>';
    echo '<div style="left: -23px;position: absolute;width: 214px;">';
    echo '<div class="share_btn" style="float:left;margin:0px;" onclick="FB(\''.$url.'\');"></div>';
    echo '<div class="share_btn" style="float:left;margin:0 5px;" onclick="twitter(\'\',\''.$title.' '.$img.' \',\'\');"></div>';
    echo '<a data-pin-config="none" href="//pinterest.com/pin/create/button/?url='.$url.'&media='.$img.'&description='.$title.'" data-pin-do="buttonPin" >Pint</a>';
    echo '<div class="share_btn" style="float:left;margin:0 5px;"><div class="g-plusone" data-size="small"  data-href="'.$url.'"></div></div>';
    echo'</div>';
}
class addThis{	
    public $url;
    public $info;
    public $img;
    public $title;
    public $class;
    
    public $fb;
    
    public $hash;
    public $twtext;
    public $related;
    

    public function __construct($url,$info,$img,$class){	
        $this->url=$url;
        $this->info=$info;
        $this->img=$img;
        $this->class=$class;
        $this->fb=$url;
        $this->hash='';
        $this->twtext=$url;
        $this->related='';
    }
    public function setFB($url){
        $this->fb=$url;
    }
    public function setTwitter($hash,$twtext,$related){
        $this->hash=$hash;
        $this->twtext=$twtext;
        $this->related=$related;
    }
    public function getFB(){
        echo '<div class="'.$this->class.' '.$this->class.'_fb" onclick="window.open(\'https://www.facebook.com/sharer/sharer.php?u='.$this->url.'\',\'\',\'width=600,height=400\')"></div>';
    }
    public function getTwitter(){
        echo '<div class="'.$this->class.' '.$this->class.'_tw" onclick="twitter(\''.$this->hash.'\',\''.$this->twtext.' '.$this->related.' \',\'\');"></div>';
    }
    public function getPin(){
        echo '<div class="'.$this->class.' '.$this->class.'_pin" data-pin-config="none" onclick="window.open(\'//pinterest.com/pin/create/button/?url='.$this->url.'&media='.$this->img.'&description='.$this->info.'\',\'\',\'width=700,height=400\');" data-pin-do="buttonPin" ></div>';
    }
    public function getG(){
        echo '<div class="'.$this->class.' '.$this->class.'_g g-plusone" data-size="small"  data-href="'.$this->url.'"></div>';
    }
    	
}
function createThumbsGallery( $pathToImages, $pathToThumbs, $thumbWidth ) 
{
  // open the directory
  $dir = opendir( $pathToImages );

  // loop through it, looking for any/all JPG files:
  while (false !== ($fname = readdir( $dir ))) {
    // parse path for the extension
    $info = pathinfo($pathToImages . $fname);
    // continue only if this is a JPEG image
    if ( strtolower($info['extension']) == 'jpg' ) 
    {
      echo "Creating thumbnail for {$fname} <br />";

      // load image and get image size
      $img = imagecreatefromjpeg( "{$pathToImages}{$fname}" );
      $width = imagesx( $img );
      $height = imagesy( $img );

      // calculate thumbnail size
      $new_width = $thumbWidth;
      $new_height = floor( $height * ( $thumbWidth / $width ) );

      // create a new temporary image
      $tmp_img = imagecreatetruecolor( $new_width, $new_height );

      // copy and resize old image into new image 
      imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );
      echo "{$pathToThumbs}{$fname}";
      // save thumbnail into a file
      imagejpeg( $tmp_img, "{$pathToThumbs}{$fname}" );
    }
  }
  // close the directory
  closedir( $dir );
}
function createThumbs($fname,$pathToImages, $pathToThumbs, $thumbWidth ) 
{
  // open the directory

  // loop through it, looking for any/all JPG files:
    // parse path for the extension
    $info = pathinfo($pathToImages . $fname);
    // continue only if this is a JPEG image
    if ( strtolower($info['extension']) == 'jpg' ) 
    {
      echo "Creating thumbnail for {$fname} <br />";

      // load image and get image size
      $img = imagecreatefromjpeg( "{$pathToImages}{$fname}" );

      $width = imagesx( $img );
      $height = imagesy( $img );
echo $height.'-'.$thumbWidth.'-'.$width;
      // calculate thumbnail size
      $new_width = $thumbWidth;
      $new_height = floor( $height * ( $thumbWidth / $width ) );

      // create a new temporary image
      $tmp_img = imagecreatetruecolor( $new_width, $new_height );

      // copy and resize old image into new image 
      imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );
      // save thumbnail into a file
      imagejpeg( $tmp_img, "{$pathToThumbs}{$fname}" );

    }
  // close the directory
}
// call createThumb function and pass to it as parameters the path 
// to the directory that contains images, the path to the directory
// in which thumbnails will be placed and the thumbnail's width. 
// We are assuming that the path will be a relative path working 
// both in the filesystem, and through the web for links

function convert2columns ($colcontent, $topChar, $column_spacing) {
  $coloutput =  "<table border=\"0\" cellpadding=\"$column_spacing\"><tr>";
  $bodytext = array("$colcontent");
  $text = implode(",", $bodytext); //prepare bodytext
  $length = strlen($text); //determine the length of the text
  $columns=ceil($length/$topChar);
  //$length = ceil($length/$columns); //divide length by number of columns
  $words = explode(" ",$text); // prepare text for word count and split the body into columns
  $c = count($words);
  $l = 0;
  for($i=1;$i<=$columns;$i++) {
    $new_string = "";
    $coloutput .= "<td style=\"text-align:left\" valign=\"top\">";
  for($g=$l;$g<=$c;$g++) {
    if(strlen($new_string) <= $topChar || $i == $columns)
    $new_string.=$words[$g]." ";
    else {
      $l = $g;
    break;
      }
     }
    $coloutput .= $new_string;
    $coloutput .= "</td>";
  }
  $coloutput .= "</tr></table>"; 
  return $coloutput;
  
 }
function ObtenerNavegador($user_agent) {
     $navegadores = array(
          'Opera' => 'Opera',
          'Mozilla Firefox'=> '(Firebird)|(Firefox)',
          'Galeon' => 'Galeon',
          'Mozilla'=>'Gecko',
          'MyIE'=>'MyIE',
          'Lynx' => 'Lynx',
          'Netscape' => '(Mozilla/4\.75)|(Netscape6)|(Mozilla/4\.08)|(Mozilla/4\.5)|(Mozilla/4\.6)|(Mozilla/4\.79)',
          'Konqueror'=>'Konqueror',
          'Internet Explorer 7' => '(MSIE 7\.[0-9]+)',
          'Internet Explorer 6' => '(MSIE 6\.[0-9]+)',
          'Internet Explorer 5' => '(MSIE 5\.[0-9]+)',
          'Internet Explorer 4' => '(MSIE 4\.[0-9]+)',
);
foreach($navegadores as $navegador=>$pattern){
       if (eregi($pattern, $user_agent))
       return $navegador;
    }
return 'Desconocido';
}
?>
