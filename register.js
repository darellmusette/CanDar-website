function validate(field,query){
    var xmlhttp;
    if(window.XMLHttpRequest) { //FOR MODERN BROWSER
        xmlhttp= new XMLHttpRequest();
}else{
    xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange= function() {
    if (xmlhttp.onreadystatechange!== 4 && xmlhttp.status==200){
        document.getElementById(field).innerHTML= "validation..";
    }else if (xmlhttp.readystate==4&& xmlhttp.status==200){
        document.getElementById(field).innerHTML = xmlhttp.responseText;
    }else {
        document.getElementById(field).innerHTML= "Error Ocuured.<a href='register.php'>Try Again</a>.";
    }
    }
    xmlhttp.open("post", "reg.php?field="+field+"query="+query,true);
    xmlhttp.send();
}