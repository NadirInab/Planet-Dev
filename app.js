let addArticle = document.getElementById("addArticle") ;
let form = document.getElementById('form') ;


addArticle.addEventListener("click", (e)=>{
    e.preventDefault() ;
    const newTitleField = document.createElement('input');
    const newTitleLabel = document.createElement('label') ;
    const newImageLabel = document.createElement('label') ;
    const newImageInput = document.createElement('input') ;
    const newBodyLabel = document.createElement('label') ;
    const newBodyTextArea = document.createElement('TEXTAREA') ;
    const hr = document.createElement("hr") ;
    
    let arrayOfClasses = ["shadow", "appearance-none", "border", "rounded", "w-full", "py-2", "px-3", "text-gray-700" ,"leading-tight", "focus:outline-none", "focus:shadow-outline", "mt-2"] ;
    let labelClasses = ["block", "text-gray-700", "text-sm", "font-bold", "mb-2"] ;

    arrayOfClasses.forEach((elem)=>{newTitleField.classList.add(elem)}) ;
    labelClasses.forEach((elem)=>{newTitleLabel.classList.add(elem)}) ;

    labelClasses.forEach((elem)=>{newImageLabel.classList.add(elem)}) ;
    arrayOfClasses.forEach((elem)=>{newImageInput.classList.add(elem)}) ;

    arrayOfClasses.forEach((elem)=>{newBodyTextArea.classList.add(elem)}) ;
    labelClasses.forEach((elem)=>{newBodyLabel.classList.add(elem)}) ;

    newTitleLabel.innerHTML = "Title" ;
    newImageLabel.innerHTML = "Image" ;
    newBodyLabel.innerHTML = "Body" ;
  
    newTitleField.setAttribute('type','text') ;
    newTitleField.setAttribute('placeholder','title') ;
    newTitleField.setAttribute('name', 'title1') ;

    newImageInput.setAttribute('type','file') ;
    newImageInput.setAttribute('name', 'image1') ;

    newBodyTextArea.setAttribute('name', 'body2') ;
    newBodyTextArea.setAttribute('type', 'text') ;
    newBodyTextArea.setAttribute('placeholder', 'Article Body !!') ;

    form.append(newTitleLabel, newTitleField, newImageLabel, newImageInput, newBodyLabel, newBodyTextArea, hr )
})