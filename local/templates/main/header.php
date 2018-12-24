<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
IncludeTemplateLangFile(__FILE__);

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<title><?$APPLICATION->ShowTitle();?></title> 
   <?$APPLICATION->ShowHead();?>
<?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/css/common-styles.css')?>
<?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/css/styles.css')?>
<?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/css/style.css')?>
<link rel="icon" href='<?=SITE_TEMPLATE_PATH?>/ico/favicon.png'>


   <body> 
 <?$APPLICATION->ShowPanel();?>
    <div class="sticky-wrap">
        <header>
    <div class="header-main">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-xs-12">
                    <a class="logo" href="/">
                        <img src='<?=SITE_TEMPLATE_PATH?>/img/logo1.png'>
                    </a>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <div class="row">

                       
                        <?$APPLICATION->IncludeComponent(
                        	"bitrix:search.form", 
	                        "search.form", 
	                         array(
		                        "COMPONENT_TEMPLATE" => "search.form",
	                        	"PAGE" => "#SITE_DIR#search/",
		                        "USE_SUGGEST" => "N"
	                          ),
	                           false
                           );?>

                            <div class="mappp"  >
                          <?$APPLICATION->IncludeComponent(
	                               "bitrix:system.auth.form", 
	                                 "auth", 
                                    	array(
		                               "COMPONENT_TEMPLATE" => "auth",
		                               "FORGOT_PASSWORD_URL" => "/user/",
	                                 "PROFILE_URL" => "/user/profile.php",
		                               "REGISTER_URL" => "/user/registration.php",
		                               "SHOW_ERRORS" => "N"
                                  	),
	                                 false
                                 );?>
                           </div>
                </div>
               <? //форма для авторизации ?>
            </div>
        </div>
    </div>
</header>
<?$APPLICATION->IncludeComponent("bitrix:menu", "menu", Array(
	"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
		"CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
		"DELAY" => "N",	// Откладывать выполнение шаблона меню
		"MAX_LEVEL" => "1",	// Уровень вложенности меню
		"MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
		"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
		"MENU_CACHE_TYPE" => "N",	// Тип кеширования
		"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
		"ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
		"USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
		"COMPONENT_TEMPLATE" => ".default"
	),
	false
);?>
   <div class="container">
     <?$APPLICATION->IncludeComponent(
     	"bitrix:breadcrumb",
   	   "",
      Array()
     );?>
   </div>

<br/>
<?if($bIsMainPage):?>
   <div class="contain">
        <div id="w">
          <h1 class="hhh">Самые популярные книги</h1>



          <div class="crsl-items" data-navigation="navbtns">
            <div class="crsl-wrap">
              <div class="crsl-item">
                <div class="thumbnail1">
                  <img src="<?=SITE_TEMPLATE_PATH?>/img/catalog/book1.jpg" alt="nyc subway">
                  <span class="postdate">Feb 16, 2014</span>
                </div>

                <h3><a href="#">Lorem Ipsum Dolor Sit</a></h3>

                <p>Suspendisse laoreet eu tortor vel dapibus. Etiam auctor nisl mattis, ornare nibh eu, lobortis leo. Sed congue mi eget velit dictum, id dictum massa tempus. Cras lobortis lectus neque. Fusce aliquet mauris ac bibendum pharetra.</p>

                <p class="readmore"><a href="#">Read More &raquo;</a></p>
              </div><!-- post #1 -->

              <div class="crsl-item">
                <div class="thumbnail1">
                  <img src="<?=SITE_TEMPLATE_PATH?>/img/catalog/book2.jpg" alt="danny antonucci">
                  <span class="postdate">Feb 19, 2014</span>
                </div>

                <h3><a href="#">A Look Back over A.K.A Cartoon</a></h3>

                <p>Vestibulum in venenatis velit. Praesent commodo eget purus sed interdum. Curabitur faucibus purus ut erat fermentum posuere. Suspendisse blandit viverra sagittis. Nullam cursus scelerisque lorem ut ornare.</p>

                <p class="readmore"><a href="#">Read More &raquo;</a></p>
              </div><!-- post #2 -->

              <div class="crsl-item">
                <div class="thumbnail1">
                  <img src="<?=SITE_TEMPLATE_PATH?>/img/catalog/book3.jpg" alt="watercolor paints">
                  <span class="postdate">Feb 23, 2014</span>
                </div>

                <h3><a href="#">Watercoloring for Beginners</a></h3>

                <p>Cras eget interdum nunc. Nam suscipit congue augue, id interdum risus adipiscing nec. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nulla non diam id nisi tempus sodales.</p>

                <p class="readmore"><a href="#">Read More &raquo;</a></p>
              </div><!-- post #3 -->

              <div class="crsl-item">
                <div class="thumbnail1">
                  <img src="<?=SITE_TEMPLATE_PATH?>/img/catalog/book4.jpg" alt="apple ipod classic photo">
                  <span class="postdate">Mar 02, 2014</span>
                </div>

                <h3><a href="#">Classic iPods are Back!</a></h3>

                <p>Phasellus condimentum enim nisl, volutpat dapibus turpis euismod nec. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec id elit lorem. Vivamus at eros elit. Nullam cursus euismod purus.</p>

                <p class="readmore"><a href="#">Read More &raquo;</a></p>
              </div><!-- post #4 -->

              <div class="crsl-item">
                <div class="thumbnail1">
                  <img src="<?=SITE_TEMPLATE_PATH?>/img/catalog/book5.jpeg" alt="web design magazines">
                  <span class="postdate">Mar 11, 2014</span>
                </div>

                <h3><a href="#">The 10 Best Web Design Magazines</a></h3>

                <p>Morbi quis tempus leo, eget vestibulum quam. Pellentesque ac orci urna. Proin vitae neque vel metus pulvinar luctus vitae eu nulla.</p>

                <p class="readmore"><a href="#">Read More &raquo;</a></p>
              </div><!-- post #5 -->
            </div><!-- @end .crsl-wrap -->
          </div><!-- @end .crsl-items -->
          <nav class="slidernav">
            <div id="navbtns" class="clearfix1">
              <a href="#" class="previous">prev</a>
              <a href="#" class="next">next</a>
            </div>
          </nav>
        </div><!-- @end #w -->


</div>
<br/>
<?endif;?>
        <? if(ERROR_404=='Y'):?>
         <div class="page-not-found">
       <?else:?>
       <?endif;?> 
 <div class="container">