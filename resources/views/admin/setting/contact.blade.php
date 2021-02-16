@extends('layouts.app')

@section('site_title', 'Contact')

@section('page_title')
    <div class="app-title">
        <div>
            <h1>Contact</h1>
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
            Contact Form
        </div>
        <div class="tile-body" style="padding: 40px;">
            <div class="row">
                <div class="col-md-8 offset-md-2 mt-3">
                    <form v-on:submit.prevent="submitForm()" id="create_form">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span v-bind:style="{ width: prependWidth + 'px' }" class="input-group-text">Primary email</span>
                                    </div>
                                    <input v-model="formData.primary_email" id="primary_email" name="primary_email" type="text" placeholder="Enter primary email" class="form-control">
                                </div>
                                <label v-if="errors.primary_email" class="help-block text-danger" style="margin-top: 3px; margin-bottom: 0; padding: 0;">
                                    @{{ errors.primary_email[0] }}
                                </label>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span v-bind:style="{ width: prependWidth + 'px' }" class="input-group-text">Secondary email</span>
                                    </div>
                                    <input v-model="formData.secondary_email" id="secondary_email" name="secondary_email" type="text" placeholder="Enter secondary email" class="form-control">
                                </div>
                                <label v-if="errors.secondary_email" class="help-block text-danger" style="margin-top: 3px; margin-bottom: 0; padding: 0;">
                                    @{{ errors.secondary_email[0] }}
                                </label>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span v-bind:style="{ width: prependWidth + 'px' }" class="input-group-text">Primary phone</span>
                                    </div>
                                    <input v-model="formData.primary_phone" id="primary_phone" name="primary_phone" type="text" placeholder="Enter primary phone" class="form-control">
                                </div>
                                <label v-if="errors.primary_phone" class="help-block text-danger" style="margin-top: 3px; margin-bottom: 0; padding: 0;">
                                    @{{ errors.primary_phone[0] }}
                                </label>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span v-bind:style="{ width: prependWidth + 'px' }" class="input-group-text">Secondary phone</span>
                                    </div>
                                    <input v-model="formData.secondary_phone" id="secondary_phone" name="secondary_phone" type="text" placeholder="Enter secondary phone" class="form-control">
                                </div>
                                <label v-if="errors.secondary_phone" class="help-block text-danger" style="margin-top: 3px; margin-bottom: 0; padding: 0;">
                                    @{{ errors.secondary_phone[0] }}
                                </label>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span v-bind:style="{ width: prependWidth + 'px' }" class="input-group-text">Primary tel</span>
                                    </div>
                                    <input v-model="formData.primary_tel" id="primary_tel" name="primary_tel" type="text" placeholder="Enter primary tel" class="form-control">
                                </div>
                                <label v-if="errors.primary_tel" class="help-block text-danger" style="margin-top: 3px; margin-bottom: 0; padding: 0;">
                                    @{{ errors.primary_tel[0] }}
                                </label>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span v-bind:style="{ width: prependWidth + 'px' }" class="input-group-text">Secondary tel</span>
                                    </div>
                                    <input v-model="formData.secondary_tel" id="secondary_tel" name="secondary_tel" type="text" placeholder="Enter secondary tel" class="form-control">
                                </div>
                                <label v-if="errors.secondary_tel" class="help-block text-danger" style="margin-top: 3px; margin-bottom: 0; padding: 0;">
                                    @{{ errors.secondary_tel[0] }}
                                </label>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span v-bind:style="{ width: prependWidth + 'px' }" class="input-group-text">Primary fax</span>
                                    </div>
                                    <input v-model="formData.primary_fax" id="primary_fax" name="primary_fax" type="text" placeholder="Enter primary fax" class="form-control">
                                </div>
                                <label v-if="errors.primary_fax" class="help-block text-danger" style="margin-top: 3px; margin-bottom: 0; padding: 0;">
                                    @{{ errors.primary_fax[0] }}
                                </label>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span v-bind:style="{ width: prependWidth + 'px' }" class="input-group-text">Secondary fax</span>
                                    </div>
                                    <input v-model="formData.secondary_fax" id="secondary_fax" name="secondary_fax" type="text" placeholder="Enter secondary fax" class="form-control">
                                </div>
                                <label v-if="errors.secondary_fax" class="help-block text-danger" style="margin-top: 3px; margin-bottom: 0; padding: 0;">
                                    @{{ errors.secondary_fax[0] }}
                                </label>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span v-bind:style="{ width: prependWidth + 'px' }" class="input-group-text">P.O.</span>
                                    </div>
                                    <input v-model="formData.po" id="po" name="po" type="text" placeholder="Enter P.O. fax" class="form-control">
                                </div>
                                <label v-if="errors.po" class="help-block text-danger" style="margin-top: 3px; margin-bottom: 0; padding: 0;">
                                    @{{ errors.po[0] }}
                                </label>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span v-bind:style="{ width: prependWidth + 'px' }" class="input-group-text">Address</span>
                                    </div>
                                    <input v-model="formData.address" id="address" name="address" type="text" placeholder="Enter address" class="form-control">
                                </div>
                                <label v-if="errors.address" class="help-block text-danger" style="margin-top: 3px; margin-bottom: 0; padding: 0;">
                                    @{{ errors.address[0] }}
                                </label>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span v-bind:style="{ width: prependWidth + 'px' }" class="input-group-text">Map Url</span>
                                    </div>
                                    <input v-model="formData.map_url" id="map_url" name="map_url" type="text" placeholder="Enter map url" class="form-control">
                                </div>
                                <label v-if="errors.map_url" class="help-block text-danger" style="margin-top: 3px; margin-bottom: 0; padding: 0;">
                                    @{{ errors.map_url[0] }}
                                </label>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span v-bind:style="{ width: prependWidth + 'px' }" class="input-group-text">Working hours</span>
                                    </div>
                                    <input v-model="formData.working_hours" id="working_hours" name="working_hours" type="text" placeholder="Enter working hours" class="form-control">
                                </div>
                                <label v-if="errors.working_hours" class="help-block text-danger" style="margin-top: 3px; margin-bottom: 0; padding: 0;">
                                    @{{ errors.working_hours[0] }}
                                </label>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span v-bind:style="{ width: prependWidth + 'px' }" class="input-group-text">Working days</span>
                                    </div>
                                    <input v-model="formData.working_days" id="working_days" name="working_days" type="text" placeholder="Enter working days" class="form-control">
                                </div>
                                <label v-if="errors.working_days" class="help-block text-danger" style="margin-top: 3px; margin-bottom: 0; padding: 0;">
                                    @{{ errors.working_days[0] }}
                                </label>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span v-bind:style="{ width: prependWidth + 'px' }" class="input-group-text">Facebook</span>
                                    </div>
                                    <input v-model="formData.facebook" id="facebook" name="facebook" type="text" placeholder="Enter facebook" class="form-control">
                                </div>
                                <label v-if="errors.facebook" class="help-block text-danger" style="margin-top: 3px; margin-bottom: 0; padding: 0;">
                                    @{{ errors.facebook[0] }}
                                </label>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span v-bind:style="{ width: prependWidth + 'px' }" class="input-group-text">Twitter</span>
                                    </div>
                                    <input v-model="formData.twitter" id="twitter" name="twitter" type="text" placeholder="Enter twitter" class="form-control">
                                </div>
                                <label v-if="errors.twitter" class="help-block text-danger" style="margin-top: 3px; margin-bottom: 0; padding: 0;">
                                    @{{ errors.twitter[0] }}
                                </label>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span v-bind:style="{ width: prependWidth + 'px' }" class="input-group-text">Google plus</span>
                                    </div>
                                    <input v-model="formData.google_plus" id="google_plus" name="google_plus" type="text" placeholder="Enter google plus" class="form-control">
                                </div>
                                <label v-if="errors.google_plus" class="help-block text-danger" style="margin-top: 3px; margin-bottom: 0; padding: 0;">
                                    @{{ errors.google_plus[0] }}
                                </label>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span v-bind:style="{ width: prependWidth + 'px' }" class="input-group-text">Linkedin</span>
                                    </div>
                                    <input v-model="formData.linkedin" id="linkedin" name="linkedin" type="text" placeholder="Enter linkedin" class="form-control">
                                </div>
                                <label v-if="errors.linkedin" class="help-block text-danger" style="margin-top: 3px; margin-bottom: 0; padding: 0;">
                                    @{{ errors.linkedin[0] }}
                                </label>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span v-bind:style="{ width: prependWidth + 'px' }" class="input-group-text">Skype</span>
                                    </div>
                                    <input v-model="formData.skype" id="skype" name="skype" type="text" placeholder="Enter skype" class="form-control">
                                </div>
                                <label v-if="errors.skype" class="help-block text-danger" style="margin-top: 3px; margin-bottom: 0; padding: 0;">
                                    @{{ errors.skype[0] }}
                                </label>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span v-bind:style="{ width: prependWidth + 'px' }" class="input-group-text">Youtube</span>
                                    </div>
                                    <input v-model="formData.youtube" id="youtube" name="youtube" type="text" placeholder="Enter youtube" class="form-control">
                                </div>
                                <label v-if="errors.youtube" class="help-block text-danger" style="margin-top: 3px; margin-bottom: 0; padding: 0;">
                                    @{{ errors.youtube[0] }}
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
                    primary_email: '',
                    secondary_email: '',
                    primary_phone: '',
                    secondary_phone: '',
                    primary_tel: '',
                    secondary_tel: '',
                    primary_fax: '',
                    secondary_fax: '',
                    po: '',
                    address: '',
                    map_url: '',
                    working_hours: '',
                    working_days: '',
                    facebook: '',
                    twitter: '',
                    google_plus: '',
                    linkedin: '',
                    skype: '',
                    youtube: ''
                },
                errors: {
                    id: '',
                    primary_email: '',
                    secondary_email: '',
                    primary_phone: '',
                    secondary_phone: '',
                    primary_tel: '',
                    secondary_tel: '',
                    primary_fax: '',
                    secondary_fax: '',
                    po: '',
                    address: '',
                    map_url: '',
                    working_hours: '',
                    working_days: '',
                    facebook: '',
                    twitter: '',
                    google_plus: '',
                    linkedin: '',
                    skype: '',
                    youtube: ''
                }
            },
            mounted: function () {

                // axios service
                this.service = axios.create({
                    baseURL: ajax_url,
                    responseType: "json"
                });

                // get contact
                this.getContact();
            },
            methods: {
                // get contact data
                getContact: function() {

                    let vm = this;

                    // show loading
                    vm.loading = true;

                    // getting notice data
                    vm.service.get(`setting/contact`)
                        .then(function (response) {

                            // response
                            let res = response.data;

                            if (res.data != null)
                            {
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
                    vm.service.post('setting/contact', vm.formData)
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
