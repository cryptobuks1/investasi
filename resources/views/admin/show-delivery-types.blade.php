@extends('layouts.admin')

@section('dashboard')

    <!-- sidebar -->
    @include('admin.partials._sidebar')
    <!-- sidebar -->

    <!-- top navigation -->
    @include('admin.partials._navigation')
    <!-- /top navigation -->

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            @include('admin.partials._success')
                            <h2>Delivery Type Master Data</h2>
                            <div class="nav navbar-right">
                                <a href="{{ route('delivery-type-create') }}" class="btn btn-app">
                                    <i class="fa fa-plus"></i> Add
                                </a>
                            </div>
                            <div class="clearfix"></div>

                        </div>
                        <div class="x_content">
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Courier</th>
                                    <th>Status</th>
                                    <th>Options</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php( $idx = 1 )
                                @foreach($deliveryTypes as $deliveryType)
                                    <tr>
                                        <td>{{$idx}}</td>
                                        <td>{{$deliveryType->description}}</td>
                                        <td>{{$deliveryType->courier->description}}</td>
                                        <td>
                                            @if($deliveryType->status_id == 1)
                                                Active
                                            @else
                                                Inactive
                                            @endif
                                        </td>
                                        <td>
                                            <a href="/admin/delivery-type/edit/{{ $deliveryType->id }}" class="btn btn-default submit">Edit</a>
                                            {{--<a href="/admin/delivery-type/delete/{{ $deliveryType->id }}" class="btn btn-danger submit">Delete</a>--}}
                                        </td>
                                    </tr>
                                    @php( $idx++ )
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->

@endsection