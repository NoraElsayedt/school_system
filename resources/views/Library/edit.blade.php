@extends('dashboard.layouts.master')
@section('css')
@endsection
@section('title')
library
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">library</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ edit</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
  <!-- row -->
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
                        <form action="{{route('Library.update','test')}}" method="post" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-row">

                                <div class="col">
                                    <label for="title">اسم الكتاب</label>
                                    <input type="text" name="title" value="{{$book->title}}" class="form-control">
                                    <input type="hidden" name="id" value="{{$book->id}}" class="form-control">
                                </div>

                            </div>
                            <br>

                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="Grade_id">{{trans('Student.Grade')}} : <span class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="Grade_id">
                                            <option selected disabled>{{trans('MyParent.Choose')}}...</option>
                                            @foreach($grades as $grade)
                                                <option  value="{{ $grade->id }}" {{$book->Grade_id == $grade->id ?'selected':''}}>{{ $grade->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="Classroom_id">{{trans('Student.classrooms')}} : <span class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="Classroom_id">
                                          <option value="{{$book->Classroom_id}}">{{$book->classroom->name_class}}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="section_id">{{trans('Student.section')}} : </label>
                                        <select class="custom-select mr-sm-2" name="section_id">
                                            <option value="{{$book->section_id}}">{{$book->section->name_section}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div><br>

                            <div class="form-row">
                                <div class="col">

                                    <embed src="{{ URL::asset('app/Library/'.$book->title.'/'.$book->file_name) }}" type="application/pdf"   height="150px" width="350px"><br><br>

                                    <div class="form-group">
                                        <label for="academic_year">المرفقات : <span class="text-danger">*</span></label>
                                        <input type="file" accept="application/pdf"  name="file_name">
                                    </div>

                                </div>
                            </div>

                            <button class="btn btn-success nextBtn btn-lg pull-right" type="submit">حفظ البيانات</button>
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
