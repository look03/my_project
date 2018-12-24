<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
?>
 </div>
<?if(ERROR_404=='Y'):?>
</div>
<?else:?>
       <div class="sticky-push"></div>
        <?endif;?>
    </div>
    <footer>
        <div class="sticky-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <address>
                            Тел. (8485) 53-21-24; 35-23-67
                            <a href="mailto:">books@mail.ru</a> <br>
                            Ярославль,  ул.Некрасова, 41А<br>
                        </address>
                    </div>

                    <div class="col-md-4 col-md-push-4">
                        <div class="copyright">
                          Разработка сайта <img  src="<?=SITE_TEMPLATE_PATH?>/img/logo_white.png">
                        </div>
                    </div>

                    <div class="col-md-4 col-md-pull-4 hidden-print">
                        <ul class="list-inline social-links">
                            <li><a href="https://vk.com/arealidea"><i class="fa fa-vk"></i></a></li>
                            <li><a href="https://www.facebook.com/arealidea"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="https://twitter.com/arealidea"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="mailto:info@arealidea.ru"><i class="fa fa-envelope"></i></a></li>
                            <li><a href="https://www.youtube.com/user/wwwarealidearu"><i class="fa fa-youtube"></i></a></li>
                            <li><a href="https://instagram.com/arealidea/"><i class="fa fa-instagram"></i></a></li>
                            <li><div id="bx-composite-banner"></div></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>



     <?
	 $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/vendor/jquery.min.js');
     $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/vendor/responsiveCarousel.min.js');

     ?>
    

    <script type="text/javascript">
    $(function(){
      $('.crsl-items').carousel({
        visible: 3,
        itemMinWidth: 180,
        itemEqualHeight: 370,
        itemMargin: 9,
      });

      $("a[href=#]").on('click', function(e) {
        e.preventDefault();
      });
    });
    </script>
 

    <!--ОБЯЗАТЕЛЬНО ПОДКЛЮЧИТЕ ЭТИ СКРИПТЫ И СТИЛИ-->


    <!--/ОБЯЗАТЕЛЬНО ПОДКЛЮЧИТЕ ЭТИ СКРИПТЫ И СТИЛИ-->

    <!--Слайдер -->

   

    <!--/ОБЯЗАТЕЛЬНО ПОДКЛЮЧИТЕ ЭТИ СКРИПТЫ И СТИЛИ-->

</body>
</html>
