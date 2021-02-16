@extends('site.' . config('cms.theme') . '.layout.master')

@section('title', config('cms.site'))

@section('content')
    <div class="container" style="margin-top: 40px !important;">
        <div class="row" style="margin-bottom: 30px;">
            <div class="col-md-12 text-center">
                <h3>{{ App::getLocale() == 'en' ? 'Online Registration' : 'অনলাইন রেজিস্ট্রেশন' }}</h3>
            </div>
        </div>
        <div class="row" style="margin-bottom: 30px;">
            <div class="col-md-12">
                <div class="site-navbar-wrap" style="padding: 50px;">
                    <div class="wizard-container">
                        <div class="wizard-card" data-color="orange" id="wizardProfile">
                            {!! Form::open(['url' => route('site.registration.store'), 'method' => 'POST', 'files' => true, 'id' => 'wizardForm']) !!}
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
                                        <input type='button' style="color: #FFFFFF" class='btn btn-previous btn-primary btn-wd pull-left' name='previous' value='{{ App::getLocale() == 'en' ? 'Go to previous page' : 'পূর্ববর্তী পেইজে যান'  }}' />
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
        </div>
    </div>
@stop

@section('style')

@stop

@section('script')
    @if(Session::has('success'))
        <script>
            Swal.fire(
                'Success!',
                '{{ Session::get('success') }}',
                'success'
            )
        </script>
    @endif
    @if(Session::has('error'))
        <script>
            Swal.fire(
                'Error!',
                '{{ Session::get('error') }}',
                'error'
            )
        </script>
    @endif
@stop
