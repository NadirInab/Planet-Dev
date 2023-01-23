var profile = document.getElementById("profile") ;
var profileSection =  document.getElementById("profileSection") ;

var menu = document.getElementById("menu") ;
var aside = document.getElementById("aside") ;


var signIn =  document.getElementById("signInLink") ;
var signUp =  document.getElementById("singUp12") ;
var signInForm =  document.getElementById("signInForm") ;
var signUpForm =  document.getElementById("signUpForm") ;
var imginput = document.getElementById("exampleInputEmail1") ;
//========================= form validation
var signingUpForm = document.getElementById("signingUpForm") ;
var formInputs = document.getElementsByClassName("form-control") ;
var userName = document.querySelector('[name="name"]');
var email = document.querySelector('[name="email"]');
var phone = document.querySelector('[name="phone"]');
var profile = document.querySelector('[name="profile"]');
var pwd = document.querySelector('[name="pwd"]');
var confirmPwd = document.querySelector('[name="confirmedPwd"]');


function showEroor(input, message){
    const formControl = input.parentElement ;
    formControl.className = "form-control error" ;
    const small = formControl.querySelector("small") ;
    small.className = "form-control error" ;
    small.innerText = message ;
}
function showSuccess(input){
    const formControl = input.parentElement ;
    formControl.className = "form-control success" ;
}
function isValidEmail(email){
    const pattern =/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/ ;
    return pattern.match(email.value) ;

}   

signingUpForm.addEventListener("submit", (e)=>{
    if(userName.value == ""){
        e.preventDefault() ;
        showEroor(userName, "userName is required!!") ;
    }
    if(phone.value == ""){
        e.preventDefault() ;
        showEroor(phone, "phone is required!!") ;
    }
    if(email.value == "" || !isValidEmail(email.value)){
        e.preventDefault() ;
        showEroor(email, "please recheck email value ") ;
    }
    if(pwd.value == ""){
        e.preventDefault() ;
        showEroor(pwd, "pwd is required!!") ;
    }
    if(confirmPwd.value == ""){
        e.preventDefault() ;
        showEroor(email, "pwd  field is required") ;
    }
})





signUp.addEventListener("click", ()=>{
    alert("here signUp") ;
    signUpForm.style.display = "contents" ;
    signInForm.style.display = "none" ;
})

signIn.addEventListener("click", ()=>{
    signUpForm.style.display = "none" ;
    signInForm.style.display = "block" ;
})
