<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<meta charset="utf-8">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">	
    
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="{{asset('admintemplate/css/styles.css')}}" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="{{asset('usertemplate/css/icomoon.css')}}">
</head>
<body class="sb-nav-fixed">
    @include('admin.shared.header')
	<div id="layoutSidenav">
        @include('admin.shared.sidebar')
        <div id="layoutSidenav_content">
            @yield('content')
            @include('admin.shared.footer')
        </div>    
	</div>
</body> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="{{asset('admintemplate/js/scripts.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="{{asset('admintemplate/js/datatables-simple-demo.js')}}"></script>
<script src="{{asset('jquery/jquery-3.6.0.min.js')}}"></script>
<script type="text/javascript">
    $(document).on('click', '.delete-modal', function() {
        var recordId = $(this).attr('data-id');
        $('#record_id').val(recordId);
    });
</script>
<script src="{{ asset('ckeditor_4/ckeditor.js') }}"></script>
<script>  
CKEDITOR.replace( 'editor1', {
        filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
        filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
        filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
        filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
        filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
        filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
    } );
</script>

<script type="text/javascript">
    $(document).ready(function() {
    //    $('.ckeditor').ckeditor();
    });
</script>
</html>