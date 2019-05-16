@if(session('message'))
<script>
    toastr.success("{{ session('message') }}");
</script>
@endif

@if(session('info'))
<script>
    toastr.info("{{ session('info') }}");
</script>
@endif

@if($errors->any())
@foreach($errors->all() as $error)
<script>
    toastr.error("{{ $error }}");
</script>
@endforeach
@endif