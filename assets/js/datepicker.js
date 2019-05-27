
(function (global, factory) {
    typeof exports === 'object' && typeof module !== 'undefined' ? module.exports = factory() :
        typeof define === 'function' && define.amd ? define(factory) :
            (global.niceDatePicker = factory());
}(this, function () {
    'use strict';

    let niceDatePicker = function ($params) {
        this.$warpper = null;
        this.monthData = null;
        this.$params = $params;
        this.init(this.$params);
    };
    let year, month;
    niceDatePicker.prototype.getMonthData = function (year, month) {
        // let year, month;
        let ret = [];

        if (!year || !month) {

            let today = new Date();

            year = today.getFullYear();

            month = today.getMonth() + 1;
        }
        let firstDay = new Date(year, month - 1, 1);//premier jour du mois

        let firstDayWeekDay = firstDay.getDay();//premier jour du mois est le jour de la semaine

        if (firstDayWeekDay === 0) {

            firstDayWeekDay = 7;
        }

        year = firstDay.getFullYear();

        month = firstDay.getMonth() + 1;


        let lastDayOfLastMonth = new Date(year, month - 1, 0);//Dernier jour du mois dernier

        let lastDateOfLastMonth = lastDayOfLastMonth.getDate();//dernier jour du mois dernier est le nombre

        let preMonthDayCount = firstDayWeekDay - 1;//Besoin d'afficher plusieurs dates du mois dernier

        let lastDay = new Date(year, month, 0);//dernier jour du mois

        let lastDate = lastDay.getDate() //dernier jour du mois est le nombre
        let styleCls = '';
        for (let i = 0; i < 7 * 6; i++) {

            let date = i + 1 - preMonthDayCount;

            let showDate = date;

            let thisMonth = month;

            if (date <= 0) {
                thisMonth = month - 1;
                showDate = lastDateOfLastMonth + date;
                styleCls = 'nice-gray';

            } else if (date > lastDate) {
                thisMonth = month + 1;
                showDate = showDate - lastDate;
                styleCls = 'nice-gray';
            } else {
                let today = new Date();
                if (showDate === today.getDate() && thisMonth === today.getMonth() + 1) {
                    styleCls = 'nice-normal nice-current';
                } else {
                    styleCls = 'nice-normal';
                }


            }

            if (thisMonth === 13) {
                thisMonth = 1;
            }
            if (thisMonth === 0) {
                thisMonth = 12;
            }

            ret.push({
                month: thisMonth,
                date: date,
                showDate: showDate,
                styleCls: styleCls
            });
        }
        return {
            year: year,
            month: month,
            date: ret
        };
    };

    niceDatePicker.prototype.buildUi = function (year, month) {
        this.monthData = this.getMonthData(year, month);
        this.dayWords = [['Lundi', 'Mardi',  'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'], ['Lu', 'Ma', 'Me', 'Je', 'Ve', 'Sa', 'Di']];
        this.enMonthsWords = ['Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Decembre'];


        let html = `<div class="nice-date-picker-warpper">
                        <div class="nice-date-picker-header">
                            <a href="javascript:;" class="prev-date-btn">&lt;</a>
                            <span class="nice-date-title">`+ this.enMonthsWords[this.monthData.month - 1] +`</span>
                            <a href="javascript:;" class="next-date-btn">&gt;</a>
                        </div>
                        <div class="nice-date-picker-body">
                            <table>
                                <thead>
                                    <tr>`
                                        for (let i = 0; i < this.dayWords[1].length; i++) {
                                            html += `<th>`+ this.dayWords[1][i] +`</th>`
                                        }
                            html += `</tr>
                                </thead>
                                <tbody>`
                                    for (let i = 0; i < this.monthData.date.length; i++) {
                                        if (i % 7 === 0) {
                                            html += `<tr>`
                                        }
                                        html += `<td class="`+ this.monthData.date[i].styleCls +`" data-date="`+ this.monthData.year +`/`+ this.monthData.month +`/`+ this.monthData.date[i].showDate +`">`+ this.monthData.date[i].showDate +`</td>`
                                        if (i % 7 === 6) {
                                            html += `</tr>`
                                        }
                                    }
                        html += `</tbody>
                            </table>
                        </div>
                    </div>`
        return html
    };

    niceDatePicker.prototype.render = function (direction, $params) {
        let year, month;
        if (this.monthData) {

            year = this.monthData.year;
            month = this.monthData.month;

        } else {
            year = $params.year;
            month = $params.month;
        }
        if (direction === 'prev') {
            month--;
            if (month === 0) {
                month = 12;
                year--;
            }
        }
        if (direction === 'next') {
            month++;

        }
        let html = this.buildUi(year, month);
        this.$warpper.innerHTML = html;
    };

    let forColor = []
    let colorRound = 0


    // Ici pour gerer au click
    niceDatePicker.prototype.init = function ($params) {
        this.$warpper = $params.dom;
        this.render('', $params);
        let _this = this;
        this.$warpper.addEventListener('click', function (e) {
            let $target = e.target;
           // console.log($target)

            if (colorRound>0){
                forColor[colorRound-1].classList.remove('select')
            }

            forColor.push($target)

            console.log(forColor)
            forColor[colorRound].classList.add('select')
            console.log(colorRound)

            colorRound ++

            if ($target.classList.contains('prev-date-btn')) {

                _this.render('prev');

            }
            if ($target.classList.contains('next-date-btn')) {

                _this.render('next');

            }

            if ($target.classList.contains('nice-normal')) {
                $params.onClickDate($target.getAttribute('data-date'));

            }

        }, false);
        this.$warpper.addEventListener('mouseover', function (e) {
            let $target = e.target;
            if ($target.classList.contains('nice-normal')) {

                $target.classList.add('nice-active');
            }
        }, false);
        this.$warpper.addEventListener('mouseout', function (e) {
            let $target = e.target;
            if ($target.classList.contains('nice-normal')) {

                $target.classList.remove('nice-active');

            }

        }, false);

    };
    return niceDatePicker;
}));



let forEvents = document.querySelector('.forEvents')

new niceDatePicker({
    dom:document.getElementById('calendar1-wrapper2'),
    mode:'en',
    onClickDate:function(date){
      //  document.querySelector('.dateSelected').innerHTML=date;

        console.log(date)

       let dateForFrench = date.split('/');
        console.log(dateForFrench[0])
        console.log(dateForFrench[1])
        console.log(dateForFrench[2])


        let dateFrenchConv = new Date(Date.UTC(dateForFrench[0], dateForFrench[1]-1, dateForFrench[2]));

        let options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };


        document.querySelector('.dateSelected').innerHTML=dateFrenchConv.toLocaleDateString('fr-FR', options);


        let eventDate = new FormData

        eventDate.append('date', date)

        sendDate(eventDate)
    }
});


const eventDisplay = function (title, image, description, id) {
    let insideEvents = document.createElement('div')
    forEvents.appendChild(insideEvents)
    let titleEvent = document.createElement('h4')
    let descriptionEvent = document.createElement('div')
    titleEvent.innerText = title
    insideEvents.appendChild(titleEvent)
    let imageEvent = document.createElement('img')
    imageEvent.setAttribute('src', './assets/image/'+image)
    insideEvents.appendChild(imageEvent)
    insideEvents.appendChild(descriptionEvent)
    descriptionEvent.innerText = description
    let seeEvents = document.createElement('span')
    let forSeeEvents = document.createElement('div')
    insideEvents.appendChild(forSeeEvents)
    seeEvents.innerText= "Voir plus >"
    forSeeEvents.appendChild(seeEvents)
    seeEvents.classList.add('seeEvents')
    seeEvents.setAttribute('eventId', id)
    forSeeEvents.classList.add('forSeeEvents')
    insideEvents.classList.add('insideEvents')

    seeEvents.addEventListener('click', function () {
        console.log(this)
        console.log(this.getAttribute('eventId'))

        let idForEvent = this.getAttribute('eventId')

        let dataForEvent = new FormData()

        dataForEvent.append('id', idForEvent)

        sendId(dataForEvent)
    })
}



const removeDisplay = function () {
    forEvents.innerHTML = ""
}



const sendDate = function (param) {
   // fetch(url+'event-by-date.php', {
    fetch('http://localhost:8888/projet-city/event-by-date.php', {
        method: 'POST',
        headers: new Headers(),
        body: param
    })

        .then((res) => res.json())

        .then((data) => {
            console.log(data)
            removeDisplay()

            if (data.type === 0) {
                console.log(data.message)
                document.querySelector('.calendar2-msg').innerHTML=data.message;


            }
            else{
                for (let i = 0; i<data.length;i++){
                    console.log(data[i].event_date)
                    eventDisplay(data[i].title, data[i].image,data[i].description,data[i].id)

                    if (data.length>1) {
                        document.querySelector('.calendar2-msg').innerHTML='Il y a : '+data.length+' événements à cette date';

                    }
                    else{
                        document.querySelector('.calendar2-msg').innerHTML='Il y a : '+data.length+' événement à cette date';

                    }

                }
            }

        })

        .catch((data) => {
            alert("un incident s'est produit")
        })
}


let dateObj = new Date();
let month = dateObj.getUTCMonth() + 1; //months from 1-12
let day = dateObj.getUTCDate();
let year = dateObj.getUTCFullYear();

let newdate = year + "/" + month + "/" + day;


console.log(newdate)


let dateFrench = new Date(Date.UTC(year, month-1, day, 3, 0, 0));

 options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };


console.log(dateFrench.toLocaleDateString('fr-FR', options));

let dateFrenchDay = dateFrench.toLocaleDateString('fr-FR', options)

console.log(dateFrenchDay)

document.querySelector('.dateSelected').innerHTML=dateFrenchDay;




let objDateDay = new FormData()

objDateDay.append('date', newdate)

window.onload = sendDate(objDateDay)

const sendId = function (elem) {

    fetch('http://localhost:8888/projet-city/oneEvent.php', {
        method: 'POST',
        headers: new Headers(),
        body: elem
    })

        .then((res) => res.json())

        .then((data) => {
            console.log(data)

            displayMap(data['image'],data['content'],data['adress'],data['on_map'])


        })

        .catch((data) => {
            alert("un incident s'est produit")
        })
}

