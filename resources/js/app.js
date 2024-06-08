import './bootstrap';

// import {
//     bootstrap
// } from 'bootstrap';

// import "../css/bootstrap.min.css"
// import "../css/adminlte.min.css"
// import "../css/fs.min.css"
// import "../css/toastr.min.css"


// import "./jquery.min";
// import "./fs";
// import "./toastr";
// import "./adminlte.min";
// import "./bootstrap.min";
// import "./bootstrap.min";

// import {
//     Livewire,
//     Alpine
// } from '../../vendor/livewire/livewire/dist/livewire.esm';
// // import Clipboard from '@ryangjchandler/alpine-clipboard'
// // Alpine.plugin(Clipboard)
// Livewire.start()




//when wire vavigating
document.addEventListener('livewire:navigating', () => {
    document.getElementsByClassName('spinner')[0].style.display = "block";
    document.getElementsByTagName("body")[0].style.display = "none";
})

//when navigate finished
document.addEventListener("livewire:navigated", () => {
    document.getElementsByTagName("body")[0].style.display = "block";
})
