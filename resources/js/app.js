import './bootstrap';

// css 
import "../css/bootstrap.min.css";
import "../css/adminlte.min.css";
import "../css/fs.min.css";
import "../css/main_style.css";
import "../css/toastr.min.css";

// js
import "./jquery.min.js";
import "./bootstrap.min.js";
import "./fs.min.js";
import "./adminlte.min.js";
import "./dashboard.js";
import "./summernote.min.js";
import "./jquery.dataTables.min.js";
// import "./sweetalert2.all.min.js";
import "./toastr.min.js";
import "./main_script.js";


//when wire vavigating
document.addEventListener('livewire:navigating', () => {
    // document.getElementsByClassName('spinner')[0].style.display = "block";

})

//when navigate finished
document.addEventListener("livewire:navigated", () => {
    document.getElementsByClassName('spinner')[0].style.display = "none";
    // $('#dataTables').DataTable();toastr.info("{{Session::get('message')}}");

})
