let services = document.querySelectorAll('.service')
let serviceHref = document.querySelectorAll('.service a[data-service-id]')
let events = document.querySelectorAll('.event')
let eventHref = document.querySelectorAll('.event a[data-event-id]')
// console.log(serviceHref)
// console.log(eventHref)



let interval
// console.log(services)
// console.log(serviceHref)


for (let i = 0; i< serviceHref.length; i++){
    serviceHref[i].addEventListener("click", function (e) {
        e.preventDefault()
        let serviceId = parseInt(serviceHref[i].getAttribute('data-service-id'))
        console.log(typeof (serviceId))




        fetch('../controller/frontend/ajax/service.php', {
            method: 'POST',
            headers: new Headers(),
            body: serviceId
        })

            .then((res) => res.json())
            .then((data) => {
                // console.log(data)

                let sliderContainer = document.querySelector('#slider-modal-container')
                // console.log(sliderContainer)

                let medias = data.name.split(',')
                for (let i = 0; i<medias.length; i++){
                    // console.log(medias[i])

                    let img = document.createElement('img')
                    img.classList.add('slide')
                    img.classList.add('fade')

                    img.setAttribute('src', `../../assets/img/${medias[i]}`)
                    sliderContainer.appendChild(img)
                    console.log(img)

                }

                showModalSlides(slideIndex);

                interval = setInterval(function(){
                    showModalSlides(++slideIndex);
                }, 5000);
                console.log(medias)


                let title = document.querySelector('.title')
                title.innerText = data.title
                title.nextElementSibling.innerText = data.content
                let serviceInfo = document.querySelector('.service-info')
                serviceInfo.firstElementChild.innerHTML = `<i class="fas fa-map-marker-alt"></i> ${data.address}`
                serviceInfo.firstElementChild.nextElementSibling.innerHTML = `<i class="fas fa-phone"></i> ${data.phone_number}`
                serviceInfo.firstElementChild.nextElementSibling.nextElementSibling.innerHTML = `<i class="fas fa-clock"></i> ${data.hours_from} ${data.hours_to}`
                serviceInfo.lastElementChild.innerText = `Itinéraire`

                console.log(serviceInfo.lastElementChild)


            })

            .catch((data) =>{
                alert("un incident s'est produit")
            })

    })
}
console.log(eventHref)


for (let i = 0; i< eventHref.length; i++){
    eventHref[i].addEventListener("click", function (e) {
        e.preventDefault()
        console.log(this)
        let eventId = parseInt(eventHref[i].getAttribute('data-event-id'))
        // console.log(typeof (eventId))


        console.log(eventHref)


        fetch('../controller/frontend/ajax/event.php', {
            method: 'POST',
            headers: new Headers(),
            body: eventId
        })

            .then((res) => res.json())
            .then((data) => {
                // console.log(data)

                let sliderContainer = document.querySelector('#slider-modal-container')
                // console.log(sliderContainer)

                let medias = data.name.split(',')
                for (let i = 0; i<medias.length; i++){
                    // console.log(medias[i])

                    let img = document.createElement('img')
                    img.classList.add('slide')
                    img.classList.add('fade')

                    img.setAttribute('src', `../../assets/img/${medias[i]}`)
                    sliderContainer.appendChild(img)
                    // console.log(img)

                }

                showModalSlides(slideIndex);

                interval = setInterval(function(){
                    showModalSlides(++slideIndex);
                }, 5000);
                // console.log(medias)


                let title = document.querySelector('.title')
                title.previousElementSibling.innerText = data.category_name
                title.innerText = data.title
                title.nextElementSibling.innerText = data.content
                let serviceInfo = document.querySelector('.service-info')
                serviceInfo.firstElementChild.innerHTML = `<i class="fas fa-map-marker-alt"></i> ${data.address}`
                serviceInfo.firstElementChild.nextElementSibling.innerHTML = `<i class="fas fa-phone"></i> ${data.phone_number}`
                serviceInfo.firstElementChild.nextElementSibling.nextElementSibling.innerHTML = `<i class="fas fa-clock"></i> ${data.event_time_formated}`
                serviceInfo.lastElementChild.innerText = `Itinéraire`

                console.log(title.previousElementSibling)


            })

            .catch((data) =>{
                alert("un incident s'est produit")
            })

    })
}


const eventModal = function (param) {
    fetch('../controller/frontend/ajax/event.php', {
        method: 'POST',
        headers: new Headers(),
        body: param
    })

        .then((res) => res.json())
        .then((data) => {
            // console.log(data)

            let sliderContainer = document.querySelector('#slider-modal-container')
            // console.log(sliderContainer)

            let medias = data.name.split(',')
            for (let i = 0; i<medias.length; i++){
                // console.log(medias[i])

                let img = document.createElement('img')
                img.classList.add('slide')
                img.classList.add('fade')

                img.setAttribute('src', `../../assets/img/${medias[i]}`)
                sliderContainer.appendChild(img)
                // console.log(img)

            }

            showModalSlides(slideIndex);

            interval = setInterval(function(){
                showModalSlides(++slideIndex);
            }, 5000);
            // console.log(medias)


            let title = document.querySelector('.title')
            title.previousElementSibling.innerText = data.category_name
            title.innerText = data.title
            title.nextElementSibling.innerText = data.content
            let serviceInfo = document.querySelector('.service-info')
            serviceInfo.firstElementChild.innerHTML = `<i class="fas fa-map-marker-alt"></i> ${data.address}`
            serviceInfo.firstElementChild.nextElementSibling.innerHTML = `<i class="fas fa-phone"></i> ${data.phone_number}`
            serviceInfo.firstElementChild.nextElementSibling.nextElementSibling.innerHTML = `<i class="fas fa-clock"></i> ${data.event_time}`
            serviceInfo.lastElementChild.innerText = `Itinéraire`

            // console.log(title.previousElementSibling)


        })

        .catch((data) =>{
            alert("un incident s'est produit")
        })
}
