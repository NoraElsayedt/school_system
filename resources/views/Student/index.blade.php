@extends('dashboard.layouts.master')
@section('css')
@endsection
@section('title')
    {{ trans('Student.students') }}
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('Student.students') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('Student.add_student') }}</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <div class="row row-sm">

        <div class="col-xl-12">
            <div class="card">

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



                    <br><br>

                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                                <tr>

                                    <th class="wd-15p border-bottom-0">{{ trans('Grade.id') }}</th>
                                    <th class="wd-20p border-bottom-0">{{ trans('Student.name_ar') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ trans('Student.email') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ trans('Student.gender') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ trans('Student.Grade') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ trans('Student.classrooms') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ trans('Student.section') }}</th>
                                    <th class="wd-10p border-bottom-0">{{ trans('Grade.operation') }}</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Students as $Student)
                                    <tr>

                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $Student->name }}</td>
                                        <td>{{ $Student->email }}</td>
                                        <td>{{ $Student->gender->Name }}</td>
                                        <td>{{ $Student->Grade->name }}</td>
                                        <td>{{ $Student->classrooms->name_class }}
                                            <span>{{ $Student->Joining_Date }}</span></td>
                                        <td>{{ $Student->section->name_section }}</td>
                                        <td>

                                            <div class="dropdown show">
                                                <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    العمليات
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <a class="dropdown-item" href="{{route('Student.show',$Student->id)}}"><i style="color: #ffc107" class="far fa-eye "></i>&nbsp;  عرض بيانات الطالب</a>
                                                  
                                                  <a class="dropdown-item" href="{{route('Student.edit',$Student->id)}}"><i style="color:green" class="fa fa-edit"></i>&nbsp;  تعديل بيانات الطالب</a>
                                                  <a class="dropdown-item" href="{{route('Fee_Invoice.show',$Student->id)}}"><i style="color: #0000cc" class="fa fa-edit"></i>&nbsp;اضافة فاتورة رسوم&nbsp;</a>
                                                  <a class="dropdown-item" href="{{route('Receipt_Student.show',$Student->id)}}"><i style="color: #9dc8e2" class="fas fa-money-bill-alt"></i>&nbsp; &nbsp;سند قبض</a>
                                                  <a class="dropdown-item" href="{{route('Processing.show',$Student->id)}}"><i style="color: #052539" class="fas fa-money-bill-alt"></i>&nbsp; &nbsp; استبعاد رسوم</a>
                                                  <a class="dropdown-item" href="{{route('Payment.show',$Student->id)}}"><i style="color: #bb8e1b" class="fas fa-donate"></i>&nbsp; &nbsp;  سند صرف</a>
                                                  <a class="dropdown-item" data-target="#delete{{ $Student->id }}" data-toggle="modal" href="##Delete_Student{{ $Student->id }}"><i style="color: red" class="fa fa-trash"></i>&nbsp;  حذف بيانات الطالب</a>
                                                </div>
                                            </div>




                                        </td>

                                    </tr>
                                    @include('Student.delete') 
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->







    </div>





@endsection
@section('js')
@endsection
