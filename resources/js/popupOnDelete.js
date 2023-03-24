var popup = document.getElementById('popup_message');
if (popup) {
    Swal.fire({
        toast: true,
        animation: true,
        icon: 'success',
        title: popup.dataset.message,
        type: popup.dataset.type,
        position: 'top-right',
        timer: 3000,
        showConfirmButton: false,
    });
}

const deleteBtns = document.querySelectorAll('form.delete');

deleteBtns.forEach((formDelete) => {
    formDelete.addEventListener('submit', function (event) {
        event.preventDefault();
        Swal.fire({
            title: 'Sei sicuro di voler eliminare il piatto?',
            text: "L'azione è irreversibile",
            icon: 'warning',
            iconColor: '#d33',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#7F8183',
            cancelButtonText: '<i class="fa-solid fa-xmark"></i> Annulla',
            confirmButtonText: 'Elimina <i class="fa-regular fa-trash-can"></i>'
        }).then((result) => {
            if (result.isConfirmed)
                this.submit()
        })
    })
});