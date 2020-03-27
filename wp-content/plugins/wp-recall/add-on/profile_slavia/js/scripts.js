function rcl_check_profile_form(){

    var rclFormFactory = new RclForm(jQuery('form#your-profile'));
    
    rclFormFactory.addChekForm('checkPass', {
        
        isValid: function(){
            var valid = true;
            if(this.form.find('#primary_pass').val()){
        
                var user_pass = this.form.find('#primary_pass');
                var repeat_pass = this.form.find('#repeat_pass');

                if(user_pass.val() != repeat_pass.val()){

                    this.shake(user_pass);
                    this.shake(repeat_pass);
                    this.addError('checkPass', Rcl.local.no_repeat_pass);
                    valid = false;

                }else{

                    this.noShake(user_pass);
                    this.noShake(repeat_pass);

                }

            }
            return valid;
        }
        
    });
    
    return rclFormFactory.validate();

}

var tooltip, // global variables oh my! Refactor when deploying!
    hidetooltiptimer;

function createtooltip(){ // call this function ONCE at the end of page to create tool tip object
    tooltip = document.createElement('div')
    tooltip.style.cssText =
        'position:absolute; background:black; color:white; padding:4px;z-index:10000;'
        + 'border-radius:2px; font-size:12px;box-shadow:3px 3px 3px rgba(0,0,0,.4);'
        + 'opacity:0;transition:opacity 0.3s'
    tooltip.innerHTML = 'Скопировано!'
    document.body.appendChild(tooltip)
}

function showtooltip(e){
    var evt = e || event
    clearTimeout(hidetooltiptimer)
    tooltip.style.left = evt.pageX - 10 + 'px'
    tooltip.style.top = evt.pageY + 15 + 'px'
    tooltip.style.opacity = 1
    hidetooltiptimer = setTimeout(function(){
        tooltip.style.opacity = 0
    }, 500)
}

function search_ajax(el, search_data, callback, output_el)
{
    let data = {
        search: search_data
    };
    jQuery.post( window.location, data, function(response) {
        callback(response, output_el)
    });
}
function remove_ref_user(element)
{
    var parent = element.parents('.select-exchange');
    var el = element.parents(".input-exchange");
    var nextSiblings = el.nextAll();
    //Разрешаем во всех последующих select выбор опции из удаляемого select
    var allow_value = el.find('select').val();
    var allow_option = el.find('select').find('option').filter(function(){return this.value==allow_value});
    if (nextSiblings.length > 0)
    {
        //при удалении пользователя смещаем все индексы на 1 влево
        jQuery.each(nextSiblings, function(){
            var item = jQuery(this);
            let select = item.find('select');
            let input = item.find('input.ref_value');

            //Получаем индекс данного элемента
            let split_id = select.attr('id').split("_");
            let ref_index = split_id[split_id.length - 1];

            split_id[split_id.length - 1] = ref_index - 1;
            let new_id = split_id.join('_');

            select.attr('id', new_id);

            var select_name = select.attr('name');
            var arr = select_name.split('');
            var removed = arr.splice(
                select_name.indexOf('[') + 1,
                select_name.indexOf(']') - select_name.indexOf('[') - 1,
                ref_index - 1); // arr is modified
            select_name = arr.join('');

            select.attr('name', select_name);

            var input_name = input.attr('name');
            arr = input_name.split('');
            removed = arr.splice(
                input_name.indexOf('[') + 1,
                input_name.indexOf(']') - input_name.indexOf('[') - 1,
                ref_index - 1); // arr is modified
            input_name = arr.join('');

            input.attr('name', input_name);

            //Добавляем в каждый из последующих select выбранную опцию из удаляемого select
            select.append('<option value="' + allow_value + '">' + allow_option.text() + '</option>');

        });
    }
    el.remove();
}
// function get_users()
// {
//     let data = {
//         get_users: 'true'
//     };
//     jQuery.post( window.location, data, function(response) {
//         console.log(response);
//         if (response) {
//             let users = JSON.parse(response);
//             for (var key in users)
//             {
//                 console.log(users[key]);
//             }
//             window.users = users;
//         }
//     });
// }

jQuery(document).ready(function(){
    tab_config();
});
rcl_add_action('rcl_upload_tab','tab_config');
function tab_config()
{
    //jQuery("#username_input, #rcl-field-user_email, #rcl-field-user_phone, #prizm_address, #prizm_public_key, #waves_address").blur(function() {
        //     jQuery(this).parents("form").submit();
        // });
    // //submit формы по потере фокуса в профиле
    // jQuery("#username_input, #rcl-field-user_email, #rcl-field-user_phone, #prizm_address, #prizm_public_key, #waves_address").blur(function() {
    //     jQuery(this).parents("form").submit();
    // });

    jQuery("#user_ref_link, #client_num").prop("disabled", true); //#prizm_address, #prizm_public_key, #waves_address
    //var bank_inputs = jQuery("#settings_form").find("input");
    //submit формы по потере фокуса в настройках
    // bank_inputs.blur(function() {
    //     // jQuery('#settings_form input[type=hidden]').each(function(el){
    //     //     jQuery(this).val(jQuery(this).siblings("span").text());
    //     // })
    //     jQuery(this).parents("#settings_form").submit();
    // });

    //Открывать ссылки в новой вкладке
    jQuery('div.passport-text a').attr('target', '_blank');

    //Добавить новый банк
    jQuery("#add_bank").click(function(){
        var banks = jQuery(this).parents(".coop_maps.question-bg").children(".col-12").children("form.row").children();
        let new_row_style;
        if (banks.length % 3 === 0)
            new_row_style = "text-align: left";
        else
            new_row_style = "";

        jQuery(this).parents(".coop_maps.question-bg").children(".col-12").children("form.row")
            .append("<div class='col-lg-4 input-exchange input-custom-rubl' style='" + new_row_style + "'>" +
                        "<div class='row '>" +
                            "<a class='settings_close'>&times;</a>" +
                            //"<span class='select-exchange'>Название банка " + (banks.length + 1) + "</span>" +
                            //"<input type='hidden' name='bank" + (banks.length + 1) + "[name]' value=''>" +
                            "<div class='select-exchange w-100'>" +
                "<input value='Название банка " + (banks.length + 1) + "' type='text' name='bank" + (banks.length + 1) + "[name]' style='background: #fff'>" +
                                "<input value='0.25' type='text' name='bank" + (banks.length + 1) + "[value]'>" +
                            "</div>" +
                        "</div>" +
                    "</div>");

        jQuery("#settings_form_banks .input-exchange:last-child").mouseover(function() {
            jQuery(this).find(".settings_close").css('visibility', 'visible');
        });
        jQuery("#settings_form_banks .input-exchange:last-child").mouseout(function() {
            jQuery(this).find(".settings_close").css('visibility', 'hidden');
        });

        jQuery('#settings_form_banks .input-exchange:last-child .settings_close').click(function(){
            jQuery(this).parents(".input-exchange").remove();
        });
    });

    //Добавить процент по рефералке для нового пользователя
    jQuery("#add_ref_user").click(function(){
        var users = jQuery(this).parents(".coop_maps.question-bg").children(".col-12").children("form.row").children();
        // let new_row_style;
        // if (users.length % 3 === 0)
        //     new_row_style = "text-align: left";
        // else
        //     new_row_style = "";
        var user_dropdown = jQuery('#user_dropdown_template').find('select');
        var user_dropdown_innerHTML = jQuery('#user_dropdown_template')[0].innerHTML;

        var ref_count = jQuery('#settings_form_ref').children().length;
        var user_dropdown_name = 'ref_user[' + ref_count + '][id]';
        var input_name = 'ref_user[' + ref_count + '][value]';
        //user_dropdown.attr('name', user_dropdown_name);
        //user_dropdown.attr('id', 'ref_user_' + ref_count);

        //Назначаем всех разрешенных для добавления пользователей
        var dropdown_banned_users = jQuery(user_dropdown_innerHTML);
        jQuery(this).parents(".coop_maps.question-bg").children(".col-12").children("form.row").children().each(function(index, el){
            let banned_value = jQuery(el).find('select').val();
            dropdown_banned_users.find('option').filter(function(){return this.value==banned_value}).remove();
            //dropdown_banned_users.find('option[value="' + banned_value + '"]').remove();
        });

        dropdown_banned_users.attr('id', 'ref_user_' + ref_count);
        dropdown_banned_users.attr('name', user_dropdown_name);


        jQuery(this).parents(".coop_maps.question-bg").children(".col-12").children("form.row")
             .append("<div class='col-lg-4 input-exchange input-custom-procent'>" +
                        "<div class='row' style='height: 100%; padding-top: 30px'>" +
                            "<div class='select-exchange w-100'>" +
                                "<div class='row'>" +
                                    "<div class='col-8'>" +
                                        "<span class='select-exchange' style='display: inline-block'>Пользователь</span>" +
                                    "</div>" +
                                    "<div class='col-4'>" +
                                        "<a class='settings_close' style='display: inline-block; margin-left: -20px; margin-top: -5px'>&times;</a>" +
                                    "</div>" +
                                "</div>" +
                                dropdown_banned_users[0].outerHTML + //user_dropdown[0].outerHTML +
                                "<input class='ref_value' value='0.5' type='text' name='" + input_name + "'>" +
                            "</div>" +
                        "</div>" +
                      "</div>");   //jQuery('#user_dropdown_template').find('select')[0].outerHTML);

        jQuery("#settings_form_ref .input-exchange:last-child").mouseover(function() {
            jQuery(this).find(".settings_close").css('visibility', 'visible');
        });
        jQuery("#settings_form_ref .input-exchange:last-child").mouseout(function() {
            jQuery(this).find(".settings_close").css('visibility', 'hidden');
        });

        jQuery('#settings_form_ref .input-exchange:last-child .settings_close').click(function(){
            remove_ref_user(jQuery(this));
        });
    });


    //Вывод кнопки удаления банка
    jQuery('.input-exchange').mouseover(function() {
        jQuery(this).find(".settings_close").css('visibility', 'visible');
    });
    jQuery('.input-exchange').mouseout(function() {
        jQuery(this).find(".settings_close").css('visibility', 'hidden');
    });

    jQuery('#settings_form_banks .settings_close').click(function(){
        jQuery(this).parents(".input-exchange").remove();
    });

    jQuery('#settings_form_ref .settings_close').click(function(){
        remove_ref_user(jQuery(this));
    });

    //exchange
    //open and close mobile form exchange
    jQuery('.ex-header').click(function(e){
        //let forbid_tags = ['BUTTON', 'INPUT', 'SELECT', 'OPTION'];
        // if ( forbid_tags.includes(jQuery(e.target).prop("tagName")) || //Запрещаем закрытие на мобиле при нажатии на определенные теги
        //     jQuery(e.target).hasClass('btn-custom-one') ||
        //     jQuery(e.target).hasClass('btn-custom-two') )
        // {
        //     return false;
        // }

        var id = jQuery(this).parent().attr('id');
        var block = jQuery('#'+id+ ' .tab-ex').css('display');
        if (block == 'none')
        {
            jQuery('#' + id + ' .tab-ex').slideDown("slow");
            jQuery('#'+id + ' img').attr('src', '/wp-content/uploads/2019/12/open.png')
        }
        else
        {
            jQuery('#' + id + ' .tab-ex').slideUp("slow");
            jQuery('#'+id + ' img').attr('src', '/wp-content/uploads/2019/12/close.png')
        }
    });
    

    //Кастомный вывод фотографий паспорта

    jQuery( '#passport_photos' ).each( function()
    {
        var $input	 = jQuery( this ),
            $label	 = $input.next( 'label' ),
            labelVal = $label.html();

        $input.on( 'change', function( e )
        {
            var fileName = '';

            if( this.files && this.files.length > 1 )
                fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
            else if( e.target.value )
                fileName = e.target.value.split( '\\' ).pop();

            if( fileName )
                $label.html( fileName );
            else
                $label.html( labelVal );
        });

        // Firefox bug fix
        $input
            .on( 'focus', function(){ $input.addClass( 'has-focus' ); })
            .on( 'blur', function(){ $input.removeClass( 'has-focus' ); });
    });

    jQuery('.profile_video button.close.ib').click(function(){
        let video = jQuery(this).parents('.modal-content').find('video');
        if (video.length > 0)
            video.trigger('pause');
    });

    //Фильтрация

    jQuery('.search-btn').click(function(){
        let search_bar = jQuery(this).siblings('.search');
        if (search_bar.css('display') === 'none')
            search_bar.show();
        else
            search_bar.hide();
    });

    jQuery(".datepicker").datepicker({
        onSelect: function(d,obj){
            if(d !== obj.lastVal){
                jQuery(this).change();
            }
        },
        constrainInput: true,
        showOn: 'button',
        buttonText: '',
        buttonImage: "/wp-content/uploads/2019/12/calendar.png"
    });

    //Блокируем ненужные символы
    //Где блокировать все кроме цифр
    var number_fields =
        [ '.prizm_to_rubles', '.rubles_to_prizm', '.rubles_to_waves', '#exp', //Поля страницы обмена
        '.bank_value', '.ref_value', //Поля страницы настроек
        '#rcl-field-user_phone', 'input[name="verification[passport_number]"]', 'input[name="verification[passport_code]"]' //Страница профиля
        ];

    //Защита от подделки данных на фронте*****************
    jQuery('.prizm_to_rubles, .rubles_to_prizm, .rubles_to_waves, #exp').prop('unselectable', 'on').on('selectstart', false);

    jQuery('.prizm_to_rubles, .rubles_to_prizm, .rubles_to_waves, #exp').prop('autocomplete', 'off');

    //Выставляем атрибуты при каждом клике мыши, если не выставлены
    jQuery('.prizm_to_rubles, .rubles_to_prizm, .rubles_to_waves, #exp').mousedown(function(){
        let unselectable = jQuery(this).prop('unselectable');
        let autocomplete = jQuery(this).prop('autocomplete');

       if (unselectable === 'undefined' || unselectable !== 'on')
           jQuery(this).prop('unselectable', 'on');

        if (autocomplete === 'undefined' || autocomplete !== 'off')
            jQuery(this).prop('autocomplete', 'off');
    });
    jQuery('.prizm_to_rubles, .rubles_to_prizm, .rubles_to_waves, #exp').bind('cut copy paste', function (e) {
        e.preventDefault();
    });

    //Disable mouse right click
    jQuery('.prizm_to_rubles, .rubles_to_prizm, .rubles_to_waves, #exp').on("contextmenu",function(e){
        return false;
    });
    /**********************************************************************************/

    jQuery(number_fields.join(', ')).keydown(function(event) {
        var code = (event.keyCode ? event.keyCode : event.which);
        //Проверяем на допустимые символы
        var is_allowed = ( ( (code >= 48 && code <= 57) || (code >= 96 && code <=105)) //96 to 105 - numpad
            || ((code == 190 || code == 110) //numbers || period
            && !((code == 190 || code == 110) && jQuery(this).val().indexOf('.') != -1)) //уже есть точка (110 - numpad dot)
            || code == 8 || code == 13 || code == 9 || code == 144); //144 - numlock
        //user_phone, verification inputs
        if ((jQuery(this).attr('id') === 'rcl-field-user_phone' ||
        jQuery(this).attr('name') === 'verification[passport_number]' ||
        jQuery(this).attr('name') === 'verification[passport_code]') && (code == 190 || code == 110))
            is_allowed = false;
        else
            if ((jQuery(this).attr('id') === 'rcl-field-user_phone' ||
                jQuery(this).attr('name') === 'verification[passport_number]' ||
                jQuery(this).attr('name') === 'verification[passport_code]') && (code == 32 || code == 109 || code == 173) )
                    is_allowed = true;
        if (!is_allowed) {
            event.preventDefault();
            return false;
        }
    });

    jQuery('.copy-btn').click(function(e){
        var inputCopy = jQuery(this).prev()[0];
        console.log(inputCopy);
        var disabled = inputCopy.disabled;
        var type = inputCopy.type;
        if (disabled)
            inputCopy.disabled = false;
        if (type === 'email' || type === 'url')
            inputCopy.type = 'text';
        inputCopy.focus();
        inputCopy.select();
        inputCopy.setSelectionRange(0, inputCopy.value.length);
        try {
            var successful = document.execCommand('copy');
            var msg = successful ? 'successful' : 'unsuccessful';
            console.log('Copying text command was ' + msg);
            if (disabled)
                inputCopy.disabled = true;
            if (type === 'email' || type === 'url')
                inputCopy.type = type;
            showtooltip(e);
        }
        catch (err) {
            console.error('Oops, unable to copy', err);
        }
    });

    createtooltip();


    // jQuery('#profile_verification').on('submit', function(e) {
    //     e.preventDefault();
    //     var fileInput = jQuery('#passport_photos');
    //     console.log(fileInput);
    //     var files = fileInput[0].files;
    //     var verification_form = document.getElementById('profile_verification');
    //      var form_data = new FormData(verification_form);
    //      //form_data.delete("verification[photos]");
    //     //var index = 1;
    //     for(var i=0; i<files.length; i++) {
    //         //let field_name = 'verification[photo' + (i + 1) + ']';
    //         var today = new Date();
    //         var dd = String(today.getDate()).padStart(2, '0');
    //         var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    //         var yyyy = today.getFullYear();
    //         var h = today.getHours();
    //         var m = today.getMinutes();
    //         var s = today.getSeconds();
    //         today = yyyy + '-' + mm + '-' + dd;
    //         let file_name = 'passport_photo_' + today + '-' + h + m + s;
    //
    //         var blob = files[i].slice(0, files[i].size, 'image/*');
    //         newFile = new File([blob], file_name, {type: blob.type});
    //         console.log(newFile);
    //         fileInput[0].files[i] = newFile;
    //         //form_data.set(field_name, files[i], file_name);
    //     }
    //     verification_form.submit();
    // });

};
