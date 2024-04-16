@extends('dashboard.layouts.master')
@section('css')

@endsection
@section('title')
حضور و غياب الطلاب عرض

@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">حضور و غياب الطلاب عرض
                            </h4>
                         
						</div>
					</div>
				
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')



@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if (session('status'))
<div class="alert alert-danger">
    <ul>
        <li>{{ session('status') }}</li>
    </ul>
</div>
@endif



<h5 style="font-family: 'Cairo', sans-serif;color: red"> تاريخ اليوم : {{ date('Y-m-d') }}</h5>
<form method="post" action="{{ route('Attendance.store') }}">

@csrf
<table id="datatable" class="table center-aligned-table mb-0" data-page-length="50"
       style="text-align: center">
    <thead>
    <tr>
        <th class="alert-success">#</th>
        <th class="alert-success">{{ trans('Student.name') }}</th>
        <th class="alert-success">{{ trans('Student.email') }}</th>
        <th class="alert-success">{{ trans('Student.gender') }}</th>
        <th class="alert-success">{{ trans('Student.Grade') }}</th>
        <th class="alert-success">{{ trans('Student.classrooms') }}</th>
        <th class="alert-success">{{ trans('Student.section') }}</th>
        <th class="alert-success">{{ trans('Student.Processes') }}</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($students as $student)
        <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->email }}</td>
            <td>{{ $student->gender->Name }}</td>
            <td>{{ $student->grade->name }}</td>
            <td>{{ $student->classrooms->name_class }}</td>
            <td>{{ $student->section->name_section }}</td>
            <td>

                @if(isset($student->Attendance()->where('attendance_date',date('Y-m-d'))->first()->student_id))

                    <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                        <input name="attendences[{{ $student->id }}]" disabled
                               {{ $student->Attendance()->where('attendance_date',date('Y-m-d'))->first()->status == 1 ? 'checked' : '' }}
                               class="leading-tight" type="radio" value="1">
                        <span class="text-success">حضور</span>
                    </label>

                    <label class="ml-4 block text-gray-500 font-semibold">
                        <input name="attendences[{{ $student->id }}]" disabled
                               {{ $student->Attendance()->where('attendance_date',date('Y-m-d'))->first()->status == 0 ? 'checked' : '' }}
                               class="leading-tight" type="radio" value="0">
                        <span class="text-danger">غياب</span>
                    </label>

                @else

                    <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                        <input name="attendences[{{ $student->id }}]" class="leading-tight" type="radio"
                               value="1">
                        <span class="text-success">حضور</span>
                    </label>

                    <label class="ml-4 block text-gray-500 font-semibold">
                        <input name="attendences[{{ $student->id }}]" class="leading-tight" type="radio"
                               value="0">
                        <span class="text-danger">غياب</span>
                    </label>

                @endif

                <input type="hidden" name="student_id[]" value="{{ $student->id }}">
                <input type="hidden" name="grade_id" value="{{ $student->grade_id }}">
                <input type="hidden" name="classroom_id" value="{{ $student->classroom_id }}">
                <input type="hidden" name="section_id" value="{{ $student->section_id }}">
     

            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<P>
    <button class="btn btn-success" type="submit">{{ trans('Student.submit') }}</button>
</P>
</form><br>
<!-- row closed -->

@endsection
@section('js')



@endsection