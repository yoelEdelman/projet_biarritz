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