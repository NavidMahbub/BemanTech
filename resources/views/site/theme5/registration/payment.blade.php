@extends('site.' . config('cms.theme') . '.layout.master')

@section('title', config('cms.site'))

@section('content')


    <div class="container" style="margin: 40px auto;">
        <div class="bksp_form">
            <div class="bksp_form_inner">
                <div class="row">
                    <div class="col-sm-12" style="margin-top: 20px; text-align: center;">
                        <div style="width: 760px; margin: 0 auto;" class="text-center">
                            <h1><img style="margin-right: 275px; height: 90px; width: 220px;" class="logo form_logo" src="{{ $setting_site->logo }}" alt="LOGO"></h1>
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <h3 style="margin: 0">Payment Form</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="blog-area ptb-80">
                            <div style="padding: 20px 40px 60px 40px;">
                               <div class="row">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4 col-sm-12">
                                        <a id="bKash_button">
                                            <img id="bkash_pay" style="width: 100%;" src="{{ asset('image/baksh_payment.png') }}" alt="">
                                        </a>
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
    <script src="{{ asset('js/registration.js') }}"></script>
    <script src="https://scripts.sandbox.bka.sh/versions/1.2.0-beta/checkout/bKash-checkout-sandbox.js"></script>
    <script>
        var paymentID = '';
        bKash.init({
            paymentMode: 'checkout',
            paymentRequest: {
                amount: '100.50',
                intent: 'sale',
                code: '{{ request()->get("code") }}',
            },
            createRequest: function(request) {
                $.ajax({
                    url: '{{ route('site.registration.payment.create') }}',
                    type: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify(request),
                    success: function(data) {
                        if (data && data.paymentID != null) {
                            paymentID = data.paymentID;
                            bKash.create().onSuccess(data);
                        } else {
                            bKash.create().onError();
                        }
                    },
                    error: function() {
                        bKash.create().onError();
                    }
                });
            },
            executeRequestOnAuthorization: function() {
                $.ajax({
                    url: '{{ route("site.registration.payment.store") }}',
                    type: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify({
                        amount: '100.50',
                        code: '{{ request()->get("code") }}',
                        "paymentID": paymentID
                    }),
                    success: function(data) {
                        if (data && data.paymentID != null) {
                            window.location.href = '/registration/successful';
                        } else {
                            bKash.execute().onError();
                        }
                    },
                    error: function() {
                        bKash.execute().onError();
                    }
                });
            }
        });
    </script>
@stop
