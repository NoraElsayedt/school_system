@extends('dashboard.layouts.master')
@section('css')

@endsection
@section('title')
    {{ trans('Student.Students_Promotions') }}
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('Student.students') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('Student.Students_Promotions') }}</span>
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

                @if (Session::has('error_promotions'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{Session::get('error_promotions')}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                    <h6 style="color: red;font-family: Cairo">المرحلة الدراسية القديمة</h6><br>

                <form method="post" action="{{ route('Promotion.store') }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="inputState">{{trans('Student.Grade')}}</label>
                            <select class="custom-select mr-sm-2" name="Grade_id" required>
                                <option selected disabled>{{trans('MyParent.Choose')}}...</option>
                                @foreach($Grades as $Grade)
                                    <option value="{{$Grade->id}}">{{$Grade->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col">
                            <label for="Classroom_id">{{trans('Student.classrooms')}} : <span
                                    class="text-danger">*</span></label>
                            <select class="custom-select mr-sm-2" name="Classroom_id" required>

                            </select>
                        </div>

                        <div class="form-group col">
                            <label for="section_id">{{trans('Student.section')}} : </label>
                            <select class="custom-select mr-sm-2" name="section_id" required>

                            </select>
                        </div>
                    
                            <div class="form-group col">
                                <label for="academic_year">{{trans('Student.academic_year')}} : <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="academic_year">
                                    <option selected disabled>{{trans('MyParent.Choose')}}...</option>
                                    @php
                                        $current_year = date("Y");
                                    @endphp
                                    @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                        <option value="{{ $year}}">{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                            @error('academic_year')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                      
                     
                    </div>
                    <br><h6 style="color: red;font-family: Cairo">المرحلة الدراسية الجديدة</h6><br>

                    <div class="form-row">
                        <div class="form-group col">
                            <label for="inputState">{{trans('Student.Grade')}}</label>
                            <select class="custom-select mr-sm-2" name="Grade_id_new" >
                                <option selected disabled>{{trans('MyParent.Choose')}}...</option>
                                @foreach($Grades as $Grade)
                                    <option value="{{$Grade->id}}">{{$Grade->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col">
                            <label for="Classroom_id">{{trans('Student.classrooms')}}: <span
                                    class="text-danger">*</span></label>
                            <select class="custom-select mr-sm-2" name="Classroom_id_new" >

                            </select>
                        </div>
                        <div class="form-group col">
                            <label for="section_id">:{{trans('Student.section')}} </label>
                            <select class="custom-select mr-sm-2" name="section_id_new" >

                            </select>
                        </div>

                        <div class="form-group col">
                            <label for="academic_year">{{trans('Student.academic_year')}} : <span class="text-danger">*</span></label>
                            <select class="custom-select mr-sm-2" name="academic_year_new">
                                <option selected disabled>{{trans('MyParent.Choose')}}...</option>
                                @php
                                    $current_year = date("Y");
                                @endphp
                                @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                    <option value="{{ $year}}">{{ $year }}</option>
                                @endfor
                            </select>
                        </div>
                        @error('academic_year')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <button type="submit" class="btn btn-primary">تاكيد</button>
                </form>

            </div>
        </div>
    </div>

</div>


@endsection
@section('js')

@endsection