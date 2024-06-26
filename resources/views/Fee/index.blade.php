@extends('dashboard.layouts.master')
@section('css')
@endsection
@section('title')
الرسوم
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الرسوم </h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ الرسوم الدراسيه</span>
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
                <div class="col-xl-12 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <a href="{{route('Fee.create')}}" class="btn btn-success btn-sm" role="button"
                               aria-pressed="true">اضافة رسوم جديدة</a><br><br>
                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                       data-page-length="50"
                                       style="text-align: center">
                                    <thead>
                                    <tr class="alert-success">
                                        <th>#</th>
                                        <th>الاسم</th>
                                        <th>المبلغ</th>
                                        <th>المرحلة الدراسية</th>
                                        <th>الصف الدراسي</th>
                                        <th>السنة الدراسية</th>
                                        <th>type</th>
                                        <th>ملاحظات</th>
                                        <th>العمليات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($fees as $fee)
                                        <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$fee->title}}</td>
                                        <td>{{ number_format($fee->amount, 2) }}</td>
                                        <td>{{$fee->grade->name}}</td>
                                        <td>{{$fee->classroom->name_class}}</td>
                                        <td>{{$fee->year}}</td>
                                        <td>{{$fee->Fee_type ==1 ?'رسوم دراسية': 'رسوم باص' }}</td>

                                        <td>{{$fee->description}}</td>
                                            <td>
                                                <a href="{{route('Fee.edit',$fee->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_Fee{{ $fee->id }}" title="{{ trans('Grades_trans.Delete') }}"><i class="fa fa-trash"></i></button>
                                                <a href="#" class="btn btn-warning btn-sm" role="button" aria-pressed="true"><i class="far fa-eye"></i></a>

                                            </td>
                                        </tr>
                                        @include('Fee.Delete')
                                  
                                    @endforeach
                                </table>
                            </div>
                        </div>
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
