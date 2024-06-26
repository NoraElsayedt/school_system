@extends('dashboard.layouts.master2')
@section('css')
<!-- Sidemenu-respoansive-tabs css -->
<link href="{{URL::asset('dashboard/assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}" rel="stylesheet">
@endsection
@section('content')
		<div class="container-fluid">
			<div class="row no-gutter">
				<!-- The image half -->
				<div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
					<div class="row wd-100p mx-auto text-center">
						<div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
							<img src="{{URL::asset('dashboard/assets/img/media/login.png')}}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
						</div>
					</div>
				</div>

				<!-- The content half -->
				<div class="col-md-6 col-lg-6 col-xl-5 bg-white">
					<div class="login d-flex align-items-center py-2">
						<!-- Demo content-->
						<div class="container p-0">
							<div class="row">
								<div class="col-md-6 col-lg-6 col-xl-5 bg-white">
                    <div class="login-fancy pb-40 clearfix">
                        @if($type == 'student')
                            <h3 style="font-family: 'Cairo', sans-serif" class="mb-30">تسجيل دخول طالب</h3>
                        @elseif($type == 'parent')
                            <h3 style="font-family: 'Cairo', sans-serif" class="mb-30">تسجيل دخول ولي امر</h3>
                        @elseif($type == 'teacher')
                            <h3 style="font-family: 'Cairo', sans-serif" class="mb-30">تسجيل دخول معلم</h3>
                        @else
                            <h3 style="font-family: 'Cairo', sans-serif" class="mb-30">تسجيل دخول ادمن</h3>
                        @endif
                      
                


                                                <form method="POST" action="{{ route('login') }}">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label>{{ trans('login.email') }} </label>
                                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                        <input type="hidden" value="{{$type}}" name="type">
                                                        @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                         <strong>{{ $message }}</strong>
                                                         </span>
                                                        @enderror
                                                    </div>
    
                                                    <div class="form-group">
                                                        <label>{{ trans('login.password') }}  </label>
    
                                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    
                                                        @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                      <strong>{{ $message }}</strong>
                                                      </span>
                                                        @enderror
                                                        <div class="form-group row">
                                                            <div class="col-md-6 offset-md-4">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    <label class="form-check-label" for="remember">
                                                                        {{-- {{ __('تذكرني') }} --}}
                                                                        {{ trans('login.remember') }} 
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-main-primary btn-block">
                                                        {{-- {{ __('تسجيل الدخول') }} --}}
                                                        {{ trans('login.submit') }} 
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div><!-- End -->
					</div>
				</div><!-- End -->
			</div>
		</div>
@endsection
@section('js')
@endsection