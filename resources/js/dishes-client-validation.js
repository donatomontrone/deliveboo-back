const form = document.getElementById("form");
const nameInput = document.getElementById("dishName");
const categorySelect = document.getElementById("category-select");
const ingredientsInput = document.getElementById("dishIngredients");
const priceInput = document.getElementById("dishPrice");

nameInput.addEventListener('input', function () {
    validateName();
});
ingredientsInput.addEventListener('input', function () {
    validateIngredients();
});
priceInput.addEventListener("input", function () {
    validatePrice();
});


form.addEventListener("submit", (event) => {
    // Esegue la validazione dei campi
    const isNameValid = validateName();
    const isCategoryValid = validateCategory();
    const isIngredientsValid = validateIngredients();
    const isPriceValid = validatePrice();

    // Controlla se ci sono errori di validazione
    if (!isNameValid || !isIngredientsValid || !isPriceValid || !isCategoryValid) {

        event.preventDefault();

    } else {

        form.submit();

    }

});


// Funzioni per validare ogni singolo campo mentre l'utente scrive
function validateName() {
    const nameError = document.getElementById('nameError');

    if (nameInput.value.trim().length < 3 || nameInput.value.trim().length > 40) {
        nameError.innerHTML = 'Il campo deve essere almeno di 3 caratteri fino a 40';
        nameInput.classList.add('is-invalid');

    } else {
        nameInput.classList.remove('is-invalid');
        nameError.innerHTML = '';

    }
}
function validateCategory() {
    const categoryError = document.getElementById('categoryError');

    if (categorySelect.value < 0 || categorySelect.value == '' || isNaN(categorySelect.value)) {
        categoryError.innerHTML = 'Seleziona una categoria valida.';
        categorySelect.classList.add('is-invalid');

    } else {
        categoryError.innerHTML = '';
        categorySelect.classList.remove('is-invalid');

    }
}


function validateIngredients() {
    const ingredientsError = document.getElementById('ingredientsError');
    if (ingredientsInput.value.trim().length < 2 || ingredientsInput.value.trim().length > 255) {
        ingredientsError.innerHTML = 'Il campo deve essere almeno di 2 caratteri fino a 255';
        ingredientsInput.classList.add('is-invalid');

    } else {
        ingredientsInput.classList.remove('is-invalid');
        ingredientsError.innerHTML = '';

    }
}


function validatePrice() {
    const priceError = document.getElementById('priceError');
    if (isNaN(priceInput.value) || priceInput.value < 0 || priceInput.value == '' || priceInput.value > 999.99) {
        priceError.innerHTML = 'Il prezzo deve essere da 0 a 999,99';
        priceInput.classList.add('is-invalid');

    } else {
        priceInput.classList.remove('is-invalid');
        priceError.innerHTML = '';

    }
}
