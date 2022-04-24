@extends('layouts.admin')

@section('title')

    AMMIGS | Settings

@endsection

@section('content')


    <div class="content-wrapper">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="mb-0"> Dashboard</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                        <li class="breadcrumb-item"><a href="index.html" class="default-color">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>


        <!-- row -->
        <div class="row">
            <div class="col-md-12 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <form enctype="multipart/form-data" method="post" action="{{route('admin.settings.update')}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 border-right-2 border-right-blue-400">
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label font-weight-semibold">اسم الشركة<span class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <input name="company_name" value="{{ $setting['company_name'] }}" required type="text" class="form-control" placeholder="Name of Company">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="current_session" class="col-lg-2 col-form-label font-weight-semibold">العام الحالي<span class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <select data-placeholder="Choose..." required name="current_session" id="current_session" class="select-search form-control">
                                                <option value=""></option>
                                                @for($y=date('Y', strtotime('- 3 years')); $y<=date('Y', strtotime('+ 1 years')); $y++)
                                                    <option {{ ($setting['current_session'] == (($y-=1).'-'.($y+=1))) ? 'selected' : '' }}>{{ ($y-=1).'-'.($y+=1) }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label font-weight-semibold">الهاتف</label>
                                        <div class="col-lg-9">
                                            <input name="phone" value="{{ $setting['phone'] }}" type="text" class="form-control" placeholder="Phone">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label font-weight-semibold">البريد الالكتروني</label>
                                        <div class="col-lg-9">
                                            <input name="company_email" value="{{ $setting['company_email'] }}" type="email" class="form-control" placeholder="Company Email">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label font-weight-semibold">عنوان الشركة<span class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <input required name="address" value="{{ $setting['address'] }}" type="text" class="form-control" placeholder="School Address">
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label font-weight-semibold">شعار الشركة</label>
                                        <div class="col-lg-9">
                                            <div class="mb-3">
                                                <img style="width: 100px" height="100px" src="{{ URL::asset('assets/images/logo/'.$setting['logo']) }}" alt="">
                                            </div>
                                            <input name="logo" accept="image/*" type="file" class="file-input" data-show-caption="false" data-show-upload="false" data-fouc>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">تاكيد</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- row closed -->

        @include('partials.backend.footer')

    </div>


@endsection
