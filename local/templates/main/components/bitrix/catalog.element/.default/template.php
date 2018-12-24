<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 * @var string $templateFolder
 * @var int $max
 */

$this->setFrameMode(true);
$this->addExternalCss('/bitrix/css/main/bootstrap.css');


$obName = $templateData['JS_OBJ'] = 'ob'.preg_replace('/[^a-zA-Z0-9_]/', 'x', $mainId);
$name = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE'])
	? $arResult['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE']
	: $arResult['NAME'];
$title = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_TITLE'])
	? $arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_TITLE']
	: $arResult['NAME'];
$alt = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_ALT'])
	? $arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_ALT']
	: $arResult['NAME'];

$haveOffers = !empty($arResult['OFFERS']);
if ($haveOffers)
{
	$actualItem = isset($arResult['OFFERS'][$arResult['OFFERS_SELECTED']])
		? $arResult['OFFERS'][$arResult['OFFERS_SELECTED']]
		: reset($arResult['OFFERS']);
	$showSliderControls = false;

	foreach ($arResult['OFFERS'] as $offer)
	{
		if ($offer['MORE_PHOTO_COUNT'] > 1)
		{
			$showSliderControls = true;
			break;
		}
	}
}
else
{
	$actualItem = $arResult;
	$showSliderControls = $arResult['MORE_PHOTO_COUNT'] > 1;
}

$skuProps = array();
$price = $actualItem['ITEM_PRICES'][$actualItem['ITEM_PRICE_SELECTED']];
$measureRatio = $actualItem['ITEM_MEASURE_RATIOS'][$actualItem['ITEM_MEASURE_RATIO_SELECTED']]['RATIO'];
$showDiscount = $price['PERCENT'] > 0;

$showDescription = !empty($arResult['PREVIEW_TEXT']) || !empty($arResult['DETAIL_TEXT']);
$showBuyBtn = in_array('BUY', $arParams['ADD_TO_BASKET_ACTION']);
$buyButtonClassName = in_array('BUY', $arParams['ADD_TO_BASKET_ACTION_PRIMARY']) ? 'btn-default' : 'btn-link';
$showAddBtn = in_array('ADD', $arParams['ADD_TO_BASKET_ACTION']);
$showButtonClassName = in_array('ADD', $arParams['ADD_TO_BASKET_ACTION_PRIMARY']) ? 'btn-default' : 'btn-link';
$showSubscribe = $arParams['PRODUCT_SUBSCRIPTION'] === 'Y' && ($arResult['CATALOG_SUBSCRIBE'] === 'Y' || $haveOffers);

$arParams['MESS_BTN_BUY'] = $arParams['MESS_BTN_BUY'] ?: Loc::getMessage('CT_BCE_CATALOG_BUY');
$arParams['MESS_BTN_ADD_TO_BASKET'] = $arParams['MESS_BTN_ADD_TO_BASKET'] ?: Loc::getMessage('CT_BCE_CATALOG_ADD');
$arParams['MESS_NOT_AVAILABLE'] = $arParams['MESS_NOT_AVAILABLE'] ?: Loc::getMessage('CT_BCE_CATALOG_NOT_AVAILABLE');
$arParams['MESS_BTN_COMPARE'] = $arParams['MESS_BTN_COMPARE'] ?: Loc::getMessage('CT_BCE_CATALOG_COMPARE');
$arParams['MESS_PRICE_RANGES_TITLE'] = $arParams['MESS_PRICE_RANGES_TITLE'] ?: Loc::getMessage('CT_BCE_CATALOG_PRICE_RANGES_TITLE');
$arParams['MESS_DESCRIPTION_TAB'] = $arParams['MESS_DESCRIPTION_TAB'] ?: Loc::getMessage('CT_BCE_CATALOG_DESCRIPTION_TAB');
$arParams['MESS_PROPERTIES_TAB'] = $arParams['MESS_PROPERTIES_TAB'] ?: Loc::getMessage('CT_BCE_CATALOG_PROPERTIES_TAB');
$arParams['MESS_COMMENTS_TAB'] = $arParams['MESS_COMMENTS_TAB'] ?: Loc::getMessage('CT_BCE_CATALOG_COMMENTS_TAB');
$arParams['MESS_SHOW_MAX_QUANTITY'] = $arParams['MESS_SHOW_MAX_QUANTITY'] ?: Loc::getMessage('CT_BCE_CATALOG_SHOW_MAX_QUANTITY');
$arParams['MESS_RELATIVE_QUANTITY_MANY'] = $arParams['MESS_RELATIVE_QUANTITY_MANY'] ?: Loc::getMessage('CT_BCE_CATALOG_RELATIVE_QUANTITY_MANY');
$arParams['MESS_RELATIVE_QUANTITY_FEW'] = $arParams['MESS_RELATIVE_QUANTITY_FEW'] ?: Loc::getMessage('CT_BCE_CATALOG_RELATIVE_QUANTITY_FEW');






?>

 <div class="contain">
	  <h1><?=$name?></h1>
	     <div class="row">
             <div class="portfolio-works-slider">
			    <div class="slider-inner">
				    <div class="item-wrap">
							<?
						       foreach ($actualItem['MORE_PHOTO'] as $key => $photo)
									{
							?>
                                         <a data-blueimp="portfolio-works" class="item" href="<?=$photo['SRC']?>">
                                            <img src="<?=$photo['SRC']?>" alt="Заголовок 1"/>
                                         </a>
								  <? }?>
					</div>
		   <?  if(isset($arResult['avlogin'])){?>
			
				     

               <div id="zv"></div>
				<? if($arResult["login_user"]==$arResult["avlogin"] && isset($arResult["BOOK_NAME"]))
				   {?>
					<div  class="take" id="zv">
					   <input type="button"  id="id4" data-id="<?=$arResult["ID_USER"];?>" class="btn js-delete-book btn-primary" value="Вернуть" >
					</div>
			      	<? } else if(is_null($arResult["BOOK_NAME"])) {?>

					<div class="take" id="id11"><p id="id1" data-id="<?=$arResult["ID"]?>" class="btn js-click-button btn-primary" >Читать</p></div>
				
			       <?} else  {?>
				    <div id="zv"> <p class="tmppp">Недоступна</p></div>
					<?}?>
			         <?} else {?>
				        <div class="take"><a href="/user/"><p class="btn js-click-button btn-primary" >Читать</p></a></div> 
			               <?}?>	   
				        <div class="item-wrapp">
                          <?echo $arResult['PREVIEW_TEXT_TYPE'] === 'html' ? $arResult['PREVIEW_TEXT'] : '<p>'.$arResult['PREVIEW_TEXT'].'</p>'; ?>
                   </div> 
				</div>		
		
				<div class="annot">
				    <? echo $arResult['DETAIL_TEXT_TYPE'] === 'html' ? $arResult['DETAIL_TEXT'] : '<p>'.$arResult['DETAIL_TEXT'].'</p>'; ?>
				</div>
             </div>
	     </div>
	
		<?  if ($arResult["count"]==3)
		  {
			  ?>
		 <ul class="pager">
                <li class="previous">
                    <a href="<?= $arResult["url_f"]?>">
                        <div class="title"><p class="btn btn-primary">Предыдущая книга</p></div>
                       
                    </a>
                </li>
                <li class="next">
                    <a href="<?=$arResult["url_t"]?>">
                        <div class="title"><p class="btn btn-primary">Следующая книга</p></div>
                      
                    </a>
                </li>
            </ul>
		  <? } 
		  else if (($arResult["count"]==2)&&($arResult["id_max"]==$arResult["max"]))
		  {?>
             <ul class="pager">
               
                <li class="next">
                    <a href="<?=$arResult["url_s"]?>">
                        <div class="title"><p class="btn btn-primary">Следующая книга</p></div>
                      
                    </a>
                </li>
            </ul>
		  <?}
		  else { ?>
			<ul class="pager">
			<li class="previous">
				<a href="<?=$arResult["url_f"]?>">
					<div class="title"><p class="btn btn-primary">Предыдущая книга</p></div>
				   
				</a>
			</li>
		
		</ul>
		<?  }
		  ?>
	</div>

