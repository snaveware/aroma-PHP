const errorsElement = document.getElementById('contact-errors');
const contactForm = document.getElementById('contact-form')

function validateName(){
    
    let name  = document.getElementById('name').value
    
    let error = true
    
    if(!name){
        
        console.log(name, 'not name')
        errorsElement.innerHTML += `<p class="error"> Name is required <p/>`
        return error;
    }
    else if(name.length < 3){
        name = name.trim()
        errorsElement.innerHTML +=`<p class="error"> Name should be atleast 5 characters long </p>`;
        return error
    } else{
        error  = false
        return error;
    }

}

function validateEmail(){


    let email = document.getElementById('email').value

    let error = true

    const emailRegex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    if(!email){
        errorsElement.innerHTML += `<p class="error">Email is required</p>`
        return error
    }
    else if(!emailRegex.test(email)){
        email = email.trim()
        errorsElement.innerHTML += `<p class="error"> Your email is invalid </p>`;
        return error 

    }else{
        error = false;
        return error;
    }
  
}

function validateMessage(){
    let message = document.getElementById('message').value;
    let error = true
    if(!message){
        message = message.trim();
        errorsElement.innerHTML += `<p class="error">Message is required</p>`
        return error

    }else if(message.length < 5){
        errorsElement.innerHTML += `<p class="error">Message should be atleast 5 characters</p>`
        return error
    }else{
        error = false;
        return error;
    }


}

contactForm.addEventListener('submit', function validateContactForm(e){
    errorsElement.innerHTML = ""

    validateName()
    
    validateEmail()

    validateMessage()

    if(errorsElement.innerHTML != ""){
        e.preventDefault()
    }

    
});




