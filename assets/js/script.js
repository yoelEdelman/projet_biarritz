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

//burger menu
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