<div class="col-lg-12 col-md-12"  style="z-index: 4; /*margin-top: 10px;*/">
    <div class="row">
        <div class="coop_maps question-bg col-lg-12">
            <div class="row">
                <div class="col-lg-2">
                    <!--Изображение профиля--> <!-- /wp-content/uploads/2019/12/profil_index_img.png -->
                    <img src="<?php echo $avatar_url?>" class="profil-index-img">
                </div>
                <div class="col-lg-8">
                    <!--Имя авторизированного пользователя -->
                    <h1 class="profil-user-h1">
                        С возвращением, <?php echo $username ?>!
                    </h1>
                    <?php if ($is_verified == 'yes'): ?>
                        <p class="profil-user-verification" style="color: #179F37;">
                            Профиль верифицирован
                        </p>
                    <?php else: ?>
                        <p class="profil-user-verification" style="color: red;">
                            Профиль не верифицирован
                        </p>
                    <?php endif ?>
                </div>
                <div class="col-lg-2" style="margin-top: 5%">
                    <div class="btn-modal">
                        <input type="button" class="btn-custom-two text-center" onclick="document.location.href='<?php echo wp_logout_url('http://slv.a99953zd.beget.tech'); ?>';" value="Выход">
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-4 input-exchange">
                        <form class="row" name="profile" id="your-profile" action="" method="post"  enctype="multipart/form-data">
                            <span>Имя пользователя</span>
                            <input id="username_input" value="<?php echo $username ?>" type="text" name="">
                        </form>
                    </div>
                    <div class="col-lg-4 input-exchange ">
                        <div class="row ">
                            <span class="select-exchange">Email</span>
                            <div class="select-exchange w-100">
<!--                                <input value="example@gmail.com" class="verification-ok" type="email" name="">-->
                                <form class="row" name="profile" id="your-profile" action="" method="post"  enctype="multipart/form-data">
                                    <?php echo $user_email ?>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 input-exchange">
                        <form class="row" name="profile" id="your-profile" action="" method="post"  enctype="multipart/form-data">
                            <span>Телефон</span>
<!--                            <input value="8 (911) 718 25 22" class="verification-ok" type="text" name="">-->
                                <?php echo $user_phone ?>
                        </form>
                    </div>

<!--                    <div class="col-12" style="text-align: center; margin-top: 30px;">-->
<!--                        <input type="submit" id="cpsubmit" class="btn-custom-two" value="Обновить профиль" onclick="return rcl_check_profile_form();" name="submit_user_profile" />-->
<!--                    </div>-->
                </div>
                <?php //if (isset($_POST)) var_dump($_POST); ?>
            </div>
        </div>
        <div class="coop_maps question-bg col-lg-12">
            <h1 class="coop_maps-h1">Реферальная ссылка</h1>
            <div class="col-lg-4 input-exchange  input-custom-copy">
                <form class="row" name="profile_link" id="your-profile" action="" method="post"  enctype="multipart/form-data">
                    <?php echo $user_ref_link ?>
<!--                    <input placeholder="" value="https://slavia.com/5467889" type="text" name="">-->
                </form>
            </div>
        </div>
        <div class="coop_maps question-bg col-lg-12">
            <h1 class="coop_maps-h1">Номер пайщика</h1>
            <div class="col-lg-4 input-exchange  input-custom-copy">
                <form class="row" name="profile_client_num" id="your-profile" action="" method="post"  enctype="multipart/form-data">
                    <?php echo $client_num ?>
<!--                    <input placeholder="" value="00073" type="text" name="">-->
                </form>
            </div>
        </div>
        <div class="coop_maps question-bg col-lg-12">
            <h1 class="coop_maps-h1">Ваш адрес Prizm</h1>
            <div class="row">
                <div class="col-lg-6 input-exchange  custom-padding input-custom-copy">
                    <form class="row" name="profile_prizm_address" id="your-profile" action="" method="post"  enctype="multipart/form-data">
                        <span>Адрес PRIZM</span>
                        <?php echo $prizm_address ?>
<!--                        <input placeholder="" value="00073" type="text" name="">-->
                    </form>
                </div>
                <div class="col-lg-6 input-exchange custom-padding  input-custom-copy">
                    <form class="row" name="profile_prizm_publickey" id="your-profile" action="" method="post"  enctype="multipart/form-data">
                        <span>Публичный ключ</span>
                        <?php echo $prizm_public_key ?>
<!--                        <input placeholder="" value="00073" type="text" name="">-->
                    </form>
                </div>
            </div>
        </div>
        <div class="coop_maps question-bg col-lg-12">
            <h1 class="coop_maps-h1">Ваш адрес Waves</h1>
            <div class="col-lg-12 input-exchange  input-custom-copy">
                <form class="row" name="profile_waves_address" id="your-profile" action="" method="post"  enctype="multipart/form-data">
                    <span>Адрес Waves</span>
                    <?php echo $waves_address ?>
<!--                    <input placeholder="" value="00073" type="text" name="">-->
                </form>
            </div>
        </div>

        <!--VERIFICATION-->
        <div class="coop_maps question-bg col-lg-12">
            <h1 class="coop_maps-h1 ib">Верификация профиля</h1>
            <a id="modal-54506521" href="#modal-container-54506521" role="button" class="" data-toggle="modal"><img src="/wp-content/uploads/2019/12/info.png" class="ib info-href"></a>

            <form class="col-12" name="profile_verification" id="profile_verification" action="" method="post"  enctype='multipart/form-data'>
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-4 input-exchange">
                        <div class="row">

                            <input <?php if (isset($verification)): ?>value="<?=$verification['name']?>"<?php endif; ?>placeholder="Имя" required type="text" name="verification[name]">
                        </div>
                    </div>
                    <div class="col-lg-4 input-exchange ">
                        <div class="row ">

                            <div class="select-exchange w-100">
                                <input <?php if (isset($verification)): ?>value="<?=$verification['surname']?>" <?php endif; ?>placeholder="Фамилия" required class="" type="text" name="verification[surname]">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 input-exchange">
                        <div class="row">

                            <input <?php if (isset($verification)): ?>value="<?=$verification['last_name']?>" <?php endif; ?>placeholder="Отчество" required class="" type="text" name="verification[last_name]">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-4 input-exchange">
                        <div class="row">
                            <span>Серия и номер паспорта</span>
                            <input <?php if (isset($verification)): ?>value="<?=$verification['passport_number']?>" <?php endif; ?>placeholder="____-______" required  type="text" name="verification[passport_number]">
                        </div>
                    </div>
                    <div class="col-lg-4 input-exchange ">
                        <div class="row ">
                            <span>&nbsp;</span>
                            <div class="select-exchange w-100">
                                <input <?php if (isset($verification)): ?>value="<?=$verification['passport_date']?>" <?php endif; ?> placeholder="Дата выдачи" required class="" type="date" name="verification[passport_date]">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 input-exchange">
                        <div class="row">
                            <span>&nbsp;</span>
                            <input <?php if (isset($verification)): ?>value="<?=$verification['passport_code']?>" <?php endif; ?> placeholder="Код подразделения" required class="" type="text" name="verification[passport_code]">
                        </div>
                    </div>
                    <div class="col-lg-12 input-exchange">
                        <div class="row">
                            <span>&nbsp;</span>
                            <input <?php if (isset($verification)): ?>value="<?=$verification['passport_who']?>" <?php endif; ?> placeholder="Кем выдан" required class="" type="text" name="verification[passport_who]">
                        </div>
                    </div>
                    <?php if (isset($verification) && isset($passport_photos) && !empty($passport_photos) && !empty($verification)): ?>
                    <div class="col-lg-12 passport-photo">
                        <div class="row">
                            <?php foreach($passport_photos as $key => $value): ?>
                                <div class="col-lg-4 passport-img">
                                    <img src="<?=$value?>">
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php else: ?>
                    <!--PHOTO -->
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="skrepka w-100 text-center">
                                <img src="/wp-content/uploads/2019/12/skrepka.png" style="margin-left: 20%">
                                <input required accept="image/*" data-multiple-caption="{count} файлов выбрано" multiple type="file" name="passport_photos[]" id="passport_photos" class="upload" />
                                <label for="passport_photos">Прикрепить фото</label>
                            </div>

                            <input type="submit" class="btn-custom-one w-100 text-center" id="submit_verification" value="Завершить регистрацию" name="submit_verification" style="margin-top: 30px; height: 42px"/>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="row">
                            <p class="passport-text">
                                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam
                            </p>
                        </div>
                    </div>
                    <?php endif; ?>

                </div>
            </div>
            </form>
        </div>
        <!-- Статистика -->
        <?php if ($is_manager): ?>
        <div class="coop_maps question-bg col-lg-12">
            <div class="row">
                <div class="col-12">
                    <h1 class="coop_maps-h1 ib">Статистика</h1>
                    <div class="ib" style="float:right">
                        <h1 class="coop_maps-h1 ib" style="font-size: 16px;">08.11.19</h1>
                        <img src="/wp-content/uploads/2019/12/calendar.png" class="ib" style="">
                        <img src="/wp-content/uploads/2019/12/loop.png" class="ib" style="margin-top: 10px;">
                        <img src="/wp-content/uploads/2019/12/donw.png" class="ib" style=" ">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="table-title w-100">
                    <div class="row">

                        <div class="col-4 text-left" style="padding-left: 42px;">
                            Имя клиента
                        </div>
                        <div class="col-3 text-left">
                            Номер пайщика
                        </div>
                        <div class="col-2 text-left">
                            Обменов
                        </div>
                        <div class="col-3 text-left">
                            На сумму
                        </div>
                    </div>
                </div>
                <div class="table-text w-100">
                    <div class="row">
                        <div class="col-4 text-left" style="padding-left: 42px;">
                            Имя Фамилия Отчество
                        </div>
                        <div class="col-3 text-left">
                            00002
                        </div>
                        <div class="col-2 text-left">
                            5
                        </div>
                        <div class="col-3 text-left">
                            15 600 RUB
                        </div>
                    </div>
                </div><div class="table-text w-100">
                    <div class="row">
                        <div class="col-4 text-left" style="padding-left: 42px;">
                            Имя Фамилия Отчество
                        </div>
                        <div class="col-3 text-left">
                            00002
                        </div>
                        <div class="col-2 text-left">
                            5
                        </div>
                        <div class="col-3 text-left">
                            15 600 RUB
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

    </div>
</div>
<!--Модальное окно информации -->
<div class="modal fade" id="modal-container-54506521" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content text-left">
            <div class="row">
                <div class="col-10">
                    <h1 class="coop_maps-h1 ib">Верификация профиля</h1>
                </div>
                <div class="col-2">
                    <button type="button" class="close ib " data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

            </div>

            Здесь будет видео
        </div>
    </div>
</div>