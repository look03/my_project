
<?
require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("iblock");
if (isset($_POST['name']))
{
   
$name1 = $_POST['name'];


$email1 = $_POST['email'];


$text1 = $_POST['text'];


$PROP=array();
$PROP["NAME_F"]=$name1;
$PROP["MAIL"]=$email1;
$PROP["MESSAGE_P"]=$text1;


$arFields = array(
    "ACTIVE" => "Y", 
	"IBLOCK_ID" => 8,
    "PROPERTY_VALUES"=> $PROP,
    "NAME"=>"Сообщение от ".$name1
	 );
 $oElement = new CIBlockElement();
 $idElement = $oElement->Add($arFields, false, false, true); 
    }

?>