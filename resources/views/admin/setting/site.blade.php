@extends('layouts.app')

@section('site_title', 'Site')

@section('page_title')
    <div class="app-title">
        <div>
            <h1>Site</h1>
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
            Site Form
        </div>
        <div class="tile-body" style="padding: 40px;">
            <div class="row">
                <div class="col-md-8 offset-md-2 mt-3">
                    <form v-on:submit.prevent="submitForm()" id="create_form">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span v-bind:style="{ width: prependWidth + 'px' }" class="input-group-text">Image</span>
                                    </div>
                                    <input v-model="formData.logo" id="logo" name="logo" type="text" placeholder="Enter logo" class="form-control" disabled>
                                    <div class="input-group-append">
                                        <a v-on:click="openPopup('{{ asset('admin/plugins/filemanager/dialog.php') }}?type=0&popup=1&field_id=logo')" class="btn btn-outline-secondary" type="button">Browse</a>
                                    </div>
                                </div>
                                <label v-if="errors.logo" class="help-block text-danger" style="margin-top: 3px; margin-bottom: 0; padding: 0;">
                                    @{{ errors.logo[0] }}
                                </label>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span v-bind:style="{ width: prependWidth + 'px' }" class="input-group-text">Registration no</span>
                                    </div>
                                    <input v-model="formData.license_no" id="license_no" name="license_no" type="text" placeholder="Enter registration no" class="form-control">
                                </div>
                                <label v-if="errors.license_no" class="help-block text-danger" style="margin-top: 3px; margin-bottom: 0; padding: 0;">
                                    @{{ errors.license_no[0] }}
                                </label>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span v-bind:style="{ width: prependWidth + 'px' }" class="input-group-text">Primary phone</span>
                                    </div>
                                    <input v-model="formData.registration_no" id="registration_no" name="registration_no" type="text" placeholder="Enter primary phone" class="form-control">
                                </div>
                                <label v-if="errors.registration_no" class="help-block text-danger" style="margin-top: 3px; margin-bottom: 0; padding: 0;">
                                    @{{ errors.registration_no[0] }}
                                </label>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span v-bind:style="{ width: prependWidth + 'px' }" class="input-group-text">Copyright text</span>
                                    </div>
                                    <input v-model="formData.copyright_text" id="copyright_text" name="copyright_text" type="text" placeholder="Enter copyright text" class="form-control">
                                </div>
                                <label v-if="errors.copyright_text" class="help-block text-danger" style="margin-top: 3px; margin-bottom: 0; padding: 0;">
                                    @{{ errors.copyright_text[0] }}
                                </label>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span v-bind:style="{ width: prependWidth + 'px' }" class="input-group-text">Brochure</span>
                                    </div>
                                    <input v-model="formData.brochure" id="brochure" name="brochure" type="text" placeholder="Enter brochure" class="form-control">
                                </div>
                                <label v-if="errors.brochure" class="help-block text-danger" style="margin-top: 3px; margin-bottom: 0; padding: 0;">
                                    @{{ errors.brochure[0] }}
                                </label>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span v-bind:style="{ width: prependWidth + 'px' }" class="input-group-text">Twitter feed api</span>
                                    </div>
                                    <input v-model="formData.twitter_feed" id="twitter_feed" name="twitter_feed" type="text" placeholder="Enter twitter feed api" class="form-control">
                                </div>
                                <label v-if="errors.twitter_feed" class="help-block text-danger" style="margin-top: 3px; margin-bottom: 0; padding: 0;">
                                    @{{ errors.twitter_feed[0] }}
                                </label>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span v-bind:style="{ width: prependWidth + 'px' }" class="input-group-text">Facebook Likebox</span>
                                    </div>
                                    <input v-model="formData.facebook_likebox" id="facebook_likebox" name="facebook_likebox" type="text" placeholder="Enter facebook likebox" class="form-control">
                                </div>
                                <label v-if="errors.facebook_likebox" class="help-block text-danger" style="margin-top: 3px; margin-bottom: 0; padding: 0;">
                                    @{{ errors.facebook_likebox[0] }}
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
        var vueApp = new Vue({
            el: '#app',
            data: {
                loading: false,
                service: '',
                prependWidth: 150,
                formData: {
                    logo: '',
                    license_no: '',
                    registration_no: '',
                    copyright_text: '',
                    brochure: '',
                    twitter_feed: '',
                    facebook_likebox: ''
                },
                errors: {
                    logo: '',
                    license_no: '',
                    registration_no: '',
                    copyright_text: '',
                    brochure: '',
                    twitter_feed: '',
                    facebook_likebox: '',
                    secondary_fax: ''
                }
            },
            mounted: function () {

                // axios service
                this.service = axios.create({
                    baseURL: ajax_url,
                    responseType: "json"
                });

                // get site
                this.getSite();
            },
            methods: {
                // get site data
                getSite: function() {

                    let vm = this;

                    // show loading
                    vm.loading = true;

                    // getting site data
                    vm.service.get(`setting/site`)
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

                    // get logo url
                    vm.formData.logo = $('#logo').val();

                    // storing site data
                    vm.service.post('setting/site', vm.formData)
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

                },
                openPopup: function (url) {
                    var w = 880;
                    var h = 570;
                    var l = Math.floor((screen.width-w)/2);
                    var t = Math.floor((screen.height-h)/2);
                    var win = window.open(url, 'ResponsiveFilemanager', "scrollbars=1,width=" + w + ",height=" + h + ",top=" + t + ",left=" + l);
                }
            }
        })
    </script>
@endsection
