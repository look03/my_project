<?
/**
 * Bitrix Framework
 * @package bitrix
 * @subpackage main
 * @copyright 2001-2014 Bitrix
 */

/**
 * Bitrix vars
 * @global CMain $APPLICATION
 * @global CUser $USER
 * @param array $arParams
 * @param array $arResult
 * @param CBitrixComponentTemplate $this
 */


if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();
?>


 <br/>
<div id="wrapper">
<div id="register" class=" animate form">
<?if($USER->IsAuthorized()):?>

<p><?echo GetMessage("MAIN_REGISTER_AUTH")?></p>

<?else:?>
<?
if (count($arResult["ERRORS"]) > 0):
	foreach ($arResult["ERRORS"] as $key => $error)
		if (intval($key) == 0 && $key !== 0) 
			$arResult["ERRORS"][$key] = str_replace("#FIELD_NAME#", "&quot;".GetMessage("REGISTER_FIELD_".$key)."&quot;", $error);

	ShowError(implode("<br />", $arResult["ERRORS"]));

elseif($arResult["USE_EMAIL_CONFIRMATION"] === "Y"):
?>
<p><?echo GetMessage("REGISTER_EMAIL_WILL_BE_SENT")?></p>
<?endif?>

<form method="post" action="<?=POST_FORM_ACTION_URI?>" name="regform" enctype="multipart/form-data">
<?
if($arResult["BACKURL"] <> ''):
?>
	<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
<?
endif;
?>


	
			<h1><?=GetMessage("AUTH_REGISTER")?></h1>

<?foreach ($arResult["SHOW_FIELDS"] as $FIELD):?>
	<?if($FIELD == "AUTO_TIME_ZONE" && $arResult["TIME_ZONE_ENABLED"] == true):?>
		<tr>
			<td><?echo GetMessage("main_profile_time_zones_auto")?><?if ($arResult["REQUIRED_FIELDS_FLAGS"][$FIELD] == "Y"):?><span class="starrequired">*</span><?endif?></td>
			<td>
				<select name="REGISTER[AUTO_TIME_ZONE]" onchange="this.form.elements['REGISTER[TIME_ZONE]'].disabled=(this.value != 'N')">
					<option value=""><?echo GetMessage("main_profile_time_zones_auto_def")?></option>
					<option value="Y"<?=$arResult["VALUES"][$FIELD] == "Y" ? " selected=\"selected\"" : ""?>><?echo GetMessage("main_profile_time_zones_auto_yes")?></option>
					<option value="N"<?=$arResult["VALUES"][$FIELD] == "N" ? " selected=\"selected\"" : ""?>><?echo GetMessage("main_profile_time_zones_auto_no")?></option>
				</select>
			</td>
		</tr>
		<tr>
			<td><?echo GetMessage("main_profile_time_zones_zones")?></td>
			<td>
				<select name="REGISTER[TIME_ZONE]"<?if(!isset($_REQUEST["REGISTER"]["TIME_ZONE"])) echo 'disabled="disabled"'?>>
		<?foreach($arResult["TIME_ZONE_LIST"] as $tz=>$tz_name):?>
					<option value="<?=htmlspecialcharsbx($tz)?>"<?=$arResult["VALUES"]["TIME_ZONE"] == $tz ? " selected=\"selected\"" : ""?>><?=htmlspecialcharsbx($tz_name)?></option>
		<?endforeach?>
				</select>
			</td>
		</tr>
	<?else:?>
		<tr>
	
			<td><?
	switch ($FIELD)
	{


		  case "LOGIN":
		  ?>
		  <p>
		  <label for="usernamesignup" class="uname" data-icon="u">Ваш логин</label>
		  <input id="usernamesignup" name="REGISTER[<?=$FIELD?>]"  type="text" placeholder="myname1"  value="<?=$arResult["VALUES"][$FIELD]?>"/>
	 </p>
	 <?
	 break;
		case "PASSWORD":
			?>
			<p>
                    <label for="passwordsignup" class="youpasswd" data-icon="p">Ваш пароль </label>
                    <input autocomplete="off" id="passwordsignup" name="REGISTER[<?=$FIELD?>]" required="required" type="password" placeholder="123456" value="<?=$arResult["VALUES"][$FIELD]?>"/>
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
<?endif?>
<?
			break;
		case "CONFIRM_PASSWORD":
		?><p>
		 <label for="passwordsignup_confirm" class="youpasswd" data-icon="p">Подтвердите ваш пароль </label>
		<input autocomplete="off" id="passwordsignup" name="REGISTER[<?=$FIELD?>]" required="required" type="password" placeholder="123456" value="<?=$arResult["VALUES"][$FIELD]?>"/>
         </p>
           <?
			break;
			case "EMAIL":
			?>
			
			
			<p>
			<label for="emailsignup" class="youmail" data-icon="e" > Ваш e-mail</label>
			<input id="emailsignup" name="REGISTER[<?=$FIELD?>]"  type="email" placeholder="sitehere.ru@my.com"  value="<?=$arResult["VALUES"][$FIELD]?>"/>
	   </p>
	   <?
	   break;
	
		default:
		if ($FIELD == "PERSONAL_BIRTHDAY"):?><small><?=$arResult["DATE_FORMAT"]?></small><br /><?endif;
			?>
			
			
			<?
				if ($FIELD == "PERSONAL_BIRTHDAY")
					$APPLICATION->IncludeComponent(
						'bitrix:main.calendar',
						'',
						array(
							'SHOW_INPUT' => 'N',
							'FORM_NAME' => 'regform',
							'INPUT_NAME' => 'REGISTER[PERSONAL_BIRTHDAY]',
							'SHOW_TIME' => 'N'
						),
						null,
						array("HIDE_ICONS"=>"Y")
					);
				?><?
	}?></td>
		</tr>
	<?endif?>
<?endforeach?>
<?// ********************* User properties ***************************************************?>
<?if($arResult["USER_PROPERTIES"]["SHOW"] == "Y"):?>
	<tr><td colspan="2"><?=strlen(trim($arParams["USER_PROPERTY_NAME"])) > 0 ? $arParams["USER_PROPERTY_NAME"] : GetMessage("USER_TYPE_EDIT_TAB")?></td></tr>
	<?foreach ($arResult["USER_PROPERTIES"]["DATA"] as $FIELD_NAME => $arUserField):?>
	<tr><td><?=$arUserField["EDIT_FORM_LABEL"]?>:<?if ($arUserField["MANDATORY"]=="Y"):?><span class="starrequired">*</span><?endif;?></td><td>
			<?$APPLICATION->IncludeComponent(
				"bitrix:system.field.edit",
				$arUserField["USER_TYPE"]["USER_TYPE_ID"],
				array("bVarsFromForm" => $arResult["bVarsFromForm"], "arUserField" => $arUserField, "form_name" => "regform"), null, array("HIDE_ICONS"=>"Y"));?></td></tr>
	<?endforeach;?>
<?endif;?>
<?// ******************** /User properties ***************************************************?>

	


	  <p class="signin button1">
  <input type="submit" name="register_submit_button" value="<?=GetMessage("AUTH_REGISTER")?>"/>
</p>
	

 <p class="change_link1">
  Уже зарегистрированы ?
  <a href="/user/" class="to_register"> Войдите на сайт </a>
</p>
</form>
<?endif?>
</div>
</div>