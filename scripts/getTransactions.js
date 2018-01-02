function getTransactions(str) {
    if (str == "") {
        document.getElementById("getTrans").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("getTrans").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","../ajax/getTransactionHistory.php?q="+str,true);
        xmlhttp.send();
    }
}
