let showPassword = document.querySelector('.bx-low-vision')
let passwordField = document.getElementById("password")



showPassword.onclick = function(){
    if(passwordField.getAttribute("type") == "password")
    passwordField.setAttribute("type" , "text");
    else
    passwordField.setAttribute("type" , "password");
        
}



function changeBoxShadow(element , color ){
    element.style.cssText = `box-shadow : 0  0 5px ${color}`;
}

let btn = document.getElementById("submit");

let username = document.getElementById('username');
let password = document.getElementById('password');
let phone = document.getElementById("phone");
let radio = document.querySelectorAll("input[type='radio']")
let regex = /0?1(0|1|2)\d{8,8}\b/ig;

username.oninput = function(){

    if(username.value.length  >= 8){
        changeBoxShadow(username , "green");
    }
    else{
        changeBoxShadow(username , "red");
        btn.onclick = function(e){
            if(username.value.length < 8)
            e.preventDefault();
        }
}
}

password.oninput = function(){
    if(password.value.length > 8){
        changeBoxShadow(password , "green");
    }  else{
        changeBoxShadow(password , "red");
        btn.onclick = function(e){
            if(password.value.length < 8)
            e.preventDefault();
        }
}
}

phone.oninput = function(){
    if(regex.test(phone.value)){
        changeBoxShadow(phone , "green");
    }else{
        changeBoxShadow(phone , "red");
        btn.onclick = function(e){
            if(!regex.test(phone.value))
            e.preventDefault();
        }
    }
}

