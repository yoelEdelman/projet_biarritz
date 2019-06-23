// faq
const faq = function () {
    var coll = document.getElementsByClassName("collapsible");
    var i;

    for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.maxHeight){
                content.style.maxHeight = null;
            } else {
                content.style.maxHeight = content.scrollHeight*2 + "px";
            }
        });
    }
}

faq()

//burger menu for mobile
const burgerMenu = function () {
    let cross = document.querySelector('.cross')
    let menu = document.querySelector('.menu')
    let hamburger = document.querySelector('.hamburger')

    cross.style.display = 'none'

    hamburger.addEventListener('click', function () {
        hamburger.style.display = 'none'
        cross.style.display = 'block'
        menu.classList.remove('hide-menu')
        menu.classList.add('show-menu')
    })

    cross.addEventListener('click', function () {
        cross.style.display = 'none'
        hamburger.style.display = 'block'
        menu.classList.remove('show-menu')
        menu.classList.add('hide-menu')
    })
}

burgerMenu()

// contact page
const contact = function () {
    let objectSelected = document.querySelector('#objects')
    let reasonSelected = document.querySelector('#reasons')
    let problemForm = document.querySelector('#problem-form')
    let contactForm = document.querySelector('#contact-form')
    let submitProblemForm = document.querySelector('#submit-problem-form')
    let submitContactForm = document.querySelector('#submit-contact-form')


    problemForm.addEventListener('click', function (e) {
        e.preventDefault()
    })

    contactForm.addEventListener('click', function (e) {
        e.preventDefault()
    })

    objectSelected.addEventListener('change', function () {
        sendObjectSelected(this.value)
    })

    submitProblemForm.addEventListener('click', function () {
        let address = document.querySelector('#address')
        let email = document.querySelector('#email')
        let description = document.querySelector('#description')

        if (address.value == "" || email.value == "" || description.value == "" || objectSelected.value == "" ||reasonSelected.value == ""){
            alert('Tous les champs sont obligatoires !')
        }
        else {
            let data = {
                address: address.value,
                email: email.value,
                objectSelected: objectSelected.value,
                reasonSelected: reasonSelected.value,
                description: description.value
            }
            sendProblemForm(data)
        }
    })

    submitContactForm.addEventListener('click', function () {
        let name = document.querySelector('#name')
        let firstName = document.querySelector('#first-name')
        let phoneNumber = document.querySelector('#phone-number')
        let email = document.querySelector('#email-contact-form')
        let description = document.querySelector('#description-contact-form')

        if (name.value == "" || firstName.value == "" || phoneNumber.value == "" || email.value == "" || description.value == ""){
            alert('Tous les champs sont obligatoires !')
        }
        else {
            let data = {
                name: name.value,
                firstName: firstName.value,
                phoneNumber: phoneNumber.value,
                email: email.value,
                description: description.value
            }
            sendContactForm(data)
        }
    })

    const sendProblemForm = function(form){
        fetch('../controller/frontend/ajax/problemForm.php', {
            method: 'POST',
            headers: new Headers(),
            body: JSON.stringify(form)
        })
            .then((res) => res.text())
            .then((data) =>{
                alert(data)
            })
    }

    const sendContactForm = function(form){
        fetch('../controller/frontend/ajax/contactForm.php', {
            method: 'POST',
            headers: new Headers(),
            body: JSON.stringify(form)
        })
            .then((res) => res.text())
            .then((data) =>{
                alert(data)
            })
    }

    const sendObjectSelected =function (value) {
        fetch('../controller/frontend/ajax/reason.php', {
            method: 'POST',
            headers: new Headers(),
            body: value
        })
            .then((res) => res.json())
            .then((data) =>{
                for (let i = 0; i < data.length; i++){
                    let option = document.createElement('option')
                    option.value = data[i].id
                    option.text = data[i].reason_name
                    reasonSelected.appendChild(option)
                }
            })
    }
}

contact()

//tabs for contact poage to switch form
const tabs = function () {
    let tabs = document.querySelectorAll('.tabs a')

    for (let i = 0; i < tabs.length; i++){
        tabs[i].addEventListener('click', function (e) {
            e.preventDefault()
            showTag(this)
        })
    }

    const showTag = function (a){
        let li = a.parentNode
        let div = a.parentNode.parentNode.parentNode

        if (li.classList.contains('active')){
            return false
        }
        div.querySelector('.tabs .active').classList.remove('active')
        li.classList.add('active')

        div.querySelector('.tab-content.active').classList.remove('active')
        div.querySelector(a.getAttribute('href')).classList.add('active')
    }

    const hashchange = function(){
        let hash = window.location.hash
        let a = document.querySelector('a[href="'+ hash +'"]')
        if (a !== null && !a.parentNode.classList.contains('active')) {
            showTag(a)
        }
    }

    window.addEventListener('hashchange', hashchange)
    hashchange()
}

tabs()