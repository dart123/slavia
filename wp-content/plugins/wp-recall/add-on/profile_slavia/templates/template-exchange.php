<?php
//exchange_address - это адрес SLAV
$slav_address = get_field('slav_address', 306);
$prizm_address = get_field('prizm_address', 306);
//$slav_text = get_field('slav_text', 306);
$instruction_header = get_field('instruction_header', 306);
$instruction_text_left = get_field('instruction_text_left', 306);
$instruction_text_right = get_field('instruction_text_right', 306);


$asset_inputs = get_input_currencies_2();

$asset_outputs = get_output_currencies_2();

$deposits = get_deposits();
print '<div style="display: none"><pre>'.print_r($deposits, true).'</pre></div>';

$deposit_types = array();

for ($i = 1, $deposit_type = get_field('deposit_type_'.$i, 306);
     $deposit_type !== null;
     $i++, $deposit_type = get_field('deposit_type_'.$i, 306)
    )
{
    if (!empty($deposit_type) )
        $deposit_types[] = $deposit_type;
}

$normal_percents = rcl_get_option('currency_percent');
$operation_percents = rcl_get_option('operation_percent');
//print '<pre>'.print_r($normal_percents, true).'</pre>';

$rub_to_prizm = 0;
$rub_to_slav = 0;
$prizm_to_rub = 0;
$slav_to_rub = 0;

if (isset($normal_percents['prizm']))
    $prizm_normal_percent = $normal_percents['prizm'];
else
    $prizm_normal_percent = 0;

if (isset($normal_percents['slav']))
    $slav_normal_percent = $normal_percents['slav'];
else
    $slav_normal_percent = 0;

foreach ($operation_percents as $key => $operation) {
    $acquiring = !empty($operation['acquiring']) ? $operation['acquiring'] : 0;
    $site = !empty($operation['site']) ? $operation['site'] : 0;


    if (strtolower($key) == 'prizm' || strtolower($key) == 'pzm') {
        switch ($operation['type']) {
            case 'buy': //output_currency
                $rub_to_prizm = $acquiring + $site + $prizm_normal_percent;
                break;
            case 'sell': //input_currency
                $prizm_to_rub = $acquiring + $site + $prizm_normal_percent;
                break;
        }
    }
    elseif (strtolower($key) == 'slav' || strtolower($key) == 'slv') {
        switch ($operation['type']) {
            case 'buy': //output_currency
                $rub_to_slav = $acquiring + $site + $slav_normal_percent;
                break;
            case 'sell': //input_currency
                $slav_to_rub = $acquiring + $site + $slav_normal_percent;
                break;
        }
    }
}
$acquiring = !empty($normal_percents['acquiring']) ? $normal_percents['acquiring'] : 0;
$site = !empty($normal_percents['site']) ? $normal_percents['site'] : 0;
$prizm = !empty($prizm_normal_percent) ? $prizm_normal_percent : 0;
$slav = !empty($slav_normal_percent) ? $slav_normal_percent : 0;

if ($rub_to_prizm == 0)
{
    $rub_to_prizm = $acquiring + $site + $prizm;
}
if ($rub_to_slav == 0)
{
    $rub_to_slav = $acquiring + $site + $slav;
}
if ($prizm_to_rub == 0)
{
    $prizm_to_rub = $acquiring + $site + $prizm;
}
if ($slav_to_rub == 0)
{
    $slav_to_rub = $acquiring + $site + $slav;
}

?>
<div class="col-lg-12 d-none d-lg-block"  style="z-index: 4; /*margin-top: 10px;*/">
    <div class="row">
<!--        <form id="deposit_waves" class="coop_maps question-bg col-lg-12" action="" method="post" enctype="multipart/form-data" name="exchange">-->
<!--            <h1 class="coop_maps-h1">Имущественный взнос SLAV</h1>-->
<!---->
<!--            <div class="col-12 pryamougolnik">-->
<!--                <p>Внесите имущественный взнос на адрес</p>-->
<!--                <h3>--><?php //if (isset($exchange_address) && !empty($exchange_address))
//                            echo $exchange_address; ?>
<!--                </h3>-->
<!--                <button type="submit" class="btn-custom-two  text-center">Отправить</button>-->
<!--            </div>-->

<!--            <div class="col-12">-->
<!--                <div class="row">-->
<!--                    <div class="col-lg-4" style="margin-top:20px;">-->
<!--                        <div class="row input-exchange" style="margin-top: 0px">-->
<!--                            <span>Количество монет SLAV</span>-->
<!--                            <input type="hidden" value="SLAV" name="exchange[input_currency]">-->
<!--                            <input required placeholder="0" type="text" class="" name="exchange[input_sum]">-->
<!--                        </div>-->
<!---->
<!--                        <div class="row">-->
<!--                            <input class="btn-custom-one exchange-pd get-rubles text-center" type="submit" name="" value="Отправить">-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                    <div class="col-lg-8">-->
<!--                        --><?php //if (isset($slav_text) && !empty($slav_text))
//                            echo '<p class="exchange_deposit_text">'.$slav_text.'</p>'; ?>
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->

<!--        </form>-->

        <div id="exchange_instruction_container" class="coop_maps question-bg col-lg-12">
            <h1 id="instruction_header" class="coop_maps-h1">
                <?php if (isset($instruction_header) && !empty($instruction_header))
                    echo $instruction_header; ?>
            </h1>

            <div class="col-12">
                <div class="row">
                    <div id="instruction_text_left" class="col-7">
                        <div class="text_left_content">
                            <?php if (isset($instruction_text_left) && !empty($instruction_text_left))
                                echo $instruction_text_left; ?>
                        </div>
                        <button id="exchange_waves_btn" class="btn-custom-two  text-center">Отправить</button>
                    </div>

                    <div id="instruction_text_right" class="col-5">
                        <div class="text_right_content">
                            <?php if (isset($instruction_text_right) && !empty($instruction_text_right))
                                echo $instruction_text_right; ?>
                        </div>
                        <button id="exchange_chat_btn" class="btn-custom-two  text-center">Чат с менеджером</button>
                    </div>
                </div>
            </div>
        </div>


        <form id="get_prizm" data-percent="<?=$rub_to_prizm?>" class="coop_maps question-bg col-lg-12" action="" method="post" enctype="multipart/form-data" name="exchange">
            <h1 class="coop_maps-h1">Получить PRIZM</h1>

            <div class="col-12">
                <div class="row">
<!--                    <div class="col-lg-3 input-exchange select-custom">-->
<!--                        <div class="row">-->
<!--                            <span>&nbsp;</span>-->
<!--                            <select class="">-->
<!--                                <option>ОТПРАВИТЬ</option>-->
<!--                            </select>-->
<!--                        </div>-->
<!--                    </div>-->
                    <input type="hidden" value="RUB" name="exchange[input_currency]">
                    <input type="hidden" value="PRIZM" name="exchange[output_currency]">

                    <div class="col-lg-6 input-exchange  input-custom-rub">
                        <div class="row ">
                            <span class="">Количество</span> <!--select-exchange-->
                            <div class="w-100"> <!--select-exchange -->
                                <input required class="rubles_to_prizm" placeholder="0" type="text" name="exchange[input_sum]">
                            </div>
                        </div>
                    </div>

<!--                    <div class="col-lg-6 input-exchange ">-->
<!--                        <div class="row ">-->
<!--                            <span class="select-exchange">Выбрать банк</span>-->
<!--                            <div class="select-exchange w-100">-->
<!--                                <select required id="bank_list_desktop" class="rubles_to_prizm" name="exchange[bank]">-->
<!--                                                        <option>Название выбранного банка</option>-->
<!--                                    --><?php //if (isset($banks) && !empty($banks)): ?>
<!--                                        --><?php //foreach ($banks as $key => $value): ?>
<!--                                            <option value="--><?//=$key?><!--">--><?//=$value['name']?><!--</option>-->
<!--                                        --><?php //endforeach;?>
<!--                                    --><?php //endif; ?>
<!--                                </select>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->

                    <div class="col-lg-6 input-exchange orange-input input-custom-prizm">
                        <div class="row">
                            <span>Вы получите</span>
                            <input required placeholder="0" id="exp" type="text" name="exchange[output_sum]">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
<!--                    <div class="col-lg-6 input-exchange">-->
<!--                        <div class="row">-->
<!--                            <input required type="text" name="get_prizm[card_num]" class="input-pd-right" placeholder="Номер банковской карты">-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="col-lg-6 input-exchange">-->
<!--                        <div class="row">-->
<!--                            <input required type="text" name="get_prizm[card_name]" placeholder="Имя получателя (как на карте)">-->
<!--                        </div>-->
<!--                    </div>-->

                    <div class="col-12">
                        <div class="row">
                            <input class="btn-custom-one exchange-pd get-prizm text-center" type="submit" name="" value="Отправить">
                        </div>
                    </div>
                </div>
            </div>
        </form>


        <form id="get_waves" data-percent="<?=$slav_to_rub?>" class="coop_maps question-bg col-lg-12" action="" method="post" enctype="multipart/form-data" name="exchange">
            <h1 class="coop_maps-h1">Получить Slav</h1>

            <input type="hidden" value="RUB" name="exchange[input_currency]">
            <input type="hidden" value="SLAV" name="exchange[output_currency]">

            <div class="col-12">
                <div class="row">
<!--                    <div class="col-lg-3 input-exchange select-custom">-->
<!--                        <div class="row">-->
<!--                            <span>&nbsp;</span>-->
<!--                            <select class="">-->
<!--                                <option>ОТПРАВИТЬ</option>-->
<!--                            </select>-->
<!--                        </div>-->
<!--                    </div>-->
                    <div class="col-lg-6 input-exchange  input-custom-rub">
                        <div class="row ">
                            <span class="">Количество</span>
                            <div class="w-100">
                                <input required class="rubles_to_waves" placeholder="0" type="text" name="exchange[input_sum]">
                            </div>
                        </div>
                    </div>

<!--                    <div class="col-lg-6 input-exchange ">-->
<!--                        <div class="row ">-->
<!--                            <span class="select-exchange">Выбрать банк</span>-->
<!--                            <div class="select-exchange w-100">-->
<!--                                <select required id="bank_list_desktop" class="rubles_to_waves" name="exchange[bank]">-->
<!--                                                                        <option>Название выбранного банка</option>-->
<!--                                    --><?php //if (isset($banks) && !empty($banks)): ?>
<!--                                        --><?php //foreach ($banks as $key => $value): ?>
<!--                                            <option value="--><?//=$key?><!--">--><?//=$value['name']?><!--</option>-->
<!--                                        --><?php //endforeach;?>
<!--                                    --><?php //endif; ?>
<!--                                </select>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->

                    <div class="col-lg-6 input-exchange orange-input">
                        <div class="row">
                            <span>Вы получите</span>
                            <input required placeholder="0" id="exp" type="text" name="exchange[output_sum]">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row">

<!--                    <div class="col-lg-6 input-exchange">-->
<!--                        <div class="row">-->
<!--                            <input required type="text" name="get_waves[card_num]" class="input-pd-right" placeholder="Номер банковской карты">-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="col-lg-6 input-exchange">-->
<!--                        <div class="row">-->
<!--                            <input required type="text" name="get_waves[card_name]" placeholder="Имя получателя (как на карте)">-->
<!--                        </div>-->
<!--                    </div>-->

                    <div class="col-12">
                        <div class="row">
                            <input class="btn-custom-one exchange-pd get-waves text-center" type="submit" name="" value="Отправить">
                        </div>
                    </div>
                </div>
            </div>

        </form>

        <form id="get_ruble_prizm" data-percent="<?=$prizm_to_rub?>" class="coop_maps question-bg col-lg-12" action="" method="post" enctype="multipart/form-data" name="exchange">
            <div class="row headers">
                <div class="col-6">
                    <h1 class="coop_maps-h1">Получить Рубль</h1>
                </div>

                <div class="col-6">
                    <p id="prizm_requisites">Наши реквизиты для перевода PRIZM:</p>
                    <p><?php if (is_var($prizm_address)) echo $prizm_address ?></p>
                </div>
            </div>

            <input type="hidden" value="PRIZM" name="exchange[input_currency]">
            <input type="hidden" value="RUB" name="exchange[output_currency]">

            <div class="col-12">
                <div class="row">
                    <div class="col-lg-3 input-exchange input-custom-prizm">
                        <div class="row">
                            <span>Количество монет PRIZM</span>
                            <input required placeholder="0" type="text" class="prizm_to_rubles" name="exchange[input_sum]">
                        </div>
                    </div>
                    <div class="col-lg-6 input-exchange ">
                        <div class="row ">
                            <span class="select-exchange">Выбрать банк</span>
                            <div class="select-exchange w-100">
                                <select required id="bank_list_desktop" class="prizm_to_rubles" name="exchange[bank]">
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
                    <div class="col-lg-3 input-exchange orange-input input-custom-rub">
                        <div class="row">
                            <span>Вы получите</span>
                            <input required placeholder="0" id="exp" type="text" name="exchange[output_sum]">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-6 input-exchange">
                        <div class="row">
                            <input required type="text" name="exchange[card_num]" class="input-pd-right" placeholder="Номер банковской карты для получения">
                        </div>
                    </div>
                    <div class="col-6 input-exchange">
                        <div class="row">
                            <input required type="text" name="exchange[card_name]" placeholder="Имя получателя (как на карте)">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <input class="btn-custom-one exchange-pd get-rubles text-center" type="submit" name="" value="Отправить">
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <form id="get_ruble_waves" data-percent="<?=$slav_to_rub?>" class="coop_maps question-bg col-lg-12" action="" method="post" enctype="multipart/form-data" name="exchange">
            <div class="row headers">
                <div class="col-6">
                    <h1 class="coop_maps-h1">Получить Рубль</h1>
                </div>

                <div class="col-6">
                    <p id="slav_requisites">Наши реквизиты для перевода SLAV:</p>
                    <p><?php if (is_var($slav_address)) echo $slav_address ?></p>
                </div>
            </div>

            <input type="hidden" value="SLAV" name="exchange[input_currency]">
            <input type="hidden" value="RUB" name="exchange[output_currency]">

            <div class="col-12">
                <div class="row">
                    <div class="col-lg-3 input-exchange">
                        <div class="row">
                            <span>Количество монет SLAV</span>
                            <input required placeholder="0" type="text" class="waves_to_rubles" name="exchange[input_sum]">
                        </div>
                    </div>
                    <div class="col-lg-6 input-exchange ">
                        <div class="row ">
                            <span class="select-exchange">Выбрать банк</span>
                            <div class="select-exchange w-100">
                                <select required id="bank_list_desktop" class="waves_to_rubles" name="exchange[bank]">
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
                    <div class="col-lg-3 input-exchange orange-input input-custom-rub">
                        <div class="row">
                            <span>Вы получите</span>
                            <input required placeholder="0" id="exp" type="text" name="exchange[output_sum]">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-6 input-exchange">
                        <div class="row">
                            <input required type="text" name="exchange[card_num]" class="input-pd-right" placeholder="Номер банковской карты для получения">
                        </div>
                    </div>
                    <div class="col-6 input-exchange">
                        <div class="row">
                            <input required type="text" name="exchange[card_name]" placeholder="Имя получателя (как на карте)">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <input class="btn-custom-one exchange-pd get-rubles text-center" type="submit" name="" value="Отправить">
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!--ADDITIONAL PAYMENT OPTIONS ***************************************************************** -->

        <form id="other_payments" class="coop_maps question-bg col-lg-12 other_payments" action="" method="post" enctype="multipart/form-data" name="exchange">
            <h1 class="coop_maps-h1">Иной паевой взнос</h1>

            <div class="col-12">
                <div class="row">
                    <div class="col-lg-7 input-exchange">
                        <div class="row">
                            <div class="select-exchange w-100">
<!--                                <span class="select-exchange">Вид вносимого имущества</span>-->
                                <input type="hidden" class="other_payments input_currency" name="exchange[input_currency]">

                                <div class="nested_menu">
                                    <a class="menu_link">Вид вносимого имущества</a>
                                </div>

                                <?php print_nested_assets($asset_inputs); ?>
<!--                                <select required class="other_payments input_currency" name="exchange[input_currency]" placeholder="Вид вносимого имущества">-->
<!--                                    <option value="">Вид вносимого имущества</option>-->
                                    <?php //if (isset($asset_inputs) && !empty($asset_inputs)): ?>
                                        <?php //foreach ($asset_inputs as $asset_input): ?>
<!--                                            <option data-percent="" data-rate="--><?//=$asset_input['asset_rate_rubles']?><!--" data-requisites="--><?//=$asset_input['asset_requisites']?><!--" value="--><?//=htmlspecialchars($asset_input['asset_name'], ENT_QUOTES, 'UTF-8')?><!--">--><?//=$asset_input['asset_name']?><!--</option>-->
                                        <?php //endforeach;?>
                                    <?php //endif; ?>
<!--                                </select>-->
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 input-exchange">
                        <div class="row">
                            <span>Количество</span>
                            <input required placeholder="0" type="text" class="other_payments_input" name="exchange[input_sum]">
                        </div>
                    </div>

                    <div class="col-lg-7 input-exchange">
                        <div class="row">
                            <div class="select-exchange w-100">
<!--                                <span class="select-exchange">Вид желаемого имущества</span>-->
                                <input type="hidden" class="other_payments output_currency" name="exchange[output_currency]">

                                <div class="nested_menu">
                                    <a class="menu_link">Вид желаемого имущества</a>
                                </div>

                                <?php print_nested_assets($asset_outputs, true); ?>

<!--                                <select class="other_payments output_currency" name="exchange[output_currency]" placeholder="Вид желаемого имущества">-->
<!--                                    <option value="">Вид желаемого имущества</option>-->
<!--                                    --><?php //if (isset($asset_outputs) && !empty($asset_outputs)): ?>
<!--                                        --><?php //foreach ($asset_outputs as $asset_output): ?>
<!--                                            <option data-rate="--><?//=$asset_output['asset_rate_rubles']?><!--" value="--><?//=htmlspecialchars($asset_output['asset_name'], ENT_QUOTES, 'UTF-8')?><!--">--><?//=$asset_output['asset_name']?><!--</option>-->
<!--                                        --><?php //endforeach;?>
<!--                                    --><?php //endif; ?>
<!--                                </select>-->
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 input-exchange orange-input">
                        <div class="row">
                            <span>Вы получите</span>
                            <input placeholder="0" class="exp_custom" type="text" name="exchange[output_sum]">
                        </div>
                    </div>

                    <div id="other_payments_bank" class="col-lg-7 input-exchange">
                        <div class="row ">
                            <span class="select-exchange">Выбрать банк</span>
                            <div class="select-exchange w-100">
                                <select id="bank_list_desktop" class="other_payments" name="exchange[bank]">
                                    <option disabled selected="selected">Выбрать банк</option>
                                    <?php if (isset($banks) && !empty($banks)): ?>
                                        <?php foreach ($banks as $key => $value): ?>
                                            <option value="<?=$key?>"><?=$value['name']?></option>
                                        <?php endforeach;?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div id="other_payments_card_num" class="col-5 input-exchange">
                        <div class="row">
                            <input type="text" name="exchange[card_num]" placeholder="Номер банковской карты для получения">
                        </div>
                    </div>
                    <div id="other_payments_card_name" class="col-8 input-exchange">
                        <div class="row">
                            <input type="text" name="exchange[card_name]" placeholder="Имя получателя (как на карте)">
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-4">
                        <input class="btn-custom-one exchange-pd get-rubles text-center" type="submit" name="" value="Отправить">
                    </div>
                    <div class="col-8 input-exchange">
                        <div class="row">
                            <div class="select-exchange w-100" style="margin-top: 30px">
    <!--                            <span class="select-exchange">Наши реквизиты</span>-->
                                <select required class="other_payments requisites" name="exchange[requisites]">
                                    <option disabled selected>Наши реквизиты</option>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </form>

        <form id="other_deposit" class="coop_maps question-bg col-lg-12 other_deposit" action="" method="post" enctype="multipart/form-data" name="exchange">
            <h1 class="coop_maps-h1">Целевой взнос</h1>

            <div class="col-12">
                <div class="row">
                    <div class="col-lg-6 input-exchange" style="margin-top: 20px">
                        <div class="row">
                            <span>Количество</span>
                            <input required placeholder="0" type="text" class="other_deposit" name="exchange[input_sum]">
                        </div>
                    </div>
                    <div class="col-lg-6 input-exchange" style="margin-top: 44px;">
                        <div class="row">
                            <div class="select-exchange w-100">
                                <!--                                <span class="select-exchange">Вид вносимого имущества</span>-->

<!--                                <input type="hidden" class="other_payments input_currency" name="exchange[input_currency]">-->
<!---->
<!--                                <div class="nested_menu">-->
<!--                                    <a class="menu_link">Вид вносимого имущества</a>-->
<!--                                </div>-->

                                <?php //print_nested_assets($asset_inputs); ?>

                                <select required class="other_deposit input_currency" name="exchange[input_currency]" placeholder="Вид вносимого имущества">
                                    <option selected disabled value="">Вид вносимого имущества</option>
<!--                                    --><?php //if (isset($asset_inputs) && !empty($asset_inputs)): ?>
<!--                                        --><?php //foreach ($asset_inputs as $asset_input): ?>
<!--                                            <option data-rate="--><?//=$asset_input['asset_rate_rubles']?><!--" data-requisites="--><?//=$asset_input['asset_requisites']?><!--" value="--><?//=htmlspecialchars($asset_input['asset_name'], ENT_QUOTES, 'UTF-8')?><!--">--><?//=$asset_input['asset_name']?><!--</option>-->
<!--                                        --><?php //endforeach;?>
<!--                                    --><?php //endif; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 input-exchange" style="margin-top: 20px;">
                        <div class="row">
                            <div class="select-exchange w-100" style="margin-top: 0px; padding-left: 0; padding-right: 0">
                                <select required class="other_deposit deposit_type" name="exchange[deposit_type]">
                                    <option disabled selected>Вид целевой программы</option>
                                    <?php if (isset($deposits) && !empty($deposits)): ?>
                                        <?php foreach (array_keys($deposits) as $deposit_name): ?>
                                            <option value="<?=$deposit_name?>"><?=$deposit_name?></option>
                                        <?php endforeach;?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 input-exchange" style="margin-top: 20px;">
                        <div class="row">
                            <div class="select-exchange w-100">
                                <!--                            <span class="select-exchange">Наши реквизиты</span>-->
                                <select required class="other_deposit requisites" name="exchange[requisites]">
                                    <option disabled selected>Наши реквизиты</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        <input class="btn-custom-one exchange-pd get-rubles text-center" type="submit" name="" value="Отправить">
                    </div>
                </div>
            </div>
        </form>

        <form id="personal_deposit" class="coop_maps question-bg col-lg-12 personal_deposit" action="" method="post" enctype="multipart/form-data" name="exchange">
            <h1 class="coop_maps-h1">Внести личный паевой взнос</h1>

            <input type="hidden" name="exchange[is_personal_deposit]" value="yes">

            <div class="col-12">
                <div class="row">
                    <div class="col-lg-7 input-exchange">
<!--                        <div class="row">-->
                            <div class="select-exchange w-100">
                                <span class="select-exchange">Раздел</span>
                                <?php
                                $all_currencies = get_all_currencies();

                                //print '<pre style="display: none">'.print_r($all_currencies, true).'</pre>';
                                ?>

                                <input type="hidden" class="other_payments section" name="exchange[section]">

                                <div class="nested_menu">
                                    <a class="menu_link">Раздел</a>
                                </div>

                                <?php print_nested_assets($all_currencies, false, true); ?>
<!--                                <select required class="personal_deposit input_currency" name="exchange[section]">-->
<!--                                    <option disabled selected>Выберите раздел</option>-->
<!--                                    --><?php //if (isset($all_currencies) && !empty($all_currencies)): ?>
<!--                                        --><?php //foreach ($all_currencies as $currency): ?>
<!--                                            <option value="--><?//=htmlspecialchars($currency['asset_name'], ENT_QUOTES, 'UTF-8')?><!--">--><?//=$currency['asset_name']?><!--</option>-->
<!--                                        --><?php //endforeach;?>
<!--                                    --><?php //endif; ?>
<!--                                </select>-->
                            </div>
<!--                        </div>-->
                    </div>

                    <div class="col-lg-5 input-exchange">
                        <div class="row">
                            <span>Количество</span>
                            <input required id="personal_deposit_amount" placeholder="0" type="text" class="personal_deposit_input" name="exchange[input_amount]">
                        </div>
                    </div>

                    <div class="col-lg-7 input-exchange">
                        <div class="select-exchange w-100">
                            <span>Короткое описание</span>
                            <input required placeholder="Название имущества" type="text" class="personal_deposit_input currency_name" name="exchange[input_currency]">
                        </div>
                    </div>

                    <div class="col-lg-5 input-exchange orange-input input-custom-rub">
                        <div class="row">
                            <span>Цена за 1 ед.</span>
                            <input id="personal_deposit_rate" placeholder="0" class="exp_custom" type="text" name="exchange[rate]">
                        </div>
                    </div>

                        <div id="other_payments_is_public" class="col-lg-2 input-exchange">
                            <div class="select-exchange w-100">
                                <input type="checkbox" class="personal_deposit is_public" name="exchange[is_public]">
                                <span>Публичное имущество</span>
                            </div>
                        </div>

                        <div id="other_payments_is_reserve" class="col-lg-2 input-exchange">
                            <div class="select-exchange w-100">
                                <input type="checkbox" class="personal_deposit is_reserve" name="exchange[is_reserve]">
                                <span>Резерв за пайщиком</span>
                            </div>
                        </div>

                        <div id="other_payments_is_save" class="col-lg-2 input-exchange">
                            <div class="select-exchange w-100">
                                <input type="checkbox" class="personal_deposit is_save" name="exchange[is_save]">
                                <span>Спасти имущество</span>
                            </div>
                        </div>

                        <div id="other_payments_reserve_id" class="col-lg-6 input-exchange">
                            <div class="select-exchange w-100">
                                <span>Номер пайщика</span>
                                <?php $client_nums = get_client_nums(); ?>
                                <select id="personal_deposit_reserve_id" class="personal_deposit" name="exchange[reserve_id]">
                                    <option selected disabled>Выберите номер пайщика</option>
                                    <?php foreach ($client_nums as $client_num): ?>
                                        <?php if ($client_num['user_id'] == get_current_user_id())
                                            continue;
                                        ?>
                                        <option value="<?=$client_num['user_id']?>"><?=$client_num['client_num']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                    <div class="col-lg-5 input-exchange no-margin input-custom-rub">
                        <span>Общая цена</span>
                        <input id="personal_deposit_result_sum" disabled placeholder="0" type="text" class="personal_deposit_input" name="exchange[result_sum]">
                    </div>

                    <div class="col-7 input-exchange no-margin" style="">
                        <div class="select-exchange w-100">
                            <span>Реквизиты</span>
                            <select class="personal_deposit requisites" name="exchange[requisites]">
                                <option disabled selected>Наши реквизиты</option>
                            </select>
                        </div>
                    </div>



                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-4">
                        <input class="btn-custom-one exchange-pd get-rubles text-center" type="submit" name="" value="Отправить">
                    </div>

                </div>
            </div>
        </form>

    </div>
</div>


<!-- Тело главной страницы mobile -->
<div class="col-md-12 d-lg-none"  style="z-index: 4; /*margin-top: 10px;*/">
    <div class="row">
<!--        <div class="coop_maps question-bg col-lg-12 ex-mob-pd" style="">-->
<!--            <div class="click_ex" id="one-ex">-->
<!--                <div class="ex-header">-->
<!--                    <h1 class="coop_maps-h1 ib">Имущественный взнос SLAV</h1>-->
<!--                    <img src="/wp-content/uploads/2019/12/close.png" class="close_ex ib">-->
<!--                </div>-->
<!---->
<!--                <form class="tab-ex" action="" method="post" enctype="multipart/form-data" name="exchange_mob">-->
<!--                    <div class="col-12 pryamougolnik">-->
<!--                        <p>Для получения рубля необходимо отправить монеты на следующий адрес:</p>-->
<!--                        <h3>PRIZM-AWTX-HDBX-ADDH-7SMM7</h3>-->
<!--                        <button class="btn-custom-two  text-center">Отправить</button>-->
<!--                    </div>-->
<!--                    <div class="col-lg-12">-->
<!--                        --><?php //if (isset($slav_text) && !empty($slav_text))
//                            echo '<p class="exchange_deposit_text">'.$slav_text.'</p>'; ?>
<!--                    </div>-->
<!--                    <div class="col-12">-->
<!--                        <div class="row">-->
<!--                            <div class="col-lg-12" style="margin-top:20px;">-->
<!--                                <div class="row input-exchange" style="margin-top: 0px">-->
<!--                                    <span>Количество монет SLAV</span>-->
<!---->
<!--                                    <input type="hidden" value="SLAV" name="exchange[input_currency]">-->
<!---->
<!--                                    <input required placeholder="0" type="text" class="" name="exchange[input_sum]">-->
<!--                                </div>-->
<!---->
<!--                                <div class="row">-->
<!--                                    <input class="btn-custom-one exchange-pd get-rubles text-center" type="submit" name="" value="Отправить">-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </form>-->
<!--            </div>-->
<!---->
<!--        </div>-->
        <div class="coop_maps question-bg col-lg-12 ex-mob-pd">
            <div class="click_ex" id="two-ex">
                <div class="ex-header">
                    <h1 class="coop_maps-h1 ib">Получить PRIZM</h1>
                    <img src="/wp-content/uploads/2019/12/close.png" class="close_ex ib">
                </div>
                <form data-percent="<?=$rub_to_prizm?>" class="tab-ex" action="" method="post" enctype="multipart/form-data" name="exchange_mob">
                    <div class="col-12">
                        <div class="row">
<!--                            <div class="col-lg-3 input-exchange select-custom">-->
<!--                                <div class="row">-->
<!--                                    <span>&nbsp;</span>-->
<!--                                    <select class="">-->
<!--                                        <option>ОТПРАВИТЬ</option>-->
<!--                                    </select>-->
<!--                                </div>-->
<!--                            </div>-->
                            <div class="col-lg-6 input-exchange  input-custom-rub">
                                <div class="row ">
                                    <span class="select-exchange">Количество</span>

                                    <input type="hidden" value="RUB" name="exchange[input_currency]">
                                    <input type="hidden" value="PRIZM" name="exchange[output_currency]">

                                    <div class="select-exchange w-100">
                                        <input  required class="rubles_to_prizm" placeholder="0" type="text" name="exchange[input_sum]">
                                    </div>
                                </div>
                            </div>

<!--                            <div class="col-lg-6 input-exchange ">-->
<!--                                <div class="row ">-->
<!--                                    <span class="select-exchange">Выбрать банк</span>-->
<!--                                    <div class="select-exchange w-100">-->
<!--                                        <select required id="bank_list_mobile" class="rubles_to_prizm" name="exchange[bank]">-->
<!--                                                                                        <option>Название выбранного банка</option>-->
<!--                                            --><?php //if (isset($banks) && !empty($banks)): ?>
<!--                                                --><?php //foreach ($banks as $key => $value): ?>
<!--                                                    <option value="--><?//=$key?><!--">--><?//=$value['name']?><!--</option>-->
<!--                                                --><?php //endforeach;?>
<!--                                            --><?php //endif; ?>
<!--                                        </select>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->

                            <div class="col-lg-6 input-exchange orange-input input-custom-prizm">
                                <div class="row">
                                    <span>Вы получите</span>
                                    <input required placeholder="0" id="exp" type="text" name="exchange[output_sum]">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">

<!--                            <div class="col-lg-6 input-exchange">-->
<!--                                <div class="row">-->
<!--                                    <input required type="text" name="get_prizm[card_num]" class="input-pd-right" placeholder="Номер банковской карты">-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="col-lg-6 input-exchange">-->
<!--                                <div class="row">-->
<!--                                    <input required type="text" name="get_prizm[card_name]" placeholder="Имя получателя (как на карте)">-->
<!--                                </div>-->
<!--                            </div>-->

                            <div class="col-12">
                                <div class="row">
                                    <input class="btn-custom-one exchange-pd get-prizm text-center" type="submit" name="" value="Отправить">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="coop_maps question-bg col-lg-12 ex-mob-pd">
            <div class="click_ex" id="three-ex">
                <div class="ex-header">
                    <h1 class="coop_maps-h1 ib">Получить Slav</h1>
                    <img src="/wp-content/uploads/2019/12/close.png" class="close_ex ib">
                </div>
                <form data-percent="<?=$rub_to_slav?>" class="tab-ex" action="" method="post" enctype="multipart/form-data" name="exchange_mob">
                    <div class="col-12">
                        <div class="row">
<!--                            <div class="col-lg-3 input-exchange select-custom">-->
<!--                                <div class="row">-->
<!--                                    <span>&nbsp;</span>-->
<!--                                    <select class="">-->
<!--                                        <option>ОТПРАВИТЬ</option>-->
<!--                                    </select>-->
<!--                                </div>-->
<!--                            </div>-->
                            <div class="col-lg-6 input-exchange  input-custom-rub">
                                <div class="row ">
                                    <span class="select-exchange">Количество</span>

                                    <input type="hidden" value="RUB" name="exchange[input_currency]">
                                    <input type="hidden" value="SLAV" name="exchange[output_currency]">

                                    <div class="select-exchange w-100">
                                        <input required class="rubles_to_waves" placeholder="0" type="text" name="exchange[input_sum]">
                                    </div>
                                </div>
                            </div>

<!--                            <div class="col-lg-6 input-exchange ">-->
<!--                                <div class="row ">-->
<!--                                    <span class="select-exchange">Выбрать банк</span>-->
<!--                                    <div class="select-exchange w-100">-->
<!--                                        <select required id="bank_list_mobile" class="rubles_to_waves" name="exchange[bank]">-->
<!--                                                                  -->
<!--                                            --><?php //if (isset($banks) && !empty($banks)): ?>
<!--                                                --><?php //foreach ($banks as $key => $value): ?>
<!--                                                    <option value="--><?//=$key?><!--">--><?//=$value['name']?><!--</option>-->
<!--                                                --><?php //endforeach;?>
<!--                                            --><?php //endif; ?>
<!--                                        </select>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->

                            <div class="col-lg-6 input-exchange orange-input">
                                <div class="row">
                                    <span>Вы получите</span>
                                    <input required placeholder="0" id="exp" type="text" name="exchange[output_sum]">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">

<!--                            <div class="col-lg-6 input-exchange">-->
<!--                                <div class="row">-->
<!--                                    <input required type="text" name="get_waves[card_num]" class="input-pd-right" placeholder="Номер банковской карты">-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="col-lg-6 input-exchange">-->
<!--                                <div class="row">-->
<!--                                    <input required type="text" name="get_waves[card_name]" placeholder="Имя получателя (как на карте)">-->
<!--                                </div>-->
<!--                            </div>-->

                            <div class="col-12">
                                <div class="row">
                                    <input class="btn-custom-one get-waves exchange-pd text-center" type="submit" name="" value="Отправить">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>

        <div class="coop_maps question-bg col-lg-12 ex-mob-pd">
            <div class="click_ex" id="four-ex">
                <div class="ex-header">
                    <h1 class="coop_maps-h1 ib">Получить рубль (внести PRIZM)</h1>
                    <img src="/wp-content/uploads/2019/12/close.png" class="close_ex ib">
                </div>
                <form data-percent="<?=$prizm_to_rub?>" class="tab-ex" action="" method="post" enctype="multipart/form-data" name="get_ruble_prizm">
                    <div class="col-12">
                        <div class="row">
                            <!--                            <div class="col-lg-3 input-exchange select-custom">-->
                            <!--                                <div class="row">-->
                            <!--                                    <span>&nbsp;</span>-->
                            <!--                                    <select class="">-->
                            <!--                                        <option>ОТПРАВИТЬ</option>-->
                            <!--                                    </select>-->
                            <!--                                </div>-->
                            <!--                            </div>-->
                            <div class="col-lg-3 input-exchange  input-custom-prizm">
                                <div class="row ">
                                    <span class="select-exchange">Количество</span>

                                    <input type="hidden" value="PRIZM" name="exchange[input_currency]">
                                    <input type="hidden" value="RUB" name="exchange[output_currency]">

                                    <div class="select-exchange w-100">
                                        <input required class="prizm_to_rubles" placeholder="0" type="text" name="exchange[input_sum]">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 input-exchange ">
                                <div class="row ">
                                    <span class="select-exchange">Выбрать банк</span>
                                    <div class="select-exchange w-100">
                                        <select required id="bank_list_mobile" class="prizm_to_rubles" name="exchange[bank]">
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

                            <div class="col-lg-3 input-exchange orange-input input-custom-rub">
                                <div class="row">
                                    <span>Вы получите</span>
                                    <input required placeholder="0" id="exp" type="text" name="exchange[output_sum]">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">

                            <div class="col-lg-6 input-exchange">
                                <div class="row">
                                    <input required type="text" name="exchange[card_num]" class="input-pd-right" placeholder="Номер банковской карты">
                                </div>
                            </div>
                            <div class="col-lg-6 input-exchange">
                                <div class="row">
                                    <input required type="text" name="exchange[card_name]" placeholder="Имя получателя (как на карте)">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="row">
                                    <input class="btn-custom-one exchange-pd get-prizm text-center" type="submit" name="" value="Отправить">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="coop_maps question-bg col-lg-12 ex-mob-pd">
            <div class="click_ex" id="five-ex">
                <div class="ex-header">
                    <h1 class="coop_maps-h1 ib">Получить рубль (внести SLAV)</h1>
                    <img src="/wp-content/uploads/2019/12/close.png" class="close_ex ib">
                </div>
                <form data-percent="<?=$slav_to_rub?>" class="tab-ex" action="" method="post" enctype="multipart/form-data" name="get_ruble_waves">
                    <div class="col-12">
                        <div class="row">
                            <!--                            <div class="col-lg-3 input-exchange select-custom">-->
                            <!--                                <div class="row">-->
                            <!--                                    <span>&nbsp;</span>-->
                            <!--                                    <select class="">-->
                            <!--                                        <option>ОТПРАВИТЬ</option>-->
                            <!--                                    </select>-->
                            <!--                                </div>-->
                            <!--                            </div>-->
                            <div class="col-lg-3 input-exchange">
                                <div class="row ">
                                    <span class="select-exchange">Количество</span>

                                    <input type="hidden" value="SLAV" name="exchange[input_currency]">
                                    <input type="hidden" value="RUB" name="exchange[output_currency]">

                                    <div class="select-exchange w-100">
                                        <input required class="waves_to_rubles" placeholder="0" type="text" name="exchange[input_sum]">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 input-exchange ">
                                <div class="row ">
                                    <span class="select-exchange">Выбрать банк</span>
                                    <div class="select-exchange w-100">
                                        <select required id="bank_list_mobile" class="waves_to_rubles" name="exchange[bank]">
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

                            <div class="col-lg-3 input-exchange orange-input input-custom-rub">
                                <div class="row">
                                    <span>Вы получите</span>
                                    <input required placeholder="0" id="exp" type="text" name="exchange[output_sum]">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">

                            <div class="col-lg-6 input-exchange">
                                <div class="row">
                                    <input required type="text" name="exchange[card_num]" class="input-pd-right" placeholder="Номер банковской карты">
                                </div>
                            </div>
                            <div class="col-lg-6 input-exchange">
                                <div class="row">
                                    <input required type="text" name="exchange[card_name]" placeholder="Имя получателя (как на карте)">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="row">
                                    <input class="btn-custom-one exchange-pd get-prizm text-center" type="submit" name="" value="Отправить">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="coop_maps question-bg col-lg-12 ex-mob-pd">
            <div class="click_ex" id="six-ex">
                <div class="ex-header">
                    <h1 class="coop_maps-h1 ib">Иной паевой взнос</h1>
                    <img src="/wp-content/uploads/2019/12/close.png" class="close_ex ib">
                </div>
                <form class="tab-ex other_payments" id="other_payments" action="" method="post" enctype="multipart/form-data" name="other_payments">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-lg-12 input-exchange">
                                <div class="row">
                                    <div class="select-exchange w-100">
                                        <input type="hidden" class="other_payments input_currency" name="exchange[input_currency]">

                                        <div class="nested_menu">
                                            <a class="menu_link">Вид вносимого имущества</a>
                                        </div>

                                        <?php print_nested_assets($asset_inputs); ?>
<!--                                        <select required class="other_payments input_currency" name="exchange[input_currency]">-->
<!--                                            <option disabled selected>Вид вносимого имущества</option>-->
<!--                                            --><?php //if (isset($asset_inputs) && !empty($asset_inputs)): ?>
<!--                                                --><?php //foreach ($asset_inputs as $asset_input): ?>
<!--                                                    <option data-rate="--><?//=$asset_input['asset_rate_rubles']?><!--" data-requisites="--><?//=$asset_input['asset_requisites']?><!--" value="--><?//=$asset_input['asset_name']?><!--">--><?//=$asset_input['asset_name']?><!--</option>-->
<!--                                                --><?php //endforeach;?>
<!--                                            --><?php //endif; ?>
<!--                                        </select>-->
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 input-exchange">
                                <div class="row">
                                    <span class="select-exchange">Количество</span>

                                    <div class="select-exchange w-100">
                                        <input required class="other_payments_input" placeholder="0" type="text" name="exchange[input_sum]">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 input-exchange">
                                <div class="row">
                                    <div class="select-exchange w-100" style="margin: 10% 0;">
                                        <!--                                <span class="select-exchange">Вид желаемого имущества</span>-->
<!--                                        <select class="other_payments output_currency" name="exchange[output_currency]">-->
<!--                                            <option disabled selected>Вид желаемого имущества</option>-->
<!--                                            --><?php //if (isset($asset_outputs) && !empty($asset_outputs)): ?>
<!--                                                --><?php //foreach ($asset_outputs as $asset_output): ?>
<!--                                                    <option data-rate="--><?//=$asset_output['asset_rate_rubles']?><!--" value="--><?//=$asset_output['asset_name']?><!--">--><?//=$asset_output['asset_name']?><!--</option>-->
<!--                                                --><?php //endforeach;?>
<!--                                            --><?php //endif; ?>
<!--                                        </select>-->
                                        <input type="hidden" class="other_payments output_currency" name="exchange[output_currency]">
                                        <div class="nested_menu">
                                            <a class="menu_link">Вид желаемого имущества</a>
                                        </div>
                                        <?php print_nested_assets($asset_outputs, true); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 input-exchange orange-input">
                                <div class="row">
                                    <span>Вы получите</span>
                                    <input placeholder="0" class="exp_custom" type="text" name="exchange[output_sum]">
                                </div>
                            </div>
                            <div class="col-12 input-exchange">
                                <div class="row">
                                    <div class="select-exchange w-100" style="margin-top: 30px">
                                        <!--                            <span class="select-exchange">Наши реквизиты</span>-->
                                        <select required class="other_payments requisites" name="exchange[requisites]">
                                            <option disabled selected>Наши реквизиты</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div id="other_payments_bank" class="col-12 input-exchange">
                                <div class="row ">
                                    <span class="select-exchange">Выбрать банк</span>
                                    <div class="select-exchange w-100">
                                        <select id="bank_list_mobile" class="other_payments" name="exchange[bank]">
                                            <option disabled selected="selected">Выбрать банк</option>
                                            <?php if (isset($banks) && !empty($banks)): ?>
                                                <?php foreach ($banks as $key => $value): ?>
                                                    <option value="<?=$key?>"><?=$value['name']?></option>
                                                <?php endforeach;?>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div id="other_payments_card_num" class="col-12 input-exchange">
                                <div class="row">
                                    <input type="text" name="exchange[card_num]" placeholder="Номер банковской карты">
                                </div>
                            </div>
                            <div id="other_payments_card_name" class="col-12 input-exchange">
                                <div class="row">
                                    <input type="text" name="exchange[card_name]" placeholder="Имя получателя (как на карте)">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">

                            <div class="col-12">
                                <div class="row">
                                    <input class="btn-custom-one exchange-pd text-center" type="submit" name="" value="Отправить">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="coop_maps question-bg col-lg-12 ex-mob-pd">
            <div class="click_ex" id="seven-ex">
                <div class="ex-header">
                    <h1 class="coop_maps-h1 ib">Целевой взнос</h1>
                    <img src="/wp-content/uploads/2019/12/close.png" class="close_ex ib">
                </div>
                <form class="tab-ex other_deposit" id="other_deposit" action="" method="post" enctype="multipart/form-data" name="other_deposit">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-lg-12 input-exchange">
                                <div class="row">
                                    <div class="select-exchange w-100">
                                        <!--                                <span class="select-exchange">Вид желаемого имущества</span>-->
                                        <select required class="other_deposit deposit_type" name="exchange[deposit_type]">
                                            <option disabled selected>Вид целевой программы</option>
                                            <?php if (isset($deposits) && !empty($deposits)): ?>
                                                <?php foreach (array_keys($deposits) as $deposit_name): ?>
                                                    <option value="<?=$deposit_name?>"><?=$deposit_name?></option>
                                                <?php endforeach;?>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 input-exchange">
                                <div class="row">
                                    <div class="select-exchange w-100">
                                        <select required class="other_deposit input_currency" name="exchange[input_currency]" placeholder="Вид вносимого имущества">
                                            <option selected disabled value="">Вид вносимого имущества</option>
                                            <!----><?php //if (isset($asset_inputs) && !empty($asset_inputs)): ?>
                                            <!----><?php //foreach ($asset_inputs as $asset_input): ?>
                                            <!--<option data-rate="--><?//=$asset_input['asset_rate_rubles']?><!--" data-requisites="--><?//=$asset_input['asset_requisites']?><!--" value="--><?//=htmlspecialchars($asset_input['asset_name'], ENT_QUOTES, 'UTF-8')?><!--">--><?//=$asset_input['asset_name']?><!--</option>-->
                                            <!----><?php //endforeach;?>
                                            <!----><?php //endif; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-5 input-exchange">
                                <div class="row">
                                    <span class="select-exchange">Количество</span>

                                    <div class="select-exchange w-100">
                                        <input required class="other_deposit" placeholder="0" type="text" name="exchange[input_sum]">
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 input-exchange">
                                <div class="row">
                                    <div class="select-exchange w-100" style="margin-top: 30px">
                                        <!--                            <span class="select-exchange">Наши реквизиты</span>-->
                                        <select required class="other_deposit requisites" name="exchange[requisites]">
                                            <option disabled selected>Наши реквизиты</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">

                            <div class="col-12">
                                <div class="row">
                                    <input class="btn-custom-one exchange-pd text-center" type="submit" name="" value="Отправить">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function calc_exchange(input_value, rate, bank_rate, is_reverse = false, is_commision = true, additional_percent = false)
    {
        let result;
        if (is_reverse)
            result = (input_value / rate);
        else
            result = (input_value * rate);

        let percent;

        if (bank_rate !== false)
        {
            percent = parseFloat(bank_rate);
            if (additional_percent !== false && additional_percent > 0)
                percent += parseFloat(additional_percent);
            //console.log(percent);
            //console.log(bank_rate);
            //console.log(additional_percent);
            result *= (1 - (percent / 100) );
        }
        else {
            if (bank_rate === false && additional_percent !== false && additional_percent > 0) {
                percent = additional_percent;
                //console.log(percent);
                result *= (1 - (percent / 100));
            }
        }

        //Округляем до 2 знаков после запятой
        result = Math.round(result * 100) / 100;

        // if (additional_percent !== false && additional_percent > 0)
        // {
        //     result *= (1 - (additional_percent / 100));
        //     //Округляем до 2 знаков после запятой
        //     result = Math.round(result * 100) / 100;
        // }

        return result;
    }

    //Калькулятор
    function keyup_calc(/*event, */el, crypto_price, active_bank_val = false)//, is_backspace = false)
    {
        // var code = (event.keyCode ? event.keyCode : event.which);
        // var is_symbol = (!is_backspace && (
        //     ( (code >= 48 && code <= 57) || (code == 46) ) //numbers || period
        //     || !(code == 46 && jQuery(this).val().indexOf('.') != -1) //уже есть точка
        // ) );
        // var is_backspace_pressed = (is_backspace && code == 8);

        var input_amount;

        input_amount = el.val();
        // //Если backspace - удаляем символ
        // if (is_backspace_pressed)
        // {
        //     input_amount = el.val().slice(0, -1);
        // }
        // else {
        //     if (is_symbol)
        //         input_amount = el.val() + String.fromCharCode(code);
        // }

        if (/*(is_backspace_pressed || is_symbol) && */input_amount !== null)
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
                    output_el = el.parents(".input-exchange").siblings().find("input.prizm_to_rubles");
                }
                else
                    output_el = el.parents(".input-exchange").siblings(".orange-input").find("input#exp");
            }

            if (el.hasClass("waves_to_rubles") || el.parents(".input-exchange").siblings().find(".waves_to_rubles").length > 0) {
                is_commission = true;
                //Если ввели количество рублей
                if (el.attr("id") === "exp")
                {
                    is_reverse = true;
                    output_el = el.parents(".input-exchange").siblings().find("input.waves_to_rubles");
                }
                else
                    output_el = el.parents(".input-exchange").siblings(".orange-input").find("input#exp");
            }

            //Если рубли в призму, то считаем наоборот и без комиссии
            if (el.hasClass("rubles_to_prizm") || el.parents(".input-exchange").siblings().find(".rubles_to_prizm").length > 0) {
                //Рубли в призму, ввод призмы
                if (el.attr("id") === "exp")
                {
                    is_reverse = false;
                    output_el = el.parents(".input-exchange").siblings().find("input.rubles_to_prizm");
                }
                //Рубли в призму, ввод рублей
                else {
                    is_reverse = true;
                    output_el = el.parents(".input-exchange").siblings(".orange-input").find("input#exp");
                }
            }

            else
            {
                if (el.hasClass("rubles_to_waves") || el.parents(".input-exchange").siblings().find(".rubles_to_waves").length > 0) {
                    //Рубли в waves, ввод waves
                    if (el.attr("id") === "exp")
                    {
                        is_reverse = false;
                        output_el = el.parents(".input-exchange").siblings().find("input.rubles_to_waves");
                    }
                    //Рубли в waves, ввод рублей
                    else {
                        is_reverse = true;
                        output_el = el.parents(".input-exchange").siblings(".orange-input").find("input#exp");
                    }
                }
            }
            let percent = el.parents('form').attr('data-percent');
            if (percent === undefined || percent === '')
                percent = false;
            //console.log(el.parents('form'));
            //console.log(percent);
            //console.log(output_el);
            output_el.val(calc_exchange(input_amount, crypto_price, active_bank_val, is_reverse, is_commission, percent));
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
            if (siblings.find(".rubles_to_waves").length > 0 || siblings.find(".waves_to_rubles").length > 0)
                currency = waves_price;
        }
        else {
            if (el.hasClass("rubles_to_prizm") || el.hasClass("prizm_to_rubles"))
                currency = prizm_price;
            else
            if (el.hasClass("rubles_to_waves") || el.hasClass("waves_to_rubles"))
                currency = waves_price;
        }
        return currency === null ? false : currency;
    }

    function get_active_bank_val(input_el, vals)
    {
        var active_select;
        // if (window.innerWidth >= 992)
        //     active_select = jQuery("#bank_list_desktop");
        // else
        //     active_select = jQuery("#bank_list_mobile");

        //Если правый input
        if (input_el.attr('id') === 'exp')
            active_select = input_el.parents(".input-exchange").prev().find('select');
        else
            if (input_el.attr('class') === 'prizm_to_rubles' ||
                input_el.attr('class') === 'rubles_to_prizm' ||
                input_el.attr('class') === 'rubles_to_waves' ||
                input_el.attr('class') === 'waves_to_rubles')
            {
                active_select = input_el.parents(".input-exchange").next().find('select');
            }

        let active_bank_val; //Комиссия выбранного банка
        jQuery.each(vals, function(key, value){
            if (key === active_select.val()) {
                active_bank_val = value;
                return false;
            }
        });
        //console.log(active_bank_val);
        return active_bank_val ? active_bank_val : false;
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

    var prizm_price = <?php echo rcl_slavia_get_crypto_price('PZM'); ?>; //Курс призма
    var waves_price = <?php echo '1';//echo rcl_slavia_get_crypto_price('WAVES'); ?>; //Курс waves

    //При вводе значения
    jQuery('.prizm_to_rubles, .waves_to_rubles, .rubles_to_prizm, .rubles_to_waves, #exp').keyup(function(event) {
        if (event.keyCode === 37 || event.keyCode === 39) {
            event.preventDefault();
            return false;
        }

        let currency = get_currency(jQuery(this), prizm_price, waves_price);
        window.active_input_class = jQuery(this).attr('class');

        //Если получение prizm|slav, то банк не нужен
        if (jQuery(this).parents('#get_prizm').length > 0 || jQuery(this).parents('#get_waves').length > 0) {
            keyup_calc(/*event, */jQuery(this), currency);
        }
        else {
            let active_bank_val = get_active_bank_val(jQuery(this), vals);
            keyup_calc(/*event, */jQuery(this), currency, active_bank_val);
        }
    });
    // //При нажатии backspace
    // jQuery('.prizm_to_rubles, .rubles_to_prizm, .rubles_to_waves, #exp').keydown(function(event) {
    //     let currency = get_currency(jQuery(this), prizm_price, waves_price);
    //     window.active_input_class = jQuery(this).attr('class');
    //     let active_bank_val = get_active_bank_val(jQuery(this), vals);
    //     keyup_calc(event, jQuery(this), currency, active_bank_val, true);
    // });


    jQuery('#bank_list_desktop, #bank_list_mobile').change(function(){
        var active_el;
        var active_class;
        if (typeof window.active_input_class !== 'undefined')
            active_class = window.active_input_class;
        var active_currency;
       if (typeof active_class !== 'undefined' &&
           (active_class === 'prizm_to_rubles' ||/*
           active_class === 'rubles_to_prizm' ||
           active_class === 'rubles_to_waves' ||*/
           active_class === 'waves_to_rubles'))
       {
           active_el = jQuery(this).parents(".input-exchange").prev().find("." + active_class);
           //Определяем валюту
           if (active_class === 'prizm_to_rubles' || active_class === 'rubles_to_prizm')
               active_currency = 'prizm';
           else
               active_currency = 'waves';

           if (active_el.val() !== '') {
               var el = jQuery(this);
               let input_amount = active_el.val();
               input_amount = parseFloat(input_amount);
               //Находим активный банк
               var active_bank_val;
               jQuery.each(vals, function (key, value) {
                   if (key === el.val()) {
                       active_bank_val = value;
                       return false;
                   }
               });
               var is_reverse;
               if (active_class === 'prizm_to_rubles' || active_class === 'waves_to_rubles')
                   is_reverse = false;
               else
                   is_reverse = true;

               let percent = el.parents('form').attr('data-percent');
               if (percent === undefined || percent === '')
                   percent = false;
               //console.log(percent);

               el.parents(".input-exchange").next().find("#exp")
                   .val(calc_exchange(input_amount, active_currency === 'prizm' ? prizm_price : waves_price, active_bank_val, is_reverse, true, percent));
           }
       }
       else
       {
           active_el = jQuery(this).parents(".input-exchange").next().find("#exp");
           if (active_el.val() !== '') {
               var el = jQuery(this);

               var input_el = el.parents(".input-exchange").prev().find('input').not('input[type="hidden"]');
               if (input_el.hasClass('prizm_to_rubles') || input_el.hasClass('rubles_to_prizm'))
                   active_currency = 'prizm';
               else
                   if (input_el.hasClass('rubles_to_waves') || input_el.hasClass('waves_to_rubles'))
                       active_currency = 'waves';
               //Находим активный банк
               var active_bank_val;
               jQuery.each(vals, function (key, value) {
                   if (key === el.val()) {
                       active_bank_val = value;
                       return false;
                   }
               });
               var is_reverse;
               var output_el;
               var input_amount;
               if (input_el.attr('class') === 'prizm_to_rubles' || input_el.attr('class') === 'waves_to_rubles') {
                   is_reverse = true;
                   //Выводим в левый input
                   output_el = input_el;
                   input_amount = active_el.val();
                   input_amount = parseFloat(input_amount);
               }
               else {
                   is_reverse = true;
                   //Выводим в правый input
                   output_el = active_el;
                   input_amount = input_el.val();
                   input_amount = parseFloat(input_amount);
               }

               let percent = output_el.parents('form').attr('data-percent');
               if (percent === undefined || percent === '')
                   percent = false;
               //console.log(percent);

               output_el.val(calc_exchange(input_amount, active_currency === 'prizm' ? prizm_price : waves_price, active_bank_val, is_reverse, true, percent));
           }
       }
    });

    jQuery('.click_ex form input[type=submit]').on('touchstart', function(){
        //jQuery(this).val('touch');
        let form = jQuery(this).parents('form')[0];
        for (var i=0; i < form.elements.length; i++)
            if (form.elements[i].value === '' && form.elements[i].hasAttribute('required')) {
                form.elements[i].setCustomValidity('Данное поле является обязательным!');
                //jQuery(form.elements[i]).css('border', '2px red');
                return false;
            }
        form.submit();
        //jQuery(this).trigger( "click" );
    });

    //Other payments
    function get_currency_rates()
    {
        let input_rate = jQuery('form#other_payments input.other_payments.input_currency').siblings('ul.menu-list').find('a.active');
        //.find('select.other_payments.input_currency option:selected');//.not(':first-child');
        let output_rate = jQuery('form#other_payments input.other_payments.output_currency').siblings('ul.menu-list').find('a.active');//.find('select.other_payments.output_currency option:selected');//.not(':first-child');

        //console.log(input_rate);
        //console.log(output_rate);

        if (input_rate.is(':disabled') || output_rate.is(':disabled') || input_rate.length <= 0 || output_rate.length <= 0)
            return false;
        else
        {
            input_rate = input_rate.attr('data-rate');
            output_rate = output_rate.attr('data-rate');
            return {input_rate: input_rate, output_rate: output_rate};
        }
    }

    jQuery('.other_payments_input, .exp_custom').keyup(function(event) {
        other_payments_print_result(jQuery(this));
    });
    jQuery('form.other_payments select.other_payments.input_currency').change(function(){

        var el = jQuery(this);
        let data = {
            get_currency_percent: true,
            type: 'sell',
            currency: jQuery(this).find('option:selected').val()
        };
        jQuery.post( window.location, data, function(response)
        {
            let response_data = JSON.parse(response);
            let currency_options = jQuery('.other_payments.output_currency option');//el.find('option');//el.find('option');
            let acquiring = (response_data['acquiring'] !== '' && typeof response_data['acquiring'] !== 'undefined') ? parseFloat(response_data['acquiring']) : 0;
            let site = (response_data['site'] !== '' && typeof response_data['site'] !== 'undefined') ? parseFloat(response_data['site']) : 0;
            jQuery.each(currency_options, function(index, el)
            {
                var value = jQuery(this).val();
                var percent = parseFloat(0);
                for (let key in response_data)
                    if (key.toLowerCase() === value.toLowerCase()) {
                        percent += parseFloat(response_data[key]);
                        //jQuery(this).attr('data-percent', response_data[key]);
                    }
                percent += acquiring;
                percent += site;
                console.log(percent);
                jQuery(this).attr('data-percent', percent);

                //console.log(value);
                // jQuery.each(response_data, function() {
                //     var currency = jQuery(this);
                //     console.log(currency);
                // });
            });
            jQuery.each(el.find('option'), function() {
                jQuery(this).attr('data-percent', '');
            });
            //console.log(currency_options);
        });

        other_payments_print_result(jQuery(this).parents('form.other_payments').find('.other_payments_input'));

        let requisites = jQuery('form.other_payments select.other_payments.requisites');
        requisites.find('option').not(':first-child').remove();
        requisites.append('<option selected>' + jQuery(this).find('option:selected').attr('data-requisites') + '</option>');
    });
    jQuery('form.other_payments select.other_payments.output_currency').change(function(){

        let possible_rub_names = ["RUB", "rub", "Rub", "рубль", "Рубль"]; //Возможные названия рубля, учитывая регистр

        let fields_to_show = jQuery(this).parents('.input-exchange')
            .siblings('#other_payments_card_name, #other_payments_card_num, #other_payments_bank');

        var el = jQuery(this);
        let data = {
            get_currency_percent: true,
            type: 'buy',
            currency: jQuery(this).find('option:selected').val()
        };
        jQuery.post( window.location, data, function(response) {
            let response_data = JSON.parse(response);
            let currency_options = jQuery('.other_payments.input_currency option');//el.find('option');//el.find('option');
            let acquiring = (response_data['acquiring'] !== '' && typeof response_data['acquiring'] !== 'undefined') ? parseFloat(response_data['acquiring']) : 0;
            let site = (response_data['site'] !== '' && typeof response_data['site'] !== 'undefined') ? parseFloat(response_data['site']) : 0;
            jQuery.each(currency_options, function(index, el) {
                var value = jQuery(this).val();
                var percent = parseFloat(0);
                for (let key in response_data)
                    if (key.toLowerCase() === value.toLowerCase()) {
                        percent += parseFloat(response_data[key]);
                        //jQuery(this).attr('data-percent', response_data[key]);
                    }

                percent += acquiring;
                percent += site;
                console.log(percent);
                jQuery(this).attr('data-percent', percent);


                //console.log(value);
                // jQuery.each(response_data, function() {
                //     var currency = jQuery(this);
                //     console.log(currency);
                // });
            });
            jQuery.each(el.find('option'), function() {
               jQuery(this).attr('data-percent', '');
            });
            //console.log(currency_options);
        });

        if (possible_rub_names.includes(jQuery(this).val() ) )
            fields_to_show.css('display', 'block');
        else
            fields_to_show.css('display', 'none');

        other_payments_print_result(jQuery(this).parents('form.other_payments').find('.other_payments_input'));
    });

    //jQuery('#other_payments_bank select')
    //other_deposit
    jQuery('form.other_deposit select.other_deposit.input_currency').change(function(){
        let requisites = jQuery('form.other_deposit select.other_deposit.requisites');
        requisites.find('option').not(':first-child').remove();
        requisites.append('<option selected>' + jQuery(this).find('option:selected').attr('data-requisites') + '</option>');
    });

    //Личный паевый взнос расчет
    jQuery('form#personal_deposit input#personal_deposit_amount, ' +
            'form#personal_deposit input#personal_deposit_rate')
        .keyup(function(e) {
            let rate = jQuery('form#personal_deposit input#personal_deposit_rate').val();
            //console.log(rate);
            if (rate.length === 0)
                rate = 0;
            else
                rate = parseFloat(rate);
            let amount = jQuery('form#personal_deposit input#personal_deposit_amount').val();
            //console.log(amount);
            if (amount.length === 0)
                amount = 0;
            else
                amount = parseFloat(amount);
            let sum = amount * rate;
            jQuery('form#personal_deposit input#personal_deposit_result_sum').val(sum);
        });


    jQuery('form#other_deposit select.deposit_type').change(function() {
        let data = {
            get_deposit_assets: true,
            deposit_name: jQuery(this).val()
        };
        let deposit_type = jQuery(this);
        let input_currency = deposit_type.parents('form#other_deposit').find('select.other_deposit.input_currency');
        jQuery.post( window.location, data, function(response) {
            let deposit_assets = JSON.parse(response);
            if (typeof deposit_assets !== 'undefined' && deposit_assets.length > 0) {
                input_currency.find('option:not(:first-child)').remove();
                jQuery.each(deposit_assets, function (index, el) {
                    let value = el;
                    console.log(value);
                    input_currency.append(
                        '<option data-rate="' + value.asset_rate_rubles +
                        '" data-requisites="' + value.asset_requisites + '" value="' +
                        value.asset_name + '">' + value.asset_name + '</option>'
                    );
                });
                input_currency.find('option:nth-child(2)').prop('selected', true);

                let requisites = jQuery('form#other_deposit select.other_deposit.requisites');
                requisites.find('option').not(':first-child').remove();
                requisites.append('<option selected>' + input_currency.find('option:selected').attr('data-requisites') + '</option>');
                requisites.find('option:nth-child(2)').prop('selected', true);
            }
            //console.log(deposit_assets);
        });
    });
    ////////////////////////////////////////////
    //output_sum = (input_sum*input_rate)/output_rate
    //input_sum = (output_sum*output_rate)/input_rate
</script>
