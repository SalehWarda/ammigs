@extends('layouts.admin')
@section('content')


    <div class="content-wrapper">

    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{trans('dashboard.Socials')}} </h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}" class="default-color">{{trans('dashboard.Home')}}</a></li>
                    <li class="breadcrumb-item active">{{trans('dashboard.Socials')}}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- main body -->
    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">


                    <div class="d-block d-md-flex justify-content-between">
                        <div class="d-block">
                            <h5 class="card-title pb-0 border-0">{{trans('dashboard.Socials')}}</h5>
                        </div>

                        <div class="d-block d-md-flex justify-content-between">
                            <div class="d-block">
                                <a class="btn btn-success icon left" data-toggle="modal"  data-target="#add_social"

                                   href="{{route('admin.socials.create')}}">{{trans('dashboard.AddUSocials')}} <i class="fa fa-plus"></i></a>
                            </div>

                        </div>

                    </div>

                    <div class="table-responsive mt-15">
                        <table class="table center-aligned-table mb-0">
                            <thead>
                            <tr class="text-dark">
                                <th>#</th>
                                <th>{{trans('dashboard.SiteSocial')}}</th>
                                <th>{{trans('dashboard.LinkSite')}}</th>
                                <th>{{trans('dashboard.Actions')}}</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                @forelse($socials as $social)



                                    <td>{{$loop->iteration}} </td>
                                    <td>{{$social->site}}</td>

                                    <td>{{$social->link}}  </td>
                                    <td>

                                        <button type="button" class="btn btn-danger btn-sm"
                                                data-toggle="modal"
                                                data-target="#delete_socials{{ $social->id }}" title="Delete"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                            </tr>

{{--                            delete Modal Product--}}
                            <div class="modal fade" id="delete_socials{{ $social->id }}" tabindex="-1" role="dialog"
                                 aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <div class="modal-title">
                                                <div class="mb-30">

                                                    <h6>{{trans('dashboard.Delete')}} {{$social->site}}</h6>

                                                </div>
                                            </div>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            <form class="form" action="{{ route('admin.socials.delete') }}"
                                                  method="post">
                                                @csrf
                                                @method('DELETE')

                                                <input type="hidden" name="delete_social" value="{{$social->id}}" id="id">

                                                <h6>{{trans('dashboard.Are_you_sure_about_deleting')}}? <span class="text-danger">{{$social->site}}</span></h6>


                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{trans('dashboard.Close')}}
                                                    </button>
                                                    <button type="submit"
                                                            class="btn btn-danger">{{trans('dashboard.Delete')}}</button>

                                                </div>
                                            </form>

                                        </div>

                                    </div>
                                </div>
                            </div>

                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">No Socials found</td>
                                </tr>




                            @endforelse


                            {{--Addsocials Modal Product --}}
                                                        <div class="modal fade" id="add_social" tabindex="-1" role="dialog"
                                                             aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <div class="modal-title">
                                                                            <div class="mb-30">

                                                                                <h6>{{trans('dashboard.AddUSocials')}}</h6>

                                                                            </div>
                                                                        </div>
                                                                        <button type="button" class="close" data-dismiss="modal"
                                                                                aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">

                                                                        <form class="form" action="{{ route('admin.socials.store') }}"
                                                                              method="post">
                                                                            @csrf

                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label>{{trans('dashboard.SiteSocial')}} :</label>

                                                                                        <input type="text" name="site" class="form-control" value="{{old('site')}}">

                                                                                        @error('site')
                                                                                        <span class="text-danger">{{ $message }}</span>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>




                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label> {{trans('dashboard.LinkSite')}} :</label>

                                                                                        <input type="text" name="link" class="form-control" value="{{old('link')}}">

                                                                                        @error('link')
                                                                                        <span class="text-danger">{{ $message }}</span>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>

                                                                            </div>



                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary"
                                                                                        data-dismiss="modal">{{trans('dashboard.Close')}}
                                                                                </button>
                                                                                <button type="submit"
                                                                                        class="btn btn-success">{{trans('dashboard.Save')}}</button>

                                                                            </div>
                                                                        </form>

                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>




                            </tbody>

                            <tfoot>
                            <tr>
                                <td colspan="3">
                                    <div class="float-right">

                                        {!! $socials->appends(request()->all())->links() !!}

                                    </div>

                                </td>
                            </tr>

                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>

@endsection
