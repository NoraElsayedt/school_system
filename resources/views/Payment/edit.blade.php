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
							<h4 class="content-title mb-0 my-auto">تعديل 
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

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                        <form action="{{route('Payment.update','test')}}" method="post" autocomplete="off">
                            @method('PUT')
                            @csrf
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>المبلغ : <span class="text-danger">*</span></label>
                                    <input  class="form-control" name="Debit" value="{{$payment_student->amount}}" type="number" >
                                    <input  type="hidden" name="student_id" value="{{$payment_student->student->id}}" class="form-control">
                                    <input  type="hidden" name="id"  value="{{$payment_student->id}}" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>البيان : <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{$payment_student->description}}</textarea>
                                </div>
                            </div>

                        </div>

                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('Student.submit')}}</button>
                    </form>

            </div>
        </div>
    </div>
</div>
<!-- row closed -->

@endsection
@section('js')
@endsection