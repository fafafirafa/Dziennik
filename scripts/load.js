
$("input[name='list']").click(function () {
    $("#list").css("display", "block");
    $("#list").load("display.php");
});
