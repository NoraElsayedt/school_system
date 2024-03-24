@extends('dashboard.layouts.master')
@section('css')

@endsection
@section('title')
{{ trans('Classroom.title_page') }}

@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">{{ trans('Classroom.title_page') }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('Classroom.List_classes') }}</span>
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
                {{--message of validtion   --}}

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
 {{--end message of validtion   --}}

 {{-- button add --}}
                <button type="button" class="button btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    {{ trans('Classroom.add_class') }}
                </button>
                {{-- end button add --}}
                {{-- button delete all --}}
                <button type="button" class="button btn btn-danger" id="btn_delete_all"     data-values="{{ json_encode([]) }}"  data-toggle="modal" data-target="#delete_all">
                    {{ trans('Classroom.delete_checkbox') }}
                </button>
                                {{--end  button delete all --}}

<br>
<br>
{{-- filter --}}
                <form action="" method="POST">
                    @csrf
                    <select class="selectpicker btn btn-success"  id="gradeFilter">
                        <option value="">{{ trans('Classroom.Search_By_Grade') }}</option>
                        @foreach ($grade as $grades)
                            <option value="{{ $grades->name }}">{{ $grades->name }}</option>
                        @endforeach
                    </select>
                </form>
                <br><br>
                {{-- end filter --}}
{{-- master table --}}
                <div class="table-responsive">
                    

                    <table class="table text-md-nowrap" id="example1">
                        <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0"><input name="select_all" id="example-select-all" type="checkbox" onclick="checkAllBoxes(this)" /></th>
                                <th class="wd-15p border-bottom-0">{{ trans('Grade.id') }}</th>
                                <th class="wd-20p border-bottom-0">{{ trans('Grade.name') }}</th>
                                <th class="wd-15p border-bottom-0">{{ trans('main-sidebar_trans.grade') }}</th>
                                <th class="wd-10p border-bottom-0">{{ trans('Grade.operation') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($classroom as $classrooms)
                            <tr>
                                <td><input type="checkbox" value="{{ $classrooms->id }}" class="box1"></td>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$classrooms->name_class}}</td>
                                <td id="grade-name">{{$classrooms->grades->name}}</td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit{{$classrooms->id}}"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{$classrooms->id}}"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                            @include('Classroom.edit')
                            @include('Classroom.delete')
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /row -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->



<!-- add_modal_class -->
@include('Classroom.add')
@include('Classroom.deleteall')

</div>





@endsection
@section('js')

{{-- check box --}}

<script>
    function checkAllBoxes(source) {
        var checkboxes = document.getElementsByClassName('box1');
        for (var i = 0; i < checkboxes.length; i++) {
            checkboxes[i].checked = source.checked;
        }
    }
</script>
{{-- button delete all --}}
<script>
    document.getElementById("btn_delete_all").addEventListener("click", function() {
        var checkboxes = document.querySelectorAll('.box1:checked');
        var values = []; // Array to store checked values
        checkboxes.forEach(function(checkbox) {
            var value = checkbox.value; // Get the value associated with the checkbox
            values.push(value); // Store the value in the array
        });
        // Update the data-values attribute with the updated values array
        document.getElementById("btn_delete_all").setAttribute("data-values", JSON.stringify(values));
    });

    // Update the form with the values when it is about to be submitted
    document.querySelector("#delete_all form").addEventListener("submit", function() {
        var valuesArray = JSON.parse(document.getElementById("btn_delete_all").getAttribute("data-values"));
        document.getElementById("delete_all_id").value = valuesArray.join(",");
    });
</script>

{{-- filter --}}
<script>
   $(document).ready(function() {
    $('#gradeFilter').on('change', function() {
        var selectedGradeName = $(this).val();
        $('#example1 tbody tr').each(function() {
            var gradeName = $(this).find('#grade-name').text().trim();
            if (selectedGradeName === '' || gradeName === selectedGradeName) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });
});


</script>



@endsection