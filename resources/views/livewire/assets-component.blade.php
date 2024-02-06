

@assets

@endassets

@script
    
<script>
    
    $wire.on('post-created', () => {
        alert("post created event");
    });

    
    $('#dataTables_simple').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
</script>
@endscript