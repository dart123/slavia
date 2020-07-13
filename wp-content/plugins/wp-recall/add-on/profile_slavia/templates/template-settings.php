<div class="col-lg-12 col-md-12"  style="z-index: 4; /*margin-top: 10px;*/">
    <div class="row">
        <div class="coop_maps question-bg col-lg-12">
            <h1 class="coop_maps-h1 ib">Настройки комиссии банков</h1>


            <div class="col-12">
                <form class="row" name="settings_banks" id="settings_form_banks" action="" method="post"  enctype="multipart/form-data">
                    <?php if (isset($banks) && !empty($banks)): echo $banks;
                          else: ?>

                        <div class="col-lg-4 input-exchange input-custom-procent">
                            <div class="row">
                                <a class="settings_close">&times;</a>
                                <div class="select-exchange w-100">
                                    <input value="Название банка 1" type="text" name="bank1[name]" style="background: #fff">
                                    <input class="bank_value" value="0.5" type="text" name="bank1[value]">
                                    </div>
                                </div>
                        </div>

                    <?php endif; ?>
                </form>
            </div> <br>

            <div class="col-lg-6 text-center">
                <div class="row">
                    <div class="col-6">
                        <div id="add_bank" class="btn-custom-one">
                            Добавить банк
                        </div>
                    </div>
                    <div class="col-6">
                        <input style="width: 100%" form="settings_form_banks" type="submit" class="btn-custom-one" value="Сохранить" name="submit_settings_banks" />
                    </div>
                </div>
            </div>

        </div>
        <div class="coop_maps question-bg col-lg-12">
            <h1 class="coop_maps-h1 ib">Вознаграждение по реферальной программе</h1>


            <div class="col-12">
                <form class="row" name="settings_ref" id="settings_form_ref" action="" method="post"  enctype="multipart/form-data">

                    <div class='col-lg-4 input-exchange input-custom-procent'>
                        <div class='row' style='height: 100%; padding-top: 30px'>
                            <div class='select-exchange w-100'>
                                <div class='row'>
                                    <div class='col-12'>
                                        <span class='select-exchange' style='display: inline-block'>Обычные пользователи</span></div>
<!--                                    <div class='col-4'>-->
<!--                                        <a class='settings_close' style='display: inline-block; margin-left: -20px; margin-top: -5px'>&times;</a>-->
<!--                                    </div>-->
                                </div>
                                <?php //wp_dropdown_users( array( 'role__in' => array('manager', 'customer', 'user', 'not_verified', 'need-confirm'), 'name' => 'ref_user[0][id]', 'id' => 'ref_user_0', 'class' => 'user_dropdown' )); ?>
                                <?php $normal_percent = rcl_get_option('ref_percent_normal'); ?>
                                <input class='ref_value' value='<?=$normal_percent ?>' type='text' name='ref_normal_users[value]'>
                            </div>
                        </div>
                    </div>
                    <?php if (isset($ref_content) && !empty($ref_content)): echo $ref_content;
                          else: ?>
<!---->
<!--                    <div class="col-lg-4 input-exchange input-custom-procent">-->
<!--                        <div class="row">-->
<!--                            <span>За каждого реферала</span>-->
<!--                            <input value="0.5" type="text" name="ref_amount">-->
<!--                        </div>-->
<!--                    </div>-->

                        <div class='col-lg-4 input-exchange input-custom-procent'>
                            <div class='row' style='height: 100%; padding-top: 30px'>
                                <div class='select-exchange w-100'>
                                    <div class='row'><div class='col-8'>
                                            <span class='select-exchange' style='display: inline-block'>Пользователь</span></div>
                                        <div class='col-4'>
                                            <a class='settings_close' style='display: inline-block; margin-left: -20px; margin-top: -5px'>&times;</a>
                                        </div>
                                    </div>
                                    <?php wp_dropdown_users( array( 'role__in' => array('manager', 'customer', 'user', 'not_verified', 'need-confirm'), 'name' => 'ref_user[0][id]', 'id' => 'ref_user_0', 'class' => 'user_dropdown' )); ?>
                                    <input class='ref_value' value='0.5' type='text' name='ref_user[0][value]'>
                                </div>
                            </div>
                        </div>

                    <?php endif; ?>

<!--                    <div class="col-lg-3 text-center" style="padding-top: 8%; margin-left: 8%;">-->
<!--                        <div class="row">-->
<!--                            <input form="settings_form_ref" type="submit" class="btn-custom-one" value="Сохранить" name="submit_settings_ref" />-->
<!--                        </div>-->
<!--                    </div>-->


                </form>
            </div>
            <br>
            <div class="col-lg-8 text-center">
                <div class="row">
                    <div class="col-6">
                        <div id="add_ref_user" class="btn-custom-one" style="width: 100%">
                            <span>Добавить пользователя</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <input style="width: 100%" form="settings_form_ref" type="submit" class="btn-custom-one" value="Сохранить" name="" />
                    </div>
                </div>
            </div>


        </div>

        <div class="coop_maps question-bg col-lg-12 settings-commission">
            <h1 class="coop_maps-h1 ib" style="color: red">В РАЗРАБОТКЕ</h1><br>
            <h1 class="coop_maps-h1 ib">Настройка процентов по обмену</h1>

            <div class="currency-template" style="display: none;">
                <select class="currencies">
                    <?php
                        $asset_inputs = get_input_currencies();
                        $asset_outputs = get_output_currencies();
                        $currencies = $asset_inputs;
                        foreach ($asset_outputs as $asset_output)
                        {
                            $is_same = false;
                            foreach ($currencies as $currency)
                            {
                                if ( (strtolower($asset_output['asset_name']) == strtolower($currency['asset_name'])) ||
                                    (strtolower($asset_output['asset_name']) == 'rub' && strtolower($currency['asset_name']) == 'рубль') ||
                                    (strtolower($asset_output['asset_name']) == 'рубль' && strtolower($currency['asset_name']) == 'rub')
                                   )
                                {
                                    $is_same = true;
                                    break;
                                }
                            }
                            if ($is_same)
                                continue;
                            else
                                array_push($currencies, $asset_output);
                        }

                        foreach ($currencies as $currency): ?>

                            <option data-rate="<?=$currency['asset_rate_rubles']?>" value="<?=htmlspecialchars($currency['asset_name'], ENT_QUOTES, 'UTF-8')?>">
                                <?=$currency['asset_name']?>
                            </option>

                        <?php endforeach;
                            //print '<pre>'.print_r($asset_output, true).'</pre>';
                    ?>
                </select>
            </div>

            <div class="input_currency_template" style="display: none;">
                <select class="input_currencies">
                    <?php foreach($asset_inputs as $input): ?>
                        <option data-rate="<?=$input['asset_rate_rubles']?>" value="<?=htmlspecialchars($input['asset_name'], ENT_QUOTES, 'UTF-8')?>">
                            <?=$input['asset_name']?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="output_currency_template" style="display: none">
                <select class="output_currencies">
                    <?php foreach($asset_outputs as $output): ?>
                        <option data-rate="<?=$output['asset_rate_rubles']?>" value="<?=htmlspecialchars($output['asset_name'], ENT_QUOTES, 'UTF-8')?>">
                            <?=$output['asset_name']?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="col-12">
                <!--ЕДИНИЦЫ ИЗМЕРЕНИЯ-->
                <form class="row" name="settings_commission-all" id="settings_form_commission-all" action="" method="post"  enctype="multipart/form-data">
                    <input type="hidden" name="currency_percent" value="true">
                    <div class="col-12 commission_container">
                        <div id="all-operations_header" class="row">
                            <div class="col-6">
                                <p class="operation_name">Обычные операции</p>
                            </div>
                        </div>
                        <div id="all-operations" class="row no-gutters">
                            <?php
                            $currency_percents = rcl_get_option('currency_percent');
                            //print '<pre>'.print_r($currency_percents, true).'</pre>';
                            ?>
                            <div class="col-2 operation_header">
<!--                                <p class="operation_name">Обычные операции</p>-->
<!--                                <p class="acquiring-percent">комиссия эквайринга</p>-->
                            </div>

                            <div class="col-10">
                                <div class="row no-gutters operation_currencies">
                                    <div class="col-2">
                                        <p class="ruble-sign"><span>комиссия эквайринга</span></p>
                                        <div class='col-12 input-exchange input-custom-procent'>
                                            <input class='commission' value='<?php if (isset($currency_percents['acquiring'])) echo $currency_percents['acquiring']?>' type='text' name='currency_percent[acquiring]'>
                                        </div>
                                    </div>

                                    <div class="col-2">
                                        <p class="commission_header"><span>комиссия сайта</span></p>
                                        <div class='col-12 input-exchange input-custom-procent'>
                                            <input class='commission' value='<?php if (isset($currency_percents['site'])) echo $currency_percents['site']?>' placeholder="" type='text' name='currency_percent[site]'>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <p class="commission_header"><span>SLAV</span></p>
                                        <div class='col-12 input-exchange input-custom-procent'>
                                            <input class='commission' value='<?php if (isset($currency_percents['slav'])) echo $currency_percents['slav']?>' placeholder="" type='text' name='currency_percent[slav]'>
                                        </div>
                                    </div>

                                    <div class="col-2">
                                        <p class="commission_header"><span>PZM</span></p>
                                        <div class='col-12 input-exchange input-custom-procent'>
                                            <input class='commission' value='<?php if (isset($currency_percents['prizm'])) echo $currency_percents['prizm']?>' placeholder="" type='text' name='currency_percent[prizm]'>
                                        </div>
                                    </div>

                                    <div class="col-2">
                                        <p class="commission_header"><span>ALT</span></p>
                                        <div class='col-12 input-exchange input-custom-procent'>
                                            <input class='commission' value='<?php if (isset($currency_percents['alt'])) echo $currency_percents['alt']?>' placeholder="" type='text' name='currency_percent[alt]'>
                                        </div>
                                    </div>

                                    <?php if (isset($currency_percents) && !empty($currency_percents)): ?>
                                        <?php foreach($currency_percents as $currency => $percent): ?>
                                            <?php if ($currency != 'acquiring' && $currency != 'site' &&
                                                    $currency != 'slav' && $currency != 'prizm' && $currency != 'alt'): ?>
                                                <div class="col-2">
                                                    <p class="commission_header">
                                                        <?//=$currency?>
                                                        <select class="currencies">
                                                            <option value="<?=htmlspecialchars($currency, ENT_QUOTES, 'UTF-8')?>"><?=$currency?></option>
                                                        </select>
                                                    </p>
                                                    <div class='col-12 input-exchange input-custom-procent'>
                                                        <input class='commission' value='<?=$percent?>' placeholder="" type='text' name='currency_percent[<?=htmlspecialchars($currency, ENT_QUOTES, 'UTF-8')?>]'>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endif;?>
<!--                                    <div class="col-2">-->
<!--                                        <p class="commission_header">ALT</p>-->
<!--                                        <div class='col-12 input-exchange input-custom-procent'>-->
<!--                                            <input class='commission' value='5' placeholder="" type='text' name='percent[all][alt]'>-->
<!--                                        </div>-->
<!--                                    </div>-->
                                </div>
                            </div>


                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-10">
                        <div class="row">
                            <div class="col-6">
                                <button id="add_currency" class="btn-custom-one" style="width: 100%">
                                    <span>Добавить единицу измерения</span>
                                </button>
                            </div>
                            <div class="col-6" style="">
                                <input style="width: 100%" form="settings_form_commission-all" type="submit" class="btn-custom-one" value="Сохранить" name="">
                            </div>
                        </div>
                    </div>
                </div>
                <!--------------------------------------->
                <!--НАСТРОЙКА ОПЕРАЦИЙ-->
                <form class="row" name="settings_commission-operations" id="settings_form_commission-operations" action="" method="post"  enctype="multipart/form-data">
                    <input type="hidden" name="operation_percent" value="true">
                    <?php
                        $operation_percents = rcl_get_option('operation_percent');
                    ?>
                    <div class="col-12 commission_container">
                        <div id="operations_header" class="row">
                            <div class="col-6">
                                <p class="operation_name">Управление операциями</p>
                            </div>
                        </div>
                        <div id="operations" class="row no-gutters">
                            <?php if (isset($operation_percents) && !empty($operation_percents)):?>
                                <?php foreach($operation_percents as $name => $percent): ?>
                                    <div class="col-12 operation_item">
                                        <div class="row no-gutters">
                                            <div class="col-2 operation_header">
                                                <p class="operation_name">
                                                    <?php //$first_asset_name = htmlspecialchars($asset_inputs[0]['asset_name'], ENT_QUOTES, 'UTF-8'); ?>
                                                    <select class="operation_type" name="percent[<?=$name//$first_asset_name?>][type]">
                                                        <?php if ($percent['type'] == 'buy'): ?>
                                                            <option selected value="buy">Покупка</option>
                                                            <option value="sell">Продажа</option>
                                                        <?php elseif ($percent['type'] == 'sell'): ?>
                                                            <option value="buy">Покупка</option>
                                                            <option selected value="sell">Продажа</option>
                                                        <?php endif; ?>
                                                    </select>
                                                    <select class="operation_currency">
                                                        <?php $rate = ''; ?>
        <!--                                                <option value="PZM">PZM</option>-->
                                                        <?php
                                                            foreach($asset_inputs as $input)
                                                                if ($input['asset_name'] == $name)
                                                                    $rate = $input['asset_rate_rubles'];
                                                            ?>
                                                            <option data-rate="<?=$rate?>" value="<?=htmlspecialchars($name, ENT_QUOTES, 'UTF-8')?>">
                                                                <?=$name?>
                                                            </option>
                                                        <?php //endforeach; ?>
                                                    </select>
                                                </p>
                <!--                                <p class="acquiring-percent">комиссия эквайринга</p>-->
                                            </div>

                                            <div class="col-10">
                                                <div class="row no-gutters operation_currencies">
                                                    <?php foreach ($percent as $currency => $value): ?>
                                                        <?php if ($currency !== 'type'): ?>
                                                            <div class="col-2">
                                                                <?php if ($currency == 'acquiring'): ?>
                                                                    <p class="ruble-sign"><span>комиссия эквайринга</span></p>
                                                                <?php elseif ($currency == 'site'): ?>
                                                                    <p class="commission_header"><span>комиссия сайта</span></p>
                                                                <?php elseif ($currency !== 'slav' || $currency !== 'prizm' || $currency !== 'alt'): ?>
                                                                    <p class="commission_header"><span><?=strtoupper($currency)?></span></p>
                                                                <?php else: ?>
                                                                    <p class="commission_header"><span><?=$currency?></span></p>
                                                                <?php endif; ?>

                                                                <div class='col-12 input-exchange input-custom-procent'>
                                                                    <input class='commission' value='<?=$value?>' type='text' name='percent[<?=$name?>][<?=$currency?>]'>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>

                                                    <?php endforeach; ?>



                                                        <div class="col-3 currency_rate">
                                                            <p class="commission_header"><span>курс</span></p>
                                                            <div class='col-12 input-exchange input-custom-rub'>
                                                                <input disabled class='commission' value='<?=/*rcl_slavia_get_crypto_price('PZM')*/$rate . " RUB"; ?>' placeholder="" type='text'>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>

                        </div>
                    </div>
                </form>

                <div class="row">
                    <div class="col-10">
                        <div class="row">
                            <div class="col-6">
                                <button id="add_operation" class="btn-custom-one" style="width: 100%">
                                    <span>Добавить операцию</span>
                                </button>
                            </div>
                            <div class="col-6" style="">
                                <input style="width: 100%" form="settings_form_commission-operations" type="submit" class="btn-custom-one" value="Сохранить" name="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="user_dropdown_template" style="display: none">
    <?php wp_dropdown_users( array( 'role__in' => array('manager', 'customer', 'user', 'not_verified', 'need-confirm'), 'class' => 'user_dropdown')); ?>
</div>
<style>
    .input-exchange {
        margin-top: 0px;
    }
    .input-exchange span {
        font-size: 18px;
        padding-left: 0;
    }

    .user_dropdown {
        padding-right: 45px;
    }
</style>