<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

CJSCore::Init();
?>




<?
if ($arResult['SHOW_ERRORS'] == 'Y' && $arResult['ERROR'])
	ShowMessage($arResult['ERROR_MESSAGE']);
?>
	<br/>
	<br/>  
<? /*if($arResult["FORM_TYPE"] == "login"):?>
<div id="wrapper">
     <div id="login" class="animate form">
              
<form name="system_auth_form<?=$arResult["RND"]?>" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?> autocomplete="on">
<h1>Вход</h1>
<?if($arResult["BACKURL"] <> ''):?>
	<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
<?endif?>
<?foreach ($arResult["POST"] as $key => $value):?>
	<input type="hidden" name="<?=$key?>" value="<?=$value?>" />
<?endforeach?>
	<input type="hidden" name="AUTH_FORM" value="Y" />
	<input type="hidden" name="TYPE" value="AUTH" />



             <p>
              <label for="username" class="uname" data-icon="u" ><?=GetMessage("AUTH_LOGIN")?></label>
              <input id="username" name="USER_LOGIN" required="required" type="text" value="<?=$arResult["USER_LOGIN"]?>" placeholder="sitehere или sitehere.ru@my.com"/>
             </p>

	       <p>
            <label for="password" class="youpasswd" data-icon="p"><?=GetMessage("AUTH_PASSWORD")?></label>
            <input id="password" name="USER_PASSWORD" required="required" type="password" placeholder="например 123456" />
          </p>
		
    	<?if ($arResult["STORE_PASSWORD"] == "Y"):?>
           <p class="keeplogin">
            <input type="checkbox" id="USER_REMEMBER_frm"   name="USER_REMEMBER" value="Y"/>
            <label for="USER_REMEMBER_frm"  title="<?=GetMessage("AUTH_REMEMBER_ME")?>"><?echo GetMessage("AUTH_REMEMBER_SHORT")?></label>
          </p>
    	<?endif?>	
     		
		 <noindex><a href="<?=$arResult["AUTH_FORGOT_PASSWORD_URL"]?>" rel="nofollow"><?=GetMessage("AUTH_FORGOT_PASSWORD_2")?></a></noindex>
<?if ($arResult["CAPTCHA_CODE"]):?>
		
			<?echo GetMessage("AUTH_CAPTCHA_PROMT")?>:<br />
			<input type="hidden" name="captcha_sid" value="<?echo $arResult["CAPTCHA_CODE"]?>" />
			<img src="/bitrix/tools/captcha.php?captcha_sid=<?echo $arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" /><br /><br />
			<input type="text" name="captcha_word" maxlength="50" value="" /></td>
		
<?endif?>



         <p class="login button">
             <input type="submit"  name="Login" value="<?=GetMessage("AUTH_LOGIN_BUTTON")?>" />
		  </p>
		  
		  
	     <br/>
	
<?if($arResult["NEW_USER_REGISTRATION"] == "Y"):?>

           <p class="change_link">
             Не зарегистрированы еще ?
            <noindex>   <a href="<?=$arResult["AUTH_REGISTER_URL"]?>"    rel="nofollow" class="to_register"><?=GetMessage("AUTH_REGISTER")?></a></noindex>
          </p>
<?endif?>

</form>

</div>
</div>


*/?>		
		
	
<?

if($arResult["FORM_TYPE"] == "login"):
	?>
	<form name="system_auth_form<?=$arResult["RND"]?>" method="post" target="_top" action="/user" autocomplete="on">

	<div class="col-lg-7 col-xs-12 hidden-xs">

	<label class="btn-list-inline" for="exit">
			 Пользователь
	 </label>
       
             <input class="btnnn" type="submit" id="exit" name="Login" value="<?=GetMessage("AUTH_LOGIN_BUTTON")?>" />
           
		  </div>
		
	</form>	  
<?
else:
?>
   <div class="col-lg-7 col-xs-12 hidden-xs">

<label class="btn-list-inline" for="exit">

			<a href="<?=$arResult["PROFILE_URL"]?>">  <?=$arResult["USER_NAME"]?></a>
			  
	 </label>
    <a href="<?echo $APPLICATION->GetCurPageParam("logout=yes", array(
     "login",
     "logout",
     "register",
     "forgot_password",
     "change_password"));?>">
	<input  class="btnnn" type="submit" value="<?=GetMessage("AUTH_LOGOUT_BUTTON")?>"           />
	</a>
</div>

<?endif?>

