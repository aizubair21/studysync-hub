// document.addEventListener("notifySuccess", (event) => {
//     console.log(event);
// });

// const {
//     Toast
// } = require("bootstrap");



// toaster option config 

toastr.options.closeButton = true;
toastr.options.newestOnTop = true;

toastr.options.showMethod = 'slideDown'; //animation type
toastr.options.hideMethod = 'slideUp';
toastr.options.closeMethod = 'slideUp';

toastr.options.preventDuplicates = true;

toastr.options.progressBar = true;

toastr.options.shadow = false;

// toaster option config end

var Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});

document.addEventListener('livewire:init', () => {
    Livewire.on('notifySuccess', (event) => {
        // Toast(event.detail, 'success');
        // Example usage:
        // toastr.success(event.message);
        // Toast.success(null, event.message);
        Toast.fire({
            icon: "success",
            title: event.message,
        });
    });

    Livewire.on('notifyWarning', (event) => {
        // toastr.warning(event.message);
        Toast.fire({
            icon: 'warning',
            title: event.message,
        })
    });

    Livewire.on("notifyInfo", (event) => {
        // toastr.info(event.message);
        Toast.fire({
            icon: 'info',
            title: event.message,
        })

    });
});
