@extends('layouts.admin')

@section('title')

    AMMIGS | Contacts

@endsection


@section('content')


    <div class="content-wrapper">


        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="mb-0">{{trans('dashboard.Contacts')}}</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"
                                                       class="default-color">{{trans('dashboard.Home')}}</a></li>
                        <li class="breadcrumb-item active">{{trans('dashboard.Contacts')}}</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- main body -->
        <div class="row">
            <div class="col-xl-12 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">


                        <div class="row">
                            <div class="col-xl-12 mb-30">
                                <div class="card card-statistics h-100">

                                    <div class="card-body">


                                        <form method="post" action="{{route('admin.contacts.update')}}" autocomplete="off" enctype="multipart/form-data">
                                            @csrf
                                            @method('PATCH')

                                            <input type="hidden" name="id" value="{{$contacts->id}}">

                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="contact_ar"> {{trans('dashboard.ContactUs_ar')}} :</label>

                                                        <textarea name="contact_ar" rows="3" class="form-control summernote">{!! old('contact_ar',$contacts->getTranslation('contact_description','ar'))  !!}</textarea>

                                                        @error('contact_ar')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="contact_en"> {{trans('dashboard.ContactUs_en')}} :</label>

                                                        <textarea name="contact_en" rows="3" class="form-control summernote">{!! old('contact_en',$contacts->getTranslation('contact_description','en')) !!}</textarea>

                                                        @error('contact_en')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label> {{trans('dashboard.Address')}} :</label>

                                                        <input type="text" name="address" class="form-control" value="{{old('address',$contacts->address)}}">

                                                        @error('address')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label> {{trans('dashboard.phoneNumber')}} :</label>

                                                        <input type="tel" name="phone" class="form-control" value="{{old('phone',$contacts->phone)}}">

                                                        @error('phone')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                              <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label> {{trans('dashboard.Email')}} :</label>

                                                        <input type="email" name="email" class="form-control" value="{{old('email',$contacts->email)}}">

                                                        @error('email')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>


                                            </div>



                                            <br>
                                            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('dashboard.Save')}}</button>


                                        </form>


                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>



        </div>

        @include('partials.backend.footer')





        @endsection

        @section('script')

            <script>
                $(function (){


                    $('.summernote').summernote({
                        tabsize: 2,
                        height: 200,
                        toolbar: [
                            ['style', ['style']],
                            ['font', ['bold', 'underline', 'clear']],
                            ['color', ['color']],
                            ['para', ['ul', 'ol', 'paragraph']],
                            ['table', ['table']],
                            ['insert', ['link', 'picture', 'video']],
                            ['view', ['fullscreen', 'codeview', 'help']]
                        ]
                    });
                })


            </script>
@endsection
