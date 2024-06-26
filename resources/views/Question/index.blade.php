@extends('dashboard.layouts.master')
@section('css')

@endsection
@section('title')
الاسئله

@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">
                        الاسئله 

                            </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                           index </span>
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
                            <a href="{{route('Question.create')}}" class="btn btn-success " role="button"
                               aria-pressed="true">اضافة سؤال جديد</a><br><br>
                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                       data-page-length="50"
                                       style="text-align: center">
                                    <thead>
                                    <tr class="alert-success">
                                        <th scope="col">#</th>
                                        <th scope="col">السؤال</th>
                                        <th scope="col">الاجابات</th>
                                        <th scope="col">الاجابة الصحيحة</th>
                                        <th scope="col">الدرجة</th>
                                        <th scope="col">اسم الاختبار</th>
                                        <th scope="col">العمليات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($questions as $question)
                                        <tr>
                                            <td>{{ $loop->iteration}}</td>
                                            <td>{{$question->title}}</td>
                                            <td>{{$question->answers}}</td>
                                            <td>{{$question->right_answer}}</td>
                                            <td>{{$question->score}}</td>
                                            <td>{{$question->quizze->name}}</td>
                                            <td>
                                                <a href="{{route('Question.edit',$question->id)}}"
                                                   class="btn btn-info btn-sm" role="button" aria-pressed="true"><i
                                                        class="fa fa-edit"></i></a>
                                                <button type="button" class="btn btn-danger btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#delete_exam{{ $question->id }}" title="حذف"><i
                                                        class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>

                                  @include('Question.delete')
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

