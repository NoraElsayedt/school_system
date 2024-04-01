<!-- Back-to-top -->
<a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>

<link href="{{URL::asset('dashboard/assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('dashboard/assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('dashboard/assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('dashboard/assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('dashboard/assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('dashboard/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">


<!-- JQuery min js -->
<script src="{{URL::asset('dashboard/assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap Bundle js -->
<script src="{{URL::asset('dashboard/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Ionicons js -->
<script src="{{URL::asset('dashboard/assets/plugins/ionicons/ionicons.js')}}"></script>
<!-- Moment js -->
<script src="{{URL::asset('dashboard/assets/plugins/moment/moment.js')}}"></script>

<!-- Rating js-->
<script src="{{URL::asset('dashboard/assets/plugins/rating/jquery.rating-stars.js')}}"></script>
<script src="{{URL::asset('dashboard/assets/plugins/rating/jquery.barrating.js')}}"></script>

<!--Internal  Perfect-scrollbar js -->
<script src="{{URL::asset('dashboard/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{URL::asset('dashboard/assets/plugins/perfect-scrollbar/p-scroll.js')}}"></script>
<!--Internal Sparkline js -->
<script src="{{URL::asset('dashboard/assets/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
<!-- Custom Scroll bar Js-->
<script src="{{URL::asset('dashboard/assets/plugins/mscrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<!-- right-sidebar js -->
<script src="{{URL::asset('dashboard/assets/plugins/sidebar/sidebar-rtl.js')}}"></script>
<script src="{{URL::asset('dashboard/assets/plugins/sidebar/sidebar-custom.js')}}"></script>
<!-- Eva-icons js -->
<script src="{{URL::asset('dashboard/assets/js/eva-icons.min.js')}}"></script>
@yield('js')
<!-- Sticky js -->
<script src="{{URL::asset('dashboard/assets/js/sticky.js')}}"></script>
<!-- custom js -->
<script src="{{URL::asset('dashboard/assets/js/custom.js')}}"></script><!-- Left-menu js-->
<script src="{{URL::asset('dashboard/assets/plugins/side-menu/sidemenu.js')}}"></script>

<script src="{{URL::asset('dashboard/assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('dashboard/assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('dashboard/assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('dashboard/assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('dashboard/assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('dashboard/assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('dashboard/assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('dashboard/assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('dashboard/assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('dashboard/assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('dashboard/assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('dashboard/assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('dashboard/assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('dashboard/assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('dashboard/assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('dashboard/assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>


<script src="{{URL::asset('dashboard/assets/js/table-data.js')}}"></script>



<script>
    $(document).ready(function () {
        $('select[name="Grade_id"]').on('change', function () {
            var gradeId = $(this).val();
            if (gradeId) {
                $.ajax({
                    url: '/get-classrooms/' + gradeId,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        
                        var options = '<option selected disabled>{{trans('MyParent.Choose')}}...</option>';

                        $.each(data, function (key, value) {
                            options += '<option value="' + key + '">' + value + '</option>';
                        });
                        $('select[name="Classroom_id"]').html(options);
                    }
                });
            } else {
                $('select[name="Classroom_id"]').empty();
            }
        });
    });
</script>



<script>
    $(document).ready(function() {
        // Event listener for the classroom dropdown
        $('select[name="Classroom_id"]').on('change', function() {
            var classroomId = $(this).val();
            if (classroomId) {
                $.ajax({
                    url: '/sections/' + classroomId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        var options = '<option selected disabled>{{trans('MyParent.Choose')}}...</option>';
                        $.each(data, function(key, value) {
                            options += '<option value="' + key + '">' + value + '</option>';
                        });
                        $('select[name="section_id"]').html(options);
                    }
                });
            } else {
                $('select[name="section_id"]').empty();
            }
        });
    });
</script>


<script>
    $(document).ready(function () {
        $('select[name="Grade_id_new"]').on('change', function () {
            var gradeId = $(this).val();
            if (gradeId) {
                $.ajax({
                    url: '/get-classrooms/' + gradeId,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        
                        var options = '<option selected disabled>{{trans('MyParent.Choose')}}...</option>';

                        $.each(data, function (key, value) {
                            options += '<option value="' + key + '">' + value + '</option>';
                        });
                        $('select[name="Classroom_id_new"]').html(options);
                    }
                });
            } else {
                $('select[name="Classroom_id_new"]').empty();
            }
        });
    });
</script>



<script>
    $(document).ready(function() {
        // Event listener for the classroom dropdown
        $('select[name="Classroom_id_new"]').on('change', function() {
            var classroomId = $(this).val();
            if (classroomId) {
                $.ajax({
                    url: '/sections/' + classroomId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        var options = '<option selected disabled>{{trans('MyParent.Choose')}}...</option>';
                        $.each(data, function(key, value) {
                            options += '<option value="' + key + '">' + value + '</option>';
                        });
                        $('select[name="section_id_new"]').html(options);
                    }
                });
            } else {
                $('select[name="section_id_new"]').empty();
            }
        });
    });
</script>