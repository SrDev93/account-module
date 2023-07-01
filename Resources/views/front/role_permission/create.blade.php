@extends('layouts.admin')
@push('stylesheets')
    <style>
        .select2-container {
            width: 100% !important;
        }
    </style>
@endpush
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

                        <form action="{{ route('admin.role-permission.store') }}" method="post"
                              enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>

                            <div class="col-md-12">
                                <label for="role" class="form-label">نام نقش</label>
                                <input type="text" name="role" class="form-control" id="role" required
                                       value="{{ old('role') }}">
                                <div class="invalid-feedback">لطفا نام نقش را وارد کنید</div>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">دسترسی ها</label>
                                <select multiple class="form-control select2 select2-show-search form-select"
                                        data-placeholder="دسترسی ها" name="permission[]">
                                    <option value="role_permission">نقش ها و دسترسی ها</option>
                                    <option value="users">مدیریت کاربران</option>
                                    <option value="slider">اسلایدر</option>
                                    <option value="shop">فروشگاه</option>
                                    <option value="blogs">مقالات</option>
                                    <option value="page">مدیریت صفحات</option>
                                    <option value="socials">شبکه های اجتماعی</option>
                                    <option value="setting">تنظیمات</option>
                                </select>
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
