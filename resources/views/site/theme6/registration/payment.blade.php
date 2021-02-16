@extends('site.' . config('cms.theme') . '.layout.master')

@section('title', config('cms.site'))

@section('content')


    <div class="container" style="margin: 40px auto;">
        <div class="bksp_form">
            <div class="bksp_form_inner">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h3 style="margin: 0">Complete Payment</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="blog-area ptb-80">
                            <div style="padding: 20px 40px 60px 40px;">
                                <div class="row">
                                    <div class="col-md-12">
                                        {!! Form::open(['url' => route('site.registration.payment.store'), 'method' => 'post']) !!}
                                        <input type="hidden" name="code" value="{{ request()->get("code") }}">
                                        <button class="btn btn-link" type="submit" title="SSLCommerz" alt="SSLCommerz">
                                            <img style="width:100%;height:auto;" src="https://securepay.sslcommerz.com/public/image/SSLCommerz-Pay-With-logo-All-Size-01.png" />
                                        </button>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('style')
    <style>
        #bkash_pay {
            box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
            transition: all 0.3s cubic-bezier(.25,.8,.25,1);
        }
        #bkash_pay:hover {
            box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
            transition: all 0.3s cubic-bezier(.25,.8,.25,1);
            cursor: pointer;
        }
    </style>
@stop

@section('script')
    @if(Session::has('error'))
        <script>
            Swal.fire(
                'Error!',
                '{{ Session::get('error') }}',
                'error'
            )
        </script>
    @endif
    <script src="{{ asset('js/registration.js') }}"></script>
@stop