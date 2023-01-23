var profile = document.getElementById("profile") ;
var profileSection =  document.getElementById("profileSection") ;

var menu = document.getElementById("menu") ;
var aside = document.getElementById("aside") ;

let articleForm = document.getElementById("articleForm") ;
let anotherForm = document.getElementById("anotherForm") ;


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

// anotherForm.addEventListener('click', ()=>{
//     let div = document.createElement("div") ;
//     let div1 = document.createElement("div") ;
//     let div2 = document.createElement("div") ;
//     let label = document.createElement("label");
//     let label1 = document.createElement("label");
//     let label2 = document.createElement("label");
//     let input = document.createElement("input") ;
//     let input1 = document.createElement("input") ;
//     let input2 = document.createElement("input") ;
//     label.innerHTML = "<b>Title</b>" ;
//     label1.innerHTML = "<b>Image</b>" ;
//     label2.innerHTML = "<b>Body</b>" ;
//     div.classList.add('mb-3') ;
//     div1.classList.add('mb-3') ;
//     div2.classList.add('mb-3') ;
//     label.classList.add('form-label') ;
//     label1.classList.add('form-label') ;
//     label2.classList.add('form-label') ;
//     input.classList.add('form-control') ;
//     input1.classList.add('form-control') ;
//     input2.classList.add('form-control') ;
//     input.setAttribute('name', 'title1') ;
//     input1.setAttribute('name', 'image1') ;
//     input1.setAttribute('type', 'file') ;
//     input2.setAttribute('name', 'body1') ;
//     div.append(label, input) ;
//     div1.append(label1, input1) ;
//     div2.append(label2, input2) ;
//     articleForm.append(div, div1, div2) ;
// })
