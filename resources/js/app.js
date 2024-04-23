import './bootstrap';

// import {
//     bootstrap
// } from 'bootstrap';

// import "../css/bootstrap.min.css"


// import "./jquery.min";
// import "./fs";
// import "./adminlte.min";
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
})

//when navigate finished
document.addEventListener("livewire:navigated", () => {

})

