<?php if (isset($_POST['user_id']) && !empty($_POST['user_id'])) {
    echo print_r($_POST['user_id'], true);
    exit;
} ?>
<div class="col-lg-12 col-md-12"  style="z-index: 4; /*margin-top: 10px;*/">
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
                <?php echo $verification_content; ?>
<!--                <div class="table-text w-100">-->
<!--                    <div class="row">-->
<!--                        <div class="col-3 text-left" style="padding-left: 42px;">-->
<!--                            Имя Фамилия Отчество-->
<!--                        </div>-->
<!--                        <div class="col-2 text-left">-->
<!--                            00002-->
<!--                        </div>-->
<!--                        <div class="col-2 text-left">-->
<!---->
<!--                        </div>-->
<!--                        <div class="col-2 text-right">-->
<!--                            <img src="/wp-content/uploads/2019/12/info.png" class="info-zayavki">-->
<!--                        </div>-->
<!--                        <div class="col-3 text-center">-->
<!--                            <div class="btn-custom-one btn-zayavki">-->
<!--                                Одобрить-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="table-text w-100">-->
<!--                    <div class="row">-->
<!--                        <div class="col-3 text-left" style="padding-left: 42px;">-->
<!--                            Имя Фамилия Отчество-->
<!--                        </div>-->
<!--                        <div class="col-2 text-left">-->
<!--                            00002-->
<!--                        </div>-->
<!--                        <div class="col-2 text-left">-->
<!---->
<!--                        </div>-->
<!--                        <div class="col-2 text-right">-->
<!--                            <img src="/wp-content/uploads/2019/12/info.png" class="info-zayavki">-->
<!--                        </div>-->
<!--                        <div class="col-3 text-center">-->
<!--                            <div class="btn-custom-one btn-zayavki">-->
<!--                                Одобрить-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
            </div>
        </div>

    </div>
</div>

<a style="display: none;" id="modal-54506521" href="#modal-container-54506521" role="button" class="" data-toggle="modal">
</a>
<!--Модальное окно регистрации -->
<div class="modal fade" id="modal-container-54506521" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width: 700px; ">
        <div class="modal-content text-left" style="padding: 20px;">
            <div class="row">
                <div class="col-10">
                    <h1 class="coop_maps-h1 ib">Заявка на верификацию</h1>
                </div>

                <div class="col-2">
                    <button type="button" class="close ib " data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-4 input-exchange">
                        <div class="row">

                            <input placeholder="Имя" type="text" name="">
                        </div>
                    </div>
                    <div class="col-lg-4 input-exchange ">
                        <div class="row ">

                            <div class="select-exchange w-100">
                                <input placeholder="Email" class="" type="email" name="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 input-exchange">
                        <div class="row">

                            <input placeholder="Отчество" class="" type="text" name="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-4 input-exchange">
                        <div class="row">
                            <span>Серия и номер паспорта</span>
                            <input placeholder="____-______"  type="text" name="">
                        </div>
                    </div>
                    <div class="col-lg-4 input-exchange ">
                        <div class="row ">
                            <span>&nbsp;</span>
                            <div class="select-exchange w-100">
                                <input placeholder="Дата выдачи" class="" type="email" name="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 input-exchange">
                        <div class="row">
                            <span>&nbsp;</span>
                            <input placeholder="Код подразделения" class="" type="text" name="">
                        </div>
                    </div>
                    <div class="col-lg-12 input-exchange">
                        <div class="row">
                            <span>&nbsp;</span>
                            <input placeholder="Кем выдан" class="" type="text" name="">
                        </div>
                    </div>
                    <div class="col-lg-12 passport-photo">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="row">
                                    <img src="/wp-content/uploads/2019/12/zg.png">
                                </div>
                            </div>
                            <div class="col-lg-4 ">
                                <div class="row">
                                    <img class="" src="/wp-content/uploads/2019/12/zg.png">
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script type="text/javascript">
    // jQuery('.info-zayavki').click(function(){
    //     //Получаем id текущего пользователя из кнопки
    //     let request_user_id = jQuery(this).parent().next().children('.btn-zayavki').attr('id');
    //     request_user_id = request_user_id.split('_');
    //     request_user_id = request_user_id[request_user_id.length - 1];
    //     request_user_id = parseInt(request_user_id);
    //     console.log(request_user_id);
    //     jQuery('#modal-54506521').trigger('click');
    // });
</script>
<?php


//function my_action_javascript() {
//    ?>
    <script type="text/javascript">
        //jQuery(document).ready(function($) {
            jQuery('.info-zayavki').click(function(){
                //Получаем id текущего пользователя из кнопки
                let request_user_id = jQuery(this).parent().next().children('.btn-zayavki').attr('id');
                request_user_id = request_user_id.split('_');
                request_user_id = request_user_id[request_user_id.length - 1];
                request_user_id = parseInt(request_user_id);
                //console.log(request_user_id);

                var data = {
                    //action: 'my_action',
                    user_id: request_user_id
                };
                //console.log(myajax.url);
                // 'ajaxurl' не определена во фронте, поэтому мы добавили её аналог с помощью wp_localize_script()
                jQuery.post( window.location, data, function(response) {
                    jQuery('#modal-54506521').trigger('click');
                    console.log('Получено с сервера: ' + response);
                });
            });
        //});
    </script>
    <?php
//}
//add_action('wp_ajax_my_action', 'my_action_callback');
//add_action('wp_ajax_nopriv_my_action', 'my_action_callback');
//function my_action_callback() {
//    //$whatever = intval( $_POST['whatever'] );
//    echo print_r($_POST, true);
//    //echo $whatever + 10;
//
//    // выход нужен для того, чтобы в ответе не было ничего лишнего, только то что возвращает функция
//    wp_die();
//}