@extends('layouts.admin')

@section('content')
    <!-- CONTAINER -->
    <div class="main-container container-fluid">


    @include('account::front.role_permission.partial.header')

        <!-- Row -->
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h3 class="card-title">لیست نقش ها</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-nowrap border-bottom w-100" id="responsive-datatable">
                                <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">ردیف</th>
                                    <th class="wd-15p border-bottom-0">نام</th>
                                    <th class="wd-15p border-bottom-0">نام خانوادگی</th>
                                    <th class="wd-15p border-bottom-0">شماره تماس</th>
                                    <th class="wd-15p border-bottom-0">نوع</th>
                                    <th class="wd-15p border-bottom-0">نقش</th>
                                    <th class="wd-15p border-bottom-0">وضعیت</th>
                                    <th class="wd-20p border-bottom-0">عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->first_name }}</td>
                                        <td>{{ $user->last_name }}</td>
                                        <td>{{ $user->mobile }}</td>
                                        <td>{{ $user->type }}</td>
                                        <td>{{ $user->getRoleNames()->first() }}</td>
                                        <td>
                                            @if($user->status == 1)
                                                تایید شده
                                            @elseif($user->status == 0)
                                                در انتظار تایید 
                                            @elseif($user->status == -1)
                                                مسدود شده
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.manage-user.edit', $user->id) }}" class="btn btn-primary fs-14 text-white edit-icn" title="ویرایش">
                                                <i class="fe fe-edit"></i>
                                            </a>

                                            {{-- <a href="{{ route('admin.manage-user.edit', $user->id) }}" class="btn btn-danger fs-14 text-white edit-icn" title="ویرایش">
                                                <i class="fe fe-slash"></i>
                                            </a> --}}
                                            
                                            
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('admin.manage-user.create') }}" class="btn btn-primary">افزودن کاربر</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Row -->
    </div>
@endsection

@push('scripts')
    <!-- SELECT2 JS -->
		<script src="{{ my_asset('assets/plugins/select2/select2.full.min.js')}}"></script>
@endpush