<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
CUser::GetID();
global $USER;
$avID=$USER->GetID();

?>

<?if (!empty($arResult)):?>
<nav>
            <div class="navbar navbar-intervolga">
                <div class="container">
                    <div >
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-nav">
                            <span class="sr-only">Переключить навигацию</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                  
					</div>
					<div class="collapse navbar-collapse" id="top-nav">
                        <ul class="nav navbar-nav">


 <?
 
 foreach($arResult as $arItem):
	if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
		continue;
?>
<?

if ($avID==1) {
  //if($arItem["ITEM_INDEX"]!=2) {

?>
  <li <?if($arItem["SELECTED"]):
	?> class="active" 	<?endif?> > <a href="<?=$arItem["LINK"]?>""><?=$arItem["TEXT"]?></a></li>
<? } else {
      if($arItem["ITEM_INDEX"]!=2) {?>

      <li <?if($arItem["SELECTED"]):
	?> class="active" 	<?endif?> > <a href="<?=$arItem["LINK"]?>""><?=$arItem["TEXT"]?></a></li>
    <?}?>
 <?}?>

<?endforeach?>

                      </ul>
                    </div>
                </div>
            </div>
        </nav>
<?endif?>