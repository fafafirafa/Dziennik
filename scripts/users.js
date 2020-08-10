$(".close").click(function () {
    $("#list").css("display", "none");
    $("#list").html("");
});

$(".delete").click(function () {
    var user = $(".user" + this.id).text();
    if (confirm("Czy na pewno chcesz usunąć wykluczenie użytkownika \"" + user + "\"?")) {
        var ajax_delete = "include/delete.php",
            data = { 'id': this.id };
        $.post(ajax_delete, data, function (response) {
            alert(response);
            $("#list").load("display.php");
        });
    }
});

$(".streamSelect").change(function () {
    var stream = serialize({ 'str': $(this).val() });
    $("#list").load("display.php?" + stream);

});

$("i.fa-search").click(function () {
    if ($("#search").val() !== "" && $("#search").val() !== undefined) {
        var idiot = serialize({ 'idiota': $("#search").val() });
        $("#list").load("display.php?" + idiot);
    } else {
        $("#search").css('background-color', 'red');
        $("#search").addClass('red');
    }
});

$(".pager").click(function () {
    if ($("#search").val() !== "" && $("#search").val() !== undefined) {
        var url = serialize({
            'idiota':   $("#search").val(),
            'page'  :   this.id
        });
    } else {
        var url = serialize({
            'page'  :   this.id
        });
    }
    if($(".streamSelect").val() !== "Wyświetl wszystkich"){
        var stream = serialize({
            'str'   :   $(".streamSelect").val()
        })
        url = stream + "&" + url;
    }
    $("#list").load("display.php?" + url);

});