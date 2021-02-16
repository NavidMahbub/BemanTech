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
            @foreach($form_groups as $form_group)
                <h5 style="{{ $form_group->title ? 'text-align: left; background: #19aaf8; color: #fff; padding: 15px 10px;' : '' }}">{{ App::getLocale() == 'en' ? $form_group->title : $form_group->title_bn }}</h5>
                <div class="row">
                    @foreach($form_group->fields as $field)
                        @if($field->type == 'select')
                            <div class="{{ $field->grid }}">
                                <div class="form-group">
                                    <label style="display: block; font-weight: 700;" for="{{ $field->field }}">{{ $field->name }}</label>
                                    <div>
                                        {{ isset($form_data->{$field->field}) ? $form_data->{$field->field} : '' }}
                                    </div>
                                    @error($field->field)
                                    <small style="display: block; margin-top: 5px;" class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        @elseif($field->type == 'radio')
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label style="display: block; font-weight: 700;" for="{{ $field->field }}">{{ $field->name }}</label>
                                    <div>
                                        {{ isset($form_data->{$field->field}) ? $form_data->{$field->field} : '' }}
                                    </div>
                                    @error($field->field)
                                    <small style="display: block; margin-top: 5px;" class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        @else
                            <div class="{{ $field->grid }}">
                                <div class="form-group">
                                    @if($field->type == 'textarea')
                                        <label style="display: block; font-weight: 700;" for="{{ $field->field }}">{{ $field->name }}</label>
                                        <div>
                                            {{ isset($form_data->{$field->field}) ? $form_data->{$field->field} : '' }}
                                        </div>
                                    @elseif ($field->field == 'image')
                                        <div>
                                            <img style="height: 200px; width: 200px" src="{{ url('storage/' . $form_data->{$field->field}) }}">
                                        </div>
                                    @else
                                        <label style="display: block; font-weight: 700;" for="{{ $field->field }}">{{ $field->name }}</label>
                                        <div>
                                            {{ isset($form_data->{$field->field}) ? $form_data->{$field->field} : '' }}
                                        </div>
                                    @endif
                                    @error($field->field)
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endforeach
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
                '{{ Session::get('
        success ') }}',
                'success'
            )
        </script>
    @endif
    <script src="{{ asset('js/registration.js') }}"></script>
@stop
