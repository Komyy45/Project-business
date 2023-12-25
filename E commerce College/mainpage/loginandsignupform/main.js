let left= document.getElementById('left')
let right = document.getElementById('right')
let log = document.getElementById('log')
let sign = document.getElementById('sign')
let layout = document.getElementById('layout')
let aud = document.getElementById('swipe')
let speech = new Audio("./mixkit-fast-sci-fi-transition-sweep-3114.wav")
let forms = document.querySelectorAll('form')
let userName = document.getElementById('username')
let email = document.getElementById('email')
let password = document.getElementById('password')
let btn = document.getElementById('wrong')
let regExp = /\w{0,}@\w{0,}\.com$/ig
let imageOne = "./pexels-宇宙无敌-daddy-16569318.jpg"
let imageTwo = "./pexels-宇宙无敌-daddy-16569320.jpg"


left.onclick = function(){
    log.style.cssText = "top: 50%;"
    sign.style.cssText =  "top:  200%;"
    layout.style.cssText = `background-image: url(${imageOne});left: 0%; border-top-left-radius: 15px; border-bottom-left-radius: 15px; border-top-right-radius: 0px; border-bottom-right-radius: 0px;`
    speech.play()
}

right.onclick = function(){
    log.style.cssText = "top: -100%;"
    sign.style.cssText =  "top: 50%;;"
    layout.style.cssText = `background-image: url(${imageTwo});left: 50%;    border-top-left-radius: 0px; border-bottom-left-radius: 0px; border-top-right-radius: 15px; border-bottom-right-radius: 15px;`
    speech.play()
}


userName.oninput = function(){
    if(userName.value.length <= 8){
        userName.style.cssText = "box-shadow: 0 0 5px red; border-color: red;"
    }
    else{
        userName.style.cssText = "box-shadow: 0 0 5px green; border-color: green;"
    }
}
email.oninput = function(){
    if(regExp.test(email.value)){
        email.style.cssText =  "box-shadow: 0 0 5px green; border-color: green;"
    }
    else{
        email.style.cssText = "box-shadow: 0 0 5px red; border-color: red;"
    }
}
password.oninput = function(){
    if(password.value.length <= 8){
        password.style.cssText = "box-shadow: 0 0 5px red; border-color: red;"
    }
    else{
        password.style.cssText = "box-shadow: 0 0 5px green; border-color: green;"
    }
}
