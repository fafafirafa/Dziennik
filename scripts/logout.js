$("input[name='logout']").click(function () {
    let ajax = 'include/destroy_session.php';

    $.post(ajax, function (response) {
        alert(response);
        if (response == "Wylogowano pomyślnie") { window.location.reload(); }
    });
    
});
