/*!
 * Notifications | Tastr
 * By Marcial Cahuaya
 */
 
function success(title = null, content = null){
    return setTimeout(function () {
            toastr.success(content, title, {
            closeButton: true,
            debug: false,
            progressBar: true,
            preventDuplicates: false,
            positionClass: "toast-bottom-right",
            onclick: true,
            showDuration: "400",
            hideDuration: "1000",
            timeOut: "7000",
            extendedTimeOut: "1000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut"
        });
    }, 100);
}

function info(title = null, content = null){
    return setTimeout(function () {
            toastr.info(content, title, {
            closeButton: true,
            debug: false,
            progressBar: true,
            preventDuplicates: false,
            positionClass: "toast-bottom-right",
            onclick: true,
            showDuration: "400",
            hideDuration: "1000",
            timeOut: "7000",
            extendedTimeOut: "1000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut"
        });
    }, 100);
}

function warning(title = null, content = null){
    return setTimeout(function () {
            toastr.warning(content, title, {
            closeButton: true,
            debug: false,
            progressBar: true,
            preventDuplicates: false,
            positionClass: "toast-bottom-right",
            onclick: null,
            showDuration: "400",
            hideDuration: "1000",
            timeOut: "7000",
            extendedTimeOut: "1000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut"
        });
    }, 100);
}

function error(title = null, content = null){
    return setTimeout(function () {
            toastr.error(content, title, {
            closeButton: true,
            debug: false,
            progressBar: true,
            preventDuplicates: false,
            positionClass: "toast-bottom-right",
            onclick: null,
            showDuration: "400",
            hideDuration: "1000",
            timeOut: "7000",
            extendedTimeOut: "1000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut"
        });
    }, 100);
}