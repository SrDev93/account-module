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
                        
                        <form method="post" action="{{ route('admin.role-permission.update',$role_permission->id) }}" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                            
                            @method("PUT")
                            
                            <div class="col-md-6">
                                <label for="role" class="form-label">نام نقش</label>
                                <input type="text" name="role" class="form-control" id="role" required value="{{ old('role',$role_permission->name) }}">
                                <div class="invalid-feedback">لطفا نام نقش را وارد کنید</div>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">دسترسی ها</label>
                                <select multiple class="form-control select2-show-search form-select" data-placeholder="دسترسی ها" name="permission[]">
                                    <option label="انتخاب کنید"></option>
                                    <option @if(in_array('slider',$permissions)) selected="selected" @endif value="slider">اسلایدر</option>
                                    <option @if(in_array('province_city',$permissions)) selected="selected" @endif value="province_city">استان ها و شهر ها</option>
                                    <option @if(in_array('setting',$permissions)) selected="selected" @endif value="setting">تنظیمات</option>
                                    <option @if(in_array('ads',$permissions)) selected="selected" @endif value="ads">آگهی ها</option>
                                    <option @if(in_array('project',$permissions)) selected="selected" @endif value="project">پروژه ها</option>
                                    <option @if(in_array('education',$permissions)) selected="selected" @endif value="education">آموزش</option>
                                    <option @if(in_array('news',$permissions)) selected="selected" @endif value="news">اخبار</option>
                                    <option @if(in_array('event',$permissions)) selected="selected" @endif value="event">رویداد ها</option>
                                    <option @if(in_array('page',$permissions)) selected="selected" @endif value="page">مدیریت صفحات</option>
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
