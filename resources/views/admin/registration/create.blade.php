@extends('layouts.app')

@section('site_title', 'Registration')

@section('page_title')
    <div class="app-title">
        <div>
            <h1>Create Registration</h1>
        </div>
        <a href="{{ route('admin.registration.index') }}" class="btn btn-primary icon-btn text-white"><i class="fa fa-list"></i>View Registration List</a>
    </div>
@stop

@section('page_content')
    <div class="tile card" style="margin: 0; padding: 0">
        <div class="card-header">
            Create Registration Form
        </div>
        <div class="tile-body" style="padding: 40px;">
            <div class="wizard-container">
                <div class="wizard-card" data-color="orange" id="wizardProfile">
                    {!! Form::open(['url' => route('admin.registration.store'), 'method' => 'POST', 'files' => true, 'id' => 'wizardForm']) !!}
                    <div class="wizard-navigation" style="padding: 0 20px;">
                        <div class="progress-with-circle">
                            <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="3" style="width: 21%;"></div>
                        </div>
                        <ul>
                            @foreach($form_groups as $tab_key => $tab_form_group)
                                <li>
                                    <a href="#tab_{{ $tab_key }}" data-toggle="tab">
                                        <div class="iconcircle">
                                            <i class="{{ $tab_form_group->icon }}"></i>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="tab-content">
                        @foreach($form_groups as $tab_content_key => $form_group)
                            <div class="tab-pane" id="tab_{{ $tab_content_key }}">
                                <section class="row">
                                    <div class="col-md-12">
                                        <h5 class="text-primary my-3">{{ App::getLocale() == 'en' ? $form_group->title : $form_group->title_bn }}</h5>
                                    </div>
                                    @foreach($form_group->fields as $field)
                                        <div class="{{ $field->grid }}">
                                            @if($field->type == 'select')
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="{{ $field->field }}-addon1"><i class="{{ $field->icon }}"></i></span>
                                                        </div>
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="{{ $field->field }}-addon2">{{ App::getLocale() == 'en' ? $field->name : $field->name_bn }}</span>
                                                        </div>
                                                        <select id="{{ $field->field }}" name="{{ $field->field }}"
                                                                class="form-control">
                                                            @if(App::getLocale() == 'en')
                                                                @foreach($field->options as $skey => $option)
                                                                    <option value="{{ $skey }}">{{ $option }}</option>
                                                                @endforeach
                                                            @else
                                                                @foreach($field->options_bn as $skey => $option)
                                                                    <option value="{{ $skey }}">{{ $option }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                    @error($field->field)
                                                    <small style="display: block; margin-top: 5px;"
                                                           class="form-text text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            @elseif($field->type == 'radio')
                                                <div class="form-group">
                                                    <label style="display: block;"
                                                           for="{{ $field->field }}">{{ App::getLocale() == 'en' ? $field->name : $field->name_bn }} {!! $field->star ? '<span style="color: red;">*</span>' : '' !!}</label>
                                                    @if(App::getLocale() == 'en')
                                                        @foreach($field->options as $rkey => $option)
                                                            <label class="radio-inline">
                                                                <input type="radio" name="{{ $field->field }}"
                                                                       value="{{ $rkey }}"> {{ $option }}
                                                            </label>
                                                            <br>
                                                        @endforeach
                                                    @else
                                                        @foreach($field->options_bn as $rkey => $option)
                                                            <label class="radio-inline">
                                                                <input type="radio" name="{{ $field->field }}"
                                                                       value="{{ $rkey }}"> {{ $option }}
                                                            </label>
                                                            <br>
                                                        @endforeach
                                                    @endif
                                                    @error($field->field)
                                                    <small style="display: block; margin-top: 5px;"
                                                           class="form-text text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            @else
                                                <div class="form-group">
                                                    @if($field->type == 'textarea')
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="{{ $field->field }}-addon"><i class="{{ $field->icon }}"></i></span>
                                                            </div>
                                                            <textarea id="{{ $field->field }}" name="{{ $field->field }}"
                                                                      class="form-control" cols="30"
                                                                      rows="5">{{ old($field->field) }}</textarea>
                                                        </div>
                                                    @elseif ($field->field == 'image')
                                                        <div class="wrap-custom-file" style="margin: 0 auto; margin-top: 10px;">
                                                            <input type="file" name="{{ $field->field }}"
                                                                   id="{{ $field->field }}" accept=".gif, .jpg, .png"/>
                                                            <label for="{{ $field->field }}"
                                                                   style="background-image: url({{ asset('image/avatar.jpg') }}); background-size: cover;">
                                                                <i class="icon-upload fa fa-plus-circle"></i>
                                                            </label>
                                                        </div>
                                                    @else
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="{{ $field->field }}-addon"><i class="{{ $field->icon }}"></i></span>
                                                            </div>
                                                            <input id="{{ $field->field }}" name="{{ $field->field }}"
                                                                   type="{{ $field->type }}" value="{{ old($field->field) }}"
                                                                   class="form-control"  aria-describedby="{{ $field->field }}-addon"
                                                                   placeholder="{{ App::getLocale() == 'en' ? $field->name : $field->name_bn }}">
                                                        </div>
                                                    @endif
                                                    @error($field->field)
                                                    <small class="form-text text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                </section>
                            </div>
                        @endforeach
                    </div>
                    <div class="wizard-footer">
                        <div class="row">
                            <div class="col">
                                <input type='button' style="color: #FFFFFF; margin-right: 10px;" class='btn btn-previous btn-primary btn-wd pull-left' name='previous' value='{{ App::getLocale() == 'en' ? 'Go to previous page' : 'পূর্ববর্তী পেইজে যান'  }}' />
                                <input type='button' style="color: #FFFFFF" class='btn btn-next btn-fill btn-primary btn-wd pull-left' name='next' value='{{ App::getLocale() == 'en' ? 'Go to next page' : 'পরবর্তী পেইজে যান'  }}' />
                            </div>
                            <div class="col">
                                <input type='submit' style="color: #FFFFFF; float: right;" class='btn btn-finish btn-fill btn-success btn-wd pull-right' name='finish' value='{{ App::getLocale() == 'en' ? 'Submit' : 'সাবমিট করুন'  }}' />
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.css"/>
    <style>
        .wrap-custom-file {
            position: relative;
            display: inline-block;
            width: 150px;
            height: 150px;
            margin: 0 0.5rem 1rem;
            text-align: center;
        }
        .wrap-custom-file input[type="file"] {
            position: absolute;
            top: 0;
            left: 0;
            width: 2px;
            height: 2px;
            overflow: hidden;
            opacity: 0;
        }
        .wrap-custom-file label {
            z-index: 1;
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            right: 0;
            width: 100%;
            overflow: hidden;
            padding: 0 0.5rem;
            cursor: pointer;
            background-color: #fff;
            border-radius: 4px;
            transition: -webkit-transform 0.4s;
            transition: transform 0.4s;
            transition: transform 0.4s, -webkit-transform 0.4s;
        }
        .wrap-custom-file label span {
            display: block;
            margin-top: 2rem;
            font-size: 1.4rem;
            color: #777;
            transition: color 0.4s;
        }
        .wrap-custom-file label .fa {
            position: absolute;
            bottom: 1rem;
            left: 50%;
            -webkit-transform: translatex(-50%);
            transform: translatex(-50%);
            font-size: 1.5rem;
            color: lightcoral;
            transition: color 0.4s;
        }
        .wrap-custom-file label:hover span,
        .wrap-custom-file label:hover .fa {
            color: #333;
        }
        .wrap-custom-file label.file-ok {
            background-size: cover;
            background-position: center;
        }
        .wrap-custom-file label.file-ok span {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 0.3rem;
            font-size: 1.1rem;
            color: #000;
            background-color: rgba(255, 255, 255, 0.7);
        }
        .wrap-custom-file label.file-ok .fa {
            display: none;
        }
    </style>
@stop

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.js"></script>
    @if(Session::has('success'))
        <script>
            Swal.fire(
                'Success!',
                '{{ Session::get('success ') }}',
                'success'
            )
        </script>
    @endif
    @if(Session::has('error'))
        <script>
            Swal.fire(
                'Error!',
                '{{ Session::get('error ') }}',
                'danger'
            )
        </script>
    @endif
    <script src="{{ asset('js/registration.js') }}"></script>
    @if(auth()->user()->type == 3 || auth()->user()->type == 4)
    <script>
        @if(auth()->user()->geo_division_id)
            getDistrictList("?division={{ \App\Models\GeoDivision::find(auth()->user()->geo_division_id)->id }}");
        @endif
        @if(auth()->user()->geo_district_id)
            getUpazilaList("?district={{ \App\Models\GeoDistrict::find(auth()->user()->geo_district_id)->id }}");
        @endif
        @if(auth()->user()->geo_upazila_id)
            getUnionList("?upazila={{ \App\Models\GeoUpazila::find(auth()->user()->geo_upazila_id)->id }}");
        @endif
        $(function() {
            @if(auth()->user()->geo_division_id)
                $('#geo_division_id').val("{{ \App\Models\GeoDivision::find(auth()->user()->geo_division_id)->id }}");
            @endif
            @if(auth()->user()->geo_district_id)
                $('#geo_district_id').val("{{ \App\Models\GeoDistrict::find(auth()->user()->geo_district_id)->id }}");
                $('#district_code').val("{{ \App\Models\GeoDistrict::find(auth()->user()->geo_district_id)->code }}");
            @endif
            @if(auth()->user()->geo_upazila_id)
                $('#geo_upazila_id').val("{{ \App\Models\GeoUpazila::find(auth()->user()->geo_upazila_id)->id }}");
            @endif
        });
    </script>
    @endif
@stop
