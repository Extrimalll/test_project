$( document ).ready(function() {
    var login = false;
    var user = false;
    var family = false;
    var age = false;
    var pass = false;
    var passTwo = false;
    var image;
    //проверка логинов на авторизации и регистрации
    $('input[name=login],input[name=loginReg]').keyup(function() {
        var pswd = $(this).val();
        if ( pswd.length < 8 ) {
            $('#Loglength').removeClass('valid').addClass('invalid');
        } else {
            $('#Loglength').removeClass('invalid').addClass('valid');
        }
        if ( pswd.match(/[A-z]/) ) {
            $('#Logletter').removeClass('invalid').addClass('valid');
        } else {
            $('#Logletter').removeClass('valid').addClass('invalid');
        }
        if ($("#Loglength").hasClass("valid") && $("#Logletter").hasClass("valid")){
            login = true;
            return login;
        }else {
            login = false;
            return login;
        }
    }).focus(function() {
        $('#pswd_info_log').show();
    }).blur(function() {
        $('#pswd_info_log').hide();
    });
//проверка имени
    $('input[name=nameUser]').keyup(function() {
        var pswd = $(this).val();
        if ( pswd.length < 2 ) {
            $('#Nameletter').removeClass('valid').addClass('invalid');
        } else {
            $('#Nameletter').removeClass('invalid').addClass('valid');
        }
        if ($("#Nameletter").hasClass("valid")){
            user = true;
            return user;
        }else {
            user = false;
            return user;
        }
    }).focus(function() {
        $('#pswd_info_user').show();
    }).blur(function() {
        $('#pswd_info_user').hide();
    });
//проверка фамилии
    $('input[name=family]').keyup(function() {
        var pswd = $(this).val();
        if ( pswd.length < 2 ) {
            $('#Famletter').removeClass('valid').addClass('invalid');
        } else {
            $('#Famletter').removeClass('invalid').addClass('valid');
        }
        if ($("#Famletter").hasClass("valid")){
            family = true;
            return family;
        }else {
            family = false;
            return family;
        }
    }).focus(function() {
        $('#pswd_info_family').show();
    }).blur(function() {
        $('#pswd_info_family').hide();
    });
//проверка возраста на наличии 18 лет
    $('input[name=age]').keyup(function() {
        var pswd = parseInt ($(this).val());
        if ( 18 > pswd ) {
            $('#AgeLetter').removeClass('valid').addClass('invalid');
        } else {
            $('#AgeLetter').removeClass('invalid').addClass('valid');
        }
        if ($("#AgeLetter").hasClass("valid")){
            age = true;
            return age;
        }else {
            age = false;
            return age;
        }
    }).focus(function() {
        $('#pswd_info_age').show();
    }).blur(function() {
        $('#pswd_info_age').hide();
    });
//проверка пароля на англ буквы и минимальную длину 8
    $('input[name=password],input[name=passwordReg]').keyup(function() {
        var pswd = $(this).val();
        if ( pswd.length < 8 ) {
            $('#length').removeClass('valid').addClass('invalid');
        } else {
            $('#length').removeClass('invalid').addClass('valid');
        }
        if ( pswd.match(/[A-z]/) ) {
            $('#letter').removeClass('invalid').addClass('valid');
        } else {
            $('#letter').removeClass('valid').addClass('invalid');
        }
        if($('#number').hasClass('valid') && $('#letter').hasClass('valid') && $('#length').hasClass('valid')){
        blur(function() {
                $('#pswd_info').hide();
            });
        }
        if ($("#length").hasClass("valid") && $("#letter").hasClass("valid")){
            pass = true;
            return pass;
        }else {
            pass = false;
            return pass;
        }
    }).focus(function() {
        $('#pswd_info').show();
    }).blur(function() {
        $('#pswd_info').hide();
    });
    //проверка валидности паролей
    $('input[name=passwordTwo]').keyup(function() {
        var pswd = $(this).val();
        var pswdTwo = $('input[name=passwordReg]').val();
        if ( pswd.length < 8 ) {
            $('#lengthTwo').removeClass('valid').addClass('invalid');
        } else {
            $('#lengthTwo').removeClass('invalid').addClass('valid');
        }
        if ( pswd.match(/[A-z]/) ) {
            $('#letterTwo').removeClass('invalid').addClass('valid');
        } else {
            $('#letterTwo').removeClass('valid').addClass('invalid');
        }
        if ( (pswd == pswdTwo) && pswd != '' && pswdTwo !='') {
            $('#repeatTwo').removeClass('invalid').addClass('valid');
        } else {
            $('#repeatTwo').removeClass('valid').addClass('invalid');
            passTwo = false;
        }
        if ($("#lengthTwo").hasClass("valid") && $("#letterTwo").hasClass("valid") && $("#repeatTwo").hasClass("valid")){
            passTwo = true;
            return passTwo;
        }else {
            passTwo = false;
            return passTwo;
        }
        if($('#numberTwo').hasClass('valid') && $('#letterTwo').hasClass('valid') && $('#lengthTwo').hasClass('valid')){
            blur(function() {
                $('#pswd_info').hide();
            });
        }
    }).focus(function() {
        $('#pswd_info_pass').show();
    }).blur(function() {
        $('#pswd_info_pass').hide();
    });
    //отправка AJAXом регистрация
    $('#reg').click(function() {
        if (login === true && user === true && family === true && age === true && pass === true && passTwo === true){
            $('#reg').removeClass("disabled");
            var logReg = $('input[name=loginReg]').val();
            var username = $('input[name=nameUser]').val();
            var passwordReg = $('input[name=passwordReg]').val();
            var familyReg = $('input[name=family]').val();
            var passwordTwo = $('input[name=passwordTwo]').val();
            var ageReg = $('input[name=age]').val();
            var image = $("form input[type=file]").val();

            $.ajax({
                type: 'POST',
                url: './classes/registr.php',
                data: {'login' : logReg,
                      'username' : username,
                      'password' : passwordReg,
                      'family' : familyReg,
                      'passwordTwo' : passwordTwo,
                      'age' : ageReg,
                      'image' : image,
                },
                success: function(data){
                    $('.goodReg').show();

                }
            });
        }else {
            $('#reg').addClass('disabled');
            $('.error').show(1000);
        }

    });

    $('input[type=file]').on('change', function(){
        files = this.files;
    });
//загрузка файла
    $('.upload_files').on( 'click', function( event ){

        event.stopPropagation(); // остановка всех текущих JS событий
        event.preventDefault();  // остановка дефолтного события для текущего элемента - клик для <a> тега

        // ничего не делаем если files пустой
        if( typeof files == 'undefined' ) return;

        // создадим объект данных формы
        var data = new FormData();

        // заполняем объект данных файлами в подходящем для отправки формате
        $.each( files, function( key, value ){
            data.append( key, value );
        });

        // добавим переменную для идентификации запроса
        data.append( 'my_file_upload', 1 );

        // AJAX запрос
        $.ajax({
            url         : './submit.php',
            type        : 'POST',
            data        : data,
            cache       : false,
            dataType    : 'json',
            processData : false,
            contentType : false,
            success     : function( respond, status, jqXHR ){
                if( typeof respond.error === 'undefined' ){
                    var files_path = respond.files;
                    var html = '';
                    $.each( files_path, function( key, val ){
                        html += val +'<br>';
                    } )

                    $('.ajax-reply').show();
                }
            }
        });
    });
    //отправка AJAXом авторизация
    $('#signIn').click(function() {
        if (login === true && pass === true ){
            var logAuth = $('input[name=login]').val();
            var password = $('input[name=password]').val();
            $.ajax({
                type: 'POST',
                url: './auth.php',
                data: {'login' : logAuth,
                    'password' : password,
                },
                success: function(data){
                   if(data == 'good'){
                       window.location.replace("/profile.php")
                   }
                },
                error:function(data){
                    $('.badAuth').show();
                },
            });
        }
    });

});