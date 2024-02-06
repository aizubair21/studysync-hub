@assets
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script> --}}

@endassets

@script
    
<script>

    //toaster ini
    // let Toast = Swal.mixin({
    // toast: true,
    // position: 'top-end',
    // showConfirmButton: false,
    // timer: 3000
    // });

    //firing event 
    // $wire.on('post-created', () => {
    //     toastr.info("success");
    // });

    //success toaster message
    $wire.on("success", (event) => {
       toastr.success(event.message);
    });

    //error message
    $wire.on("error", () => {
       toastr.info("Operation Unsuccess ! Have an eror.");
    });

    //warning
    $wire.on("warning", (event) => {
        //get the 'message' variable comes with this  custom event from our component
        let message = event.message;
        // console.log(event);
        //fire warning toaster
        toastr.warning(message);

    });

    //other library
    $('#dataTables_simple').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
    $('#dataTables').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
       
</script>
@endscript