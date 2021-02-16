@extends('layouts.app')

@section('site_title', 'User')

@section('page_title')
    <div class="app-title">
        <div>
            <h1>Create User</h1>
        </div>
        <a href="{{ route('admin.user.index') }}" class="btn btn-primary icon-btn text-white"><i class="fa fa-list"></i>View User List</a>
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
            Create User Form
        </div>
        <div class="tile-body" style="padding: 40px;">
            <div class="row">
                <div class="col-md-8 offset-md-2 mt-3">
                    <form v-on:submit.prevent="submitForm()" id="create_form">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span v-bind:style="{ width: prependWidth + 'px' }" class="input-group-text">Type</span>
                                    </div>
                                    <select v-model="formData.type" id="type" name="type" class="form-control">
                                        <option value="">Select Type</option>
                                        <option value="2">Accountant</option>
                                        <option value="3">Field Admin</option>
                                        <option value="4">Data Entry</option>
                                    </select>
                                </div>
                                <label v-if="errors.type" class="help-block text-danger" style="margin-top: 3px; margin-bottom: 0; padding: 0;">
                                    @{{ errors.type[0] }}
                                </label>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span v-bind:style="{ width: prependWidth + 'px' }" class="input-group-text">Name</span>
                                    </div>
                                    <input v-model="formData.name" id="name" name="name" type="text" placeholder="Enter name" class="form-control">
                                </div>
                                <label v-if="errors.name" class="help-block text-danger" style="margin-top: 3px; margin-bottom: 0; padding: 0;">
                                    @{{ errors.name[0] }}
                                </label>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span v-bind:style="{ width: prependWidth + 'px' }" class="input-group-text">Email</span>
                                    </div>
                                    <input v-model="formData.email" id="email" name="email" type="text" placeholder="Enter email" class="form-control">
                                </div>
                                <label v-if="errors.email" class="help-block text-danger" style="margin-top: 3px; margin-bottom: 0; padding: 0;">
                                    @{{ errors.email[0] }}
                                </label>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span v-bind:style="{ width: prependWidth + 'px' }" class="input-group-text">Phone</span>
                                    </div>
                                    <input v-model="formData.phone" id="phone" name="phone" type="text" placeholder="Enter phone" class="form-control">
                                </div>
                                <label v-if="errors.phone" class="help-block text-danger" style="margin-top: 3px; margin-bottom: 0; padding: 0;">
                                    @{{ errors.phone[0] }}
                                </label>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span v-bind:style="{ width: prependWidth + 'px' }" class="input-group-text">Password</span>
                                    </div>
                                    <input v-model="formData.password" id="password" name="password" type="text" placeholder="Enter password" class="form-control">
                                </div>
                                <label v-if="errors.password" class="help-block text-danger" style="margin-top: 3px; margin-bottom: 0; padding: 0;">
                                    @{{ errors.password[0] }}
                                </label>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span v-bind:style="{ width: prependWidth + 'px' }" class="input-group-text">Division</span>
                                    </div>
                                    <select v-model="formData.geo_division_id" id="geo_division_id" name="geo_division_id" class="form-control"></select>
                                </div>
                                <label v-if="errors.geo_division_id" class="help-block text-danger" style="margin-top: 3px; margin-bottom: 0; padding: 0;">
                                    @{{ errors.geo_division_id[0] }}
                                </label>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span v-bind:style="{ width: prependWidth + 'px' }" class="input-group-text">District</span>
                                    </div>
                                    <select v-model="formData.geo_district_id" id="geo_district_id" name="geo_district_id" class="form-control"></select>
                                </div>
                                <label v-if="errors.geo_district_id" class="help-block text-danger" style="margin-top: 3px; margin-bottom: 0; padding: 0;">
                                    @{{ errors.geo_district_id[0] }}
                                </label>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span v-bind:style="{ width: prependWidth + 'px' }" class="input-group-text">Upazila</span>
                                    </div>
                                    <select v-model="formData.geo_upazila_id" id="geo_upazila_id" name="geo_upazila_id" class="form-control"></select>
                                </div>
                                <label v-if="errors.geo_upazila_id" class="help-block text-danger" style="margin-top: 3px; margin-bottom: 0; padding: 0;">
                                    @{{ errors.geo_upazila_id[0] }}
                                </label>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span v-bind:style="{ width: prependWidth + 'px' }" class="input-group-text">Union</span>
                                    </div>
                                    <select v-model="formData.geo_union_id" id="geo_union_id" name="geo_union_id" class="form-control"></select>
                                </div>
                                <label v-if="errors.geo_union_id" class="help-block text-danger" style="margin-top: 3px; margin-bottom: 0; padding: 0;">
                                    @{{ errors.geo_union_id[0] }}
                                </label>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                                <a href="{{ route('admin.user.index') }}" class="btn btn-primary pull-right mr-2" type="button"><i class="fa fa-fw fa-lg fa-arrow-circle-left"></i>Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('script')
    <script src="{{ asset('js/registration.js') }}"></script>
@stop

@section('vue_script')

    @include('partials._vue')

    <script type="text/javascript">
        var vueApp = new Vue({
            el: '#app',
            data: {
                loading: false,
                service: '',
                prependWidth: 150,
                formData: {
                    name: '',
                    email: '',
                    phone: '',
                    password: '',
                    type: '',
                    geo_division_id: '',
                    geo_district_id: '',
                    geo_upazila_id: '',
                    geo_union_id: '',
                    approved: 1
                },
                errors: {
                    name: '',
                    email: '',
                    phone: '',
                    password: '',
                    type: '',
                    geo_division_id: '',
                    geo_district_id: '',
                    geo_upazila_id: '',
                    geo_union_id: '',
                    approved: 1
                }
            },
            mounted: function () {

                // axios service
                this.service = axios.create({
                    baseURL: ajax_url,
                    responseType: "json"
                });

            },
            methods: {

                // submit form
                submitForm: function () {

                    let vm = this;

                    // show loading
                    vm.loading = true;

                    // storing user data
                    vm.service.post('user', vm.formData)
                        .then(function (response) {

                            // response
                            let res = response.data;

                            // clearing values
                            vm.clearObj(vm.formData);
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
