// JavaScript Document


//var elFirstName = document.getElementById('firstname');
//var elLastName = document.getElementById('lastname');
//
//function checkLength(inputEl,statusEl,minLength,inputGroup){
//    var elStatus = document.getElementById(statusEl);
//    var elInput = document.getElementById(inputEl);
//    var elGroup = document.getElementById(inputGroup);
//    if (elInput.value.length < minLength)
//    {
//        elStatus.innerHTML = inputEl.toUpperCase()+" must be at least "+minLength+" characters.";
//        elGroup.classList.add('has-error');
//    }
//    else
//    {
//        elStatus.innerHTML = "";
//        elGroup.classList.remove('has-error');
//        elGroup.classList.add('has-success');
//    }
//}
//
//elFirstName.addEventListener('blur', function(){
//    checkLength('firstname','firstNameStatus',2,'firstNameGroup');},false);
//elLastName.addEventListener('blur', function(){
//    checkLength('lastname','lastNameStatus',2,'lastNameGroup');},false);


// JavaScript Document

function validateData(inputEl, statusEl, inputGroup) {
    var elInput = document.getElementById(inputEl);
    var elStatus = document.getElementById(statusEl);
    var elGroup = document.getElementById(inputGroup);
    var value = elInput.value.trim();
    var isValid = true;
    var message = "";

    // First and Last Name Validation
    if (inputEl === "firstname" || inputEl === "lastname") {
        var nameRegex = /^[A-Za-z'-]{2,}$/;
        if (!nameRegex.test(value)) {
            isValid = false;
            message = inputEl.toUpperCase() + " must contain only letters, hyphens, or apostrophes and be at least 2 characters.";
        }
    }

    // Email Validation
    if (inputEl === "email") {
        var validRegex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if (!validRegex.test(value)) {
            isValid = false;
            message = "Please enter a valid email address.";
        }
    }

    // Phone Number Validation
    if (inputEl === "phone") {
        var phoneRegex = /^\d{10}$/;
        if (!phoneRegex.test(value)) {
            isValid = false;
            message = "Phone number must be exactly 10 digits with no symbols.";
        }
    }

    // Username and Password Validation
    if (inputEl === "username" || inputEl === "password") {
        if (value.length < 6) {
            isValid = false;
            message = inputEl.toUpperCase() + " must be at least 6 characters.";
        }
    }

    // Comments Validation
    if (inputEl === "comments") {
        if (value === "") {
            isValid = false;
            message = "COMMENTS cannot be empty.";
        }
    }

    // Update status message and class styling
    if (!isValid) {
        elStatus.innerHTML = message;
        elGroup.classList.remove('has-success');
        elGroup.classList.add('has-error');
    } else {
        elStatus.innerHTML = "";
        elGroup.classList.remove('has-error');
        elGroup.classList.add('has-success');
    }
}

// DOM Level 2 Event Listeners
window.addEventListener('DOMContentLoaded', function () {
    document.getElementById('firstname').addEventListener('blur', function () {
        validateData('firstname', 'firstNameStatus', 'firstNameGroup');
    }, false);

    document.getElementById('lastname').addEventListener('blur', function () {
        validateData('lastname', 'lastNameStatus', 'lastNameGroup');
    }, false);

    document.getElementById('email').addEventListener('blur', function () {
        validateData('email', 'emailStatus', 'emailGroup');
    }, false);

    document.getElementById('phone').addEventListener('blur', function () {
        validateData('phone', 'phoneStatus', 'phoneGroup');
    }, false);

    document.getElementById('username').addEventListener('blur', function () {
        validateData('username', 'usernameStatus', 'usernameGroup');
    }, false);

    document.getElementById('password').addEventListener('blur', function () {
        validateData('password', 'passwordStatus', 'passwordGroup');
    }, false);

    document.getElementById('comments').addEventListener('blur', function () {
        validateData('comments', 'commentsStatus', 'commentsGroup');
    }, false);
});
