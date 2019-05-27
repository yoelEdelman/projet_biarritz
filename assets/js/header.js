let logo = document.querySelector('.home-logo')

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