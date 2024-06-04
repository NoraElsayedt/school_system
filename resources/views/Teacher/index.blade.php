@extends('dashboard.layouts.master')
@section('css')

@endsection
@section('title')
{{ trans('main-sidebar_trans.Teachers') }}

@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">{{ trans('main-sidebar_trans.Teachers') }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('main-sidebar_trans.List_Teachers') }}</span>
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

        <a href="{{route('Teacher.create')}}" class="btn btn-success " role="button"
        aria-pressed="true">   {{ trans('Teacher.Add_Teacher') }}</a><br><br>

                <br><br>

                <div class="table-responsive">
                    <table class="table text-md-nowrap" id="example1">
                        <thead>
                            <tr>

                                <th class="wd-15p border-bottom-0">{{ trans('Grade.id') }}</th>
                                <th class="wd-20p border-bottom-0">{{ trans('Teacher.Name_Teacher') }}</th>
                                <th class="wd-15p border-bottom-0">{{ trans('Teacher.Gender') }}</th>
                                <th class="wd-15p border-bottom-0">{{ trans('Teacher.Joining_Date') }}</th>
                                <th class="wd-15p border-bottom-0">{{ trans('Teacher.specialization') }}</th>
                                <th class="wd-10p border-bottom-0">{{ trans('Grade.operation') }}</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teacher as $teachers)


                            <tr>

                                <td>{{$loop->iteration}}</td>
                                <td>{{$teachers->Name}}</td>
                                <td>{{$teachers->Gender->Name}}</td>
                                <td>{{ \Carbon\Carbon::parse($teachers->Joining_Date)->diffForHumans() }} <span>{{$teachers->Joining_Date}}</span></td>
                                <td>{{$teachers->specialization->Name}}</td>
                                <td>
                                    <a href="{{route('Teacher.edit',$teachers->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#delete{{ $teachers->id }}"
                                    ><i
                                    class="fa fa-trash"></i></button>


                                </td>

                            </tr>



                        @include('Teacher.delete')




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
