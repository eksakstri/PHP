function send(){
    var msg = document.getElementById("msg").value;
    var xhttp = new XMLHttpRequest();
    document.getElementById("msg").value = '';
    xhttp.onreadystatechange = function() {
        if (this.readystate == 4 && this.status == 200){
            msg1 = this.responseText;
            var msg2 = ''
            for (var a of msg1){
                if (a =='<'){
                    a = '&lt'
                    msg2 += a;
                }
                else if (a =='>'){
                    a = '&gt'
                    msg2 += a;
                }
                else {
                    msg2 += a;
                }
            }
            document.getElementById('char').innerHTML += "You :" + msg2 + "<br>";
        }
    };
    xhttp.open("POST", "msg.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("message ="+msg);
}
setInterval(function(){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if (this.readystate ==4 && this.status == 200) {
            document.getElementById("chat").innerHTML += this.responseText;
        }
    }
    xhttp.open("GET", "message.php", true);
    xhttp.send();
},3000);