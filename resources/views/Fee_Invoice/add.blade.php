@extends('dashboard.layouts.master')
@section('css')
@endsection
@section('title')
اضافة رسوم جديدة
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الرسوم </h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ اضافة فاتورة جديدة {{$student->name}}</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
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

                    <form class=" row mb-30" action="{{ route('Fee_Invoice.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="repeater">
                                <div data-repeater-list="List_Fees[]">
                                    <div data-repeater-item>
                                        <div class="row">

                                            <div class="col">
                                                <label for="Name" class="mr-sm-2">اسم الطالب</label>
                                                <select class="fancyselect" name="student_id" required>
                                                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                                                </select>
                                            </div>

                                            <div class="col">
                                                <label for="Name_en" class="mr-sm-2">نوع الرسوم</label>
                                              
                                                    <select class="fancyselect" name="fee_id" required>
                                                        <option value="">-- اختار من القائمة --</option>
                                                        @foreach($fees as $fee)
                                                            <option value="{{ $fee->id }}">{{ $fee->title }}</option>
                                                        @endforeach
                                                    </select>
                                              

                                            </div>

                                            <div class="col">
                                                <label for="Name_en" class="mr-sm-2">المبلغ</label>
                                              
                                                    <select class="fancyselect" name="amount" required>
                                                        <option value="">-- اختار من القائمة --</option>
                                                        @foreach($fees as $fee)
                                                            <option value="{{ $fee->amount }}">{{ $fee->amount }}</option>
                                                        @endforeach
                                                    </select>
                                            
                                            </div>

                                            <div class="col">
                                                <label for="description" class="mr-sm-2">البيان</label>
                                               
                                                    <input type="text" class="form-control" name="description" required>
                                                
                                            </div>

                                            <div class="col">
                                                <label for="Name_en" class="mr-sm-2">{{ trans('Classroom.Processes') }}:</label>
                                                <input class="btn btn-danger btn-block" data-repeater-delete type="button" value="{{ trans('Classroom.delete_row') }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-20">
                                    <div class="col-12">
                                        <input class="button" data-repeater-create type="button" value="{{ trans('Classroom.add_row') }}"/>
                                    </div>
                                </div><br>
                                <input type="hidden" name="Grade_id" value="{{$student->grade_id}}">
                                <input type="hidden" name="Classroom_id" value="{{$student->classroom_id}}">

                                <button type="submit" class="btn btn-primary">تاكيد البيانات</button>
                            </div>
                        </div>
                    </form>

            </div>
        </div>
    </div>
</div>

@endsection
@section('js')
<script>
$(document).ready(function() {
    // Listen for click on the "Add Row" button
    $('[data-repeater-create]').click(function() {
        // Clone the last row in the repeater list
        var newRow = $(this).closest('.repeater').find('[data-repeater-item]:last').clone();

        // Clear input values in the new row
        newRow.find('input[type="text"], select').val('');

        // Append the new row to the repeater list
        $(this).closest('.repeater').find('[data-repeater-list]').append(newRow);

        // Optionally, you can add functionality to remove the new row if needed
        newRow.find('[data-repeater-delete]').click(function() {
            $(this).closest('[data-repeater-item]').remove();
        });
    });
});
</script>
@endsection
