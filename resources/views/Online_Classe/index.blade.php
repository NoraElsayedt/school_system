@extends('dashboard.layouts.master')
@section('css')

@endsection
@section('title')
zoom

@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">
                        zoom 

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
                            <a href="{{route('Online_Classe.create')}}" class="btn btn-success" role="button"
                               aria-pressed="true">اضافة حصة جديدة</a><br><br>
                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                       data-page-length="50"
                                       style="text-align: center">
                                    <thead>
                                    <tr class="alert-success">
                                        <th>#</th>
                                        <th>المرحلة</th>
                                        <th>الصف</th>
                                        <th>القسم</th>
                                        <th>المعلم</th>
                                        <th>عنوان الحصة</th>
                                        <th>تاريخ البداية</th>
                                        <th>وقت الحصة</th>
                                        <th>رابط الحصة</th>
                                        <th>العمليات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($online_classes as $online_classe)
                                        <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$online_classe->grade->name}}</td>
                                        <td>{{ $online_classe->classroom->name_class }}</td>
                                        <td>{{$online_classe->section->name_section}}</td>
                                            <td>{{$online_classe->user->name}}</td>
                                            <td>{{$online_classe->topic}}</td>
                                            <td>{{$online_classe->start_at}}</td>
                                            <td>{{$online_classe->duration}}</td>
                                            <td class="text-danger"><a href="{{$online_classe->join_url}}" target="_blank">انضم الان</a></td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_receipt{{$online_classe->meeting_id}}" ><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                              @include('Online_Classe.delete')
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

