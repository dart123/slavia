<div class="col-lg-12 col-md-12"  style="z-index: 4; /*margin-top: 10px;*/">
    <div class="row">
        <div class="coop_maps question-bg col-lg-12">
            <h1 class="coop_maps-h1 ib">Список пользователей</h1>
            <div class="row people_list">
                <div class="table-title w-100">
                    <div class="row">
                        <div class="col-lg-1">

                        </div>
                        <div class="col-3 text-left">
                            Имя клиента
                        </div>
                        <div class="col-2 text-left client_num_sort">
                            <span>№ Пайщика</span><img class="client_num_sort_icon" src="/wp-content/uploads/2020/05/sort_icon.png">
                        </div>
                        <div class="col-3 text-left">
                            Дата регистрации
                        </div>
<!--                        <div class="col-2 text-left">-->
<!--                            Рефереалов-->
<!--                        </div>-->
                        <div class="col-2 text-left">

                        </div>

                    </div>
                </div>

                <?php if (is_var($people)): ?>
                    <?php foreach ($people as $user): ?>
                        <div class="table-text w-100 user-single" data-user-id="<?=$user['id']?>">
                            <div class="row">
                                <div class="col-lg-1 text-center">
                                    <?php $is_verified = $user['is_verified'];
                                    if (isset($is_verified) && $is_verified == 'yes'): ?>
                                        <img src="/wp-content/uploads/2019/12/verification_ok.png">
                                    <?php else: ?>
                                        <img src="/wp-content/uploads/2019/12/verification_bad.png">
                                    <?php endif; ?>
                                </div>
                                <div class="col-3 text-left">
                                    <?php echo $user['display_name'] ?>
                                </div>
                                <div class="col-2 text-left">
                                    <?php echo $user['client_num'] ?>
                                </div>
                                <div class="col-3 text-left">
                                    <?php echo $user['user_registered'] ?>
                                </div>
                                <!--        <div class="col-2 text-left">-->
                                <!--            0-->
                                <!--        </div>-->
                                <div class="col-3 text-center show_user_operations">
                                    <img src="/wp-content/uploads/2019/12/people_href.png">
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

                <?php //if (is_var($shortcode)) echo $shortcode; //do_shortcode("[userlist template='slavia' inpage='10' data='user_registered,profile_fields' orderby='user_registered' exclude='30']"); ?>
<!--                <div style="display: none">-->
                <?php //echo do_shortcode("[userlist template='slavia' inpage='10' data='user_registered,profile_fields' orderby='client_num' order='DESC' exclude='30']"); //user_registered ?>


            </div>
        </div>
    </div>
</div>

<a style="display: none;" id="modal-54506521" href="#modal-container-54506521" role="button" class="" data-toggle="modal">
</a>
<!--Модальное окно регистрации -->
<div class="modal fade" id="modal-container-54506521" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width: 800px; ">
        <div class="modal-content text-left" style="padding: 40px;">
            <div class="row">
                <div class="col-10">
                    <h1 class="coop_maps-h1 ib">Данные пользователя:</h1>
                </div>

                <div class="col-2">
                    <button type="button" class="close ib " data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

            </div>

            <div class="row" id="userdata_content">
                <div class="col-12 input-exchange">
                    <div class="row">
                        <span>Имя пользователя</span>
                        <input disabled class="username" placeholder="Имя пользователя" type="text" name="">
                    </div>
                </div>
                <div class="col-lg-12 input-exchange ">
                    <div class="row ">
                        <span>Email</span>
                        <input disabled class="user_email" placeholder="Email" type="text" name="">
                    </div>
                </div>

                <div class="col-lg-12 input-exchange">
                    <div class="row">
                        <span>Телефон</span>
                        <input disabled class="user_phone" placeholder="Телефон" type="text" name="">
                    </div>
                </div>

                <div class="col-lg-12 input-exchange">
                    <form class="row" name="client_num" id="form_client_num" action="" method="post" enctype="multipart/form-data">
                        <span>Номер пайщика</span>
                        <input disabled class="client_num" placeholder="Номер пайщика" type="text" name="client_num">
                        <input type="submit" class="btn-custom-one text-center" id="save_client_num_btn" value="Сохранить номер пайщика" name="submit" style=""/>
                        <span class="client_num_success_text">Успешно сохранено!</span>
                        <span class="client_num_fail_text">При сохранении произошла ошибка!</span>
                    </form>
                </div>

                <div class="col-12">
                    <div class="row">

                        <div class="col-lg-6 input-exchange ">
                            <div class="row ">
                                <span>Верифицирован</span>
                                <input disabled class="is_verified" placeholder="Верифицирован" type="text" name="">
                            </div>
                        </div>
                        <div class="col-lg-6 input-exchange">
                            <div class="row">
                                <span>Реферальная ссылка</span>
                                <input disabled class="user_ref_link" placeholder="Реферальная ссылка" type="text" name="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <h1 class="coop_maps-h1 ib">Верификация пользователя:</h1>
            </div>

            <div class="row" id="verification_content">

                <div class="col-12" id="no_verification">
                    <div class="row">
                        <div class="col-12 text-center">
                            Для данного пользователя не найдены верификационные данные.
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-lg-4 input-exchange">
                            <div class="row">
                                <span>Адрес PRIZM</span>
                                <input disabled class="verification_prizm_address" placeholder="Адрес PRIZM" type="text" name="">
                            </div>
                        </div>
                        <div class="col-lg-4 input-exchange">
                            <div class="row">
                                <span>Публичный ключ</span>
                                <div class="select-exchange w-100">
                                    <input disabled class="verification_prizm_public_key" placeholder="Публичный ключ" type="text" name="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 input-exchange">
                            <div class="row">
                                <span>Адрес Slav</span>
                                <input disabled class="verification_waves_address" placeholder="Адрес Slav" type="text" name="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="row">
                        <div class="col-lg-4 input-exchange">
                            <div class="row">
                                <span>Имя</span>
                                <input disabled class="verification_name" placeholder="Имя" type="text" name="">
                            </div>
                        </div>
                        <div class="col-lg-4 input-exchange ">
                            <div class="row ">
                                <span>Фамилия</span>
                                <div class="select-exchange w-100">
                                    <input disabled class="verification_surname" placeholder="Фамилия" type="text" name="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 input-exchange">
                            <div class="row">
                                <span>Отчество</span>
                                <input disabled class="verification_last_name" placeholder="Отчество" type="text" name="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-lg-4 input-exchange">
                            <div class="row">
                                <span>Серия и номер паспорта</span>
                                <input disabled class="verification_passport_number" placeholder="____-______"  type="text" name="">
                            </div>
                        </div>
                        <div class="col-lg-4 input-exchange ">
                            <div class="row ">
                                <span>Дата выдачи</span>
                                <div class="select-exchange w-100">
                                    <input disabled class="verification_passport_date" placeholder="Дата выдачи" type="date" name="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 input-exchange">
                            <div class="row">
                                <span>Код подразделения</span>
                                <input disabled class="verification_passport_code" placeholder="Код подразделения" type="text" name="">
                            </div>
                        </div>
                        <div class="col-lg-12 input-exchange">
                            <div class="row">
                                <span>Кем выдан</span>
                                <input disabled class="verification_passport_who" placeholder="Кем выдан" type="text" name="">
                            </div>
                        </div>
                        <div class="col-lg-8 input-exchange ">
                            <div class="row ">
                                <span>Место жительства по прописке</span>
                                <div class="select-exchange w-100" style="padding-left: 0 !important;">
                                    <input disabled class="verification_passport_address" placeholder="Место жительства по прописке" type="text" name="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 input-exchange">
                            <div class="row">
                                <span>Индекс</span>
                                <input disabled class="verification_passport_index" placeholder="Индекс" type="text" name="">
                            </div>
                        </div>
                        <div class="col-lg-12 passport-photo">
                            <div class="row">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <h1 class="coop_maps-h1 ib">Операции пользователя:</h1>
            </div>

            <div class="row" id="exchange_content">
                <div class="table-title w-100">
                    <div class="row">
                        <div class="col-2 text-center">
                            Дата
                        </div>
                        <div class="col-2 text-center">
                            Отдаю
                        </div>
                        <div class="col-2 text-center">
                            Получаю
                        </div>
                        <div class="col-2 text-center">
                            КОЛИЧЕСТВО
                        </div>
                        <div class="col-4 text-center">
                            СТАТУС
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-12">
                <h1 class="coop_maps-h1 ib">Статистика пользователя:</h1>
            </div>

            <div class="row stats" id="stats_content">
                <div class="table-title w-100">
                    <div class="row">

                        <div class="col-2 text-center stats_col" style="/*padding-left: 42px;*/">
                            <p>Имя клиента</p>
                        </div>
                        <div class="col-2 text-center stats_col">
                            Номер пайщика
                        </div>
                        <div class="col-2 text-center stats_col">
                            RUB сумма
                        </div>
                        <div class="col-1 text-center stats_col">
                            RUB обменов
                        </div>
                        <div class="col-2 text-center stats_col">
                            PRIZM сумма
                        </div>
                        <div class="col-1 text-center stats_col">
                            PRIZM обменов
                        </div>
                        <div class="col-1 text-center stats_col">
                            SLAV сумма
                        </div>
                        <div class="col-1 text-center stats_col">
                            SLAV обменов
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>
</div>

<script type="text/javascript">
    function init_events()
    {
        //По клику получить exchange_requests и stats для этого пользователя
        jQuery('.user-single .show_user_operations').click(function(){
            let el = jQuery(this);
            let modal = jQuery('#modal-container-54506521');
            let request_user_id = el.parents('.user-single').attr('data-user-id');

            var data = {
                request_user_id: request_user_id,
                get_user_operations: 'true',
                get_user_stats: 'true'
            };
            //Стираем предыдущий юзер id в форме номера пайщика
            modal.find('.modal-content #form_client_num').attr('data-user-id', '');
            jQuery.post( window.location, data, function(response) {
                if (response) {
                    let user_data = JSON.parse(response);

                    if (response.exchange_content !== '') {
                        modal.find('.modal-content > #exchange_content .table-text').remove();
                        modal.find('.modal-content > #exchange_content').append(user_data.exchange_content);
                    }
                    if (response.stats_content !== '') {
                        modal.find('.modal-content > #stats_content .table-text').remove();
                        modal.find('.modal-content > #stats_content').append(user_data.stats_content);
                    }
                    if (response.verification_content !== '')
                    {
                        if (user_data.verification_content !== 'false') {
                            modal.find('.modal-content > #verification_content').children().not('#no_verification').css('display', 'block');
                            modal.find('.modal-content > #verification_content #no_verification').css('display', 'none');
                            let verification_data = user_data.verification_content;

                            jQuery.each(verification_data, function (item) {
                                if (item !== 'passport_photos')
                                    if (modal.find('.verification_' + item).length > 0)
                                        modal.find('.verification_' + item).val(verification_data[item]);
                            });
                            //Очищаем место для фотографий
                            modal.find('.passport-photo').children('.row').empty();

                            jQuery.each(verification_data['passport_photos'], function (photo) {
                                modal.find('.passport-photo').children('.row')
                                    .append('<div class="col-lg-4">' +
                                        '<div class="row">' +
                                        '<img src="' + verification_data['passport_photos'][photo] + '">' +
                                        '</div>' +
                                        '</div>');
                                //console.log(verification_data['passport_photos'][photo]);
                            });
                            //jQuery('#modal-54506521').trigger('click');
                        }
                        else
                        {
                            modal.find('.modal-content > #verification_content').children().css('display', 'none');
                            modal.find('.modal-content > #verification_content #no_verification').css('display', 'block');
                        }
                        //console.log('Нет верификации для этого пользователя');
                    }
                    if (response.userdata_content !== '')
                    {
                        let userdataContent = user_data.userdata_content;
                        let userdata_inputs = modal.find('#userdata_content input');
                        jQuery.each(userdataContent, function (item) {
                            if (modal.find('#userdata_content input.' + item).length > 0)
                            {
                                let cur_input = modal.find('#userdata_content input.' + item);
                                switch (item)
                                {
                                    case 'is_verified':
                                        if (userdataContent[item] === '')
                                            cur_input.val('Нет');
                                        else
                                            cur_input.val('Да');
                                        break;
                                    case 'client_num':
                                        cur_input.val(userdataContent[item]);

                                        //Присваиваем форме сохранения номера пайщика текущий id юзера
                                        modal.find('.modal-content #form_client_num').attr('data-user-id', request_user_id);

                                        //Если пустой номер пайщика, добавляем возможность задать его
                                        if (userdataContent[item] === '')
                                        {
                                            cur_input.removeAttr('disabled');
                                            cur_input.next('#save_client_num_btn').css('display', 'block');
                                        }
                                        else
                                        {
                                            cur_input.attr('disabled', 'disabled');
                                            cur_input.next('#save_client_num_btn').css('display', 'none');
                                        }
                                        break;
                                    default:
                                        cur_input.val(userdataContent[item]);
                                        break;
                                }
                            }
                        });
                    }
                    jQuery('#modal-54506521').trigger('click');

                }
            });
        });
    }
    //Сортировка по номеру пайщика
    jQuery('.people_list .table-title img.client_num_sort_icon').click(function(){
        let el = jQuery(this);
        let is_complete = el.hasClass('complete');
        if (!is_complete) {
            var data = {
                people_sort: true,
                sort_field: 'client_num'
            };
        }
        else {
            var data = {
                people_sort: false,
                sort_field: 'client_num'
            };
        }
        jQuery.post( window.location, data, function(response) {
            //console.log(response);
            if (response) {
                var people_data = JSON.parse(response);
                //Очищаем поле для списка людей
                jQuery('.people_list > .table-title ~ .table-text, .people_list > .table-title ~ .rcl-pager').remove();

                people_data.forEach((user) => {
                    jQuery('.people_list').append(
                        '<div class="table-text w-100 user-single" data-user-id="' + user.id + '">' +
                            '<div class="row">' +
                                '<div class="col-lg-1 text-center">' +
                                    (user.is_verified === 'yes' ?
                                        '<img src="/wp-content/uploads/2019/12/verification_ok.png">' :
                                        '<img src="/wp-content/uploads/2019/12/verification_bad.png">') +
                                '</div>' +
                                '<div class="col-3 text-left">' + user.display_name + '</div>' +
                                '<div class="col-2 text-left">' + user.client_num + '</div>' +
                                '<div class="col-3 text-left">' + user.user_registered + '</div>' +
                                '<div class="col-3 text-center show_user_operations">' +
                                    '<img src="/wp-content/uploads/2019/12/people_href.png">' +
                                '</div>' +
                            '</div>' +
                        '</div>'
                    );
                });
                init_events();
                //console.log(people_data);
                //jQuery('.people_list').append(response);

                if (!is_complete)
                    el.addClass('complete');
                else
                    el.removeClass('complete');
            }
        });
    });

    //Сохранение номера пайщика
    //jQuery(document).ready(function() {
    jQuery('#form_client_num').on("submit", function(event) {
        var $this = jQuery(this);

        var frmValues = $this.serialize();

        let request_user_id = $this.attr('data-user-id');

        data = {
            save_client_num: true,
            client_num: frmValues,
            request_user_id: request_user_id
        };

        jQuery.post(window.location, data, function(response)
        {
            let message_selector = response === 'false' ? '.client_num_fail_text' : '.client_num_success_text';
            jQuery(message_selector)
                .fadeToggle(1000, 'swing', function(){
                    jQuery(this).fadeToggle(1000, 'swing');
                });

            let client_num_input =  $this.find('input.client_num');

            if (response !== 'false') {
                client_num_input.val(response);
                client_num_input.attr('disabled', 'disabled');
                jQuery('#save_client_num_btn').css('display', 'none');
            }
        });
        event.preventDefault();
    });

    init_events();
    //});
</script>