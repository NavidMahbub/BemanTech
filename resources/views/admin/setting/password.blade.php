@extends('layouts.app')

@section('site_title', 'Password Setting')

@section('page_title')
    <div class="app-title">
        <div>
            <h1>Password Setting</h1>
        </div>
    </div>
@stop

@section('page_content')
    <div class="tile card" style="margin: 0; padding: 0">
        <div v-if="loading" class="overlay" style="z-index: 2">
            <div class="m-loader mr-4">
                <svg class="m-circular" viewBox="25 25 50 50">
                    <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="4"
                            stroke-miterlimit="10"></circle>
                </svg>
            </div>
        </div>
        <div class="card-header">
            Password Setting Form
        </div>
        <div class="tile-body" style="padding: 40px;">
            <div class="row">
                <div class="col-md-8 offset-md-2 mt-3">
                    <form v-on:submit.prevent="submitForm()" id="create_form">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span v-bind:style="{ width: prependWidth + 'px' }" class="input-group-text">Password</span>
                                    </div>
                                    <input v-model="formData.password" id="password" name="password" type="password" placeholder="Enter password" class="form-control">
                                </div>
                                <label v-if="errors.password" class="help-block text-danger" style="margin-top: 3px; margin-bottom: 0; padding: 0;">
                                    @{{ errors.password[0] }}
                                </label>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span v-bind:style="{ width: prependWidth + 'px' }" class="input-group-text">Confirm password</span>
                                    </div>
                                    <input v-model="formData.password_confirmation" id="password_confirmation" name="password_confirmation" type="password" placeholder="Confirm password" class="form-control">
                                </div>
                                <label v-if="errors.password_confirmation" class="help-block text-danger" style="margin-top: 3px; margin-bottom: 0; padding: 0;">
                                    @{{ errors.password_confirmation[0] }}
                                </label>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('vue_script')

    @include('partials._vue')

    <script type="text/javascript">
        new Vue({
            el: '#app',
            data: {
                loading: false,
                service: '',
                prependWidth: 150,
                formData: {
                    id: '',
                    password: '',
                    password_confirmation: ''
                },
                errors: {
                    id: '',
                    password: '',
                    password_confirmation: ''
                }
            },
            mounted: function () {
                // axios service
                this.service = axios.create({
                    baseURL: ajax_url,
                    responseType: "json"
                });
                // get contact
                // this.getPasswordSetting();
            },
            methods: {
                // get contact data
                getPasswordSetting: function() {
                    let vm = this;
                    // show loading
                    vm.loading = true;
                    // getting notice data
                    vm.service.get(`setting/profile`)
                        .then(function (response) {
                            // response
                            let res = response.data;
                            if (res.data != null) {
                                vm.formData = res.data;
                            }
                            // hide loading
                            vm.loading = false;
                        })
                        .catch(function (error) {
                            // error message
                            let message = error.response.data.message;
                            // hide loading
                            vm.loading = false;
                            // error notification
                            toastr.error(message);
                        });
                },
                // submit form
                submitForm: function () {
                    let vm = this;
                    // show loading
                    vm.loading = true;
                    // storing contact data
                    vm.service.post('setting/update-password', vm.formData)
                        .then(function (response) {
                            // response
                            let res = response.data;
                            // clearing values
                            vm.clearObj(vm.errors);
                            // hide loading
                            vm.loading = false;
                            // success notification
                            toastr.success(res.message);
                        })
                        .catch(function (error) {
                            // // errors
                            vm.errors = error.response.data.errors;
                            // error message
                            let message = error.response.data.message;
                            // hide loading
                            vm.loading = false;
                            // error notification
                            toastr.error(message);
                        });
                },
                clearObj: function (obj) {
                    Object.keys(obj).forEach(function (index) {
                        obj[index] = ''
                    });
                }
            }
        })
    </script>
@endsection
