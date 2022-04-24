@extends('layouts.admin')

@section('title')

    AMMIGS | Covers

@endsection


@section('content')


    <div class="content-wrapper">


        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="mb-0">{{trans('dashboard.Cover')}}</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"
                                                       class="default-color">{{trans('dashboard.Home')}}</a></li>
                        <li class="breadcrumb-item active">{{trans('dashboard.Cover')}}</li>
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
                                <h5 class="card-title pb-0 border-0">{{trans('dashboard.Cover')}}</h5>
                            </div>

                            <div class="d-block d-md-flex justify-content-between">
                                <div class="d-block">
                                    <a class="btn btn-success icon left"

                                       href="{{route('admin.covers.create')}}">{{trans('dashboard.AddCover')}} <i
                                            class="fa fa-plus"></i></a>
                                </div>

                            </div>

                        </div>

                        <div class="table-responsive mt-15">
                            <table class="table center-aligned-table mb-0">
                                <thead>
                                <tr class="text-dark">
                                    <th>#</th>
                                    <th>{{trans('dashboard.CoverImage')}}</th>
                                    <th>{{trans('dashboard.Title')}}</th>
                                    <th>{{trans('dashboard.Description')}}</th>
                                    <th>{{trans('dashboard.Actions')}}</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    @forelse($covers as $cover)


                                        <td>{{ $loop->iteration}}</td>
                                        <td><img src="{{asset('assets/images/cover/'.$cover->image)}}"width="60" height="60" alt="{{$cover->cover}}"></td>
                                        <td>{{$cover->title}}</td>
                                        <td>{!! \Illuminate\Support\Str::limit($cover->description, 100, '...') !!}</td>
                                        <td>
                                            <a href="{{route('admin.covers.edit',$cover->id)}}"
                                               class="btn btn-info btn-sm" role="button" title="{{trans('dashboard.Edit')}}"
                                               aria-pressed="true"><i
                                                    class="fa fa-edit"></i></a>
                                            <button type="button" class="btn btn-danger btn-sm"
                                                    data-toggle="modal"
                                                    data-target="#delete_cover{{ $cover->id }}" title="{{trans('dashboard.Delete')}}"><i
                                                    class="fa fa-trash"></i></button>
                                        </td>
                                </tr>

                                <div class="modal fade" id="delete_cover{{ $cover->id }}" tabindex="-1"
                                     role="dialog"
                                     aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <div class="modal-title">
                                                    <div class="mb-30">

                                                        <h6>Delete {{$cover->title}}</h6>

                                                    </div>
                                                </div>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <form class="form" action="{{ route('admin.covers.delete') }}"
                                                      method="post">
                                                    @csrf
                                                    @method('DELETE')

                                                    <input type="hidden" name="delete_cover_id"
                                                           value="{{$cover->id}}" id="id">

                                                    <h6>Are you sure about deleting: <span
                                                            class="text-danger">{{$cover->title}}</span></h6>


                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close
                                                        </button>
                                                        <button type="submit"
                                                                class="btn btn-danger">Delete
                                                        </button>

                                                    </div>
                                                </form>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No Covers found</td>
                                    </tr>




                                @endforelse


                                </tbody>

                                <tfoot>
                                <tr>
                                    <td colspan="5">
                                        <div class="float-right">

                                            {!! $covers->appends(request()->all())->links() !!}

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

    @include('partials.backend.footer')





@endsection
