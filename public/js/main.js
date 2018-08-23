// Ready
$(document).ready(function() {  
    $(window).load(function(){
        $('#preloader').fadeOut('slow',function(){
            $(this).remove();
        });
    });
});

$(document).on('click','.hash',function(){
    $(this).select();
})

$(document).on('click','#btn-copy-hash',function(){
    $(this).siblings('.hash').select();      
    document.execCommand("copy");
    info('Mensaje', 'Texto copiado.')
})
        
$.ajaxSetup({
    headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});

// Update 
$(document).on('click','#save-config',function(){ 
   let data = $('#form-config').serialize();
   let action = $("#form-config").attr("action");
   // values
   let name = $('#config_name').val();
   let email = $('#config_email').val();
   let profile = $('#config_profile').val();
   // Ajax
    $.ajax({
        type : 'POST',
        url  : action,
        data : {name:name, email:email, profile:profile}
    }).done(function(data){
        if ((data.errors)) {
            error('Error:', 'Verifica los datos ingresados.');
            $('#error_name').removeClass('hidden');
            $('#error_email').removeClass('hidden');
            $('#error_profile').removeClass('hidden');

            $('#error_name').text(data.errors.name);
            $('#error_email').text(data.errors.email);
            $('#error_profile').text(data.errors.profile);

        }else{
            success('Mensaje:', 'Datos actualizados correctamente.');
            $('#error_name').addClass('hidden');
            $('#error_email').addClass('hidden');
            $('#error_profile').addClass('hidden');
            $('#username').text(name);
            $('#myModal').modal('toggle');
        }
    });
});

// Page Record 
$("#btn-encrypt").click(function(){
    let text = $('#hash-text').val();
    let action = $("#hash-generator").attr("action");
    $.ajax({
        type : 'POST',
        url  : action,
        data : {text:text}
    }).done(function(data){
        if ((data.errors)) {
            console.log(data)
            $('#result-error').hide().html(`<span class="error-hash mt-10">${ data.errors.text }</span>`).fadeIn(1000);
        }else{
            success('Mensaje:', 'Hash generado correctamente.');
            $('#result').html(data);
            $('#btn-encrypt-index').prop("disabled", true);
            $('#result-error').css('display', 'none');
        } 
    })
    .fail(function() {
        error('Mensaje:', 'Oops! Ocurrió un error.');
    })
    .always(function() {
        $('#btn-encrypt').prop("disabled", false);
    });
});

$(document).on('click','.remove-item',function(){ 
    let id = $(this).data('id');
    let action = $(this).data('url');
    $.ajax({
        type : 'POST',
        url  : action,
        data : {id:id}
    }).done(function(data){
        success('Mensaje:', 'Hash eliminado correctamente.');
        $('#result').html(data);
    })
    
});

// Index
$(document).on('click','#btn-encrypt-index',function(){ 
    let action = $("#hash-generator").attr("action");
    let provider = 'index';
    let text = $('#hash-text').val();
    $.ajax({
        type : 'POST',
        url  : action,
        data : {provider:provider, text:text}
    }).done(function(data){
        if ((data.errors)) {
            console.log(data)
            $('#result').hide().html(`<span class="error-hash mt-10">${ data.errors.text }</span>`).fadeIn(1000);
        }else{
            success('Mensaje:', 'Hash generado correctamente.');
            $('#result').hide().html(`<input class="result-hash mt-10 hash" id="result-hash" type="text" value="${ data.hash }">
                                        <button id="btn-copy-hash" type="button">Copiar</button>`).fadeIn(1000);
            // $('#hash-text').val('');
            $('#btn-encrypt-index').prop("disabled", true);
        }
        
    })
    .fail(function() {
        error('Mensaje:', 'Oops! Ocurrió un error.');
    })
    .always(function() {
        $('#btn-encrypt-index').prop("disabled", false);
    });
});

// Change password
$(document).on('click','#save-change-password',function(){ 
    let action = $("#form-change-password").attr("action");
    // values
    let password = $('#password').val();
    let new_password = $('#new_password').val();
    let confirm_password = $('#confirm_password').val();
    // Ajax
    $.ajax({
        type : 'POST',
        url  : action,
        data : {password:password, new_password:new_password, confirm_password:confirm_password}
    }).done(function(data){
        //console.log(data)
        if ((data.errors)) {
            error('Error:', 'Verifica los datos ingresados.');
            $('#error_password').removeClass('hidden');
            $('#error_new_password').removeClass('hidden');
            $('#error_confirm_password').removeClass('hidden');

            $('#error_password').text(data.errors.password);
            $('#error_new_password').text(data.errors.new_password);
            $('#error_confirm_password').text(data.errors.confirm_password);
        }else if((data.incorrect)){
            error('Error:', 'Verifica los datos ingresados.');
            $('#error_password').removeClass('hidden');
            $('#error_password').text(data.incorrect);
        }else{
            success('Mensaje:', 'Contraseña actualiza correctamente');
            $('#error_password').addClass('hidden');
            $('#error_new_password').addClass('hidden');
            $('#error_confirm_password').addClass('hidden');

            $('#password').val('');
            $('#new_password').val('');
            $('#confirm_password').val('');
            $('#changePassword').modal('toggle');
        }
    });
});

// Paginate
$(document).on('click','.pagination a',function(e){
    e.preventDefault();
    let url = window.location.href;
    let page = $(this).attr('href').split('page=')[1];
    $.ajax({
        type : 'POST',
        url : url+'?page='+page,
    }).done(function(data){
        $('#result').html(data);
    }).fail(function (data) {
        error('Error:', 'Ops! Ocurrió un problema.');
    });
})