<?
require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("iblock");
CUser::GetID();

if (isset($_POST['id']))
{
global $USER;
$d = $_POST['id'];

$arSelect = Array("*");
$arFilter = Array("ID"=>$d, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(
    Array("ID"=>"DESC"), 
    $arFilter, 
    false, 
    Array(
        "nElementID"=>$arResult["ID"],
        "nPageSize"=>0
    ), 
    $arSelect
);

while($ob = $res->GetNext()){
    $name=$ob["NAME"];
    echo $name;
}
$start=date($DB->DateFormatToPHP(CSite::GetDateFormat("SHORT")), time());
$end=date($DB->DateFormatToPHP(CSite::GetDateFormat("SHORT")), time()+600000);

$PROP=array();
$PROP["BOOK"]=$name;
$PROP["USER"]=$USER->GetID();
$PROP["START_DATE"]=$start;
$PROP["END_DATE"]=$end;
$namee="book"+$d;
$arFields = array(
    "ACTIVE" => "Y", 
	"IBLOCK_ID" => 7,
	"NAME"=>$namee,
    "PROPERTY_VALUES"=> $PROP
	 );
 $oElement = new CIBlockElement();
 $idElement = $oElement->Add($arFields, false, false, true); 
    }

?>



