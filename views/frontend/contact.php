<?php $title = ''; ?>
<?php ob_start(); ?>
    <main>
        <?php require_once 'partials/frontend/logo.php';?>

        <?php require_once 'partials/frontend/nav.php';?>
        <section class="contact">
            <section>
                <ul class="tabs">
                    <li class="active"><a href="#problem">signaler un probleme</a></li>
                    <li><a href="#mentions">contacter</a></li>
                </ul>
                <div class="tabs-content">
                    <div class="tab-content active" id="problem">
                        <form id="problem-form" action="index.php?page=contact" method="post" enctype="multipart/form-data">
                            <div>
                                <label for=""></label>
                                <input type="text" placeholder="adresse" name="" id="address">
                            </div>

                            <div>
                                <label for=""></label>
                                <input type="email" placeholder="email" name="" id="email">
                            </div>

                            <div>
                                <label for=""></label>
                                <select name="" id="objects">
                                    <option value="" disabled selected>Select your option</option>
                                    <?php foreach($objects as $key => $object): ?>
                                        <option value="<?= $object['id'];?>"><?= $object['object_name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div>
                                <label for=""></label>
                                <select name="" id="reasons">
                                    <option value="" disabled selected>Select your option</option>
                                </select>
                            </div>

                            <div>
                                <label for=""></label>
                                <textarea placeholder="Description de la demande…" name="" id="description"></textarea>
                            </div>

                            <div>
                                <input id="submit-problem-form" type="submit" name="" value="envoyer">
                            </div>
                        </form>
                    </div>
                    <div class="tab-content" id="mentions">
                        <form id="contact-form" action="index.php?page=contact" method="post" enctype="multipart/form-data">
                            <div class="double-form-group">
                                <div>
                                    <label for=""></label>
                                    <input type="text" placeholder="Nom" name="" id="name">
                                </div>

                                <div>
                                    <label for=""></label>
                                    <input type="text" placeholder="Prénom" name="" id="first-name">
                                </div>
                            </div>

                            <div class="double-form-group">
                                <div>
                                    <label for=""></label>
                                    <input type="tel" placeholder="Tel ." name="" id="phone-number">
                                </div>

                                <div>
                                    <label for=""></label>
                                    <input type="email" placeholder="Adresse mail" name="" id="email-contact-form">
                                </div>
                            </div>

                            <div>
                                <label for=""></label>
                                <textarea placeholder="Description de la demande…" name="" id="description-contact-form"></textarea>
                            </div>

                            <div>
                                <input id="submit-contact-form" type="submit" name="" value="envoyer">
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </section>
        <?php require_once 'partials/frontend/footer.php';?>
    </main>

<script src="../../assets/js/tabs.js"></script>
<script src="../../assets/js/menu-burger.js"></script>
<script>
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
</script>
<?php $content = ob_get_clean(); ?>
<?php require 'layout.php'; ?>


