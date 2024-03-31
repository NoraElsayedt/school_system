@extends('dashboard.layouts.master')
@section('css')

@endsection
@section('title')

{{trans('Student.students')}}

@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">{{trans('Student.students')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{trans('Student.add_student')}}</span>
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

                    @if(session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('error') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">


                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif


                    <form method="post"  action="{{ route('Student.store') }}" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{trans('Student.personal_information')}}</h6><br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{trans('Student.name_ar')}} : <span class="text-danger">*</span></label>
                                        <input  type="text" name="name_ar"  class="form-control">
                                    </div>
                                 
                                </div>
                                @error('name_ar')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
    
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{trans('Student.name_en')}} : <span class="text-danger">*</span></label>
                                        <input  class="form-control" name="name_en" type="text" >
                                    </div>
                                </div> 
                                
                            </div>
                            @error('name_en')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
    
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{trans('Student.email')}} : </label>
                                        <input type="email"  name="email" class="form-control" >
                                    </div>
                                    @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                               
    
    
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{trans('Student.password')}} :</label>
                                        <input  type="password" name="password" class="form-control" >
                                    </div>
                                </div>
    
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="gender">{{trans('Student.gender')}} : <span class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="gender_id">
                                            <option selected disabled>{{trans('MyParent.Choose')}}...</option>
                                            @foreach($Genders as $Gender)
                                                <option  value="{{ $Gender->id }}">{{ $Gender->Name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('gender_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                              

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="nal_id">{{trans('Student.Nationality')}} : <span class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="nationalitie_id">
                                            <option selected disabled>{{trans('MyParent.Choose')}}...</option>
                                            @foreach($nationals as $nal)
                                                <option  value="{{ $nal->id }}">{{ $nal->name_nationalitie }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('nationalitie_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                              
    
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="bg_id">{{trans('Student.blood_type')}} : </label>
                                        <select class="custom-select mr-sm-2" name="blood_id">
                                            <option selected disabled>{{trans('MyParent.Choose')}}...</option>
                                            @foreach($bloods as $bg)
                                                <option value="{{ $bg->id }}">{{ $bg->name_blood }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('blood_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                                
    
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>{{trans('Student.Date_of_Birth')}}  :</label>
                                        <input class="form-control" type="date"  id="datepicker-action" name="Date_Birth" data-date-format="yyyy-mm-dd">
                                    </div>
                                    @error('Date_Birth')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            
    
                            </div>
    
                        <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{trans('Student.Student_information')}}</h6><br>
                        <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="Grade_id">{{trans('Student.Grade')}} : <span class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="Grade_id">
                                            <option selected disabled>{{trans('MyParent.Choose')}}...</option>
                                            @foreach($my_classes as $c)
                                                <option  value="{{ $c->id }}">{{ $c->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('Grade_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                
                                </div>
                                <div class="col-md-2">
                                <div class="form-group">
                                    <label for="Classroom_id">{{trans('Student.classrooms')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="Classroom_id" id="classroomDropdown">
                                        <!-- Options will be populated via Ajax -->
                                    </select>
                                </div>
                                @error('Classroom_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                           
                                
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="section_id">{{trans('Student.section')}} : </label>
                                        <select class="custom-select mr-sm-2" name="section_id">
       <!-- Options will be populated via Ajax -->
                                        </select>
                                    </div>
                                    @error('section_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                               
    
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="parent_id">{{trans('Student.parent')}} : <span class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="parent_id">
                                            <option selected disabled>{{trans('MyParent.Choose')}}...</option>
                                           @foreach($parents as $parent)
                                                <option value="{{ $parent->id }}">{{ $parent->name_f }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('parent_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                                
    
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="academic_year">{{trans('Student.academic_year')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="academic_year">
                                        <option selected disabled>{{trans('MyParent.Choose')}}...</option>
                                        @php
                                            $current_year = date("Y");
                                        @endphp
                                        @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                            <option value="{{ $year}}">{{ $year }}</option>
                                        @endfor
                                    </select>
                                </div>
                                @error('academic_year')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                           
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="academic_year">{{trans('Student.Attachments')}} : <span class="text-danger">*</span></label>
                                    <input type="file" accept="image/*" name="photos[]" multiple>
                                </div>
                            </div>
                            <br>
                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('Student.submit')}}</button>
                    </form>
                
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
<script>
    $(document).ready(function () {
        $('select[name="Grade_id"]').on('change', function () {
            var gradeId = $(this).val();
            if (gradeId) {
                $.ajax({
                    url: '/get-classrooms/' + gradeId,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        
                        var options = '<option selected disabled>{{trans('MyParent.Choose')}}...</option>';

                        $.each(data, function (key, value) {
                            options += '<option value="' + key + '">' + value + '</option>';
                        });
                        $('select[name="Classroom_id"]').html(options);
                    }
                });
            } else {
                $('select[name="Classroom_id"]').empty();
            }
        });
    });
</script>



<script>
    $(document).ready(function() {
        // Event listener for the classroom dropdown
        $('select[name="Classroom_id"]').on('change', function() {
            var classroomId = $(this).val();
            if (classroomId) {
                $.ajax({
                    url: '/sections/' + classroomId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        var options = '<option selected disabled>{{trans('MyParent.Choose')}}...</option>';
                        $.each(data, function(key, value) {
                            options += '<option value="' + key + '">' + value + '</option>';
                        });
                        $('select[name="section_id"]').html(options);
                    }
                });
            } else {
                $('select[name="section_id"]').empty();
            }
        });
    });
</script>


@endsection