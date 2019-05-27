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