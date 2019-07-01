// faq
const faq = function () {
    let coll = document.getElementsByClassName("collapsible");
    let i;

    for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function() {
            this.classList.toggle("active");
            let content = this.nextElementSibling;
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

    if (problemForm){
        problemForm.addEventListener('click', function (e) {
            e.preventDefault()
        })
    }

    if (contactForm){
        contactForm.addEventListener('click', function (e) {
            e.preventDefault()
        })
    }

    if (objectSelected){
        objectSelected.addEventListener('change', function () {
            sendObjectSelected(this.value)
        })
    }

    if (submitProblemForm){
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
                address.value = ''
                email.value = ''
                description.value = ''
                objectSelected.value = ''
                reasonSelected.value = ''
            }
        })
    }

    if (submitContactForm){
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
                name.value = ''
                firstName.value = ''
                phoneNumber.value = ''
                email.value = ''
                description.value = ''
            }
        })
    }

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

//tabs for contact page to switch form
const tabs = function () {
    let tabs = document.querySelectorAll('.tabs a')

    for (let i = 0; i < tabs.length; i++){
        if (tabs[i]) {
            tabs[i].addEventListener('click', function (e) {
                e.preventDefault()
                showTag(this)
            })
        }
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

    if (window){
        window.addEventListener('hashchange', hashchange)
        hashchange()
    }

}

tabs()

//modal
const modal =function () {
    (function() {
        /* Opening modal window function */
        function openModal() {
            /* Get trigger element */
            let modalTrigger = document.getElementsByClassName('jsModalTrigger');

            /* Set onclick event handler for all trigger elements */
            for(let i = 0; i < modalTrigger.length; i++) {
                modalTrigger[i].onclick = function() {
                    let target = this.getAttribute('href').substr(1);
                    let modalWindow = document.getElementById(target);

                    modalWindow.classList ? modalWindow.classList.add('open') : modalWindow.className += ' ' + 'open';
                }
            }
        }

        function closeModal(){
            /* Get close button */
            let closeButton = document.getElementsByClassName('jsModalClose');
            let closeOverlay = document.getElementsByClassName('jsOverlay');

            /* Set onclick event handler for close buttons */
            for(let i = 0; i < closeButton.length; i++) {
                closeButton[i].onclick = function() {

                    let modalWindow = this.parentNode.parentNode;
                    document.querySelector('#slider-modal-container').innerHTML = ''
                    clearInterval(interval)

                    modalWindow.classList ? modalWindow.classList.remove('open') : modalWindow.className = modalWindow.className.replace(new RegExp('(^|\\b)' + 'open'.split(' ').join('|') + '(\\b|$)', 'gi'), ' ');
                }
            }

            /* Set onclick event handler for modal overlay */
            for(let i = 0; i < closeOverlay.length; i++) {
                closeOverlay[i].onclick = function() {

                    let modalWindow = this.parentNode;
                    document.querySelector('#slider-modal-container').innerHTML = ''
                    clearInterval(interval)

                    modalWindow.classList ? modalWindow.classList.remove('open') : modalWindow.className = modalWindow.className.replace(new RegExp('(^|\\b)' + 'open'.split(' ').join('|') + '(\\b|$)', 'gi'), ' ');
                }
            }
        }

        /* Handling domready event IE9+ */
        function ready(fn) {
            if (document.readyState != 'loading'){
                fn();
            } else {
                document.addEventListener('DOMContentLoaded', fn);
            }
        }

        /* Triggering modal window function after dom ready */
        ready(openModal);
        ready(closeModal);
    }());
}

modal()

//slider for modal
const sliderModal = function () {
    // initialize slideIndex with 0 as you want to show the first slide first
    let slideIndex = 0;

// creating function for showing slides
    function showModalSlides(index){
        let slides = document.querySelectorAll(".slide");

        // if slide index value is greater than length of slides then jump to 1st slide
        if (index >= slides.length){
            slideIndex = 0;
            // if we want to jump at the last of the slide in case the user is at the first one
        } else if (index < 0) {
            slideIndex = slides.length - 1;
        } else{
            slideIndex = slideIndex;
        }

        // before showing slides we must hide all the slides and remove active-dots class using for loop
        for (let i = 0; i < slides.length; i++){
            // hide slide elements
            slides[i].style.display = "none";
        }
        // show the slide we want and set the dot class active-dot
        slides[slideIndex].style.display = "block";
    }
}

sliderModal()

//nav acces to account
const navConnected = function () {
    let menuConnected = document.querySelector('.menu-connected')
    let myAccount = document.querySelector('.my-account')

    if (myAccount){
        myAccount.addEventListener("mouseover", function (e) {
            menuConnected.classList.remove('hide-menu')
            e.stopPropagation()
        })
    }

    if (menuConnected){
        menuConnected.addEventListener("mouseover", function (e) {
            menuConnected.style.display = "block"
            menuConnected.classList.remove('hide-menu')
            e.stopPropagation()
        })

        menuConnected.addEventListener("mouseout", function (e) {
            menuConnected.classList.add('hide-menu')
            e.stopPropagation()
        })
    }
}

navConnected()

//header logo transition
const header = function () {
    let logo = document.querySelector('.home-logo')

    if (logo){
        window.addEventListener('scroll', function () {
            if ((document.body.getBoundingClientRect()).top){
                logo.classList.remove('undo-logo-transition')
                logo.classList.add('logo-transition')
            }
            else{
                logo.classList.remove('logo-transition')
                logo.classList.add('undo-logo-transition')
            }
        })
    }
}

header()

//slider for index page
const indexSlider = function () {
    // initialize slideIndex with 0 as you want to show the first slide first
    let slideIndex = 0;

    showSlides(slideIndex);

// creating function for showing slides
    function showSlides(index){
        // lets select all the slides and dots using querySelectorAll method
        let slides = document.querySelectorAll(".slide");
        let dots = document.querySelectorAll(".dot-navigation");

        // if slide index value is greater than length of slides then jump to 1st slide
        if (index >= slides.length){
            slideIndex = 0;
            // if we want to jump at the last of the slide in case the user is at the first one
        } else if (index < 0) {
            slideIndex = slides.length - 1;
        } else{
            slideIndex = slideIndex;
        }

        // before showing slides we must hide all the slides and remove active-dots class using for loop
        for (let i = 0; i < slides.length; i++){
            // hide slide elements
            slides[i].style.display = "none";
            // hide dots active-dot class
            dots[i].classList.remove("active-dot");
        }
        // show the slide we want and set the dot class active-dot
        slides[slideIndex].style.display = "block";
        dots[slideIndex].classList.add("active-dot");
    }

// select the previous arrow element and add a click event using addEventListener method
    document.querySelector("#arrow-prev").addEventListener("click", function(){
        // decrement slideIndex value to go to previous slide
        showSlides(--slideIndex);
    });

// select the next arrow element and add a click event using addEventListener method
    document.querySelector("#arrow-next").addEventListener("click", function(){
        // decrement slideIndex value to go to previous slide
        showSlides(++slideIndex);
    });

// select all the dots using querySelectorAll and iterate over each one using forEach method
    document.querySelectorAll(".dot-navigation").forEach(function(element){
        element.addEventListener("click", function(){
            // make a real array using slice method from array proptotype followed by call method
            let dots = Array.prototype.slice.call(this.parentElement.children);
            // make a dot index letiable of the array we have created above
            let dotIndex = dots.indexOf(element);

            // save slideIndex value to dot index
            showSlides(slideIndex = dotIndex);
        });
    });

// lets set our slide automatic using setInterval method
    setInterval(function(){
        showSlides(++slideIndex);
    }, 5000);
}

indexSlider()

