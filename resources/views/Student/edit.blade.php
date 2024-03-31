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
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('Student.Attachments') }}</span>
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
                <div class="card-body">
                    <div class="tab nav-border">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active show" id="home-02-tab" data-toggle="tab" href="#home-02"
                                   role="tab" aria-controls="home-02"
                                   aria-selected="true">{{trans('Student.Student_details')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-02-tab" data-toggle="tab" href="#profile-02"
                                   role="tab" aria-controls="profile-02"
                                   aria-selected="false">{{trans('Student.Attachments')}}</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="home-02" role="tabpanel"
                                 aria-labelledby="home-02-tab">
                                <table class="table table-striped table-hover" style="text-align:center">
                                    <tbody>
                                    <tr>
                                        <th scope="row">{{trans('Student.name')}}</th>
                                        <td>{{ $Student->name }}</td>
                                        <th scope="row">{{trans('Student.email')}}</th>
                                        <td>{{$Student->email}}</td>
                                        <th scope="row">{{trans('Student.gender')}}</th>
                                        <td>{{$Student->gender->Name}}</td>
                                        <th scope="row">{{trans('Student.Nationality')}}</th>
                                        <td>{{$Student->nationalitie->name_nationalitie}}</td>
                                    </tr>

                                    <tr>
                                        <th scope="row">{{trans('Student.Grade')}}</th>
                                        <td>{{ $Student->Grade->name }}</td>
                                        <th scope="row">{{trans('Student.classrooms')}}</th>
                                        <td>{{$Student->classrooms->name_class}}</td>
                                        <th scope="row">{{trans('Student.section')}}</th>
                                        <td>{{$Student->section->name_section}}</td>
                                        <th scope="row">{{trans('Student.Date_of_Birth')}}</th>
                                        <td>{{ $Student->Date_of_Birth}}</td>
                                    </tr>

                                    <tr>
                                        <th scope="row">{{trans('Student.parent')}}</th>
                                        <td>{{ $Student->myparent->name_f}}</td>
                                        <th scope="row">{{trans('Student.academic_year')}}</th>
                                        <td>{{ $Student->academic_year }}</td>
                                        <th scope="row"></th>
                                        <td></td>
                                        <th scope="row"></th>
                                        <td></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="tab-pane fade" id="profile-02" role="tabpanel"
                                 aria-labelledby="profile-02-tab">
                                <div class="card card-statistics">
                                    <div class="card-body">
                                        <form method="post" action="{{route('Upload_attachment')}}" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label
                                                        for="academic_year">{{trans('Student.Attachments')}}
                                                        : <span class="text-danger">*</span></label>
                                                    <input type="file" accept="image/*" name="photos[]" multiple required>
                                                    <input type="hidden" name="student_name" value="{{$Student->name}}">
                                                    <input type="hidden" name="student_id" value="{{$Student->id}}">
                                                </div>
                                            </div>
                                            <br><br>
                                            <button type="submit" class="button button-border x-small">
                                                   {{trans('Student.submit')}}
                                            </button>
                                        </form>
                                    </div>
                                    <br>
                                    <table class="table center-aligned-table mb-0 table table-hover"
                                           style="text-align:center">
                                        <thead>
                                        <tr class="table-secondary">
                                            <th scope="col">#</th>
                                            <th scope="col">{{trans('Student.filename')}}</th>
                                            <th scope="col">{{trans('Student.created_at')}}</th>
                                            <th scope="col">{{trans('Student.Processes')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                    
                                          @foreach($a as $attachment)
                                            <tr style='text-align:center;vertical-align:middle'>
                                                <td>{{$loop->iteration}}</td>
                                                <td>  {{$attachment->filename}}</td>
                                                <td>{{$attachment->created_at->diffForHumans()}}</td>
                                                <td colspan="2">
                                                    <a class="btn btn-outline-info btn-sm"
                                                       href="{{url('Download_attachment')}}/{{$Student->name}}/{{$attachment->filename}}"
                                                       role="button"><i class="fas fa-download"></i>&nbsp; {{trans('Student.Download')}}</a>
                                        
                                                    <button type="button" class="btn btn-outline-danger btn-sm"
                                                            data-toggle="modal"
                                                            data-target="#Delete_img{{ $attachment->id }}"
                                                            title="{{ trans('Grade.Delete') }}">{{trans('Student.delete')}}
                                                    </button>
                                                </td>
                                            </tr>
                                            @include('Student.deleteimage')
                                        @endforeach
                                        
                                        </tbody>
                                    </table>
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
