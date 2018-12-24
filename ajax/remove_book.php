<?
require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("iblock");
CUser::GetID();
if (isset($_POST['id']))
{
   $d=$_POST['id'];
   
}

CIBlockElement::Delete($d);