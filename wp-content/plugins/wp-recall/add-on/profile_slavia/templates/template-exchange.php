<div class="col-lg-12 d-none d-lg-block"  style="z-index: 4; /*margin-top: 10px;*/">
    <div class="row">
        <div class="coop_maps question-bg col-lg-12">
            <h1 class="coop_maps-h1">Получить рубль</h1>

            <div class="col-12 pryamougolnik">
                <p>Для получения рубля необходимо отправить монеты на следующий адрес:</p>
                <h3>PRIZM-AWTX-HDBX-ADDH-7SMM7</h3>
                <button class="btn-custom-two  text-center">Отправить</button>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-3 input-exchange">
                        <div class="row">
                            <span>Количество монет PRIZM</span>
                            <input placeholder="0" type="text" class="prizm_to_rubles prizm" name="">
                        </div>
                    </div>
                    <div class="col-lg-6 input-exchange ">
                        <div class="row ">
                            <span class="select-exchange">Выбрать банк</span>
                            <div class="select-exchange w-100">
                                <select id="bank_list_desktop">
<!--                                    <option>Название выбранного банка</option>-->
                                    <?php if (isset($banks) && !empty($banks)): ?>
                                        <?php foreach ($banks as $key => $value): ?>
                                            <option value="<?=$key?>"><?=$value['name']?></option>
                                        <?php endforeach;?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 input-exchange orange-input">
                        <div class="row">
                            <span>Вы получите</span>
                            <input placeholder="0" id="exp" type="text" name="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-6 input-exchange">
                        <div class="row">
                            <input type="text" name="" class="input-pd-right" placeholder="Номер банковской карты для получения">
                        </div>
                    </div>
                    <div class="col-lg-6 input-exchange">
                        <div class="row">
                            <input type="text" name="" placeholder="Имя получателя (как на карте)">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="btn-custom-one exchange-pd text-center">
                                Отправить
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
        <div class="coop_maps question-bg col-lg-12">
            <h1 class="coop_maps-h1">Получить PRIZM</h1>


            <div class="col-12">
                <div class="row">
                    <div class="col-lg-3 input-exchange select-custom">
                        <div class="row">
                            <span>&nbsp;</span>
                            <select class="">
                                <option>ОТПРАВИТЬ</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 input-exchange  input-custom-rub">
                        <div class="row ">
                            <span class="select-exchange">Количество</span>
                            <div class="select-exchange w-100">
                                <input class="rubles_to_prizm" placeholder="0" type="text" name="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 input-exchange orange-input input-custom-prizm">
                        <div class="row">
                            <span>Вы получите</span>
                            <input placeholder="0" id="exp" type="text" name="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row">

                    <div class="col-12">
                        <div class="row">
                            <div class="btn-custom-one exchange-pd text-center">
                                Отправить
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
        <div class="coop_maps question-bg col-lg-12">
            <h1 class="coop_maps-h1">Получить Waves</h1>


            <div class="col-12">
                <div class="row">
                    <div class="col-lg-3 input-exchange select-custom">
                        <div class="row">
                            <span>&nbsp;</span>
                            <select class="">
                                <option>ОТПРАВИТЬ</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 input-exchange  input-custom-rub">
                        <div class="row ">
                            <span class="select-exchange">Количество</span>
                            <div class="select-exchange w-100">
                                <input class="rubles_to_waves" placeholder="0" type="text" name="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 input-exchange orange-input input-custom-waws">
                        <div class="row">
                            <span>Вы получите</span>
                            <input placeholder="0" id="exp" type="text" name="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row">

                    <div class="col-12">
                        <div class="row">
                            <div class="btn-custom-one exchange-pd text-center">
                                Отправить
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>


<!-- Тело главной страницы mobile -->
<div class="col-md-12 d-lg-none"  style="z-index: 4; /*margin-top: 10px;*/">
    <div class="row">
        <div class="coop_maps question-bg col-lg-12 ex-mob-pd" style="">
            <div class="click_ex" id="one-ex">
                <h1 class="coop_maps-h1 ib">Получить рубль</h1>
                <img src="/wp-content/uploads/2019/12/close.png" class="close_ex ib">

                <div class="tab-ex">
                    <div class="col-12 pryamougolnik">
                        <p>Для получения рубля необходимо отправить монеты на следующий адрес:</p>
                        <h3>PRIZM-AWTX-HDBX-ADDH-7SMM7</h3>
                        <button class="btn-custom-two  text-center">Отправить</button>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-lg-3 input-exchange">
                                <div class="row">
                                    <span>Количество монет PRIZM</span>
                                    <input placeholder="0" type="text" class="prizm_to_rubles prizm" name="">
                                </div>
                            </div>
                            <div class="col-lg-6 input-exchange ">
                                <div class="row ">
                                    <span class="select-exchange">Выбрать банк</span>
                                    <div class="select-exchange w-100">
                                        <select id="bank_list_mobile">
<!--                                            <option>Название выбранного банка</option>-->
                                            <?php if (isset($banks) && !empty($banks)): ?>
                                                <?php foreach ($banks as $key => $value): ?>
                                                    <option value="<?=$key?>"><?=$value['name']?></option>
                                                <?php endforeach;?>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 input-exchange orange-input">
                                <div class="row">
                                    <span>Вы получите</span>
                                    <input placeholder="0" id="exp" type="text" name="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-lg-6 input-exchange">
                                <div class="row">
                                    <input type="text" name="" class="input-pd-right" placeholder="Номер банковской карты для получения">
                                </div>
                            </div>
                            <div class="col-lg-6 input-exchange">
                                <div class="row">
                                    <input type="text" name="" placeholder="Имя получателя (как на карте)">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="btn-custom-one exchange-pd text-center">
                                        Отправить
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="coop_maps question-bg col-lg-12 ex-mob-pd">
            <div class="click_ex" id="two-ex">
                <h1 class="coop_maps-h1 ib">Получить PRIZM</h1>
                <img src="/wp-content/uploads/2019/12/close.png" class="close_ex ib">
                <div class="tab-ex">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-lg-3 input-exchange select-custom">
                                <div class="row">
                                    <span>&nbsp;</span>
                                    <select class="">
                                        <option>ОТПРАВИТЬ</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 input-exchange  input-custom-rub">
                                <div class="row ">
                                    <span class="select-exchange">Количество</span>
                                    <div class="select-exchange w-100">
                                        <input class="rubles_to_prizm" placeholder="0" type="text" name="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 input-exchange orange-input input-custom-prizm">
                                <div class="row">
                                    <span>Вы получите</span>
                                    <input placeholder="0" id="exp" type="text" name="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">

                            <div class="col-12">
                                <div class="row">
                                    <div class="btn-custom-one exchange-pd text-center">
                                        Отправить
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <div class="coop_maps question-bg col-lg-12 ex-mob-pd">
            <div class="click_ex" id="three-ex">
                <h1 class="coop_maps-h1 ib">Получить Waves</h1>
                <img src="/wp-content/uploads/2019/12/close.png" class="close_ex ib">
                <div class="tab-ex">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-lg-3 input-exchange select-custom">
                                <div class="row">
                                    <span>&nbsp;</span>
                                    <select class="">
                                        <option>ОТПРАВИТЬ</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 input-exchange  input-custom-rub">
                                <div class="row ">
                                    <span class="select-exchange">Количество</span>
                                    <div class="select-exchange w-100">
                                        <input class="rubles_to_waves" placeholder="0" type="text" name="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 input-exchange orange-input input-custom-waws">
                                <div class="row">
                                    <span>Вы получите</span>
                                    <input placeholder="0" id="exp" type="text" name="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">

                            <div class="col-12">
                                <div class="row">
                                    <div class="btn-custom-one exchange-pd text-center">
                                        Отправить
                                    </div>
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
    function calc_exchange(input_value, rate, bank_rate, is_reverse = false, is_commision = true)
    {
        let result;
        if (is_reverse)
            result = (input_value / rate);
        else
            result = (input_value * rate);
        if (is_commision)
            result *= (1 - bank_rate);
        result = Math.round(result * 100) / 100;
        return result;
    }

    //Калькулятор
    function keypress_calc(event, el, crypto_price, active_bank_val, is_backspace = false)
    {
        var code = (event.keyCode ? event.keyCode : event.which);
        var is_symbol = (!is_backspace && (
            ( (code >= 48 && code <= 57) || (code == 46) ) //numbers || period
            || !(code == 46 && jQuery(this).val().indexOf('.') != -1) //уже есть точка
        ) );
        var is_backspace_pressed = (is_backspace && code == 8);

        var input_amount;

        //Если backspace - удаляем символ
        if (is_backspace_pressed)
        {
            input_amount = el.val().slice(0, -1);
        }
        else {
            if (is_symbol)
                input_amount = el.val() + String.fromCharCode(code);
        }

        if ((is_backspace_pressed || is_symbol) && input_amount !== null)
        {
            if (input_amount === '')
                input_amount = 0;
            else
                input_amount = parseFloat(input_amount);
            var is_commission = false;
            var output_el;
            var is_reverse;
            //Если получение рублей, то комиссия
            if (el.hasClass("prizm_to_rubles") || el.parents(".input-exchange").siblings().find(".prizm_to_rubles").length > 0) {
                is_commission = true;
                //Если ввели количество рублей
                if (el.attr("id") === "exp")
                {
                    is_reverse = true;
                    output_el = el.parents(".input-exchange").siblings().find(".prizm_to_rubles");
                }
                else
                    output_el = el.parents(".input-exchange").siblings(".orange-input").find("#exp");
            }

            //Если рубли в призму, то считаем наоборот и без комиссии
            if (el.hasClass("rubles_to_prizm") || el.parents(".input-exchange").siblings().find(".rubles_to_prizm").length > 0) {
                //Рубли в призму, ввод призмы
                if (el.attr("id") === "exp")
                {
                    is_reverse = false;
                    output_el = el.parents(".input-exchange").siblings().find(".rubles_to_prizm");
                }
                //Рубли в призму, ввод рублей
                else {
                    is_reverse = true;
                    output_el = el.parents(".input-exchange").siblings(".orange-input").find("#exp");
                }
            }

            else
            {
                if (el.hasClass("rubles_to_waves") || el.parents(".input-exchange").siblings().find(".rubles_to_waves").length > 0) {
                    //Рубли в waves, ввод waves
                    if (el.attr("id") === "exp")
                    {
                        is_reverse = false;
                        output_el = el.parents(".input-exchange").siblings().find(".rubles_to_waves");
                    }
                    //Рубли в waves, ввод рублей
                    else {
                        is_reverse = true;
                        output_el = el.parents(".input-exchange").siblings(".orange-input").find("#exp");
                    }
                }
            }

            output_el.val(calc_exchange(input_amount, crypto_price, active_bank_val, is_reverse, is_commission));
        }
    }
    function get_currency(el, prizm_price, waves_price) {
        let currency;
        if (el.attr("id") === "exp")
        {
            let siblings = el.parents(".input-exchange").siblings();
            if (siblings.find(".prizm_to_rubles").length > 0 || siblings.find(".rubles_to_prizm").length > 0)
                currency = prizm_price;
            else
            if (siblings.find(".rubles_to_waves").length > 0)
                currency = waves_price;
        }
        else {
            if (el.hasClass("rubles_to_prizm") || el.hasClass("prizm_to_rubles"))
                currency = prizm_price;
            else
            if (el.hasClass("rubles_to_waves"))
                currency = waves_price;
        }
        return currency === null ? false : currency;
    }

    var vals = {<?php if (isset($banks) && !empty($banks)){
            $i = 0;
            foreach ($banks as $key => $value)
            {
                $output = '"'.$key.'": '.$value['value'];
                if ($i < count($banks) - 1)
                    $output .= ', ';
                echo $output;
                ++$i;
            }
        } ?>};
    var active_select;
    if (window.innerWidth >= 992)
        active_select = jQuery("#bank_list_desktop");
    else
        active_select = jQuery("#bank_list_mobile");

    let active_bank_val; //Комиссия выбранного банка
    jQuery.each(vals, function(key, value){
        if (key === active_select.val()) {
            active_bank_val = value;
            return false;
        }
    });
    var prizm_price = <?php echo rcl_slavia_get_crypto_price('PZM'); ?>; //Курс призма
    var waves_price = <?php echo rcl_slavia_get_crypto_price('WAVES'); ?>; //Курс waves


    //При вводе значения
    jQuery('.prizm_to_rubles, .rubles_to_prizm, .rubles_to_waves, #exp').keypress(function(event) {
        let currency = get_currency(jQuery(this), prizm_price, waves_price);
        keypress_calc(event, jQuery(this), currency, active_bank_val);
    });
    //При нажатии backspace
    jQuery('.prizm_to_rubles, .rubles_to_prizm, .rubles_to_waves, #exp').keydown(function(event) {
        let currency = get_currency(jQuery(this), prizm_price, waves_price);
        keypress_calc(event, jQuery(this), currency, active_bank_val, true);
    });


    jQuery('#bank_list_desktop, #bank_list_mobile').change(function(){
       if (jQuery(this).parents(".input-exchange").prev().find(".prizm_to_rubles.prizm").val() !== '')
       {
           var el = jQuery(this);
           let prizm_amount = jQuery(this).parents(".input-exchange").prev().find(".prizm_to_rubles.prizm").val();
           prizm_amount = parseInt(prizm_amount);
           //Находим активный банк
           jQuery.each(vals, function(key, value){
               if (key === el.val()) {
                   active_bank_val = value;
                   return false;
               }
           });
           jQuery(this).parents(".input-exchange").next().find("#exp")
               .val(calc_exchange(prizm_amount, prizm_price, active_bank_val));
       }
    });
</script>