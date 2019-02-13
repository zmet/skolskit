<?php
require "includes/functions/database.php";

header('Content-type: text/xml');

$sql_admintable = "SELECT * FROM admintable";
$sql_news = "SELECT * FROM news";
$sql_apartments = "SELECT * FROM apartments";
$q_admintable   = mysql_query($sql_admintable) or die(mysql_error());
$q_news  = mysql_query($sql_news) or die(mysql_error());
$q_apartments   = mysql_query($sql_apartments) or die(mysql_error());

$xml = "<database>";
  $xml .= "<admintable>";
while($r = mysql_fetch_array($q_admintable)){
  

  $xml .= "<item_admin>";
  $xml .= "<id>".$r['id']."</id>";  
  $xml .= "<fname>".$r['fname']."</fname>";
  $xml .= "<lname>".$r['lname']."</lname>";
  $xml .= "<email>".$r['email']."</email>";
  $xml .= "<worknr>".$r['worknr']."</worknr>"; 
  $xml .= "</item_admin>";
  }
  $xml .= "</admintable>";
  $xml .= "<news>";
while($r = mysql_fetch_array($q_news)){

  $xml .= "<item_news>";
  $xml .= "<id>".$r['id']."</id>";  
  $xml .= "<title>".$r['title']."</title>";
  $xml .= "<body>".$r['body']."</body>";  
  $xml .= "</item_news>";
  }
  $xml .= "</news>";
  
  
  $xml .= "<apartments>";
  while($r = mysql_fetch_array($q_apartments)){
  if($r['active'] = 1){
  $xml .= "<item_apartment>";
  $xml .= "<id>".$r['id']."</id>";  
  $xml .= "<name>".$r['name']."</name>";
  $xml .= "<address>".$r['address']."</address>";  
  $xml .= "<postnr>".$r['postnr']."</postnr>";   
  $xml .= "<city>".$r['city']."</city>";
  $xml .= "<price>".$r['price']."</price>";
  $xml .= "<image>".$r['image']."</image>";
  $xml .= "<floor>".$r['floor']."</floor>"; 
  $xml .= "<size>".$r['size']."</size>"; 
  $xml .= "<room>".$r['room']."</room>"; 
  $xml .= "<area>".$r['area']."</area>"; 
  $xml .= "<balkony>".$r['balkony']."</balkony>"; 
  $xml .= "<elevator>".$r['elevator']."</elevator>"; 
  $xml .= "<active>".$r['active']."</active>"; 
  $xml .= "</item_apartment>";
  }
  }
  $xml .= "</apartments>";

$xml .= "</database>";

$utf = utf8_encode($xml);

$sxe = new SimpleXMLElement($utf);

$sxe->asXML("apartments.xml");
header("Location: http://moonmoose.zmet.se/apartments.xml");
?>