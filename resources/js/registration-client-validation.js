const form = document.querySelector("form");
const nameInput = document.getElementById("name");
const surnameInput = document.getElementById("surname");
const emailInput = document.getElementById("email");
const passwordInput = document.getElementById("password");
const confirmPasswordInput = document.getElementById("password-confirm");
const restaurantNameInput = document.getElementById("restaurantName");
const restaurantAddressInput = document.getElementById("restaurantAddress");
const vatInput = document.getElementById("restaurantVat");
const typeContainer = document.querySelector('div.card')
const types = document.querySelectorAll('.my_checkbox');


nameInput.addEventListener('input', function () {
    validateName();
});
surnameInput.addEventListener('input', function () {
    validateSurname();
});
emailInput.addEventListener("input", function () {
    validateEmail();
});
passwordInput.addEventListener("input", function () {
    validatePassword();
});
confirmPasswordInput.addEventListener("input", function () {
    validatePassword();
});
restaurantNameInput.addEventListener('input', function () {
    validateRestaurantName();
});
restaurantAddressInput.addEventListener('input', function () {
    validateRestaurantAddress();
});
vatInput.addEventListener('input', function () {
    validateVat();
})

form.addEventListener("submit", (event) => {

    // Esegue la validazione dei campi
    const isNameValid = validateName();
    const isSurnameValid = validateSurname();
    const isEmailValid = validateEmail();
    const isPasswordValid = validatePassword();
    const isRestaurantNameValid = validateRestaurantName();
    const isRestaurantAddressValid = validateRestaurantAddress();
    const isVatValid = validateVat();
    let atLeastOneChecked = false;

    //Cerca se almeno una checkbox è selezionata
    for (let i = 0; i < types.length; i++) {
        if (types[i].checked) {
            atLeastOneChecked = true;
        }
    }

    // Controlla se ci sono errori di validazione

    if (isNameValid || isSurnameValid || isEmailValid || isPasswordValid || isRestaurantNameValid || isRestaurantAddressValid || isVatValid) {

        // Mostra errore delle checkbox di validazione
        const typesError = document.getElementById('typesError');

        if (!atLeastOneChecked) {
            types.forEach(type => {
                type.classList.add('is-invalid');
            });
            typesError.innerHTML = 'Seleziona almeno un tipo di cucina';
        } else {
            types.forEach(type => {
                type.classList.remove('is-invalid');
            });
            typesError.innerHTML = '';
        }
        event.preventDefault();

    } else {

        form.submit();
    }

});


// Funzioni per validare ogni singolo campo mentre l'utente scrive
function validateName() {
    const nameError = document.getElementById('nameError');

    if (nameInput.value.trim().length < 3 || nameInput.value.trim().length > 255) {
        nameError.innerHTML = 'Il campo deve essere almeno di 3 caratteri fino a 255';
        nameInput.classList.add('is-invalid');
    } else {
        nameInput.classList.remove('is-invalid');
        nameError.innerHTML = '';
    }
}
function validateSurname() {
    const surnameError = document.getElementById('surnameError');

    if (surnameInput.value.trim().length < 3 || surnameInput.value.trim().length > 255) {
        surnameError.innerHTML = 'Il campo deve essere almeno di 3 caratteri fino a 255';
        surnameInput.classList.add('is-invalid');
    } else {
        surnameInput.classList.remove('is-invalid');
        surnameError.innerHTML = '';
    }
}


function validateEmail() {
    const emailError = document.getElementById('emailError');
    if (emailInput.validity.typeMismatch || emailInput.value == '') {
        emailError.innerHTML = 'Inserisci una mail valida.';
        emailInput.classList.add('is-invalid');
    } else {
        emailError.innerHTML = '';
        emailInput.classList.remove('is-invalid');
    }
}


function validatePassword() {
    const confirmPasswordError = document.getElementById('confirmPasswordError');

    if (passwordInput.value.length < 8 || passwordInput.value.length > 255) {
        passwordInput.classList.add('is-invalid');
        confirmPasswordInput.classList.add('is-invalid');
        confirmPasswordError.innerHTML = 'La password deve contenere minimo 8 caratteri.';
        // return false;
    } else if (passwordInput.value !== confirmPasswordInput.value) {
        passwordInput.classList.add('is-invalid');
        confirmPasswordInput.classList.add('is-invalid');
        confirmPasswordError.innerHTML = 'Le due password non corrispondono.';
        // return false;
    } else {
        passwordInput.classList.remove('is-invalid');
        confirmPasswordInput.classList.remove('is-invalid');
        confirmPasswordError.innerHTML = '';
        // return true;
    }
}

function validateRestaurantName() {
    const restaurantNameError = document.getElementById('restaurantNameError');
    if (restaurantNameInput.value.trim().length < 3 || restaurantNameInput.value.trim().length > 100) {
        restaurantNameError.innerHTML = 'Il campo deve essere almeno di 3 caratteri fino a 255';
        restaurantNameInput.classList.add('is-invalid');
    } else {
        restaurantNameInput.classList.remove('is-invalid');
        restaurantNameError.innerHTML = '';
    }
}


function validateRestaurantAddress() {
    const restaurantAddressError = document.getElementById('restaurantAddressError');
    const restaurantAddress = restaurantAddressInput.value.trim().toLowerCase();

    // console.log(restaurantAddress.startsWith('vi') || restaurantAddress.startsWith('corso') || restaurantAddress.startsWith('piaz')); //|| restaurantAddress.startsWith('strad'))

    if (!(restaurantAddress.startsWith('vi') || restaurantAddress.startsWith('corso') || restaurantAddress.startsWith('piaz') || restaurantAddress.startsWith('strad'))) {
        restaurantAddressInput.classList.add('is-invalid');
        restaurantAddressError.innerHTML = 'Inserisci un indirizzo valido.';
        // return false;
    } else if (restaurantAddress.length < 6 || restaurantAddress.length > 255) {
        restaurantAddressInput.classList.add('is-invalid');
        restaurantAddressError.innerHTML = 'Il campo deve essere almeno di 6 caratteri fino a 255';
        // return false;
    } else {
        restaurantAddressInput.classList.remove('is-invalid');
        restaurantAddressError.innerHTML = '';
        // return true;
    }
}


function validateVat() {
    const vatError = document.getElementById('vatError');
    const vatRegex = /^[0-9]{11}$/;
    // Verifica che la partita IVA sia composta esattamente da 11 cifre numeriche
    if (vatRegex.test(vatInput.value.trim()) === false) {
        vatInput.classList.add('is-invalid');
        vatError.innerHTML = 'La partita IVA deve essere numerica e di 11 caratteri.';
    } else {
        vatInput.classList.remove('is-invalid');
        vatError.innerHTML = '';
    }
}