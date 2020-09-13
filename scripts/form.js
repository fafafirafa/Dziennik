
// Form - change button after consolidation

$("form").bind("keyup change",function(){

    if($("input[name='stream']").val() != "" && $("input[name='give']").val() != "" && $("input[name='givento']").val() != "" && $("input[type='radio']:checked").val() !== undefined && $("textarea[name='reason']").val() != ""){
        document.getElementsByName("create")[0].removeAttribute("disabled");
    } else {
        document.getElementsByName("create")[0].setAttribute("disabled","");
    }

});





// Timeout/Perm check - If timeout then display another box

$("input[type='radio']").change(function(){

    if($(this).val() == 0) {
        $("#to").css("display", "block");
    } else {
        $("#to").css("display", "none");
    }

});
