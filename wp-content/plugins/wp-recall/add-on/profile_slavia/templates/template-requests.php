<div class="col-lg-12 col-md-12"  style="z-index: 4; /*margin-top: 10px;*/">
    <div class="row">
        <div class="coop_maps question-bg col-lg-12 exchange_requests">
            <div class="row">
                <div class="col-12">
                    <h1 class="coop_maps-h1 ib">Заявки на обмен</h1>
                    <div class="ib" style="float:right">
<!--                        <h1 class="coop_maps-h1 ib" style="font-size: 16px;">08.11.19</h1>-->
<!--                        <img id="date-btn" src="/wp-content/uploads/2019/12/calendar.png" class="ib" style="">-->
                        <input class="datepicker" disabled="disabled" />

                        <input placeholder="Для поиска нажмите enter" name="filter" class="search" value="" />
                        <img class="search-btn ib" src="/wp-content/uploads/2019/12/loop.png" style="margin-top: 10px;">
                        <!-- <img src="/wp-content/uploads/2019/12/donw.png" class="ib" style=" "> -->
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="table-title w-100" style="height: 55px">
                    <div class="row">

                        <div class="col-2 text-left" style="padding-left: 42px;">
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
                <?php if(isset($exchange_content) && !empty($exchange_content)) echo $exchange_content; ?>
            </div>
        </div>
        <div class="coop_maps question-bg col-lg-12 verification_requests">
            <div class="row">
                <div class="col-12">
                    <h1 class="coop_maps-h1 ib">Заявки на верификацию</h1>
                    <div class="ib" style="float:right">

                        <input class="datepicker" disabled="disabled" />

                        <input placeholder="Для поиска нажмите enter" name="filter" class="search" value="" />
                        <img class="search-btn ib" src="/wp-content/uploads/2019/12/loop.png" style="margin-top: 10px;">
<!--                        <h1 class="coop_maps-h1 ib" style="font-size: 16px;">08.11.19</h1>-->
<!--                        <img src="/wp-content/uploads/2019/12/calendar.png" class="ib" style="">-->
<!--                        <img src="/wp-content/uploads/2019/12/loop.png" class="ib" style="margin-top: 10px;">-->
                        <!-- <img src="/wp-content/uploads/2019/12/donw.png" class="ib" style=" "> -->
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="table-title w-100" style="height: 55px">
                    <div class="row">

                        <div class="col-2 text-left" style="padding-left: 42px;">
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
                <?php if(isset($verification_content) && !empty($verification_content)) echo $verification_content; ?>

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
                            <span>Адрес PRIZM</span>
                            <input class="verification_prizm_address" placeholder="Адрес PRIZM" type="text" name="">
                        </div>
                    </div>
                    <div class="col-lg-4 input-exchange">
                        <div class="row">
                            <span>Публичный ключ</span>
                            <div class="select-exchange w-100">
                                <input class="verification_prizm_public_key" placeholder="Публичный ключ" type="text" name="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 input-exchange">
                        <div class="row">
                            <span>Адрес Slav</span>
                            <input class="verification_waves_address" placeholder="Адрес Slav" type="text" name="">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="row">
                    <div class="col-lg-4 input-exchange">
                        <div class="row">
                            <span>Продает</span>
                            <input class="verification_input_sum" placeholder="Продает" type="text" name="">
                        </div>
                    </div>
                    <div class="col-lg-4 input-exchange ">
                        <div class="row ">
                            <span>Покупает</span>
                            <div class="select-exchange w-100">
                                <input class="verification_output_sum" placeholder="Покупает" type="text" name="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 input-exchange">
                        <div class="row">
                            <span>Время подачи заявки</span>
                            <input class="verification_exchange_date" placeholder="Дата" type="text" name="">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="row">
                    <div class="col-lg-6 input-exchange">
                        <div class="row">
                            <span>Выбранный банк</span>
                            <input class="verification_bank" placeholder="Выбранный банк" type="text" name="">
                        </div>
                    </div>
                    <div class="col-lg-6 input-exchange">
                        <div class="row">
                            <span>Номер карты</span>
                            <input class="verification_card_num" placeholder="Номер карты" type="text" name="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 input-exchange">
                        <div class="row">
                            <span>ФИО держателя карты</span>
                            <input class="verification_card_name" placeholder="ФИО держателя карты" type="text" name="">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 input-exchange">
                        <div class="row">
                            <span>Тип целевого взноса</span>
                            <input class="verification_deposit_type" placeholder="Тип целевого взноса" type="text" name="">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div id="other_payments_is_public" class="col-lg-2 input-exchange">
                        <div class="select-exchange w-100">
                            <input type="checkbox" class="personal_deposit verification_is_public" name="" disabled>
                            <span>Публичное имущество</span>
                        </div>
                    </div>

                    <div id="other_payments_is_save" class="col-lg-2 input-exchange">
                        <div class="select-exchange w-100">
                            <input type="checkbox" class="personal_deposit verification_is_save" name="" disabled>
                            <span>Спасти имущество</span>
                        </div>
                    </div>

                    <div id="other_payments_is_reserve" class="col-lg-2 input-exchange">
                        <div class="select-exchange w-100">
                            <input type="checkbox" class="personal_deposit verification_is_reserve" name="" disabled>
                            <span>Резерв за пайщиком</span>
                        </div>
                    </div>

                    <div id="other_payments_reserve_id" class="col-lg-6 input-exchange">
                        <div class="select-exchange w-100">
                            <span>Номер пайщика</span>
                            <?php //$client_nums = get_client_nums(); ?>
                            <select id="personal_deposit_reserve_id" class="personal_deposit verification_reserve_id" name="" disabled>
<!--                                <option selected disabled>Выберите номер пайщика</option>-->
                                <!--                            --><?php //foreach ($client_nums as $client_num): ?>
                                <!--                                --><?php //if ($client_num['user_id'] == get_current_user_id())
                                //                                    continue;
                                //                                ?>
                                <!--                                <option value="--><?//=$client_num['user_id']?><!--">--><?//=$client_num['client_num']?><!--</option>-->
                                <!--                            --><?php //endforeach; ?>
                            </select>
                        </div>
                    </div>

                </div>

            </div>


            <div class="col-12">
                <div class="row">
                    <div class="col-lg-4 input-exchange">
                        <div class="row">
                            <span>Имя</span>
                            <input class="verification_name" placeholder="Имя" type="text" name="">
                        </div>
                    </div>
                    <div class="col-lg-4 input-exchange ">
                        <div class="row ">
                            <span>Фамилия</span>
                            <div class="select-exchange w-100">
                                <input class="verification_surname" placeholder="Фамилия" type="text" name="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 input-exchange">
                        <div class="row">
                            <span>Отчество</span>
                            <input class="verification_last_name" placeholder="Отчество" type="text" name="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-4 input-exchange">
                        <div class="row">
                            <span>Серия и номер паспорта</span>
                            <input class="verification_passport_number" placeholder="____-______"  type="text" name="">
                        </div>
                    </div>
                    <div class="col-lg-4 input-exchange ">
                        <div class="row ">
                            <span>Дата выдачи</span>
                            <div class="select-exchange w-100">
                                <input class="verification_passport_date" placeholder="Дата выдачи" type="date" name="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 input-exchange">
                        <div class="row">
                            <span>Код подразделения</span>
                            <input class="verification_passport_code" placeholder="Код подразделения" type="text" name="">
                        </div>
                    </div>
                    <div class="col-lg-12 input-exchange">
                        <div class="row">
                            <span>Кем выдан</span>
                            <input class="verification_passport_who" placeholder="Кем выдан" type="text" name="">
                        </div>
                    </div>
                    <div class="col-lg-8 input-exchange ">
                        <div class="row ">
                            <span>Место жительства по прописке</span>
                            <div class="select-exchange w-100" style="padding-left: 0 !important;">
                                <input class="verification_passport_address" placeholder="Место жительства по прописке" type="text" name="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 input-exchange">
                        <div class="row">
                            <span>Индекс</span>
                            <input class="verification_passport_index" placeholder="Индекс" type="text" name="">
                        </div>
                    </div>
                    <div class="col-lg-12 passport-photo">
                        <div class="row"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script type="text/javascript">
    //Получение id пользователя из id кнопки

    function fill_modal(modal_type, data)
    {
        //console.log(data);
        var modal_el = jQuery('#modal-container-54506521');
        let header = jQuery('.modal-content h1');

        if (modal_type === 'exchange')
        {
            header.text('Детали запроса');
            let fields_to_fill = jQuery(
                '.verification_prizm_address, .verification_prizm_public_key, .verification_waves_address' +
                ', .verification_input_sum, .verification_output_sum, .verification_exchange_date' +
                ', .verification_bank, .verification_card_num, .verification_card_name, .verification_deposit_type' +
                ', .verification_is_public, .verification_is_save, .verification_is_reserve, .verification_reserve_id');
            let fields_to_hide = jQuery('.modal-content input').not(fields_to_fill);

            fields_to_fill.parents('.input-exchange').css('display', 'block');
            fields_to_hide.parents('.input-exchange').css('display', 'none');
            jQuery('.passport-photo').css('display', 'none');

            //console.log(data);

            jQuery('#other_payments_reserve_id').css('visibility', 'visible');
        }
        else
            if (modal_type === 'verification')
            {
                header.text('Заявка на верификацию');
                let fields_to_hide = jQuery('.verification_error, .verification_input_sum, .verification_output_sum, .verification_exchange_date');
                let fields_to_fill = jQuery('.modal-content input').not(fields_to_hide);
                fields_to_fill.parents('.input-exchange').css('display', 'block');
                fields_to_hide.parents('.input-exchange').css('display', 'none');

                jQuery('.passport-photo').css('display', 'block');
            }

        jQuery('.verification_deposit_type').val('');

        //Заполняем данными нужные поля
        jQuery.each(data, function (item) {
            if (item !== 'passport_photos')
            {
                if (item === 'is_public' || item === 'is_reserve' || item === 'is_save')
                {
                    if (data[item] === true) {
                        modal_el.find('.verification_' + item).prop("checked", true);
                        if (item === 'is_reserve') {
                            if (typeof data['reserve_id'] !== 'undefined')
                                modal_el.find('.verification_reserve_id').append('<option selected>' + data['reserve_id'] + '</option>');
                        }
                    }
                    else
                        modal_el.find('.verification_' + item).prop("checked", false);
                }

                if (modal_el.find('.verification_' + item).length > 0)
                    modal_el.find('.verification_' + item).val(data[item]);

            }
        });

        if (modal_type === 'verification') {
            //Очищаем место для фотографий
            modal_el.find('.passport-photo').children('.row').empty();

            jQuery.each(data['passport_photos'], function (photo) {
                modal_el.find('.passport-photo').children('.row')
                    .append('<div class="col-lg-4">' +
                        '<div class="row">' +
                        '<img src="' + data['passport_photos'][photo] + '">' +
                        '</div>' +
                        '</div>');

            });
        }
        jQuery('#modal-54506521').trigger('click');
    }

    function init_btn_events()
    {
        //Открытие модального окна с данными верификации данного пользователя
        jQuery('.verification_requests .info-zayavki, .exchange_requests .info-zayavki').click(function(){
            //Получаем id текущего пользователя из кнопки
            let request_user_id = request_get_user_id(jQuery(this).parent().next().children('.btn-zayavki, .waiting_for_user_approval, .approved_by_user'));
            //console.log(request_user_id);
            var is_exchange;
            if (jQuery(this).parents('.exchange_requests').length > 0)
                is_exchange = 'true';
            else
                is_exchange = 'false';
            var data = {
                //action: 'my_action',
                request_user_id: request_user_id,
                is_exchange: is_exchange
            };
            if (is_exchange === 'true')
            {
                let request_num = jQuery(this).parents('div.table-text').find('.btn-zayavki, .waiting_for_user_approval, .approved_by_user')
                    .attr('data-request_num');
                data['request_num'] = request_num;
            }
            //console.log(myajax.url);
            // 'ajaxurl' не определена во фронте, поэтому мы добавили её аналог с помощью wp_localize_script()
            jQuery.post( window.location, data, function(response) {
                //console.log(response);
                if (response && response !== 'false') {
                    let data = JSON.parse(response);
                    let modal_type = is_exchange === 'true' ? 'exchange' : 'verification';

                    fill_modal(modal_type, data);
                }
                else
                if (response === 'false')
                    fill_modal('error', 'Данные этого пользователя не найдены');
            });
        });
        //Нажатие кнопки "одобрить"
        jQuery('.verification_requests .btn-zayavki').click(function() {
            let request_user_id = request_get_user_id(jQuery(this));
            var data = {
                request_user_id: request_user_id,
                approve_request: 'true',
                is_exchange: 'false'
            };
            var el = jQuery(this);
            jQuery.post( window.location, data, function(response) {
                if (response == 'true') {
                    el.parents('.table-text').remove();
                }
            });
        });

        jQuery('.exchange_requests .btn-zayavki').click(function(){
            let request_user_id = request_get_user_id(jQuery(this));
            let request_num = jQuery(this).attr('data-request_num');
            var data = {
                request_user_id: request_user_id,
                approve_exchange: 'true',
                request_num: request_num
            };
            var el = jQuery(this);
            jQuery.post( window.location, data, function(response) {
                if (response == 'true') {
                    el.parents('.table-text').remove();
                }
            });
        });

        jQuery('.remove_operation').click(function(){
            let el = jQuery(this);
            let request_type;
            if (el.parents('.exchange_requests').length > 0)
                request_type = 'exchange_request';
            else
                if (el.parents('.verification_requests').length > 0)
                    request_type = 'verification_request';

            if (confirm("Удалить данный запрос?") == true)
            {
                if (request_type === 'exchange_request')
                    var data = {
                        remove_request: 'true',
                        request_type: request_type,
                        request_num: jQuery(this).data('request_num'),
                        user_id: jQuery(this).data('user_id')
                    };
                //If verification request, there's no request_num
                else
                    if (request_type === 'verification_request')
                        var data = {
                            remove_request: 'true',
                            request_type: request_type,
                            user_id: jQuery(this).data('user_id')
                        };
                jQuery.post( window.location, data, function(response) {
                    if (response == 'true') {
                        el.parents('.table-text').remove();
                    }
                });
            }
            else
            {
                return;
            }
        });
    }

    init_btn_events();
    //Фильтрация
    // jQuery('#search').blur(function(){
    //     let el = jQuery(this);
    //     let search = {
    //         type: 'word',
    //         datatype: 'exchange_requests',
    //         val: el.val()
    //     };
    //     let output_el = jQuery('.exchange_requests .table-title').parent();
    //     search_ajax(el, search, search_callback, output_el);
    // });
    jQuery('.search').keyup(function(event){
        var code = (event.keyCode ? event.keyCode : event.which);
        if (code == 13) {
            let el = jQuery(this);
            let request_type;
            if (el.parents('.exchange_requests').length > 0)
                request_type = 'exchange_requests';
            else
                if (el.parents('.verification_requests').length > 0)
                    request_type = 'verification_requests';
            let search = {
                type: 'word',
                datatype: request_type,
                val: el.val()
            };
            let output_el = jQuery('.' + request_type + ' .table-title').parent();
            search_ajax(el, search, search_callback, output_el);
        }
        else {
            event.preventDefault();
            return false;
        }
    });
    jQuery('.search').blur(function() {
        let el = jQuery(this);
        let request_type;
        if (el.parents('.exchange_requests').length > 0)
            request_type = 'exchange_requests';
        else
        if (el.parents('.verification_requests').length > 0)
            request_type = 'verification_requests';
        let search = {
            type: 'word',
            datatype: request_type,
            val: el.val()
        };
        let output_el = jQuery('.' + request_type + ' .table-title').parent();
        search_ajax(el, search, search_callback, output_el);
    });
    jQuery('input.datepicker').change(function(){
        let el = jQuery(this);
        let request_type;
        if (el.parents('.exchange_requests').length > 0)
            request_type = 'exchange_requests';
        else
        if (el.parents('.verification_requests').length > 0)
            request_type = 'verification_requests';
        let search = {
            type: 'date',
            datatype: request_type,
            val: el.val()
        };
        let output_el = jQuery('.' + request_type + ' .table-title').parent();
        search_ajax(el, search, search_callback, output_el);
    });

    function search_callback(response, output_el)
    {
        output_el.children().not('.table-title').remove();
        output_el.append(response);
        init_btn_events();
    }

</script>