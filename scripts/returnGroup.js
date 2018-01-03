function returnGroup(str) {
    if (str.length == 0) { 
        document.getElementById("returnGroup").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("returnGroup").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "../ajax/returnGroup.php?q=" + str, true);
        xmlhttp.send();
    }
}