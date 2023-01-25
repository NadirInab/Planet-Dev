var profile = document.getElementById("profile");
var profileSection = document.getElementById("profileSection");
var menu = document.getElementById("menu");
var aside = document.getElementById("aside");
let articleForm = document.getElementById("articleForm");
let anotherForm = document.getElementById("anotherForm");
let addArticleBtn = document.querySelector("#addArticleBtn");
var signIn = document.getElementById("signInLink");
var signUp = document.getElementById("singUp12");
var signInForm = document.getElementById("signInForm");
var signUpForm = document.getElementById("signUpForm");
var imginput = document.getElementById("exampleInputEmail1");
//========================= form validation
var signingUpForm = document.getElementById("signingUpForm");
var formInputs = document.getElementsByClassName("form-control");
var userName = document.querySelector('[name="name"]');
var email = document.querySelector('[name="email"]');
var profile = document.querySelector('[name="profile"]');
var pwd = document.querySelector('[name="pwd"]');
var confirmPwd = document.querySelector('[name="confirmedPwd"]');
// ========== Api
let newsContainer = document.getElementById("newsContainer");
let apikey = "17e7351a12644b89a90be283cf464451";
let Icons = document.querySelectorAll(".Icons");
// let api;

// let api = `https://newsapi.org/v2/everything?q=apple&from=2023-01-23&to=2023-01-23&sortBy=popularity&apiKey=${apikey}` ;
// let api = `https://newsapi.org/v2/everything?q=tesla&from=2022-12-24&sortBy=publishedAt&apiKey=${apikey}` ;
//  let api = `https://newsapi.org/v2/everything?q=bitcoin&apiKey=${apikey}` ;

fetchData(api) ;
// =====================================> API's
// let api = `https://newsapi.org/v2/everything?q=bitcoin&apiKey=${apikey}` ;
// let api = `https://newsapi.org/v2/everything?domains=techcrunch.com,thenextweb.com&apiKey=${apikey}` ;
// ========================================>
for (let i = 0; i < Icons.length; i++) {
    Icons[i].addEventListener('click', () => {
        if (Icons[i].getAttribute('alt') === "bitcoin") {
            //  api = `https://newsapi.org/v2/everything?q=bitcoin&apiKey=${apikey}` ;
            fetchData(api);
        } else if (Icons[i].getAttribute('alt') === "apple") {
            // api = `https://newsapi.org/v2/everything?q=apple&from=2023-01-23&to=2023-01-23&sortBy=popularity&apiKey=${apikey}` ;
            fetchData(api);
        } else {
            // api = `https://newsapi.org/v2/everything?domains=techcrunch.com,thenextweb.com&apiKey=${apikey}` ;
            fetchData(api);
        }
    })
}

function fetchData(api) {
    fetch(api)
        .then(res => res.json())
        .then(data => {
            let newsArticles = data.articles;
            console.log(newsArticles);
            newsArticles.map(article => {
                newsContainer.innerHTML += `
                    <div id="cardData" class="col-sm-2 col-md-3 card mt-3" style="width: 18rem;">
                    <img id="bookImg" src="${article.urlToImage}" class="card-img-top" style="height: 15rem ;" alt="...">
                    <div class="card-body">
                    <a class="text-primary" href="${article.url}"><em>Visit Website </em> </a>
                        <h3 class="cardTitle">${article.title.substring(0, 12)}</h3>
                        <small class="text-danger">${article.author}</small>
                    </div>
                    <div class="card-body">
                        <p class="text-dark fw-normal ">${article.description}</p>
                        <b>${article.publishedAt}</b>
                    </div>
                </div>
            `})
        });
}
// ========= search 
let cardTitle = document.querySelectorAll(".cardTitle");
let input = document.getElementById("searchInput");

function searchForArticle() {
    let filter = input.value.toLocaleUpperCase();
    let cardTitle = document.querySelectorAll(".cardTitle");
    for (i = 0; i < cardTitle.length; i++) {
        let a;
        a = cardTitle[i].innerHTML;
        if (a.toUpperCase().indexOf(filter) > -1) {
            cardTitle[i].parentElement.parentElement.style.display = "";
        } else {
            cardTitle[i].parentElement.parentElement.style.display = "none";
        }
    }
}
input?.addEventListener('input', searchForArticle);
// Validation signUp 
function showEroor(input, message) {
    const formControl = input.parentElement;
    const small = formControl.querySelector("small");
    small.className = "border-danger text-danger";
    small.innerText = message;
}

function showSuccess(input) {
    const formControl = input.parentElement;
    formControl.className = "form-control success";
}
signingUpForm?.addEventListener("submit", (e) => {
    if (userName.value == "") {
        e.preventDefault();
        showEroor(userName, "userName is required!!");
    }
    if (email.value == "") {
        e.preventDefault();
        showEroor(email, "please recheck email value ");
    }
    if (profile.value == "") {
        e.preventDefault();
        showEroor(profile, "please add image !!");
    }
    if (pwd.value == "") {
        e.preventDefault();
        showEroor(pwd, "pwd is required!!");
    }
    if (confirmPwd.value == "") {
        e.preventDefault();
        showEroor(email, "pwd  field is required");
    }
    setTimeout(() => {
        window.location.reload();
    }, 3000)
})
//  Validating Add Article
addArticleBtn?.addEventListener('click', (e) => {
    e.preventDefault();
    let dataTitle = document.querySelectorAll('[name="title[]"]');
    let dataImage = document.querySelectorAll('[name="image[]"]');
    let dataBody = document.querySelectorAll('[name="body[]"]');
    for (let i = 0; i < dataTitle.length; i++) {
        if (dataTitle[i].value === "") {
            let small = dataTitle[i].nextSibling.nextSibling;
            small.innerHTML = "Field is highly required !!";
            small.style.fontStyle = 'italic';
            small.style.fontWeight = 'bold';
            small.style.color = 'red';
        }
        if (dataImage[i].value === "") {
            console.log("empty image");
            let small = dataImage[i].nextSibling.nextSibling;
            small.innerHTML = "Field is highly required !!";
            small.style.fontStyle = 'italic';
            small.style.fontWeight = 'bold';
            small.style.color = 'red';
        }
        if (dataBody[i].value === "") {
            console.log("empty body");
            let small = dataBody[i].nextSibling.nextSibling;
            small.innerHTML = "Field is highly required !!";
            small.style.fontStyle = 'italic';
            small.style.fontWeight = 'bold';
            small.style.color = 'red';
        }
    }
})

signUp?.addEventListener("click", () => {
    signUpForm.style.display = "contents";
    signInForm.style.display = "none";
})
signIn?.addEventListener("click", () => {
    signUpForm.style.display = "none";
    signInForm.style.display = "block";
})
anotherForm?.addEventListener('click', () => {
    let div = document.createElement("div");
    let div1 = document.createElement("div");
    let div2 = document.createElement("div");
    let label = document.createElement("label");
    let label1 = document.createElement("label");
    let label2 = document.createElement("label");
    let input = document.createElement("input");
    let input1 = document.createElement("input");
    let input2 = document.createElement("input");
    let small = document.createElement("small");
    label.innerHTML = "<b>Title</b>";
    label1.innerHTML = "<b>Image</b>";
    label2.innerHTML = "<b>Body</b>";
    div.classList.add('mb-3');
    div1.classList.add('mb-3');
    div2.classList.add('mb-3');
    label.classList.add('form-label');
    label1.classList.add('form-label');
    label2.classList.add('form-label');
    input.classList.add('form-control');
    input1.classList.add('form-control');
    input2.classList.add('form-control');
    input.setAttribute('name', 'title[]');
    input1.setAttribute('name', 'image[]');
    input1.setAttribute('type', 'file');
    input2.setAttribute('name', 'body[]');
    div.append(label, input, small);
    div1.append(label1, input1, small);
    div2.append(label2, input2, small);
    articleForm.append(div, div1, div2);
})



// function isValidEmail(email) {
//     const pattern = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
//     return pattern.match(email.value);
// } !isValidEmail(email.value)