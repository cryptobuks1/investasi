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
            <div class="page-title">
                {{--<div class="title_left">--}}
                {{--<h3>Users <small>Some examples to get you started</small></h3>--}}
                {{--</div>--}}

                {{--<div class="title_right">--}}
                {{--<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">--}}
                {{--<div class="input-group">--}}
                {{--<input type="text" class="form-control" placeholder="Search for...">--}}
                {{--<span class="input-group-btn">--}}
                {{--<button class="btn btn-default" type="button">Go!</button>--}}
                {{--</span>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            @include('admin.partials._success')
                            <h2>Daftar Blog</h2>
                            <div class="nav navbar-right">
                                <a href="{{ route('blog-create') }}" class="btn btn-app">
                                    <i class="fa fa-plus"></i> Tambah
                                </a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Kategori</th>
                                    <th>Terbaca</th>
                                    <th>Status</th>
                                    <th>Tanggal Dibuat</th>
                                    <th>Opsi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php ($idx = 1)
                                @foreach($blogs as $blog)
                                    <tr>
                                        <td>{{ $idx}}</td>
                                        <td>{{ $blog->title}}</td>
                                        <td>{{ $blog->category->name }}</td>
                                        <td>{{ $blog->read_count }}</td>
                                        <td>
                                            @if($blog->status_id == 1)
                                                Publish
                                            @elseif($blog->status_id == 7)
                                                Reject
                                            @else
                                                Unpublish
                                            @endif
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($blog->created_at)->format('j F y')}}</td>
                                        <td>
                                            <a href="#" target="_blank" class="btn btn-primary">Detail</a>
                                            <a href="{{ route('blog-edit', ['id' => $blog->id]) }}" target="_blank" class="btn btn-primary">Ubah</a>
                                        </td>
                                    </tr>
                                    @php ($idx++)
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