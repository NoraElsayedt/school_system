@extends('dashboard.layouts.master')
@section('css')
@endsection
@section('title')
   المواد الدراسيه
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">    Add
                </h4>
           
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

                @if(session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ session()->get('error') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="col-xs-12">
                    <div class="col-md-12">
                        <br>
                        <form action="{{route('Subjects.store')}}" method="post" autocomplete="off">
                            @csrf

                            <div class="form-row">
                                <div class="col">
                                    <label for="title">اسم المادة باللغة العربية</label>
                                    <input type="text" name="Name_ar" class="form-control">
                                </div>
                                <div class="col">
                                    <label for="title">اسم المادة باللغة الانجليزية</label>
                                    <input type="text" name="Name_en" class="form-control">
                                </div>
                            </div>
                            <br>

                            <div class="form-row">
                                
                                    <div class="form-group col">
                                        <label for="Grade_id">{{trans('Student.Grade')}} : <span class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="Grade_id">
                                            <option selected disabled>{{trans('MyParent.Choose')}}...</option>
                                            @foreach($grades as $c)
                                                <option  value="{{ $c->id }}">{{ $c->name }}</option>
                                            @endforeach
                                        </select>
                                       
                               
                                
                                </div>
                              
                                <div class="form-group col">
                                    <label for="Classroom_id">{{trans('Student.classrooms')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="Classroom_id" id="classroomDropdown">
                                        <!-- Options will be populated via Ajax -->
                                    </select>
                                </div>


                                <div class="form-group col">
                                    <label for="inputState">اسم المعلم</label>
                                    <select class="custom-select my-1 mr-sm-2" name="teacher_id">
                                        <option selected disabled>{{trans('MyParent.Choose')}}...</option>
                                        @foreach($teachers as $teacher)
                                            <option value="{{$teacher->id}}">{{$teacher->Name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">حفظ البيانات</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')
   
@endsection



