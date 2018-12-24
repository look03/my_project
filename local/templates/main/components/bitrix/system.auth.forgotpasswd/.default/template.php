<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><?

ShowMessage($arParams["~AUTH_RESULT"]);

?>


      
<br/>

<div id="wrapper">
                  <div id="login" class="animate form">
<form name="bform" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>">
<?
if (strlen($arResult["BACKURL"]) > 0)
{
?>
	<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
<?
}
?>
	<input type="hidden" name="AUTH_FORM" value="Y">
	<input type="hidden" name="TYPE" value="SEND_PWD">



			<h1 class="hh">Выслать данные</h1>

			<p>
             <label for="username" class="uname" data-icon="u" > <?=GetMessage("AUTH_LOGIN")?></label>
             <input id="username" name="USER_LOGIN" required="required"  value="<?=$arResult["LAST_LOGIN"]?>"  type="text" placeholder="sitehere"/>
            </p>
				  
			
			<p>
              <label for="emailsignup" class="youmail" data-icon="e" ><?=GetMessage("AUTH_EMAIL")?></label>
              <input id="emailsignup"  name="USER_EMAIL" required="required" type="email" placeholder="sitehere.ru@my.com"/>
            </p>
		   
	
	<?if($arResult["USE_CAPTCHA"]):?>
		<tr>
			<td></td>
			<td>
				<input type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>" />
				<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" />
			</td>
		</tr>
		<tr>
			<td><?echo GetMessage("system_auth_captcha")?></td>
			<td><input type="text" name="captcha_word" maxlength="50" value="" /></td>
		</tr>
	<?endif?>

     <p class="login button2">
        <input type="submit"  name="send_account_info" value="<?=GetMessage("AUTH_SEND")?>"/>
     </p>


	  <p class="change_link">
        Не зарегистрированы еще ?
        <a href="/user/" class="to_register"><?=GetMessage("AUTH_AUTH")?></a>
      </p>

</form>
</div>
</div>
<script type="text/javascript">
document.bform.USER_LOGIN.focus();
</script>
