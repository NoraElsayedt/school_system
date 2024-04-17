@extends('dashboard.layouts.master')
@section('css')
@endsection
@section('title')
قائمة الامتحانات

@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">
                    قائمة الامتحانات
 
                    </h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/      تعديل امتحان
                </span>
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
                            <form action="{{route('Exam.update','test')}}" method="post">
                                {{ method_field('patch') }}
                            @csrf
                            <div class="form-row">

                                <div class="col">
                                    <label for="title">اسم الامتحان باللغة العربية</label>
                                    <input type="text" name="Name_ar" value="{{ $exam->getTranslation('name', 'ar') }}" class="form-control">
                                    <input type="hidden" name="id" value="{{$exam->id}}">
                                </div>

                                <div class="col">
                                    <label for="title">اسم الامتحان باللغة الانجليزية</label>
                                    <input type="text" name="Name_en" value="{{ $exam->getTranslation('name', 'en') }}" class="form-control">
                                </div>

                                <div class="col">
                                    <label for="title">الترم</label>
                                    <input type="number" name="term" value="{{$exam->term}}" class="form-control">
                                </div>

                            </div>
                            <br>

                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="academic_year">{{trans('Student.academic_year')}} : <span class="text-danger">*</span></label>
                                    <option selected disabled>{{$exam->academic_year}}</option>
                                    <select class="custom-select mr-sm-2" name="academic_year">
                                        <option  disabled>{{trans('MyParent.Choose')}}...</option>
                                        @php
                                            $current_year = date("Y");
                                        @endphp
                                        @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                            <option value="{{$year}}" {{$year == $exam->academic_year ?'selected':''}}>{{ $year }}</option>
                                        @endfor
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
<!-- row closed -->
@endsection
@section('js')


@endsection