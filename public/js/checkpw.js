function passCheck() {
    var p1 = document.getElementById('password1');
    var p2 = document.getElementById('password2');
    var message = document.getElementById('message_match');
    var length = document.getElementById('length_match');
    var submit = document.getElementById('reg_submit');
    var ok = "#66cc66";
    var ko = "#ff6666";
    if (p1.value.length > 5) {
        length.style.color = ok;
        length.innerHTML = "Password length OK !"
        if (p1.value == p2.value) {
            p2.style.backgroundColor = ok;
            message.style.color = ok;
            message.innerHTML = "Passwords match"
            submit.disabled = false;
        }
        else {
            p2.style.backgroundColor = ko;
            message.style.color = ko;
            message.innerHTML = "Passwords do not match"
        }
    }
    else {
        length.style.color = ko;
        length.innerHTML = "Password length must be more than 5 characters !"
    }
}
