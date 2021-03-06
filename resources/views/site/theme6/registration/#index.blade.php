@extends('site.' . config('cms.theme') . '.layout.master')

@section('title', config('cms.site'))

@section('content')
    <div class="container" style="margin-top: 40px !important;">
        <div class="row" style="margin-bottom: 30px;">
            <div class="col-md-12 text-center">
                <h3>ONLINE REGISTRATION FORM</h3>
            </div>
        </div>
        <div class="row" style="margin-bottom: 30px;">
            <div class="col-md-12">
                <div class="site-navbar-wrap" style="padding: 50px;">
                    {!! Form::open(['url' => route('site.registration.store'), 'method' => 'POST', 'files' => true, 'id' => 'wizardForm']) !!}
                    @foreach($form_groups as $form_group)
                        <h5 style="{{ $form_group->title ? 'text-align: left; background: #19aaf8; color: #fff; padding: 15px 10px;' : '' }}">{{ $form_group->title }}</h5>
                        <section class="row">
                            @foreach($form_group->fields as $field)
                                <div class="{{ $field->grid }}">
                                    @if($field->type == 'select')
                                        <div class="form-group">
                                            <label style="display: block;" for="{{ $field->field }}">{{ $field->name }} {!! $field->star ? '<span style="color: red;">*</span>' : '' !!} </label>
                                            <select id="{{ $field->field }}" name="{{ $field->field }}" class="form-control">
                                                <option selected>Select {{ $field->name }}</option>
                                                @foreach($field->options as $skey => $option)
                                                    <option>{{ $option }}</option>
                                                @endforeach
                                            </select>
                                            @error($field->field)
                                            <small style="display: block; margin-top: 5px;" class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    @elseif($field->type == 'radio')
                                        <div class="form-group">
                                            <label style="display: block;" for="{{ $field->field }}">{{ $field->name }} {!! $field->star ? '<span style="color: red;">*</span>' : '' !!}</label>
                                            @foreach($field->options as $rkey => $option)
                                                <label class="radio-inline">
                                                    <input type="radio" name="{{ $field->field }}" value="{{ $option }}"> {{ $option }}
                                                </label>
                                                <br>
                                            @endforeach
                                            @error($field->field)
                                            <small style="display: block; margin-top: 5px;" class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    @else
                                        <div class="form-group">
                                            @if($field->type == 'textarea')
                                                <label for="{{ $field->field }}">{{ $field->name }} {!! $field->star ? '<span style="color: red;">*</span>' : '' !!}</label>
                                                <textarea id="{{ $field->field }}" name="{{ $field->field }}" class="form-control" cols="30" rows="5">{{ old($field->field) }}</textarea>
                                            @elseif ($field->field == 'image')
                                                <div class="wrap-custom-file" style="margin: 0 auto; margin-top: 10px;">
                                                    <input type="file" name="{{ $field->field }}" id="{{ $field->field }}" accept=".gif, .jpg, .png" />
                                                    <label for="{{ $field->field }}" style="background-image: url({{ asset('image/avatar.jpg') }}); background-size: cover;">
                                                        <i class="fa fa-plus-circle"></i>
                                                    </label>
                                                </div>
                                            @else
                                                <label for="{{ $field->field }}">{{ $field->name }} {!! $field->star ? '<span style="color: red;">*</span>' : '' !!}</label>
                                                <input id="{{ $field->field }}" name="{{ $field->field }}" type="{{ $field->type }}" value="{{ old($field->field) }}" class="form-control" placeholder="{{ $field->name }}">
                                            @endif
                                            @error($field->field)
                                            <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </section>
                    @endforeach
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="p-3 bg-primary text-white btn btn-primary pull-right" style="float: right !important;">
                                Submit Application
                            </button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop

@section('style')
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