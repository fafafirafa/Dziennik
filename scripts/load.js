// After pressing list button, load timeouts and perms from database (formatting in another file)

$("input[name='list']").click(function(){

    $("#list").css("display", "block");

    $("#list").load("display.php");

});
