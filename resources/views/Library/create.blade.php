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
                <h4 class="content-title mb-0 my-auto">
                    library
                </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    craete </span>
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

                    <form method="post" action="{{ route('Library.store') }}" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                   
                        <div class="form-row">

                            <div class="col">
                                <label for="title">اسم الكتاب</label>
                                <input type="text" name="title" class="form-control">
                            </div>

                        </div>
                        <br>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="Grade_id">{{ trans('Student.Grade') }} : <span
                                            class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="Grade_id">
                                        <option selected disabled>{{ trans('MyParent.Choose') }}...</option>
                                        @foreach ($my_classes as $c)
                                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                                        @endforeach
                                    </select>

                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="Classroom_id">{{ trans('Student.classrooms') }} : <span
                                            class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="Classroom_id" id="classroomDropdown">
                                        <!-- Options will be populated via Ajax -->
                                    </select>
                                </div>

                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="section_id">{{ trans('Student.section') }} : </label>
                                    <select class="custom-select mr-sm-2" name="section_id">
                                        <!-- Options will be populated via Ajax -->
                                    </select>
                                </div>

                            </div>

                        </div><br>



                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="academic_year">المرفقات : <span class="text-danger">*</span></label>
                                    <input type="file" accept="application/pdf" name="file_name" required>
                                </div>
                            </div>
                        </div>



                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right"
                            type="submit">{{ trans('Student.submit') }}</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
@endsection
