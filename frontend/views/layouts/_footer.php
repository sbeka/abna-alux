<footer>
    <div class="footer-bg">
        <div class="container">
            <div class="footer-cont-wrap">
                <div class="footer-top d-flex  justify-content-between">
                    <div class="logo"><a href=""><img src="/images/logo-abna.png" alt=""></a></div>
                    <div class="d1">
                        <form>
                            <input type="text" placeholder="Поиск по сайту"class="shadow">
                            <button type="submit"></button>
                        </form>
                    </div>
                    <div class="foot-inp-wrap">

                    </div>
                    <div class="foot-phone">
                        <div class="foot-phone-numb">
                            +7 (727)<span>237-77-89</span>
                            <p>Email: <a href="">Astanaacadeny@mailru</a></p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="footer-middle d-flex justify-content-around">
                    <?$menu = \common\models\Menu::find()->where('footer = 1')->orderBy('sort_footer')->all()?>
                    <ul>
                        <?foreach($menu as $k => $v){?>
                            <?if($k!=0){?>
                                <li>&bull;</li>
                            <?}?>
                            <li><a href="/<?=$v->url?>"><?=$v->name?></a></li>
                        <?}?>
                    </ul>
                </div>
                <hr>
                <div class="footer-second-middle flex-md-row flex-column d-flex justify-content-between">
                    <div class="footer-adres">
                        <span>Вы найдете нас по адресу:</span>
                        <p>г.Алматы, Бизнес центр “Южный”, 5 этаж оф. 41</p>
                        <p>Email: <a href="">Astana@mailru</a> <a href="">Карта проезда</a></p>
                    </div>
                    <div class="footer-shares">
                        <span>Мы в социальных сетях:</span>
                        <ul>
                            <li><a href=""><img src="/images/soc1.png" alt=""></a></li>
                            <li><a href=""><img src="/images/soc2.png" alt=""></a></li>
                            <li><a href=""><img src="/images/soc3.png" alt=""></a></li>
                            <li><a href=""><img src="/images/soc4.png" alt=""></a></li>
                            <li><a href=""><img src="/images/soc5.png" alt=""></a></li>

                        </ul>
                    </div>
                </div>
                <hr>
                <div class="footer-bottom">
                    <div class="foot-copy">
                        <span>© 2018.  Астанинская Академия Бизнес Нетворкинга. Сайт разработан в <a href="" target="_blank">Веб-студии "Алматы Люкс"</a></span>
                        <p>Все права защищены   • <a href="">Договор оферты</a>   • <a href="">Политика конфиденциальности</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>