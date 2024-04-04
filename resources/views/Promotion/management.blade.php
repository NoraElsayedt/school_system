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
                <div class="col-xl-12 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">

                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Delete_all">
                               تراجع الكل
                            </button>
                            <br><br>


                            <div class="table-responsive">
                                <table class="table center-aligned-table mb-0">
                                    <thead>
                                    <tr>
                                        <th class="alert-info" color='blue'>#</th>
                                        <th class="alert-info">{{trans('Student.name')}}</th>
                                        <th class="alert-danger">المرحلة الدراسية السابقة</th>
                                        <th class="alert-danger">السنة الدراسية</th>
                                        <th class="alert-danger">الصف الدراسي السابق</th>
                                        <th class="alert-danger">القسم الدراسي السابق</th>
                                        <th class="alert-success">المرحلة الدراسية الحالي</th>
                                        <th class="alert-success">السنة الدراسية الحالية</th>
                                        <th class="alert-success">الصف الدراسي الحالي</th>
                                        <th class="alert-success">القسم الدراسي الحالي</th>
                                        <th class="alert-warning">{{trans('Student.Processes')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($promotions as $promotion)
                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td>{{$promotion->student->name}}</td>
                                            <td>{{$promotion->f_grade->name}}</td>
                                            <td>{{$promotion->academic_year}}</td>
                                            <td>{{$promotion->f_classroom->name_class}}</td>
                                            <td>{{$promotion->f_section->name_section}}</td>
                                            <td>{{$promotion->t_grade->name}}</td>
                                            <td>{{$promotion->academic_year_new}}</td>
                                            <td>{{$promotion->t_classroom->name_class}}</td>
                                            <td>{{$promotion->t_section->name_section}}</td>
                                            <td>
                                                <a href="{{route('Student.show',$promotion->id)}}"
                                                   class="btn btn-info btn-sm" role="button" aria-pressed="true"><i
                                                        class="fa fa-edit"></i></a>
                                                <button type="button" class="btn btn-danger btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#Delete_Student{{ $promotion->id }}"
                                                     ><i
                                                        class="fa fa-trash"></i></button>
                                                <a href="{{route('Student.edit',$promotion->id)}}"
                                                   class="btn btn-warning btn-sm" role="button" aria-pressed="true"><i
                                                        class="far fa-eye"></i></a>
                                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                        data-target="#delete{{ $promotion->id }}"><i
                                                            class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                             @include('Promotion.Delete_all')
                             @include('Promotion.Delete_one')
                             @include('Promotion.delete')
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

@endsection
@section('js')

@endsection