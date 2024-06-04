<!-- main-sidebar -->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar sidebar-scroll">
    <div class="main-sidebar-header active">
        {{ trans('login.SCHOOL') }}
        <a class="desktop-logo logo-light active" href="{{ url('/' . ($page = 'login')) }}"><img
                src="{{ URL::asset('dashboard/assets/img/brand/login.png') }}" class="main-logo" alt="logo"> </a>
        <a class="desktop-logo logo-dark active" href="{{ url('/' . ($page = 'login')) }}"><img
                src="{{ URL::asset('dashboard/assets/img/brand/login.png') }}" class="main-logo dark-theme"
                alt="logo"></a>
        <a class="logo-icon mobile-logo icon-light active" href="{{ url('/' . ($page = 'login')) }}"><img
                src="{{ URL::asset('dashboard/assets/img/brand/login.png') }}" class="logo-icon" alt="logo"></a>
        <a class="logo-icon mobile-logo icon-dark active" href="{{ url('/' . ($page = 'login')) }}"><img
                src="{{ URL::asset('dashboard/assets/img/brand/login.png') }}" class="logo-icon dark-theme"
                alt="logo"></a>
    </div>


    @if (auth('web')->check()) {
        @include('dashboard.layouts.main-sidebar.admin-main-sidebar')
    }
    @endif

    @if (auth('student')->check()) {
        @include('dashboard.layouts.main-sidebar.student-main-sidebar')
     }
    @endif

    @if (auth('teacher')->check()) {
        @include('dashboard.layouts.main-sidebar.teacher-main-sidebar')
       }
    @endif

    @if (auth('parent')->check()) {
        @include('dashboard.layouts.main-sidebar.parent-main-sidebar')
      }
    @endif

</aside>
<!-- main-sidebar -->
