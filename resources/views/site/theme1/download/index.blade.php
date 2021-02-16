@extends('site.' . config('cms.theme') . '.layout.master')

@section('title', config('cms.site') . ' - Download')

@section('content')

    {{--page cover--}}
    <div class="breadcrumb-area bg-color ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-title text-center">
                        <h1>Download</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="blog-area ptb-80">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped table-bordered">
                        <tbody>
                        <tr>
                            <th style="width: 50px;">S.N.</th>
                            <th>Title</th>
                            <th>Last Updated</th>
                            <th style="width: 200px;">Action</th>
                        </tr>
                        @foreach($list as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}.</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->updated_at->diffForHumans() }}</td>
                                <td>
                                    <a target="_blank" href="{{ $item->file }}" class="btn btn-primary" download>Download</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    {!! $list->links() !!}
                </div>
            </div>
        </div>
    </div>

@stop

@section('style')
@stop

@section('script')
@stop
