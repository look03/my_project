<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
CUser::GetID();
global $USER;
$avLogin=$USER->GetID()

?>

<? If($avLogin=="1") {?> 
<div class="news-list">
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<table class="tabb" >
<th class="thhh">
      Читатель
    </th>
    <th class="thhh">
    Книга
    </th>
    <th class="thhh">
    Дата выдачи
    </th>
    <th class="thhh">
    Дата возвращения
 </th>
 <th class="thhh">
   Возврат
 </th>

<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>


<?
	$ID=$arItem["DISPLAY_PROPERTIES"]["USER"]["VALUE"];
	$book=$arItem["DISPLAY_PROPERTIES"]["BOOK"]["VALUE"];
	$date_start=$arItem["DISPLAY_PROPERTIES"]["START_DATE"]["VALUE"];
	$date_end=$arItem["DISPLAY_PROPERTIES"]["END_DATE"]["VALUE"];
	$rsUser = CUser::GetByID($ID);
	   $arUser = $rsUser->GetNext();
	  $login=$arUser["LOGIN"];
	 $nam =$arUser['LAST_NAME'].' '.$arUser['NAME'];

    ?>
   
	   <tr class="trr">
	     <td class="tdd"><?=$nam?></td>
     
	       <td class="tdd"><?=$book?></td>
		
	       <td class="tdd"><?=$date_start?></td>
		
	
	       <td class="tdd"><?=$date_end?></td>
	 	
		 
		


	
			 
			  <td class="tdd">    <input type="button"  id="id4" data-id="<?=$arItem["ID"];?>" class="btn js-delete-book btn-primary" value="Вернуть" ></td>
			 
	
		   
	</tr>
	
<?endforeach;?>
</table>
</DIV>
<?} else {?>
   <div id="wrapper">
     <div id="login" class="animate form">
	   <p >У вас не достаточно прав!</p>
      </div> 
   </div>
<?}?>