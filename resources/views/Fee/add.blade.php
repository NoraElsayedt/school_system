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
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ اضافة رسوم جديدة</span>
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

                <form method="post" action="{{ route('Fee.store') }}" autocomplete="off">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="inputEmail4">الاسم باللغة العربية</label>
                            <input type="text" value="{{ old('title_ar') }}" name="title_ar" class="form-control">
                        </div>

                        <div class="form-group col">
                            <label for="inputEmail4">الاسم باللغة الانجليزية</label>
                            <input type="text" value="{{ old('title_en') }}" name="title_en" class="form-control">
                        </div>


                        <div class="form-group col">
                            <label for="inputEmail4">المبلغ</label>
                            <input type="number" value="{{ old('amount') }}" name="amount" class="form-control">
                        </div>

                    </div>


                    <div class="form-row">

                        <div class="form-group col">
                            <label for="inputState">المرحلة الدراسية</label>
                            <select class="custom-select mr-sm-2" name="Grade_id">
                                <option selected disabled>{{trans('MyParent.Choose')}}...</option>
                                @foreach($Grades as $Grade)
                                    <option value="{{ $Grade->id }}">{{ $Grade->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col">
                            <label for="inputZip">الصف الدراسي</label>
                            <select class="custom-select mr-sm-2" name="Classroom_id">

                            </select>
                        </div>
                        <div class="form-group col">
                            <label for="inputZip">السنة الدراسية</label>
                            <select class="custom-select mr-sm-2" name="year">
                                <option selected disabled>{{trans('MyParent.Choose')}}...</option>
                                @php
                                    $current_year = date("Y")
                                @endphp
                                @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                    <option value="{{ $year}}">{{ $year }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="form-group col">
                        <label for="inputZip">نوع الرسوم</label>
                        <select class="custom-select mr-sm-2" name="Fee_type">
                            <option value="1">رسوم دراسية</option>
                            <option value="2">رسوم باص</option>
                        </select>
                    </div>

                    <div class="form-group col">
                        <label for="inputAddress">ملاحظات</label>
                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="4"></textarea>
                    </div>
                    <br>

                    <button type="submit" class="btn btn-primary">تاكيد</button>

                </form>

            </div>
        </div>
    </div>
</div>

@endsection
@section('js')
@endsection
