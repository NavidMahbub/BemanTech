@extends('layouts.app')

@section('site_title', 'Dashboard')

@section('page_title')
    <div class="app-title">
        <div style="width: 100%;">
            <h1 class="pull-left" style="display: inline-block">Dashbaord</h1>
            @if(auth()->user()->type == 3 || auth()->user()->type == 4)
                <a href="{{ route('admin.registration.create') }}"
                   class="btn btn-primary icon-btn text-white pull-right ml-15">
                    <i class="fa fa-plus-circle"></i>Register Members
                </a>
            @endif
        </div>
    </div>
@stop

@section('page_content')
    <div class="row">
        <div class="col-md-12">
            <div class="tile card" style="margin: 0; padding: 0">
                <div class="card-header">
                    Registrations
                </div>
                <div class="tile-body" style="padding: 40px; z-index: 1">
                    @if(auth()->user()->type == 1)
                        <div class="row">
                            @foreach($blog_array as $blog_item)
                                @if(in_array(auth()->user()->type, $blog_item->role))
                                    <div class="col-md-4">
                                        <div class="widget-small primary"><i class="icon fa fa-{{ $blog_item->icon }} fa-3x"></i>
                                            <div class="info">
                                                <p><b>{{ $blog_item->title }}</b></p>
                                                <p><b>{{ $blog_item->count }}</b></p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @else
                        <div class="row">
                            @foreach($card_array as $card_item)
                                @if(in_array(auth()->user()->type, $card_item->role))
                                    <div class="col-md-4">
                                        <div class="widget-small primary"><i class="icon fa fa-{{ $card_item->icon }} fa-3x"></i>
                                            <div class="info">
                                                <p><b>{{ $card_item->title }}</b></p>
                                                <p><b>{{ $card_item->count }}</b></p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    {{--@if(auth()->user()->type == 1)
        @php
            $pending_blog_posts = \App\Models\BlogPost::where('approved', 0)->where('created_by', auth()->user()->id)->count();
            $approved_blog_posts = \App\Models\BlogPost::where('approved', 1)->where('created_by', auth()->user()->id)->count();
        @endphp
        <div class="row">
            <div class="col-md-6">
                <div class="widget-small primary coloured-icon">
                    <i class="icon fa fa-pencil-square fa-3x"></i>
                    <div class="info">
                        <h4>Pending Blog Posts</h4>
                        <p><b>{{ $pending_blog_posts }}</b></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="widget-small primary coloured-icon">
                    <i class="icon fa fa-pencil-square fa-3x"></i>
                    <div class="info">
                        <h4>Approved Blog Posts</h4>
                        <p><b>{{ $approved_blog_posts }}</b></p>
                    </div>
                </div>
            </div>
        </div>
    @else
        @php
            $pending_registrations = \App\Models\Registration::where('approved', 0)->count();
            $approved_registrations = \App\Models\Registration::where('approved', 1)->count();
            $pending_blog_posts = \App\Models\BlogPost::where('approved', 0)->count();
            $approved_blog_posts = \App\Models\BlogPost::where('approved', 1)->count();
        @endphp
        <div class="row">
            <div class="col-md-6">
                <div class="widget-small primary coloured-icon">
                    <i class="icon fa fa-user-plus fa-3x"></i>
                    <div class="info">
                        <h4>Pending Registrations</h4>
                        <p><b>{{ $pending_registrations }}</b></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="widget-small primary coloured-icon">
                    <i class="icon fa fa-user-plus fa-3x"></i>
                    <div class="info">
                        <h4>Approved Registrations</h4>
                        <p><b>{{ $approved_registrations }}</b></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="widget-small primary coloured-icon">
                    <i class="icon fa fa-pencil-square fa-3x"></i>
                    <div class="info">
                        <h4>Pending Blog Posts</h4>
                        <p><b>{{ $pending_blog_posts }}</b></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="widget-small primary coloured-icon">
                    <i class="icon fa fa-pencil-square fa-3x"></i>
                    <div class="info">
                        <h4>Approved Blog Posts</h4>
                        <p><b>{{ $approved_blog_posts }}</b></p>
                    </div>
                </div>
            </div>
        </div>
    @endif--}}
@stop
