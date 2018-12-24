<?
define("NEED_AUTH",true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
If (isset($_REQUEST["backurl"]) && strlen($_REQUEST["backurl"])>0)
LocalRedirect($backurl);

?>

<p>
	Вы зарегестрированы и успешно авторизовались.
</p>
<p>
	<a href="<?=SITE_DIR?>">Вернуться на главную страницу </a>
</p>
 <br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
