<?php /* Template Name: Менеджер заявки */ ?>
<?php    get_header(); ?>


    <div class="col-lg-2 left-panel d-none d-lg-block" style=" margin-top: 10px;">
        <div class="coop_maps question-bg col-lg-12 col-md-4">
            <div class="row ">
                <div class="col-12 text-center" >
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'left-menu',
                        'menu_id'        => 'left-menu',
                        'menu_class'        => 'left-menu',
                        'container'     =>   '',
                        'link_before'    =>   "<div class='profil-user-menu-item w-100 text-center'><img><p>",
                        'link_after'    =>    "</p></div>",
                    ) );
                    ?>
                </div>
            </div>
        </div>


        <div class="coop_maps question-bg col-lg-12 col-md-4">
            <div class="row ">
                <div class="col-12 text-center" >
                    <h1 class="coin-num ">
                        0.897600
                    </h1>
                    <h1 class="coin-num-name ">
                        prizm
                    </h1>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-4">
            <div class="row">
                <div class="col-12 text-center">
                    <img src="/wp-content/uploads/2019/12/chat_ico.png" class="chat_ico">
                </div>
            </div>

        </div>
    </div>

    <div class="col-lg-10 col-md-12"  style="z-index: 4; margin-top: 10px;">
        <div class="row">
            <div class="coop_maps question-bg col-lg-12">
                <div class="row">
                    <div class="col-12">
                        <h1 class="coop_maps-h1 ib">Заявки на обмен</h1>
                        <div class="ib" style="float:right">
                            <h1 class="coop_maps-h1 ib" style="font-size: 16px;">08.11.19</h1>
                            <img src="/wp-content/uploads/2019/12/calendar.png" class="ib" style="">
                            <img src="/wp-content/uploads/2019/12/loop.png" class="ib" style="margin-top: 10px;">
                            <!-- <img src="/wp-content/uploads/2019/12/donw.png" class="ib" style=" "> -->
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="table-title w-100">
                        <div class="row">

                            <div class="col-3 text-left" style="padding-left: 42px;">
                                Имя клиента
                            </div>
                            <div class="col-2 text-left">
                                № пайщика
                            </div>
                            <div class="col-2 text-left">
                                Получение
                            </div>
                            <div class="col-2 text-left">
                                Cуммa
                            </div>
                        </div>
                    </div>
                    <div class="table-text w-100">
                        <div class="row">
                            <div class="col-3 text-left" style="padding-left: 42px;">
                                Имя Фамилия Отчество
                            </div>
                            <div class="col-2 text-left">
                                00002
                            </div>
                            <div class="col-2 text-left">
                                PRIZM
                            </div>
                            <div class="col-2 text-left">
                                0.98760
                                <img src="/wp-content/uploads/2019/12/info.png" class="info-zayavki">
                            </div>
                            <div class="col-3 text-center">
                                <div class="btn-custom-one btn-zayavki">
                                    Закрыть сделку
                                </div>
                            </div>
                        </div>
                    </div><div class="table-text w-100">
                        <div class="row">
                            <div class="col-3 text-left" style="padding-left: 42px;">
                                Имя Фамилия Отчество
                            </div>
                            <div class="col-2 text-left">
                                00002
                            </div>
                            <div class="col-2 text-left">
                                PRIZM
                            </div>
                            <div class="col-2 text-left">
                                0.98760
                                <img src="/wp-content/uploads/2019/12/info.png" class="info-zayavki">
                            </div>
                            <div class="col-3 text-center">
                                <div class="btn-custom-one btn-zayavki">
                                    Закрыть сделку
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="coop_maps question-bg col-lg-12">
                <div class="row">
                    <div class="col-12">
                        <h1 class="coop_maps-h1 ib">Заявки на верификацию</h1>
                        <div class="ib" style="float:right">
                            <h1 class="coop_maps-h1 ib" style="font-size: 16px;">08.11.19</h1>
                            <img src="/wp-content/uploads/2019/12/calendar.png" class="ib" style="">
                            <img src="/wp-content/uploads/2019/12/loop.png" class="ib" style="margin-top: 10px;">
                            <!-- <img src="/wp-content/uploads/2019/12/donw.png" class="ib" style=" "> -->
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="table-title w-100">
                        <div class="row">

                            <div class="col-3 text-left" style="padding-left: 42px;">
                                Имя клиента
                            </div>
                            <div class="col-2 text-left">
                                № пайщика
                            </div>
                            <div class="col-2 text-left">

                            </div>
                            <div class="col-2 text-left">

                            </div>
                        </div>
                    </div>
                    <div class="table-text w-100">
                        <div class="row">
                            <div class="col-3 text-left" style="padding-left: 42px;">
                                Имя Фамилия Отчество
                            </div>
                            <div class="col-2 text-left">
                                00002
                            </div>
                            <div class="col-2 text-left">

                            </div>
                            <div class="col-2 text-right">
                                <img src="/wp-content/uploads/2019/12/info.png" class="info-zayavki">
                            </div>
                            <div class="col-3 text-center">
                                <div class="btn-custom-one btn-zayavki">
                                    Одобрить
                                </div>
                            </div>
                        </div>
                    </div><div class="table-text w-100">
                        <div class="row">
                            <div class="col-3 text-left" style="padding-left: 42px;">
                                Имя Фамилия Отчество
                            </div>
                            <div class="col-2 text-left">
                                00002
                            </div>
                            <div class="col-2 text-left">

                            </div>
                            <div class="col-2 text-right">
                                <img src="/wp-content/uploads/2019/12/info.png" class="info-zayavki">
                            </div>
                            <div class="col-3 text-center">
                                <div class="btn-custom-one btn-zayavki">
                                    Одобрить
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

<?php
//get_sidebar();
get_footer();
