
const form = document.querySelector("#form");
const email = document.getElementById("email");

form.addEventListener("input", (event) => {
    if (email.validity.typeMismatch) {
        email.setCustomValidity("Inserisci una mail valida");
        email.classList.add('is-invalid');
    } else {
        email.setCustomValidity("");
        email.classList.remove('is-invalid');
    }
});

form.addEventListener("submit", (event) => {
    const name = document.querySelector("#name");
    const surname = document.querySelector("#surname");
    const email = document.querySelector("#email");
    const password = document.querySelector("#password");
    const confirmPassword = document.querySelector("#password_confirmation");
    const restaurantName = document.querySelector("#restaurant_name");
    const restaurantAddress = document.querySelector("#restaurant_address");
    const VAT = document.querySelector("#VAT");
    const types = document.querySelector("#types");

    if (!name.value) {
        name.classList.add("is-invalid");
        event.preventDefault();
    } else {
        name.classList.remove("is-invalid");
    }

    if (!surname.value) {
        surname.classList.add("is-invalid");
        event.preventDefault();
    } else {
        surname.classList.remove("is-invalid");
    }

    if (!email.value) {
        email.classList.add("is-invalid");
        event.preventDefault();
    } else {
        email.classList.remove("is-invalid");
    }

    if (!password.value) {
        password.classList.add("is-invalid");
        event.preventDefault();
    } else {
        password.classList.remove("is-invalid");
    }

    if (!confirmPassword.value || confirmPassword.value !== password.value) {
        confirmPassword.classList.add("is-invalid");
        event.preventDefault();
    } else {
        confirmPassword.classList.remove("is-invalid");
    }
});


