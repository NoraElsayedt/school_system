
<title> @yield('title') </title>
<link href="{{ URL::asset('dashboard/assets/css-rtl/wizard.css') }}" rel="stylesheet" id="bootstrap-css">

@if( App::getlocale()== 'ar')

<!-- Favicon -->
<link rel="icon" href="{{URL::asset('dashboard/assets/img/brand/favicon.png')}}" type="image/x-icon"/>
<!-- Icons css -->
<link href="{{URL::asset('dashboard/assets/css/icons.css')}}" rel="stylesheet">
<!--  Custom Scroll bar-->
<link href="{{URL::asset('dashboard/assets/plugins/mscrollbar/jquery.mCustomScrollbar.css')}}" rel="stylesheet"/>
<!--  Sidebar css -->
<link href="{{URL::asset('dashboard/assets/plugins/sidebar/sidebar.css')}}" rel="stylesheet">
<!-- Sidemenu css -->
<link rel="stylesheet" href="{{URL::asset('dashboard/assets/css-rtl/sidemenu.css')}}"> 
<!--- Style css -->
<link href="{{URL::asset('dashboard/assets/css-rtl/style.css')}}" rel="stylesheet">
<!--- Dark-mode css -->
<link href="{{URL::asset('dashboard/assets/css-rtl/style-dark.css')}}" rel="stylesheet">
<!---Skinmodes css-->
{{-- <link href="{{ URL::asset('dashboard/assets/css-rtl/wizard.css') }}" rel="stylesheet" id="bootstrap-css"> --}}
<link href="{{URL::asset('dashboard/assets/css-rtl/skin-modes.css')}}" rel="stylesheet">


@else

<!-- Favicon -->
<link rel="icon" href="{{URL::asset('dashboard/assets/img/brand/favicon.png')}}" type="image/x-icon"/>
    <!-- Icons css -->
    <link href="{{URL::asset('dashboard/assets/css/icons.css')}}" rel="stylesheet">
    <!--  Custom Scroll bar-->
    <link href="{{URL::asset('dashboard/assets/plugins/mscrollbar/jquery.mCustomScrollbar.css')}}" rel="stylesheet"/>
    <!--  Right-sidemenu css -->
    <link href="{{URL::asset('dashboard/assets/plugins/sidebar/sidebar.css')}}" rel="stylesheet">
    <!-- Sidemenu css -->
    <link rel="stylesheet" href="{{URL::asset('dashboard/assets/css/sidemenu.css')}}">
    <!-- Maps css -->
   
    <link href="{{URL::asset('dashboard/assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
    <!-- style css -->
    <link href="{{URL::asset('dashboard/assets/css/style.css')}}" rel="stylesheet">
    <link href="{{URL::asset('dashboard/assets/css/style-dark.css')}}" rel="stylesheet">
    <!---Skinmodes css-->
    <link href="{{URL::asset('dashboard/assets/css/skin-modes.css')}}" rel="stylesheet" />
@endif

@yield('css')