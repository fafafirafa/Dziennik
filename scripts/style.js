function swapStyleSheet(sheet) {
    document.getElementById("style").setAttribute("href", sheet);  
}

$('.color').click(function(){
    
    if(getCookie("mode") == "dark"){
        swapStyleSheet("css/light.css");
        setCookie("mode", "light", 366);
    } else {
        swapStyleSheet("css/dark.css")
        setCookie("mode", "dark", 366);
    }
    
});