@extends('dashboard.layouts.master')
@section('css')

@endsection
@section('title')
سند صرف
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">index 
                            </h4>
                        
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
                <div class="col-xl-12 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                       data-page-length="50"
                                       style="text-align: center">
                                    <thead>
                                    <tr class="alert-success">
                                        <th>#</th>
                                        <th>الاسم</th>
                                        <th>المبلغ</th>
                                        <th>البيان</th>
                                        <th>العمليات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($payment_students as $payment_student)
                                        <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$payment_student->student->name}}</td>
                                        <td>{{ number_format($payment_student->amount, 2) }}</td>
                                        <td>{{$payment_student->description}}</td>
                                            <td>
                                                <a href="{{route('Payment.edit',$payment_student->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_receipt{{$payment_student->id}}" ><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                           @include('Payment.delete')
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
