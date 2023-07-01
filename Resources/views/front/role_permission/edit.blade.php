@extends('layouts.admin')

@push('stylesheets')
    <style>
        .select2-container {
            width: 100%!important;
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

                        <form method="post" action="{{ route('admin.role-permission.update',$role_permission->id) }}" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>

                            @method("PUT")

                            <div class="col-md-12">
                                <label for="role" class="form-label">نام نقش</label>
                                <input type="text" name="role" class="form-control" id="role" required value="{{ old('role',$role_permission->name) }}">
                                <div class="invalid-feedback">لطفا نام نقش را وارد کنید</div>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">دسترسی ها</label>
                                <select multiple class="form-control select2 select2-show-search form-select" data-placeholder="دسترسی ها" name="permission[]">
                                    <option @if(in_array('role_permission',$permissions)) selected="selected" @endif value="role_permission">نقش ها و دسترسی ها</option>
                                    <option @if(in_array('users',$permissions)) selected="selected" @endif value="users">مدیریت کاربران</option>
                                    <option @if(in_array('slider',$permissions)) selected="selected" @endif value="slider">اسلایدر</option>
                                    <option @if(in_array('shop',$permissions)) selected="selected" @endif value="shop">فروشگاه</option>
                                    <option @if(in_array('blogs',$permissions)) selected="selected" @endif value="blogs">مقالات</option>
                                    <option @if(in_array('page',$permissions)) selected="selected" @endif value="page">مدیریت صفحات</option>
                                    <option @if(in_array('socials',$permissions)) selected="selected" @endif value="socials">شبکه های اجتماعی</option>
                                    <option @if(in_array('setting',$permissions)) selected="selected" @endif value="setting">تنظیمات</option>
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
