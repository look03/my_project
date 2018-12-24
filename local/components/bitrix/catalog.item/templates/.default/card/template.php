<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $item
 * @var array $actualItem
 * @var array $minOffer
 * @var array $itemIds
 * @var array $price
 * @var array $measureRatio
 * @var bool $haveOffers
 * @var bool $showSubscribe
 * @var array $morePhoto
 * @var bool $showSlider
 * @var bool $itemHasDetailUrl
 * @var string $imgTitle
 * @var string $productTitle
 * @var string $buttonSizeClass
 * @var CatalogSectionComponent $component
 */
?>
<br/>
<div class="portfolio">
    <div class="row" data-height="equal" data-target=".thumbnail">
  
	           <a  href="<?=$item['DETAIL_PAGE_URL']?>" class="thumbnail">
                   <div class="image">
		              <img class="img-circle img-responsive" src='<?=$item['PREVIEW_PICTURE']['SRC']?>'>
		
		           </div>
		      <p class="btnn btn-primary">Открыть</p>
           </a>
	     </div>
    
</div>
<br/>