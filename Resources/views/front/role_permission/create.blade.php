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
                        
                        <form action="{{ route('admin.role-permission.store') }}" method="post" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                            
                            <div class="col-md-6">
                                <label for="role" class="form-label">نام نقش</label>
                                <input type="text" name="role" class="form-control" id="role" required value="{{ old('role') }}">
                                <div class="invalid-feedback">لطفا نام نقش را وارد کنید</div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">دسترسی ها</label>
                                <select multiple class="form-control select2-show-search form-select" data-placeholder="دسترسی ها" name="permission[]">
                                    <option label="انتخاب کنید"></option>
                                    <option value="slider">اسلایدر</option>
                                    <option value="province_city">استان ها و شهر ها</option>
                                    <option value="setting">تنظیمات</option>
                                    <option value="ads">آگهی ها</option>
                                    <option value="project">پروژه ها</option>
                                    <option value="education">آموزش</option>
                                    <option value="news">اخبار</option>
                                    <option value="event">رویداد ها</option>
                                    <option value="page">مدیریت صفحات</option>
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
