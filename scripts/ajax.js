// After pressing button, send variables and give them to database

$("input[name='create']").click(function(){

    var ajax = 'include/background.php',
        data = {'stream' : $("input[name='stream']").val(),
                'give' : $("input[name='give']").val(),
                'givento' : $("input[name='givento']").val(),
                'time' : $("input[name='time']").val(),
                'hour' : $("input[name='hour']").val(),
                'date' : $("input[name='date']").val(),
                'what' : $("select[name='what']").val(),
                'type' : $("input[type='radio']:checked").val(),
                'reason' : $("textarea[name='reason']").val()};

    $.post(ajax, data, function(response){

        alert(response);

        if(response == "Sukces!"){ window.location.reload(); }

    });

});

