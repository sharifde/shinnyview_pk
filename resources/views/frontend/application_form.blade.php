@extends('frontend.app')
@section('content')
@livewire($application)
<script>
    $(document).on('change','#parent-rel-select',function(){
        $('.child-drop-area').addClass('d-none');
        $('#'+$(this).val()).removeClass('d-none');
    })
</script>
{{-- <script>
    $(document).on('change','#parent-rel-select',function(){
        $('.child-drop-area').addClass('d-none');
        $('#'+$(this).val()).removeClass('d-none');
    })
</script> --}}

@endsection