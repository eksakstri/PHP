let regex ={
    uname: /^([A-Za-z'\.]+((\s[A-Za-z'\.]+)+)?)$/i,
    uemail: /[a-z\d_\-\.]+@[A-Za-z]+\.[A-Za-z]{2,6}((\.[A-Za-z]{2,6})+)?/i,
    uphone: /^((\+91\-|91\-|0|\+91|91)?[6-9]{1})\d{9}$/i,
    upass: /^[A-Za-z][\w\-\!\#\$\%\&\'\*\+\/\=\?\^\_\|\{\}\~\\]{7,20}$/i
}

function check(){
    var naam = document.getElementById("Name").value;
    var phone = document.getElementById("phone").value;
    var gender = document.getElementById("gender").value;
    var email = document.getElementById("email").value;
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    var cpassword = document.getElementById("cpassword").value;

    if (!regex.uname.test(naam) || !regex.uphone.test(phone) || !regex.uemail.test(email) || !regex.upass.test(pass) || password != cpassword){
        return false;
    }
    else {
        return true;
    }
}

function naam(){
    var naam = document.getElementById("naam").value;
    if (!regex.uname.test(naam)){
        alert("Enter valid name")
    }
}
function phone(){
    var phone = document.getElementById("phone").value;
    if (!regex.uphone.test(phone)){
        alert("Enter valid phone number")
    }
}
function email(){
    var email = document.getElementById("email").value;
    if (!regex.uemail.test(email)){
        alert("Enter valid email")
    }
}
function password(){
    var password = document.getElementById("password").value;
    if (!regex.pass.test(password)){
        alert("Enter valid password")
    }
}
function cpassword(){
    var password = document.getElementById("password").value;
    var cpassword = document.getElementById("cpassword").value;
    if (password != cpassword){
        alert("Must be same as password")
    }
}
function valid(){
    var username = document.getElementById("username").value;
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "existusername.php?q="+username, true);
    xhttp.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("valid").innerHTML = this.responseText;
        }
    }
    xhttp.send();
}
function show(){
    document.getElementById("password").style.display = 'inline'
}
function hide(){
    document.getElementById("password").style.display = 'none'
}