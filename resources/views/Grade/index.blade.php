@extends('dashboard.layouts.master')
@section('css')

@endsection
@section('title')
{{ trans('main-sidebar_trans.grade') }}

@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">{{ trans('main-sidebar_trans.grade') }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('main-sidebar_trans.list') }}</span>
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

                <button type="button" class="button btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    {{ trans('Grade.add') }}
                </button>
                <br><br>

                <div class="table-responsive">
                    <table class="table text-md-nowrap" id="example1">
                        <thead>
                            <tr>
                                
                                <th class="wd-15p border-bottom-0">{{ trans('Grade.id') }}</th>
                                <th class="wd-20p border-bottom-0">{{ trans('Grade.name') }}</th>
                                <th class="wd-15p border-bottom-0">{{ trans('Grade.notes') }}</th>
                                <th class="wd-10p border-bottom-0">{{ trans('Grade.operation') }}</th>
                             
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($grade as $grades)
                                
                       
                            <tr>
                                
                                <td>{{$loop->iteration}}</td>
                                <td>{{$grades->name}}</td>
                                <td>{{$grades->notes}}</td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                    data-target="#edit{{ $grades->id }}"
                                  ><i
                                    class="fa fa-edit"></i></button>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#delete{{ $grades->id }}"
                                    ><i
                                    class="fa fa-trash"></i></button>


                                </td>
                                
                            </tr>



                            @include('Grade.edit')
                            @include('Grade.delete')




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


@include('Grade.add')




</div>





@endsection
@section('js')

@endsection