<?php

require_once 'classes/class-rcl-profile-fields.php';

if (is_admin())
    require_once 'admin/index.php';

if (!is_admin()):
    add_action('rcl_enqueue_scripts','rcl_profile_scripts',10);
endif;

function rcl_profile_scripts(){
    global $user_ID;
    if(rcl_is_office($user_ID)){
        rcl_enqueue_style( 'rcl-profile', rcl_addon_url('style.css', __FILE__) );
        rcl_enqueue_script( 'rcl-profile-scripts', rcl_addon_url('js/scripts.js', __FILE__) );
        //wp_enqueue_script( 'rcl-profile-scripts', rcl_addon_url('js/scripts.js', __FILE__), array('my_jquery'), '1.0', true );
    }
}

add_filter('rcl_init_js_variables','rcl_init_js_profile_variables',10);
function rcl_init_js_profile_variables($data){
    $data['local']['no_repeat_pass'] = __('Repeated password not correct!','wp-recall');
    return $data;
}

//Получить текущую роль
function rcl_get_current_role()
{
    if (!isset(wp_get_current_user()->roles) || !wp_get_current_user()->roles) //Если не назначена роль, не фильтруем табы
        return false;
    $roles = wp_get_current_user()->roles;
    $current_role = array_shift($roles);
    return $current_role;
}

//Удаление таба
function rcl_block_profile_pages_by_role($tab)
{
    if (parse_url($_SERVER['REQUEST_URI'])['path'] == '/profile/') {
        if (!rcl_get_current_role()) //Если не назначена роль, не фильтруем табы
            return $tab;
        $current_role = rcl_get_current_role();

        if ($current_role == 'manager') {
            if ($tab['id'] == 'settings') {
                $tab = array();
            }
        }
        if ($current_role == 'user' || $current_role == 'need-confirm')
        {
            if ($tab['id'] == 'requests' || $tab['id'] == 'people' || $tab['id'] == 'settings') {
                $tab = array();
            }
        }
    }
    return $tab;
}
add_filter('rcl_tab', 'rcl_block_profile_pages_by_role', 10, 1);

//Фильтр дефолтных полей профиля
add_filter('rcl_default_profile_fields', 'change_default_profile_fields', 10, 1);
function change_default_profile_fields($fields){
    global $userdata;
    foreach ($fields as $field)
    {
        if ($field['slug'] == 'user_email')
            $field += array('value' => $userdata->user_email);
    }
    return $fields;

}
//Фильтр ВСЕХ полей лк
add_filter('rcl_profile_fields', 'add_profile_fields', 10);
//add_filter('rcl_public_form_fields', 'add_profile_fields', 10);
function add_profile_fields($fields){

    $fields[] = array(
        'type' => 'tel',
        'slug' => 'user_phone',
        'title' => 'Телефон',
    );

    $fields[] = array(
        'type' => 'url',
        'slug' => 'user_ref_link',
        'title' => 'Реферальная ссылка',
    );

    $fields[] = array(
        'type' => 'text',
        'slug' => 'client_num',
        'title' => 'Номер пайщика',
    );

    $fields[] = array(
        'type' => 'text',
        'slug' => 'prizm_address',
        'title' => 'Адрес PRIZM',
    );

    $fields[] = array(
        'type' => 'text',
        'slug' => 'prizm_public_key',
        'title' => 'Публичный ключ',
    );

    $fields[] = array(
        'type' => 'text',
        'slug' => 'waves_address',
        'title' => 'Адрес Waves',
    );

    $fields[] = array(
        'type' => 'text',
        'slug' => 'is_verified',
        'title' => 'Верификация профиля',
    );
    //Верификация
    $fields[] = array(
        'type' => 'custom',
        'slug' => 'verification',
        'title' => 'Данные верификации',
        'content' => '',
    );
    //Фото паспорта
    $fields[] = array(
        'type' => 'custom',
        'slug' => 'passport_photos',
        'title' => 'Фото паспорта',
        'content' => '',
    );

    return $fields;
}

//Генерация документов пользователя
function generate_user_documents()
{

}
//Добавление документов для данного пользователя
add_filter('rcl_profile_fields', 'add_user_documents', 10);
//Добавить все параметры документа из сгенерированного документа (название, число и ссылку на загрузку)
function add_user_documents($fields)
{
    $fields[] = array(
        'type' => 'custom',
        'slug' => 'user_documents',
        'title' => 'Документы пользователя',
        'values' => array(
            array('date' => '08.11.19', 'filename' => 'document1.docx', 'url' => '/wp-content/uploads/2019/12/don.png'),
            array('date' => '09.12.19', 'filename' => 'document2.docx', 'url' => '/wp-content/uploads/2019/12/operation_dis.png')
        ),
    );
    $content = '';
    foreach ($fields[count($fields) - 1]['values'] as $value)
    {
        $content .= '<div class="table-text w-100">' .
            '<div class="row">' .
            '<div class="col-2 text-center">' . $value['date'] . '</div>' .
            '<div class="col-8 text-left">' . $value['filename'] . '</div>' .
            '<div class="col-2 text-center">
                <a href="' . $value['url'] . '" download>
                    <img src="/wp-content/uploads/2019/12/don.png">
                </a>
            </div>
            </div>
            </div>';
    }
    $fields[count($fields) - 1] += array("content" => $content);
    //var_dump($fields[count($fields) - 1]);

    return $fields;
}

//add_filter('rcl_profile_fields', 'add_user_verification', 10);
////Верификация
//function add_user_verification($fields)
//{
//    $fields[] = array(
//        'type' => 'custom',
//        'slug' => 'verification',
//        'title' => 'Данные верификации',
//        'values' =>
//            array('name' => '', 'surname' => '', 'last_name' => '', 'passport_number' => '',
//                'passport_date' => '', 'passport_code' => '', 'passport_who' => '', 'passport-photos' => array('', ''))
//    );
//    $content = '';
//    foreach ($fields[count($fields) - 1]['values'] as $value)
//    {
//    }
//    $fields[count($fields) - 1] += array("content" => $content);
//    //var_dump($fields[count($fields) - 1]);
//
//    return $fields;
//}

add_action('init','rcl_tab_profile');
add_action('init','rcl_tab_exchange');
add_action('init','rcl_tab_operations');
add_action('init','rcl_tab_documents');
add_action('init','rcl_tab_people');
add_action('init','rcl_tab_requests');
add_action('init','rcl_tab_settings');

function rcl_tab_template_content()
{
    global $userdata, $user_ID;

    $profileFields = rcl_get_profile_fields(array('user_id'=>$user_ID));

    $CF = new Rcl_Custom_Fields();

    $profileFields = stripslashes_deep($profileFields);

    $hiddens = array();

    $profile_args = array();

    $profileFields = apply_filters('rcl_default_profile_fields', $profileFields);

    foreach($profileFields as $field) {

        $field = apply_filters('custom_field_profile', $field);

        $slug = isset($field['name']) ? $field['name'] : $field['slug'];

        if (!$field || !$slug) continue;

        if ($field['type'] == 'hidden') {
            $hiddens[] = $field;
            continue;
        }

        $value = (isset($userdata->$slug)) ? $userdata->$slug : false;

        if ($slug == 'email')
            $value = $userdata->user_email;//get_the_author_meta('email', $user_ID);
        //$field['value'] = $value;

        $label = sprintf('<label>%s:</label>',$CF->get_title($field));

//        if($field['slug'] != 'show_admin_bar_front' && !isset($field['value_in_key']) )
//            $field['value_in_key'] = true;
        //$star = (isset($field['required'])&&$field['required']==1)? ' <span class="required">*</span> ': '';

        $field_name = $slug;//$CF->get_slug($field);
        $field_value = null;
        if ($field_name != 'is_verified' && $field_name != 'verification' && $field_name != 'passport_photos') {
            $field_value = /*$label . */$CF->get_input($field, $value);
            $field_value = apply_filters('profile_options_rcl', $field_value, $userdata);
        }
        else {
            if ($field_name == 'verification' || $field_name == 'passport_photos' || $field_name == 'is_verified') {
                $field_value = $value;
            }
        }
        $profile_args += array($field_name => $field_value);
    } //foreach

    //$profile_args += array('user_id' => $user_ID);
    //Является ли менеджером
    if (rcl_get_current_role() == 'manager' || rcl_get_current_role() == 'administrator' || rcl_get_current_role() == 'director')
        $profile_args += array('is_manager' => true);
    else
        $profile_args += array('is_manager' => false);

    //Имя/фамилия пользователя
    $profile_args += array('username' => $userdata->display_name);

    //Аватар
    $profile_args += array('avatar_url' => get_avatar_url( $user_ID ));
    return $profile_args;
}

//PROFILE TAB
function rcl_tab_profile(){

    rcl_tab(
        array(
            'id'=>'profile',
            'name'=>'Профиль',
            'supports'=>array('ajax'),
            'public'=>0,
            'icon'=>'/wp-content/uploads/2019/12/home_dis.png',
            'content'=>array(
                array(
                    'callback' => array(
                        'name'=>'rcl_tab_profile_content'
                    )
                )
            )
        )
    );

}
function rcl_tab_profile_content($master_id)
{
    $profile_args = rcl_tab_template_content();
    $content = rcl_get_include_template('template-profile.php', __FILE__, $profile_args);

//    $content = '<h3>'.__('User profile','wp-recall').' '.$userdata->display_name.'</h3>
//    <form name="profile" id="your-profile" action="" method="post"  enctype="multipart/form-data">';
//
//    $CF = new Rcl_Custom_Fields();
//
//    $profileFields = stripslashes_deep($profileFields);
//
//    $hiddens = array();
//    foreach($profileFields as $field){
//
//        $field = apply_filters('custom_field_profile',$field);
//
//        $slug = isset($field['name'])? $field['name']: $field['slug'];
//
//        if(!$field || !$slug) continue;
//
//        if($field['type'] == 'hidden'){
//            $hiddens[] = $field; continue;
//        }
//
//        $value = (isset($userdata->$slug))? $userdata->$slug: false;
//
//        if($slug == 'email')
//            $value = get_the_author_meta('email',$user_ID);
//
//        if($field['slug'] != 'show_admin_bar_front' && !isset($field['value_in_key']) )
//            $field['value_in_key'] = true;
//
//        $star = (isset($field['required'])&&$field['required']==1)? ' <span class="required">*</span> ': '';
//
//        $label = sprintf('<label>%s%s:</label>',$CF->get_title($field),$star);
//
//        $content.=$label;
//        //$Table->add_row(array($label, $CF->get_input($field, $value)), array('id'=>array('profile-field-'.$slug)));
//        $content.=$CF->get_input($field, $value);
//
//    }
//
//    //$content .= $Table->get_table();
//
//    foreach($hiddens as $field){
//        $content .= $CF->get_input($field, $value = (isset($userdata->$slug))? $userdata->$slug: false);
//    }
//
//    $content .= "<script>
//                jQuery(function(){
//                    jQuery('#your-profile').find('.required-checkbox').each(function(){
//                        var name = jQuery(this).attr('name');
//                        var chekval = jQuery('#your-profile input[name=\"'+name+'\"]:checked').val();
//                        if(chekval) jQuery('#your-profile input[name=\"'+name+'\"]').attr('required',false);
//                        else jQuery('#your-profile input[name=\"'+name+'\"]').attr('required',true);
//                    });"
//                . "});"
//            . "</script>";
//
//    $content = apply_filters('profile_options_rcl',$content,$userdata);
//
//    $content .= wp_nonce_field( 'update-profile_' . $user_ID,'_wpnonce',true,false ).'
//        <div style="text-align:right;">'
//            . '<input type="submit" id="cpsubmit" class="recall-button" value="'.__('Update profile','wp-recall').'" onclick="return rcl_check_profile_form();" name="submit_user_profile" />
//        </div>
//    </form>';
//
//    if(rcl_get_option('delete_user_account')){
//        $content .= '
//        <form method="post" action="" name="delete_account" onsubmit="return confirm(\''.__('Are you sure? It can’t be restaured!','wp-recall').'\');">
//        '.wp_nonce_field('delete-user-'.$user_ID,'_wpnonce',true,false).'
//        <input type="submit" id="delete_acc" class="recall-button"  value="'.__('Delete your profile','wp-recall').'" name="rcl_delete_user_account"/>
//        </form>';
    //}

    return $content;
}
/**********************/

//PROFILE TAB
function rcl_tab_exchange(){

    rcl_tab(
        array(
            'id'=>'exchange',
            'name'=>'Обмен паями',
            'supports'=>array('ajax'),
            'public'=>0,
            'icon'=>'/wp-content/uploads/2020/01/exchange_dis.png',
            'content'=>array(
                array(
                    'callback' => array(
                        'name'=>'rcl_tab_exchange_content'
                    )
                )
            )
        )
    );

}
function rcl_tab_exchange_content($master_id)
{
    $profile_args = rcl_tab_template_content();

    $bank_options = rcl_get_option('banks');

    if (isset($bank_options) && !empty($bank_options))
    {
        $profile_args += array('banks' => $bank_options);
    }

    $content = rcl_get_include_template('template-exchange.php', __FILE__, $profile_args);

//    $content = '<h3>'.__('User profile','wp-recall').' '.$userdata->display_name.'</h3>
//    <form name="profile" id="your-profile" action="" method="post"  enctype="multipart/form-data">';
//
//    $CF = new Rcl_Custom_Fields();
//
//    $profileFields = stripslashes_deep($profileFields);
//
//    $hiddens = array();
//    foreach($profileFields as $field){
//
//        $field = apply_filters('custom_field_profile',$field);
//
//        $slug = isset($field['name'])? $field['name']: $field['slug'];
//
//        if(!$field || !$slug) continue;
//
//        if($field['type'] == 'hidden'){
//            $hiddens[] = $field; continue;
//        }
//
//        $value = (isset($userdata->$slug))? $userdata->$slug: false;
//
//        if($slug == 'email')
//            $value = get_the_author_meta('email',$user_ID);
//
//        if($field['slug'] != 'show_admin_bar_front' && !isset($field['value_in_key']) )
//            $field['value_in_key'] = true;
//
//        $star = (isset($field['required'])&&$field['required']==1)? ' <span class="required">*</span> ': '';
//
//        $label = sprintf('<label>%s%s:</label>',$CF->get_title($field),$star);
//
//        $content.=$label;
//        //$Table->add_row(array($label, $CF->get_input($field, $value)), array('id'=>array('profile-field-'.$slug)));
//        $content.=$CF->get_input($field, $value);
//
//    }
//
//    //$content .= $Table->get_table();
//
//    foreach($hiddens as $field){
//        $content .= $CF->get_input($field, $value = (isset($userdata->$slug))? $userdata->$slug: false);
//    }
//
//    $content .= "<script>
//                jQuery(function(){
//                    jQuery('#your-profile').find('.required-checkbox').each(function(){
//                        var name = jQuery(this).attr('name');
//                        var chekval = jQuery('#your-profile input[name=\"'+name+'\"]:checked').val();
//                        if(chekval) jQuery('#your-profile input[name=\"'+name+'\"]').attr('required',false);
//                        else jQuery('#your-profile input[name=\"'+name+'\"]').attr('required',true);
//                    });"
//                . "});"
//            . "</script>";
//
//    $content = apply_filters('profile_options_rcl',$content,$userdata);
//
//    $content .= wp_nonce_field( 'update-profile_' . $user_ID,'_wpnonce',true,false ).'
//        <div style="text-align:right;">'
//            . '<input type="submit" id="cpsubmit" class="recall-button" value="'.__('Update profile','wp-recall').'" onclick="return rcl_check_profile_form();" name="submit_user_profile" />
//        </div>
//    </form>';
//
//    if(rcl_get_option('delete_user_account')){
//        $content .= '
//        <form method="post" action="" name="delete_account" onsubmit="return confirm(\''.__('Are you sure? It can’t be restaured!','wp-recall').'\');">
//        '.wp_nonce_field('delete-user-'.$user_ID,'_wpnonce',true,false).'
//        <input type="submit" id="delete_acc" class="recall-button"  value="'.__('Delete your profile','wp-recall').'" name="rcl_delete_user_account"/>
//        </form>';
    //}

    return $content;
}
/**********************/

//OPERATIONS TAB
function rcl_tab_operations(){

    rcl_tab(
        array(
            'id'=>'operations',
            'name'=>'Операции',
            'supports'=>array('ajax'),
            'public'=>0,
            'icon'=>'/wp-content/uploads/2019/12/operation_dis.png',
            'content'=>array(
                array(
                    'callback' => array(
                        'name'=>'rcl_tab_operations_content'
                    )
                )
            )
        )
    );

}
function rcl_tab_operations_content($master_id)
{
    global $userdata, $user_ID;

    $profileFields = rcl_get_profile_fields(array('user_id'=>$master_id));

    $Table = new Rcl_Table(array(
        'cols' => array(
            array(
                'width' => 30
            ),
            array(
                'width' => 70
            )
        ),
        'zebra' => true,
        //'border' => array('table', 'rows')
    ));

    $content = rcl_get_include_template('template-operations.php', __FILE__);
    return $content;
}
/********************************/

//DOCUMENTS TAB
function rcl_tab_documents(){

    rcl_tab(
        array(
            'id'=>'documents',
            'name'=>'Документы',
            'supports'=>array('ajax'),
            'public'=>0,
            'icon'=>'/wp-content/uploads/2019/12/document_dis.png',
            'content'=>array(
                array(
                    'callback' => array(
                        'name'=>'rcl_tab_documents_content'
                    )
                )
            )
        )
    );

}
function rcl_tab_documents_content($master_id)
{
    $profile_args = rcl_tab_template_content();
    $content = rcl_get_include_template('template-documents.php', __FILE__, $profile_args);
    return $content;
}
/******************************/

//PEOPLE LIST TAB
function rcl_tab_people(){

    rcl_tab(
        array(
            'id'=>'people',
            'name'=>'Люди',
            'supports'=>array('ajax'),
            'public'=>0,
            'icon'=>'/wp-content/uploads/2019/12/people_dis.png',
            'content'=>array(
                array(
                    'callback' => array(
                        'name'=>'rcl_tab_people_content'
                    )
                )
            )
        )
    );

}
function rcl_tab_people_content($master_id)
{
    global $userdata, $user_ID;

    $profileFields = rcl_get_profile_fields(array('user_id'=>$master_id));

    $Table = new Rcl_Table(array(
        'cols' => array(
            array(
                'width' => 30
            ),
            array(
                'width' => 70
            )
        ),
        'zebra' => true,
        //'border' => array('table', 'rows')
    ));

    $content = rcl_get_include_template('template-people.php', __FILE__);
    return $content;
}
/******************************/

//MANAGER REQUESTS TAB
function rcl_tab_requests(){

    rcl_tab(
        array(
            'id'=>'requests',
            'name'=>'Заявки',
            'supports'=>array('ajax'),
            'public'=>0,
            'icon'=>'/wp-content/uploads/2019/12/zayavki_dis.png',
            'content'=>array(
                array(
                    'callback' => array(
                        'name'=>'rcl_tab_requests_content'
                    )
                )
            )
        )
    );

}
function rcl_tab_requests_content($master_id)
{
    global $userdata, $user_ID;
//
//    $profileFields = rcl_get_profile_fields(array('user_id'=>$master_id));

    $profile_args = rcl_tab_template_content();

    $verification_requests = rcl_get_option('verification_requests');
    $verification_content = '';
    if (isset($verification_requests) && !empty($verification_requests))
    {
        $i = 0;
        foreach ($verification_requests as $key => $value)
        {
            $i++;
            $verification_content .= '<div class="table-text w-100">'.
                                        '<div class="row">'.
                                            '<div class="col-3 text-left" style="padding-left: 42px;">'.
                                               $value['name'].' '.$value['surname'].' '.$value['last_name'].
                                            '</div>'.
                                            '<div class="col-2 text-left">'.
                                                get_user_meta( $key, 'client_num', true ). //Возвращает client_num по id пользователя
                                            '</div>'.
                                            '<div class="col-2 text-left">'.
                                            '</div>
                                            <div class="col-2 text-right">
                                                <img src="/wp-content/uploads/2019/12/info.png" class="info-zayavki">
                                            </div>
                                            <div class="col-3 text-center">
                                                <div class="btn-custom-one btn-zayavki" id="request_approve_'.$key.'">
                            Одобрить
                                                </div>
                                            </div>
                                        </div>
                                    </div>';
        }
        $profile_args += array("verification_content" => $verification_content);
        //$profile_args += array("verification_requests" => $verification_requests);
    }

    $content = rcl_get_include_template('template-requests.php', __FILE__, $profile_args);
    return $content;
}
/******************************/

//ADMIN SETTINGS TAB
function rcl_tab_settings(){

    rcl_tab(
        array(
            'id'=>'settings',
            'name'=>'Настройки',
            'supports'=>array('ajax'),
            'public'=>0,
            'icon'=>'/wp-content/uploads/2019/12/settings_dis.png',
            'content'=>array(
                array(
                    'callback' => array(
                        'name'=>'rcl_tab_settings_content'
                    )
                )
            )
        )
    );

}
function rcl_tab_settings_content($master_id)
{
//    global $userdata, $user_ID;
//
//    $profileFields = rcl_get_profile_fields(array('user_id'=>$master_id));
//
//    $Table = new Rcl_Table(array(
//        'cols' => array(
//            array(
//                'width' => 30
//            ),
//            array(
//                'width' => 70
//            )
//        ),
//        'zebra' => true,
//        //'border' => array('table', 'rows')
//    ));
    $profile_args = rcl_tab_template_content();

    $bank_options = rcl_get_option('banks');

    $bank_content = '';
    if (isset($bank_options) && !empty($bank_options))
    {
        $i = 0;
        foreach ($bank_options as $bank)
        {
            $i++;
            $bank_content .= '<div class="col-lg-4 input-exchange input-custom-procent">'.
                                '<div class="row">'.
                                    '<a class="settings_close">&times;</a>'.
                                    '<div class="select-exchange w-100">' .
                                        '<input value="' . $bank['name'] . '" type="text" name="bank' . $i . '[name]" style="background: #fff">'.
                                        '<input value="' . $bank['value'] . '" type="text" name="bank' . $i . '[value]">'.
                                    '</div>'.
                                '</div>'.
                            '</div>';
        }
        $profile_args += array("banks" => $bank_content);
    }

    $ref_amount = rcl_get_option('ref_amount');
    $ref_content = '';

    if (isset($ref_amount) && !empty($ref_amount))
    {
        $ref_content .= '<div class="col-lg-4 input-exchange input-custom-procent">' .
                        '<div class="row">' .
                            '<span>За каждого реферала</span>' .
                            '<input value="' . $ref_amount . '" type="text" name="ref_amount">' .
                        '</div>' .
                    '</div>';
        $profile_args += array('ref_amount' => $ref_content);
    }

    $content = rcl_get_include_template('template-settings.php', __FILE__, $profile_args);
    return $content;
}
/******************************/


add_action('rcl_bar_setup','rcl_bar_add_profile_link',10);
function rcl_bar_add_profile_link(){
    global $user_ID;

    if(!is_user_logged_in()) return false;

    rcl_bar_add_menu_item('profile-link',
        array(
            'url'=> rcl_get_tab_permalink($user_ID,'profile'),
            'icon'=>'fa-user-secret',
            'label'=>__('Profile settings','wp-recall')
        )
    );

}

add_action('init','rcl_add_block_show_profile_fields');
function rcl_add_block_show_profile_fields(){
    rcl_block('details','rcl_show_custom_fields_profile',array('id'=>'pf-block','order'=>20,'public'=>1));
}

function rcl_show_custom_fields_profile($master_id){

    $get_fields = rcl_get_profile_fields();

    $show_custom_field = '';

    if($get_fields){

        $get_fields = stripslashes_deep($get_fields);

        $cf = new Rcl_Custom_Fields();

        foreach((array)$get_fields as $custom_field){
            $custom_field = apply_filters('custom_field_profile',$custom_field);
            if(!$custom_field) continue;
            $slug = isset($custom_field['name'])? $custom_field['name']: $custom_field['slug'];
            if(isset($custom_field['req'])&&$custom_field['req']==1){
                $meta = get_the_author_meta($slug,$master_id);
                $show_custom_field .= $cf->get_field_value($custom_field,$meta);
            }
        }
    }

    if(!$show_custom_field) return false;

    return '<div class="show-profile-fields">'.$show_custom_field.'</div>';
}

if(!is_admin()) add_action('wp','rcl_update_profile_notice');
function rcl_update_profile_notice(){
    if (isset($_GET['updated']))
        rcl_notice_text(__('Your profile has been updated','wp-recall'),'success');
}

if (!function_exists('array_key_first')) {
    function array_key_first(array $arr) {
        foreach($arr as $key => $unused) {
            return $key;
        }
        return NULL;
    }
}

function save_exchange_request($input_currency, $output_currency, $input_sum, $output_sum, $bank = false)
{
    global $user_ID;
    $exchange_requests = rcl_get_option('exchange_requests');
    var_dump($exchange_requests);
    $exchange_fields = array();
    $exchange_fields += array('input_currency' => $input_currency);
    $exchange_fields += array('output_currency' => $output_currency);
    $exchange_fields += array('input_sum' => $input_sum);
    $exchange_fields += array('output_sum' => $output_sum);

    $exchange_fields += array('bank' => $bank);

    $exchange_fields += array('date' => date('d.m.y'));
    $exchange_fields += array('status' => 'no'); //no - ожидает обработки, yes - одобрен и обработан

    if (isset($exchange_requests) && !empty($exchange_requests))
    {
        if (isset($exchange_requests[$user_ID]) && !empty($exchange_requests[$user_ID]))
        {
            $new_request = array(count($exchange_requests[$user_ID]) => $exchange_fields);
            $exchange_requests[$user_ID] += $new_request;
        }
        else {
            $new_request = array(0 => $exchange_fields);
            $exchange_requests += array($user_ID => $new_request); //Если еще нет запросов для этого пользователя, добавляем ключ id этого пользователя
        }
    }
    //Если еще нету запросов на обмен
    else
    {
        $new_request = array(0 => $exchange_fields);
        $exchange_requests = array($user_ID => $new_request);
    }

    rcl_update_option('exchange_requests', $exchange_requests);
}

//Обновляем профиль пользователя
add_action('wp', 'rcl_edit_profile', 10);
function rcl_edit_profile(){
    global $user_ID, $userdata;
    //var_dump($_POST);

    //if( !wp_verify_nonce( $_POST['_wpnonce'], 'update-profile_' . $user_ID ) ) return false;
//    if ( isset( $_POST['submit_user_profile']))
//        rcl_update_profile_fields($user_ID);
    if (isset($_POST) && count($_POST) > 0)
    {
        //Если добавление банков
        if (strpos(array_key_first($_POST), 'bank') !== false )
        {
            $new_banks = array();
            foreach ($_POST as $key => $value)
            {
                if (strpos($key, 'submit_settings_banks') !== false)
                    continue;
                else
                {
                    $new_banks += array($key => $value);
                }
            }
            rcl_update_option('banks', $new_banks);

            $redirect_url = rcl_get_tab_permalink($user_ID, 'settings') . '&updated=true';

            wp_redirect($redirect_url);

            exit;
        }
        elseif (strpos(array_key_first($_POST), 'ref_amount') !== false)
        {
            $ref_amount = 0;
            foreach ($_POST as $key => $value)
            {
                if (strpos($key, 'ref_amount') !== false)
                    $ref_amount = $value;
                else
                    continue;
            }
            rcl_update_option('ref_amount', $ref_amount);

            $redirect_url = rcl_get_tab_permalink($user_ID, 'settings') . '&updated=true';

            wp_redirect($redirect_url);

            exit;
        }
        //Если верификация
        elseif (strpos(array_key_first($_POST), 'verification') !== false )
        {
            //var_dump($_POST);
            /*****************Сохраняем в запросы на верификацию******************/
            $verification_requests = rcl_get_option('verification_requests');

            $verification_exists = false;
            if (isset($verification_requests) && !empty($verification_requests))
            {
                foreach ($verification_requests as $key => $value)
                {
                    if ($key == $user_ID) {
                        $verification_exists = true;
                        break;
                    }
                }
            }
            $verification_fields = array();
            foreach ($_POST['verification'] as $key => $value) {
                if (strpos($key, 'submit') !== false)
                    continue;
                else {
                    $verification_fields += array($key => $value);
                }
            }
            if (isset($verification_requests) && !empty($verification_requests)) {
                //Если нету заявок от этого же пользователя на верификацию
                if (!$verification_exists)
                    $verification_requests += array($user_ID => $verification_fields);
                //Если есть верификация от этого пользователя, перезаписываем ее
                else
                    $verification_requests[$user_ID] = $verification_fields;
            }
            else
                $verification_requests = array($user_ID => $verification_fields); //Если нет запросов, добавляем новый

            rcl_update_option('verification_requests', $verification_requests);

            /**********************************************************************/

            /*************Сохраняем верификацию в поля профиля*******************************/

            $profileFields = rcl_get_profile_fields(array('user_id' => $user_ID));

            //$post_first_key = current(array_keys($_POST));
            $field_found = false;
            foreach ($profileFields as $field)
            {
                if ($field['slug'] == 'verification') {
                    $field += array('value' => $verification_fields);

                    rcl_update_profile_fields($user_ID, array($field));
                    $field_found = true;
                    continue;
                    //break;
                }
                if ($field['slug'] == 'passport_photos' && isset($_FILES) && !empty($_FILES)) {
                    //Загружаем файлы
                    if ( ! function_exists( 'wp_handle_upload' ) ) {
                        require_once( ABSPATH . 'wp-admin/includes/file.php' );
                    }
                    $field += array('value' => array());
                    for ($i=0; $i < count($_FILES['passport_photos']['name']); $i++)
                    {
                        $filetype	 = wp_check_filetype_and_ext( $_FILES['passport_photos']['tmp_name'][$i], $_FILES['passport_photos']['name'][$i] );

                        if (! in_array( $filetype['ext'], array('jpeg', 'gif', 'bmp', 'png', 'webp','JPEG', 'GIF', 'BMP', 'PNG', 'WEBP')))
                            wp_die( __( 'Prohibited file type!', 'wp-recall' ) );
                        $maxsize = 2;
                        if ( $_FILES['passport_photos']['size'][$i] > $maxsize * 1024 * 1024 )
                            wp_die( __( 'File size exceedes maximum!', 'wp-recall' ) );

                        $info = pathinfo( $_FILES['passport_photos']['name'][$i] );
                        if( ! empty( $info['extension'] ) )
                            $_FILES['passport_photos']['name'][$i]  = sprintf( 'passport_photo_%s.%s', current_time( 'm-d-H-i-s' ), $info['extension'] );

                        $uploadedfile = array(
                            'name'     => $_FILES['passport_photos']['name'][$i],
                            'type'     => $_FILES['passport_photos']['type'][$i],
                            'tmp_name' => $_FILES['passport_photos']['tmp_name'][$i],
                            'error'    => $_FILES['passport_photos']['error'][$i],
                            'size'     => $_FILES['passport_photos']['size'][$i]
                        );

                        $file = wp_handle_upload( $uploadedfile, array( 'test_form' => FALSE ) );

                        if ($file && !isset( $file['error'] ))
                            if ( $file['url'] ) {
                                $attachment = array(
                                    'post_mime_type' => $file['type'],
                                    'post_title'	 => preg_replace( '/\.[^.]+$/', '', basename( $file['file'] ) ),
                                    'post_name'		 => 'passport_photos' . '-' . $user_ID . '-' . 0,
                                    'post_content'	 => '',
                                    'guid'			 => $file['url'],
                                    'post_parent'	 => 0,
                                    'post_author'	 => $user_ID,
                                    'post_status'	 => 'inherit'
                                );

                                $attach_id	 = wp_insert_attachment( $attachment, $file['file'], 0);
                                $attach_data = wp_generate_attachment_metadata( $attach_id, $file['file'] );

                                wp_update_attachment_metadata( $attach_id, $attach_data );
                                $field['value'][] = $file['url'];
                                continue;
                            }
                    }
                    //Добавляем ссылки на файлы в verification_requests
                    $verification_requests = rcl_get_option('verification_requests');
                    foreach ($verification_requests as $key => $value)
                    {
                        if ($key == $user_ID) {
                            $verification_requests[$key] += array('passport_photos' => $field['value']);
                            break;
                        }
                    }
                    rcl_update_option('verification_requests', $verification_requests);

                    //$field += array('value' => $verification_fields);
                    rcl_update_profile_fields($user_ID, array($field));
                    $field_found = true;
                    continue;
                }
            }
//            $log = new Rcl_Log();
//            $log->insert_log(print_r(rcl_get_profile_fields(array('user_id' => $user_ID)), true));
            if (!$field_found)
                return false;

            /********************************************************************/

            $redirect_url = rcl_get_tab_permalink($user_ID, 'profile') . '&updated=true';

            wp_redirect($redirect_url);
            exit;
        }

        //Запрос на user_id из manager_requests
        elseif ((isset($_POST['request_user_id']) && !empty($_POST['request_user_id']))) {

            $verification_requests = rcl_get_option('verification_requests');

            if (isset($verification_requests) && !empty($verification_requests)) {
                if (isset($_POST['approve_request']) && $_POST['approve_request'] == 'true') {
                    //Обновить is_verified на true
                $profileFields = rcl_get_profile_fields(array('user_id' => $_POST['request_user_id']));
                foreach ($profileFields as $field)
                    if ($field['slug'] == 'is_verified') {
                        if (isset($field['value']))
                            $field['value'] = 'yes';
                        else
                            $field += array('value' => 'yes');
                        rcl_update_profile_fields($_POST['request_user_id'], array($field));
                        break;
                    }
                    //update_user_meta($_POST['request_user_id'], 'is_verified', 'yes');
                    foreach ($verification_requests as $key => $value) {
                        if ($key == $_POST['request_user_id']) {
                            unset($verification_requests[$key]);
                            rcl_update_option('verification_requests', $verification_requests);
                            //echo print_r(rcl_get_option('verification_requests'), true);
                            break;
                        }
                    }
                    echo 'true';
                    exit;
                } else {
                    foreach ($verification_requests as $key => $value) {
                        if ($key == $_POST['request_user_id']) {
                            echo json_encode($value);
                            break;
                        }
                    }
                    exit;
                }
            }
        }

        //Если запрос на обмен
        elseif (strpos(array_key_first($_POST), 'get_rubles') !== false)
        {
            /*****************Сохраняем в запросы на обмен******************/
            save_exchange_request('PRIZM', 'RUB',
                $_POST['get_rubles']['prizm'], $_POST['get_rubles']['rubles'],
                $_POST['get_rubles']['bank']);

            $redirect_url = rcl_get_tab_permalink($user_ID, 'exchange') . '&updated=true';

            wp_redirect($redirect_url);

            exit;
        }

        else {
            $profileFields = rcl_get_profile_fields(array('user_id' => $user_ID));
            $post_first_key = current(array_keys($_POST));
            $field_found = false;
            foreach ($profileFields as $field) {
                if ($post_first_key == $field['slug']) {
                    rcl_update_profile_fields($user_ID, array($field));
                    $field_found = true;
                    break;
                }
            }
            if (!$field_found)
                return false;
        }
    }
    else
        return false;

    do_action('personal_options_update', $user_ID);

    $redirect_url = rcl_get_tab_permalink($user_ID, 'profile') . '&updated=true';

    wp_redirect($redirect_url);

    exit;
}

//function rcl_custom_edit_profile(){
//    global $user_ID;
//
//    if (isset($_POST) && !empty($_POST)) {
//        var_dump(1);
//        rcl_update_profile_fields($user_ID, $_POST['fields']);
//    }
//
//}

add_filter('rcl_profile_fields','rcl_add_office_profile_fields',10);
function rcl_add_office_profile_fields($fields){
    global $userdata;

    $profileFields = array();

    if(isset($userdata) && $userdata->user_level >= rcl_get_option('consol_access_rcl',7)){
        $profileFields[] = array(
            'slug' => 'show_admin_bar_front',
            'title' => __('Admin toolbar','wp-recall'),
            'type' => 'select',
            'values' => array(
                'false' => __('Disabled','wp-recall'),
                'true' => __('Enabled','wp-recall')
            )
        );
    }

    $profileFields[] = array(
        'slug' => 'user_email',
        'title' => __('E-mail','wp-recall'),
        'type' => 'email',
        'required' => 1
    );

    $profileFields[] = array(
        'slug' => 'primary_pass',
        'title' => __('New password','wp-recall'),
        'type' => 'password',
        'required' => 0,
        'notice' => __('If you want to change your password - enter a new one','wp-recall')
    );

    $profileFields[] = array(
        'slug' => 'repeat_pass',
        'title' => __('Repeat password','wp-recall'),
        'type' => 'password',
        'required' => 0,
        'notice' => __('Repeat the new password','wp-recall')
    );

    $fields = ($fields)? array_merge($profileFields, $fields): $profileFields;

    return $fields;

}

//Выводим возможность синхронизации соц.аккаунтов в его личном кабинете
//при активированном плагине Ulogin
if(function_exists('ulogin_profile_personal_options')){
    function get_ulogin_profile_options($profile_block,$userdata){
        ob_start();
        ulogin_profile_personal_options($userdata);
	$profile_block .= ob_get_contents();
	ob_end_clean();
	return $profile_block;
    }
    add_filter('profile_options_rcl','get_ulogin_profile_options',10,2);
}

add_action('init', 'rcl_delete_user_account_activate');
function rcl_delete_user_account_activate ( ) {
  if ( isset( $_POST['rcl_delete_user_account'] ) ) {
    add_action( 'wp', 'rcl_delete_user_account' );
  }
}

//Удаляем аккаунт пользователя
function rcl_delete_user_account(){
    global $user_ID,$wpdb;
    if( !wp_verify_nonce( $_POST['_wpnonce'], 'delete-user-' . $user_ID ) ) return false;

    require_once(ABSPATH.'wp-admin/includes/user.php' );

    $wpdb->query($wpdb->prepare("DELETE FROM ".RCL_PREF."user_action WHERE user ='%d'",$user_ID));

    $delete = wp_delete_user( $user_ID );

    if($delete){
        wp_die(__('We are very sorry but your account has been deleted!','wp-recall'));
        echo '<a href="/">'.__('Back to main page','wp-recall').'</a>';
    }else{
        wp_die(__('Account deletion failed! Go back and try again.','wp-recall'));
    }
}

//Подгрузка курса prizm
function rcl_slavia_get_crypto_price($currency = 'PZM') {

    $url = 'https://pro-api.coinmarketcap.com/v1/tools/price-conversion';
    $parameters = [
        'symbol' => $currency,
        'amount' => '1',
        'convert' => 'RUB'
    ];

    $headers = [
        'Accepts: application/json',
        'X-CMC_PRO_API_KEY: 8225d03d-6029-4dad-8c1f-ca029644b3da'
    ];
    $qs = http_build_query($parameters); // query string encode the parameters
    $request = "{$url}?{$qs}"; // create the request URL


    $curl = curl_init(); // Get cURL resource
// Set cURL options
    curl_setopt_array($curl, array(
        CURLOPT_URL => $request,            // set the request URL
        CURLOPT_HTTPHEADER => $headers,     // set the headers
        CURLOPT_RETURNTRANSFER => 1         // ask for raw response instead of bool
    ));

    $response = curl_exec($curl); // Send the request, save the response
    curl_close($curl); // Close request

    $rub_price = json_decode($response);
    $rounded_price = round($rub_price->data->quote->RUB->price, 2);
//    $log = new Rcl_Log();
//    $log->insert_log(print_r(json_decode($response), true));
    return $rounded_price; // print json decoded response
}