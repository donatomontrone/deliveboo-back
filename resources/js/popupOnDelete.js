var popup = document.getElementById('popup_message');
if (popup) {
    // show a message in a toast
    Swal.fire({
        toast: true,
        animation: false,
        icon: popup.dataset.type,
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
            title: 'Do you want to delete this dish?',
            text: "",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#00ccbc',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancel',
            confirmButtonText: 'I confirm!'
        }).then((result) => {
            if (result.isConfirmed)
                this.submit()
        })
    })
});