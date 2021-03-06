<div class="col-lg-12 col-md-12"  style="z-index: 4; /*margin-top: 10px;*/">
    <div class="row">
        <div class="coop_maps question-bg col-lg-12">
            <div class="row">
                <div class="col-12">
                    <h1 class="coop_maps-h1 ib">Мои заявки</h1>
        <!--            <img src="/wp-content/uploads/2019/12/calendar.png" class="ib" style="float: right; margin-top: 20px;">-->
        <!--            <h1 class="coop_maps-h1 ib" style="float: right; font-size: 16px;">08.11.19</h1>-->
                    <div class="ib" style="float:right; margin-bottom: 10px;">
                        <input class="datepicker" disabled="disabled"/>
                    </div>
                </div>
            </div>

            <div class="operation-tabs row">
                <ul class="operation-tabs__items col-12">
                    <li id="operation_my" class="operation-tabs__item btn-custom-one active">
                        <a class="operation-tabs__link">Мои</a>
                    </li>

                    <li id="operation_to_me" class="operation-tabs__item btn-custom-one">
                        <a class="operation-tabs__link">Адресованные мне</a>
                    </li>

                </ul>
            </div>

            <div class="row operations">
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
<!--                        <div class="col-2 text-center">-->
<!--                            ОСТАЛОСЬ-->
<!--                        </div>-->
                        <div class="col-3 text-center">
                            СТАТУС
                        </div>
                        <div class="col-1 text-center">
                        </div>
                    </div>
                </div>
                <?php if (isset($exchange_content) && !empty($exchange_content))
                    echo $exchange_content; ?>
            </div>

            <div class="row reserved_operations">
                <div class="table-title w-100">
                    <div class="row">
                        <div class="col-2 text-center">
                            Дата
                        </div>
                        <div class="col-xs-2 col-2 text-center">
                            От кого
                        </div>
                        <div class="col-xs-2 col-xl-2 col-sm-3 col-2 text-center">
                            Отдает/<br>Забирает
                        </div>
                        <div class="col-xs-2 col-xl-2 col-2 col-sm-1 text-center">
                            КОЛИЧЕСТВО
                        </div>
                        <div class="col-xs-3 col-3 text-center">
                            СТАТУС
                        </div>
                        <div class="col-xs-1 col-1 text-center">
                        </div>
                    </div>
                </div>

                <?php if (isset($reserved_operations) && !empty($reserved_operations))
                    echo $reserved_operations;
                    ?>
            </div>

        </div>
    </div>
</div>
<script type="text/javascript">
    function successCallback(order, event, user_id, request_num)
    {
        var el = event.target;

        //Отсылаем на сервер order для сравнения электронной подписи
        var data = {
            order_data: order,
            is_sberbank: 'true',
            request_user_id: user_id,
            request_num: request_num
        };
        jQuery.post( window.location, data, function(response) {
            //Поменять статус данного запроса
            if (response === 'true')
            {
                let parent = jQuery(el).parent();
                parent.empty();
                parent.css('font-size', '15px');
                parent.css('color', '#EF701B');
                parent.text('Ожидает подтверждения');
            }
            console.log("response:");
            console.log(response);
        });
        console.log("success:");
        console.log(order);
    }
    function failureCallback(order, event, user_id, request_num)
    {
        console.log("failure:");
        console.log(order);
    }

    function init_btn_events()
    {
        jQuery('.remove_operation').click(function(){
            if (confirm("Удалить данную операцию?") == true)
            {
                let request_num = jQuery(this).data('request_num');
                let user_id = jQuery(this).data('user_id');
                var data = {
                    remove_request: 'true',
                    request_type: 'exchange_request',
                    request_num: request_num,
                    user_id: user_id
                };
                var el = jQuery(this);
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

    jQuery('input.datepicker').change(function(){
        let el = jQuery(this);
        let active_tab = jQuery('.operation-tabs__item.active');
        let tab_type;
        if (active_tab.attr('id') === 'operation_my')
            tab_type = 'normal';
        else
            if (active_tab.attr('id') === 'operation_to_me')
                tab_type = 'reserved';
        let search = {
            type: 'date',
            operation_tab: tab_type,
            datatype: 'operations',
            val: el.val()
        };
        let output_el;
        if (tab_type === 'normal')
            output_el = jQuery('.operation-tabs ~ .row.operations');
        else
            if (tab_type === 'reserved')
                output_el = jQuery('.operation-tabs ~ .row.reserved_operations');

        search_ajax(el, search, search_callback, output_el);
    });

    function search_callback(response, output_el)
    {
        output_el.children().not('.table-title').remove();
        output_el.append(response);
        init_btn_events();
    }

</script>
