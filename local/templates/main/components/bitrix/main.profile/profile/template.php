<?
/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 */
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	die();
?>








 <div id="wrapper1">
                  <div id="login" class="animate form">

<?ShowError($arResult["strProfileError"]);?>
<?
if ($arResult['DATA_SAVED'] == 'Y')
	ShowNote(GetMessage('PROFILE_DATA_SAVED'));
?>
<script type="text/javascript">
<!--
var opened_sections = [<?
$arResult["opened"] = $_COOKIE[$arResult["COOKIE_PREFIX"]."_user_profile_open"];
$arResult["opened"] = preg_replace("/[^a-z0-9_,]/i", "", $arResult["opened"]);
if (strlen($arResult["opened"]) > 0)
{
	echo "'".implode("', '", explode(",", $arResult["opened"]))."'";
}
else
{
	$arResult["opened"] = "reg";
	echo "'reg'";
}
?>];
//-->

var cookie_prefix = '<?=$arResult["COOKIE_PREFIX"]?>';
</script>
<form method="post" name="form1" action="<?=$arResult["FORM_TARGET"]?>" enctype="multipart/form-data">
<?=$arResult["BX_SESSION_CHECK"]?>
<input type="hidden" name="lang" value="<?=LANG?>" />
<input type="hidden" name="ID" value=<?=$arResult["ID"]?> />

<div class="hh"><a title="<?=GetMessage("REG_SHOW_HIDE")?>" href="javascript:void(0)" onclick="SectionClick('reg')"><?=GetMessage("REG_SHOW_HIDE")?></a></div>
<div class="profile-block-<?=strpos($arResult["opened"], "reg") === false ? "hidden" : "shown"?>" id="user_div_reg">


		
	



	  <p>
        <label for="username" class="uname" data-icon="u" ><?=GetMessage('NAME')?></label>
        <input id="username" name="NAME" value="<?=$arResult["arUser"]["NAME"]?>" required="required" type="text" placeholder="Иван"/>
		  </p>
		
	
		  <p>
        <label for="username" class="uname" data-icon="u" ><?=GetMessage('SECOND_NAME')?></label>
        <input id="username" name="SECOND_NAME"  value="<?=$arResult["arUser"]["SECOND_NAME"]?>" required="required" type="text" placeholder="Фёдорович"/>
		  </p>



        <p>
         <label for="username" class="uname" data-icon="u" ><?=GetMessage('LAST_NAME')?></label>
         <input id="username" name="LAST_NAME"   value="<?=$arResult["arUser"]["LAST_NAME"]?>" required="required" type="text" placeholder="Иванов"/>
		</p>



              <p>
                <label for="emailsignup" class="youmail" data-icon="e" > <?=GetMessage('EMAIL')?></label>
                <input id="emailsignup" name="EMAIL" required="required"  value="<? echo $arResult["arUser"]["EMAIL"]?>" type="email" placeholder="sitehere.ru@my.com"/>
               </p>
	
			   <p>
                    <label for="usernamesignup" class="uname" data-icon="u"><?=GetMessage('LOGIN')?></label>
                    <input id="usernamesignup" name="LOGIN" required="required" value="<? echo $arResult["arUser"]["LOGIN"]?>" type="text" placeholder="myname1" />
                </p>

<?if($arResult['CAN_EDIT_PASSWORD']):?>


     <p>
                    <label for="passwordsignup" class="youpasswd" data-icon="p"><?=GetMessage('NEW_PASSWORD_REQ')?></label>
                    <input id="passwordsignup" name="NEW_PASSWORD" required="required" type="password" placeholder="123456"/>
               </p>

<?if($arResult["SECURE_AUTH"]):?>
				<span class="bx-auth-secure" id="bx_auth_secure" title="<?echo GetMessage("AUTH_SECURE_NOTE")?>" style="display:none">
					<div class="bx-auth-secure-icon"></div>
				</span>
				<noscript>
				<span class="bx-auth-secure" title="<?echo GetMessage("AUTH_NONSECURE_NOTE")?>">
					<div class="bx-auth-secure-icon bx-auth-secure-unlock"></div>
				</span>
				</noscript>
<script type="text/javascript">
document.getElementById('bx_auth_secure').style.display = 'inline-block';
</script>
		</td>
	</tr>
<?endif?>

 <p>
    <label for="passwordsignup_confirm" class="youpasswd" data-icon="p"><?=GetMessage('NEW_PASSWORD_CONFIRM')?> </label>
    <input id="passwordsignup_confirm" name="NEW_PASSWORD_CONFIRM" required="required" type="password" placeholder="123456"/>
 </p>

	
<?endif?>

	<?// ********************* User properties ***************************************************?>
	<?if($arResult["USER_PROPERTIES"]["SHOW"] == "Y"):?>
	<div class="profile-link profile-user-div-link"><a title="<?=GetMessage("USER_SHOW_HIDE")?>" href="javascript:void(0)" onclick="SectionClick('user_properties')"><?=strlen(trim($arParams["USER_PROPERTY_NAME"])) > 0 ? $arParams["USER_PROPERTY_NAME"] : GetMessage("USER_TYPE_EDIT_TAB")?></a></div>
	<div id="user_div_user_properties" class="profile-block-<?=strpos($arResult["opened"], "user_properties") === false ? "hidden" : "shown"?>">
	<table class="data-table profile-table">
		<thead>
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
		</thead>
		<tbody>
		<?$first = true;?>
		<?foreach ($arResult["USER_PROPERTIES"]["DATA"] as $FIELD_NAME => $arUserField):?>
		<tr><td class="field-name">
			<?if ($arUserField["MANDATORY"]=="Y"):?>
				<span class="starrequired">*</span>
			<?endif;?>
			<?=$arUserField["EDIT_FORM_LABEL"]?>:</td><td class="field-value">
				<?$APPLICATION->IncludeComponent(
					"bitrix:system.field.edit",
					$arUserField["USER_TYPE"]["USER_TYPE_ID"],
					array("bVarsFromForm" => $arResult["bVarsFromForm"], "arUserField" => $arUserField), null, array("HIDE_ICONS"=>"Y"));?></td></tr>
		<?endforeach;?>
		</tbody>
	</table>
	</div>
	<?endif;?>
	<?// ******************** /User properties ***************************************************?>
	<p><?echo $arResult["GROUP_POLICY"]["PASSWORD_REQUIREMENTS"];?></p>



	<p class="signin button"><input  type="submit" name="save" value="<?=(($arResult["ID"]>0) ? GetMessage("MAIN_SAVE") : GetMessage("MAIN_ADD"))?>">&nbsp;&nbsp;<input type="reset" value="<?=GetMessage('MAIN_RESET');?>"></p>
</form>
<?

?>
</div>
</div>