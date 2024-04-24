@extends('dashboard.layouts.master')
@section('css')
    <!--  Owl-carousel css-->
    <link href="{{ URL::asset('assets/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet" />
    <!-- Maps css -->
    <link href="{{ URL::asset('assets/plugins/jqvmap/jqvmap.min.css') }}" rel="stylesheet">
@endsection
@section('title')
    {{ trans('main-sidebar_trans.Dashboard') }}
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <div>
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">Hi, welcome back! Admin</h2>

            </div>
        </div>

    </div>
    <!-- /breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row row-sm">
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-primary-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white">عدد الطلاب</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">

                                <h4 class="tx-20 font-weight-bold mb-1 text-white">{{ \App\Models\Student::count() }}</h4>

                            </div>


                        </div>
                    </div>
                </div>
                <span id="compositeline2" class="pt-1">
                    <p class="text-muted pt-3 mb-0 mt-2 border-top">
                        <i class="fas fa-binoculars mr-1" aria-hidden="true"></i><a href="{{ route('Student.index') }}"
                            target="_blank"><span class="text-black">عرض البيانات</span></a>
                    </p>
                </span>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-danger-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white">عدد المعلمين</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">{{ \App\Models\Teacher::count() }}</h4>
                            </div>

                        </div>
                    </div>
                </div>
                <span id="compositeline2" class="pt-1">
                    <p class="text-muted pt-3 mb-0 mt-2 border-top">
                        <i class="fas fa-binoculars mr-1" aria-hidden="true"></i><a href="{{ route('Teacher.index') }}"
                            target="_blank"><span class="text-black">عرض البيانات</span></a>
                    </p>
                </span>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-success-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
						<h6 class="mb-3 tx-12 text-white">عدد المراحل الدراسيه</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">{{ \App\Models\Grade::count() }}</h4>
                          
                            </div>
                          
                        </div>
                    </div>
                </div>
				<span id="compositeline2" class="pt-1">
                    <p class="text-muted pt-3 mb-0 mt-2 border-top">
                        <i class="fas fa-binoculars mr-1" aria-hidden="true"></i><a href="{{ route('Grade.index') }}"
                            target="_blank"><span class="text-black">عرض البيانات</span></a>
                    </p>
                </span>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-warning-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white"> عدد الفصول الدراسية</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
								<h4 class="tx-20 font-weight-bold mb-1 text-white">{{ \App\Models\Classroom::count() }}</h4>

                     
                            </div>
                            
                        </div>
                    </div>
                </div>
				<span id="compositeline2" class="pt-1">
                    <p class="text-muted pt-3 mb-0 mt-2 border-top">
                        <i class="fas fa-binoculars mr-1" aria-hidden="true"></i><a href="{{ route('Classroom.index') }}"
                            target="_blank"><span class="text-black">عرض البيانات</span></a>
                    </p>
                </span>
            </div>
        </div>
    </div>
    

	
	<div class="row">

		<div  style="height: 400px;" class="col-xl-12 mb-30">
			<div class="card card-statistics h-100">
				<div class="card-body">
					<div class="tab nav-border" style="position: relative;">
						<div class="d-block d-md-flex justify-content-between">
							<div class="d-block w-100">
								<h5 style="font-family: 'Cairo', sans-serif" class="card-title">اخر العمليات علي النظام</h5>
							</div>
							<div class="d-block d-md-flex nav-tabs-custom">
								<ul class="nav nav-tabs" id="myTab" role="tablist">

									<li class="nav-item alert-success">
										<a class="nav-link active show" id="students-tab" data-toggle="tab"
										   href="#students" role="tab" aria-controls="students"
										   aria-selected="true"> الطلاب</a>
									</li>

									<li class="nav-item alert-success">
										<a class="nav-link" id="teachers-tab" data-toggle="tab" href="#teachers"
										   role="tab" aria-controls="teachers" aria-selected="false">المعلمين
										</a>
									</li>

									<li class="nav-item alert-success">
										<a class="nav-link" id="parents-tab" data-toggle="tab" href="#parents"
										   role="tab" aria-controls="parents" aria-selected="false">اولياء الامور
										</a>
									</li>

									<li class="nav-item alert-success">
										<a class="nav-link" id="fee_invoices-tab" data-toggle="tab" href="#fee_invoices"
										   role="tab" aria-controls="fee_invoices" aria-selected="false">الفواتير
										</a>
									</li>

								</ul>
							</div>
						</div>
						<div class="tab-content" id="myTabContent">

							{{--students Table--}}
							<div class="tab-pane fade active show" id="students" role="tabpanel" aria-labelledby="students-tab">
								<div class="table-responsive mt-15">
									<table style="text-align: center" class="table center-aligned-table table-hover mb-0">
										<thead>
										<tr  class="table-info text-danger">
											<th>#</th>
											<th>اسم الطالب</th>
											<th>البريد الالكتروني</th>
											<th>النوع</th>
											<th>المرحلة الدراسية</th>
											<th>الصف الدراسي</th>
											<th>القسم</th>
											<th>تاريخ الاضافة</th>
										</tr>
										</thead>
										<tbody>
										@forelse(\App\Models\Student::latest()->take(5)->get() as $student)
											<tr>
												<td>{{$loop->iteration}}</td>
												<td>{{$student->name}}</td>
												<td>{{$student->email}}</td>
												<td>{{$student->gender->Name}}</td>
												<td>{{$student->Grade->name}}</td>
												<td>{{$student->classrooms->name_class}}</td>
												<td>{{$student->section->name_section}}</td>
												<td class="text-success">{{$student->created_at}}</td>
												@empty
													<td class="alert-danger" colspan="8">لاتوجد بيانات</td>
											</tr>
										@endforelse
										</tbody>
									</table>
								</div>
							</div>

							{{--teachers Table--}}
							<div class="tab-pane fade" id="teachers" role="tabpanel" aria-labelledby="teachers-tab">
								<div class="table-responsive mt-15">
									<table style="text-align: center" class="table center-aligned-table table-hover mb-0">
										<thead>
										<tr  class="table-info text-danger">
											<th>#</th>
											<th>اسم المعلم</th>
											<th>النوع</th>
											<th>تاريخ التعين</th>
											<th>التخصص</th>
											<th>تاريخ الاضافة</th>
										</tr>
										</thead>

										@forelse(\App\Models\Teacher::latest()->take(5)->get() as $teacher)
											<tbody>
											<tr>
												<td>{{$loop->iteration}}</td>
												<td>{{$teacher->Name}}</td>
												<td>{{$teacher->gender->Name}}</td>
												<td>{{$teacher->Joining_Date}}</td>
												<td>{{$teacher->specialization->Name}}</td>
												<td class="text-success">{{$teacher->created_at}}</td>
												@empty
													<td class="alert-danger" colspan="8">لاتوجد بيانات</td>
											</tr>
											</tbody>
										@endforelse
									</table>
								</div>
							</div>

							{{--parents Table--}}
							<div class="tab-pane fade" id="parents" role="tabpanel" aria-labelledby="parents-tab">
								<div class="table-responsive mt-15">
									<table style="text-align: center" class="table center-aligned-table table-hover mb-0">
										<thead>
										<tr  class="table-info text-danger">
											<th>#</th>
											<th>اسم ولي الامر</th>
											<th>البريد الالكتروني</th>
											<th>رقم الهوية</th>
											<th>رقم الهاتف</th>
											<th>تاريخ الاضافة</th>
										</tr>
										</thead>
										<tbody>
										@forelse(\App\Models\Myparent::latest()->take(5)->get() as $parent)
											<tr>
												<td>{{$loop->iteration}}</td>
												<td>{{$parent->name_f}}</td>
												<td>{{$parent->email}}</td>
												<td>{{$parent->national_id_f}}</td>
												<td>{{$parent->phone_f}}</td>
												<td class="text-success">{{$parent->created_at}}</td>
												@empty
													<td class="alert-danger" colspan="8">لاتوجد بيانات</td>
											</tr>
										@endforelse
										</tbody>
									</table>
								</div>
							</div>

							{{--sections Table--}}
							<div class="tab-pane fade" id="fee_invoices" role="tabpanel" aria-labelledby="fee_invoices-tab">
								<div class="table-responsive mt-15">
									<table style="text-align: center" class="table center-aligned-table table-hover mb-0">
										<thead>
										<tr  class="table-info text-danger">
											<th>#</th>
											<th>تاريخ الفاتورة</th>
											<th>اسم الطالب</th>
											<th>المرحلة الدراسية</th>
											<th>الصف الدراسي</th>
											
											
											<th>المبلغ</th>
											<th>تاريخ الاضافة</th>
										</tr>
										</thead>
										<tbody>
										@forelse(\App\Models\Fee_invoice::latest()->take(10)->get() as $section)
											<tr>
												<td>{{$loop->iteration}}</td>
												<td>{{$section->invoice_date}}</td>
												<td>{{$section->student->name}}</td>
												<td>{{$section->grade->name}}</td>
												<td>{{$section->classroom->name_class}}</td>
												<td>{{$section->amount}}</td>
												<td class="text-success">{{$section->created_at}}</td>
											</tr>
										@empty
											<tr>
												<td class="alert-danger" colspan="9">لاتوجد بيانات</td>
											</tr>
										@endforelse
										</tbody>
									</table>
								</div>
							</div>

						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
 
    
    <!-- Container closed -->
@endsection
@section('js')
    <!--Internal  Chart.bundle js -->
    <script src="{{ URL::asset('assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>
    <!-- Moment js -->
    <script src="{{ URL::asset('assets/plugins/raphael/raphael.min.js') }}"></script>
    <!--Internal  Flot js-->
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.categories.js') }}"></script>
    <script src="{{ URL::asset('assets/js/dashboard.sampledata.js') }}"></script>
    <script src="{{ URL::asset('assets/js/chart.flot.sampledata.js') }}"></script>
    <!--Internal Apexchart js-->
    <script src="{{ URL::asset('assets/js/apexcharts.js') }}"></script>
    <!-- Internal Map -->
    <script src="{{ URL::asset('assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <script src="{{ URL::asset('assets/js/modal-popup.js') }}"></script>
    <!--Internal  index js -->
    <script src="{{ URL::asset('assets/js/index.js') }}"></script>
    <script src="{{ URL::asset('assets/js/jquery.vmap.sampledata.js') }}"></script>
@endsection
