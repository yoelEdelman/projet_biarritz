let services = document.querySelectorAll('.service')
let serviceHref = document.querySelectorAll('.service a[data-service-id]')
let events = document.querySelectorAll('.event')
let eventHref = document.querySelectorAll('.event a[data-event-id]')
let interval

for (let i = 0; i< serviceHref.length; i++){
    serviceHref[i].addEventListener("click", function (e) {
        e.preventDefault()
        let serviceId = parseInt(serviceHref[i].getAttribute('data-service-id'))

        fetch('../controller/frontend/ajax/service.php', {
            method: 'POST',
            headers: new Headers(),
            body: serviceId
        })
            .then((res) => res.json())
            .then((data) => {

                let sliderContainer = document.querySelector('#slider-modal-container')
                let medias = data.name.split(',')

                for (let i = 0; i<medias.length; i++){
                    let img = document.createElement('img')

                    img.classList.add('slide')
                    img.classList.add('fade')
                    img.setAttribute('src', `../../assets/img/${medias[i]}`)
                    sliderContainer.appendChild(img)
                }

                showModalSlides(slideIndex);

                interval = setInterval(function(){
                    showModalSlides(++slideIndex);
                }, 5000);

                let modalMap = document.querySelector('.modal-map')
                let title = document.querySelector('.title')
                let serviceInfo = document.querySelector('.service-info')

                modalMap.setAttribute('src', data.location)

                title.innerText = data.title
                title.nextElementSibling.innerHTML = data.content

                serviceInfo.firstElementChild.innerHTML = `<i class="fas fa-map-marker-alt"></i> ${data.address}`
                serviceInfo.firstElementChild.nextElementSibling.innerHTML = `<i class="fas fa-phone"></i> ${data.phone_number}`
                serviceInfo.firstElementChild.nextElementSibling.nextElementSibling.innerHTML = `<i class="fas fa-clock"></i> ${data.hours_from_formated} ${data.hours_to_formated}`
                serviceInfo.lastElementChild.innerText = `Itinéraire`
            })

            .catch((data) =>{
                alert("un incident s'est produit")
            })
    })
}

for (let i = 0; i< eventHref.length; i++){

    eventHref[i].addEventListener("click", function (e) {
        e.preventDefault()
        let eventId = parseInt(eventHref[i].getAttribute('data-event-id'))

        fetch('../controller/frontend/ajax/event.php', {
            method: 'POST',
            headers: new Headers(),
            body: eventId
        })
            .then((res) => res.json())
            .then((data) => {

                let sliderContainer = document.querySelector('#slider-modal-container')
                let medias = data.name.split(',')

                for (let i = 0; i<medias.length; i++){
                    let img = document.createElement('img')

                    img.classList.add('slide')
                    img.classList.add('fade')
                    img.setAttribute('src', `../../assets/img/${medias[i]}`)
                    sliderContainer.appendChild(img)
                }

                showModalSlides(slideIndex);

                interval = setInterval(function(){
                    showModalSlides(++slideIndex);
                }, 5000);

                let modalMap = document.querySelector('.modal-map')
                let title = document.querySelector('.title')
                let serviceInfo = document.querySelector('.service-info')

                modalMap.setAttribute('src', data.location)

                title.previousElementSibling.innerText = data.category_name
                title.innerText = data.title
                title.nextElementSibling.innerHTML = data.content

                serviceInfo.firstElementChild.innerHTML = `<i class="fas fa-map-marker-alt"></i> ${data.address}`
                serviceInfo.firstElementChild.nextElementSibling.innerHTML = `<i class="fas fa-phone"></i> ${data.phone_number}`
                serviceInfo.firstElementChild.nextElementSibling.nextElementSibling.innerHTML = `<i class="fas fa-clock"></i> ${data.event_time_formated}`
                serviceInfo.lastElementChild.innerText = `Itinéraire`
            })
            .catch((data) =>{
                alert("un incident s'est produit")
            })
    })
}
