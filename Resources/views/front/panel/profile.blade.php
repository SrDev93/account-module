@extends('layouts.admin')

@section('content')
    <!-- CONTAINER -->

    <div class="main-container container-fluid">
        <!-- PAGE-HEADER -->
        @include('account::front.panel.partial.header')
        <!-- PAGE-HEADER END -->

        <!-- ROW-1 OPEN -->
        <div class="row" id="user-profile">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-lg-12 col-md-12 col-xl-6">
                                <div class="d-flex flex-wrap align-items-center">
                                    <div class="profile-img-main rounded">
                                        @if(Auth::user()->photo)<img src="{{ url(Auth::user()->photo->path) }}" alt="img" class="m-0 p-1 rounded hrem-6">@endif
                                    </div>
                                    <div class="ms-4">
                                        <h4>{{ Auth::user()->Name }}</h4>
                                        <p class="text-muted mb-2">تاریخ عضویت : {{ my_jdate(Auth::user()->created_at, 'F Y') }}</p>
                                        <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-rss"></i> Follow</a>
                                        <a href="mail-inbox.html" class="btn btn-secondary btn-sm"><i class="fa fa-envelope"></i> E-mail</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-xl-6 d-none">
                                <div class="d-md-flex flex-wrap justify-content-lg-end">
                                    <div class="media m-3">
                                        <div class="media-icon bg-primary me-3 mt-1">
                                            <i class="fe fe-file-plus fs-20 text-white"></i>
                                        </div>
                                        <div class="media-body">
                                            <span class="text-muted">Posts</span>
                                            <div class="fw-semibold fs-25">
                                                328
                                            </div>
                                        </div>
                                    </div>
                                    <div class="media m-3">
                                        <div class="media-icon bg-info me-3 mt-1">
                                            <i class="fe fe-users  fs-20 text-white"></i>
                                        </div>
                                        <div class="media-body">
                                            <span class="text-muted">Followers</span>
                                            <div class="fw-semibold fs-25">
                                                937k
                                            </div>
                                        </div>
                                    </div>
                                    <div class="media m-3">
                                        <div class="media-icon bg-warning me-3 mt-1">
                                            <i class="fe fe-wifi fs-20 text-white"></i>
                                        </div>
                                        <div class="media-body">
                                            <span class="text-muted">Following</span>
                                            <div class="fw-semibold fs-25">
                                                2,876
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="border-top">
                        <div class="wideget-user-tab">
                            <div class="tab-menu-heading">
                                <div class="tabs-menu1">
                                    <ul class="nav">
                                        <li><a href="#profileMain" class="active show" data-bs-toggle="tab">{{ __('account::custom.profile') }}</a></li>
                                        <li><a href="#editProfile" data-bs-toggle="tab">{{ __('account::custom.profile_edit') }}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane active show" id="profileMain">
                        <div class="card">
                            <div class="card-body p-0">
                                <div class="table-responsive p-5">
                                    <h3 class="card-title">{{ __('account::custom.personal_info') }}</h3>
                                    <table class="table row table-borderless">
                                        <tbody class="col-lg-12 col-xl-6 p-0">
                                        <tr>
                                            <td><strong>{{ __('account::custom.full_name') }} :</strong> {{ Auth::user()->Name }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>{{ __('account::custom.mobile') }} :</strong> {{ Auth::user()->mobile }}</td>
                                        </tr>
                                        </tbody>
                                        <tbody class="col-lg-12 col-xl-6 p-0 border-top-0">
                                        <tr>
                                            <td><strong>{{ __('account::custom.email') }} :</strong> @if(Auth::user()->email) {{ Auth::user()->email }} @else نامشخص @endif</td>
                                        </tr>
                                        <tr>
                                            <td><strong>{{ __('account::custom.gender') }} :</strong> @if(Auth::user()->gender == 'male') مرد @elseif(Auth::user()->gender == 'famale') زن @else نامشخص @endif</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="editProfile">
                        <div class="card">
                            <div class="card-body border-0">
                                <form class="form-horizontal" action="{{ route('admin.profile.update') }}" method="post" enctype="multipart/form-data">
                                    <div class="row mb-4">
                                        <p class="mb-4 text-17">{{ __('account::custom.personal_info') }}</p>
                                        <div class="col-md-12 col-lg-12 col-xl-6">
                                            <div class="form-group">
                                                <label for="firstname" class="form-label">{{ __('account::custom.first_name') }}</label>
                                                <input type="text" name="first_name" class="form-control" id="first_name" placeholder="{{ __('account::custom.first_name') }}" value="{{ Auth::user()->first_name }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-lg-12 col-xl-6">
                                            <div class="form-group">
                                                <label for="lastname" class="form-label">{{ __('account::custom.last_name') }}</label>
                                                <input type="text" name="last_name" class="form-control" id="last_name" placeholder="{{ __('account::custom.last_name') }}" value="{{ Auth::user()->last_name }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-lg-12 col-xl-6">
                                            <div class="form-group">
                                                <label for="mobile" class="form-label">{{ __('account::custom.mobile') }}</label>
                                                <input type="text" name="mobile" class="form-control" id="mobile" placeholder="{{ __('account::custom.mobile') }}" value="{{ Auth::user()->mobile }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-lg-12 col-xl-6">
                                            <div class="form-group">
                                                <label for="email" class="form-label">{{ __('account::custom.email') }}</label>
                                                <input type="email" name="email" class="form-control" id="email" placeholder="{{ __('account::custom.email') }}" value="{{ Auth::user()->email }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-lg-12 col-xl-6">
                                            <div class="form-group">
                                                <label for="designation" class="form-label">{{ __('account::custom.gender') }}</label>
                                                <select name="gender" class="form-control">
                                                    <option value>بدون انتخاب</option>
                                                    <option value="male" @if(Auth::user()->gender == 'male') selected @endif>مرد</option>
                                                    <option value="famale" @if(Auth::user()->gender == 'famale') selected @endif>زن</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-lg-12 col-xl-6">
                                            <div class="form-group">
                                                <label for="photo" class="form-label">{{ __('account::custom.profile_photo') }}</label>
                                                <input type="file" name="photo" class="form-control" id="photo" accept="image/*">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-lg-12 col-xl-6">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">بروزرسانی</button>
                                            </div>
                                        </div>
                                    </div>
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- COL-END -->
        </div>
        <!-- ROW-1 CLOSED -->


    </div>
@endsection
