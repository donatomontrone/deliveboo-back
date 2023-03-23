const checkboxes = document.querySelectorAll("input.my_checkbox");

function requiredControll() {
    let atLeastOneChecked = false;

    for (let i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            atLeastOneChecked = true;
        }
    }

    if (atLeastOneChecked) {
        for (let i = 0; i < checkboxes.length; i++) {
            checkboxes[i].required = false;
        }
    } else {
        for (let i = 0; i < checkboxes.length; i++) {
            checkboxes[i].required = true;
        }
    }
}

checkboxes.forEach((checkbox) =>
    checkbox.addEventListener("click", requiredControll)
);
