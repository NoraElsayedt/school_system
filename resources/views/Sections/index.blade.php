@extends('dashboard.layouts.master')
@section('css')

@endsection
@section('title')
{{ trans('Sections.title_page') }}

@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">{{ trans('Sections.title_page') }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('Sections.List_Grade') }}</span>
						</div>
					</div>
				
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')

<div class="row row-sm">

    <div class="col-xl-12">
        <div class="card">
 
            <div class="card-body">
                

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

                <button type="button" class="button btn btn-success" data-toggle="modal" data-target="#exampleModal">
                    {{ trans('Sections.add_section') }}
                </button>
                <br><br>



<div class="card card-statistics h-100">
    <div class="card-body">
        <div class="accordion gray plus-icon round">

            @foreach ($Grades as $Grade)

            <div class="acd-group">
                <a href="#" class="acd-heading" style="display: block; width: 100%; text-decoration: none; color: #e4e3e3; text-align: center;  border: 1px solid #ccc; padding: 10px; background:rgb(56, 145, 172);">{{ $Grade->name }}</a>

                <div class="acd-des" style="display: none;"> <!-- Hide by default -->
<br>
                    <div class="row">
                        <div class="col-xl-12 mb-30">
                            <div class="card card-statistics h-100">
                                <div class="card-body h-100">
                                    <div class="d-block d-md-flex justify-content-between">
                                        <div class="d-block">
                                        </div>
                                    </div>
                                    <div class="table-responsive mt-15">
                                        <table class="table center-aligned-table mb-0">
                                            <thead>
                                                <tr class="text-dark">
                                                    <th>#</th>
                                                    <th>{{ trans('Sections.Name_Section') }}</th>
                                                    <th>{{ trans('Sections.Name_Class') }}</th>
                                                    <th>{{ trans('Teacher.Name_Teacher') }}</th>
                                                    <th>{{ trans('Sections.Status') }}</th>
                                                   
                                                    <th>{{ trans('Sections.Processes') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              
                                                @foreach ($Grade->Section as $list_Sections)
                                                <tr>
                                                    
                                                    <td>{{$loop->iteration }}</td>
                                                    <td>{{$list_Sections->name_section}}</td>
                                                    <td>
                                                        {{$list_Sections->classrooms->name_class}}
                                                    </td>
                                                    <td>
                                                        <ul>
                                                        @foreach($list_Sections->Teacher as $t)
                                                        <li>{{$t->Name}}</li>
                                                        @endforeach
                                                        </ul>
                                                    </td>
                                                    <td>
                                                    @if ($list_Sections->status === 1)
                                                  
                                                   
                                                        <label
                                                        class="badge badge-success">{{ trans('Sections.Status_Section_AC') }}</label>
                                                @else
                                                    <label
                                                        class="badge badge-danger">{{ trans('Sections.Status_Section_No') }}</label>
                                                @endif
                                                    </td>
                                                   
                                                 <td>
                                                    <a href="#"
                                                                               class="btn btn-outline-info btn-sm"
                                                                               data-toggle="modal"
                                                                               data-target="#edit{{ $list_Sections->id }}">{{ trans('Sections.Edit') }}</a>
                                                                            <a href="#"
                                                                               class="btn btn-outline-danger btn-sm"
                                                                               data-toggle="modal"
                                                                               data-target="#delete{{ $list_Sections->id }}">{{ trans('Sections.Delete') }}</a>
                                                 </td>
                                                </tr>
                                                @include('Sections.edit')
                                                @include('Sections.delete')
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>





</div>
</div>
<!-- /row -->
</div>
<!-- Container closed -->
</div>



@include('Sections.add')




</div>





@endsection
@section('js')
<script>
    $(document).ready(function() {
        // Toggle table display on accordion heading click
        $('.acd-heading').click(function(e) {
            e.preventDefault(); // Prevent default anchor click behavior
            $(this).next('.acd-des').slideToggle(); // Toggle visibility of the table
        });
    });
</script>

<script>
    $(document).ready(function () {
        $('select[name="Grade_id"]').on('change', function () {
            var Grade_id = $(this).val();
            if (Grade_id) {
                $.ajax({
                    url: "{{ URL::to('classes') }}/" + Grade_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="Class_id"]').empty();
                        $.each(data, function (key, value) {
                            $('select[name="Class_id"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });

</script>

@endsection