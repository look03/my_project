<? 
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
CModule::IncludeModule("iblock");
CUser::GetID();
global $USER;
$avLogin=$USER->GetLogin();
$arResult["avlogin"]=$avLogin;
/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogElementComponent $component
 */




$arSelect = Array("*");
$arFilter = Array("NAME"=>$arResult["ID"],"IBLOCK_ID"=>7, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(
    Array("ID"=>"DESC"), 
    $arFilter, 
    false, 
    Array(
 
      "nPageSize"=>1
    ), 
    $arSelect
);

while($ob = $res->Fetch()){
    
$name_user=$ob["USER_NAME"];
  
 $arResult["BOOK_NAME"]=$ob["NAME"];

$arResult["ID_USER"]=$ob["ID"];

}
$keywords = preg_split("/[\s,]+/", $name_user);

$str=$keywords[0];

$res = substr($str, 1, strlen($str)-2);
$arResult["login_user"]=$res;




$arSelect1 = Array("IBLOCK_ID", "ID", "LANG_ID", "DETAIL_PAGE_URL");
$arFilter1 = Array("IBLOCK_ID"=>$arResult["IBLOCK_ID"], "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
$res1 = CIBlockElement::GetList(
    Array("ID"=>"DESC"), 
    $arFilter1, 
    false, 
    Array(
        "nElementID"=>$arResult["ID"],
        "nPageSize"=>1
    ), 
    $arSelect1
);

$res2 = CIBlockElement::GetList(
    Array("ID"=>"DESC"), 
    $arFilter1, 
    false, 
    Array(
        "nElementID"=>$arResult["ID"],
        "nPageSize"=>10000
    ), 
    $arSelect1
);
$count1=0;
while($ob = $res2->GetNext()){


   $countbook[$count1]=$ob["ID"];
   $count1++;
 }

$max=max($countbook);
$min=min($countbook);
 $arResult["max"]=$max;
 $arResult["min"]=$min;

$res1->SetUrlTemplates("/catalog/#SECTION_CODE#/#ELEMENT_CODE#.php");
$count=0;

while($ob = $res1->GetNext()){

	$url[$count]=substr($ob["DETAIL_PAGE_URL"],0,strlen($ob["DETAIL_PAGE_URL"])-4)."/";
     $id[$count]=$ob["ID"];
    $count++;
}
$arResult["count"]=$count;
$arResult["url_f"]=$url[0];
$arResult["url_s"]=$url[1];
$arResult["url_t"]=$url[2];
$arResult["id_max"]=$id[0];


$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();

