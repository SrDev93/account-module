@extends('layouts.admin')

@section('content')
    <!-- CONTAINER -->
    <div class="main-container container-fluid">

    @include('account::front.role_permission.partial.header')

        <!-- ROW -->
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h3 class="card-title">افزودن نقش</h3>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('admin.manage-user.store') }}" method="post" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>

                            <div class="col-md-6">
                                <label for="first_name" class="form-label">نام</label>
                                <input type="text" name="first_name" class="form-control" id="first_name" required value="{{ old('first_name') }}">
                                <div class="invalid-feedback">لطفا نام خود را وارد کنید</div>
                            </div>

                            <div class="col-md-6">
                                <label for="last_name" class="form-label">نام خانوادگی</label>
                                <input type="text" name="last_name" class="form-control" id="last_name" required value="{{ old('last_name') }}">
                                <div class="invalid-feedback">لطفا نام خانوادگی را وارد کنید</div>
                            </div>

                            <div class="col-md-6">
                                <label for="mobile" class="form-label">شماره تماس</label>
                                <input type="text" name="mobile" class="form-control" id="mobile" required value="{{ old('mobile') }}">
                                <div class="invalid-feedback">لطفا شماره تماس را وارد کنید</div>
                            </div>

                            <div class="col-md-6">
                                <label for="email" class="form-label">ایمیل</label>
                                <input type="text" name="email" class="form-control" id="email" value="{{ old('email') }}">
                                <div class="invalid-feedback">لطفا ایمیل را وارد کنید</div>
                            </div>

                            <div id="role" class="col-md-6">
                                <label for="role" class="form-label">نقش</label>
                                <select name="role" class="form-control">
                                    <option label="انتخاب کنید"></option>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->name }}" @if(old('role') == $role->name) selected @endif>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">لطفا نقش را انتخاب کنید</div>
                            </div>

                            <div class="col-md-6">
                                <label for="status" class="form-label">وضعیت</label>
                                <select name="status" class="form-control">
                                    <option label="انتخاب کنید"></option>
                                    <option value="1" @if(old('status') == '1') selected @endif>تایید شده</option>
                                    <option value="0" @if(old('status') == '0') selected @endif>در انتظار تایید</option>
                                    <option value="-1" @if(old('status') == '-1') selected @endif>مسدود شده</option>
                                </select>
                                <div class="invalid-feedback">لطفا وضعیت را انتخاب کنید</div>
                            </div>

                            <div class="col-md-6">
                                <label for="password" class="form-label">رمز عبور</label>
                                <input type="password" name="password" class="form-control" id="password" required value="{{ old('password') }}">
                                <div class="invalid-feedback">لطفا رمز عبور را وارد کنید</div>
                            </div>

                            <div class="col-md-6">
                                <label for="photo" class="form-label">تصویر پروفایل</label>
                                <input type="file" name="photo" class="form-control" aria-label="تصویر پروفایل" accept="image/*">
                                <div class="invalid-feedback">لطفا یک تصویر انتخاب کنید</div>
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">ارسال فرم</button>
                                @csrf
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ROW CLOSED -->


    </div>
@endsection

@push('scripts')
    <script>
        // const role_show = (selector) => {
        //     if($(selector).find("option:selected").val() == "admin")
        //     {
        //         $("#role").removeClass("d-none");
        //         $("#role select").attr("required","required");
        //     }else{
        //         $("#role").addClass("d-none");
        //         $("#role select").removeAttr("required");
        //     }
        // }
    </script>
@endpush
