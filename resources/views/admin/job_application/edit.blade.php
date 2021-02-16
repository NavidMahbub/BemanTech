@extends('layouts.app')

@section('site_name', 'Job')

@section('page_name')
    <div class="app-name">
        <div>
            <h1>View Job</h1>
        </div>
        <a href="{{ route('admin.job.application.index') }}" class="btn btn-primary icon-btn text-white"><i class="fa fa-application"></i>View Job List</a>
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
            View Job
        </div>
        <div class="tile-body" style="padding: 40px;">
            <div class="row">
                <div class="col-md-8 offset-md-2 mt-3">
                    <form v-on:submit.prevent="submitForm()" id="create_form">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span v-bind:style="{ width: prependWidth + 'px' }" class="input-group-text">Job Title</span>
                                    </div>
                                    <input readonly v-model="formData.job.title" id="job" name="job" type="text" placeholder="Enter person name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span v-bind:style="{ width: prependWidth + 'px' }" class="input-group-text">Title</span>
                                    </div>
                                    <input readonly v-model="formData.name" id="name" name="name" type="text" placeholder="Enter name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span v-bind:style="{ width: prependWidth + 'px' }" class="input-group-text">Vacancy</span>
                                    </div>
                                    <input readonly v-model="formData.email" id="email" name="email" type="text" placeholder="Enter email" class="form-control">
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span v-bind:style="{ width: prependWidth + 'px' }" class="input-group-text">Salary</span>
                                    </div>
                                    <input readonly v-model="formData.address" id="address" name="address" type="text" placeholder="Enter address" class="form-control">
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span v-bind:style="{ width: prependWidth + 'px' }" class="input-group-text">Company Name</span>
                                    </div>
                                    <input readonly v-model="formData.contact_no" id="contact_no" name="contact_no" type="text" placeholder="Enter company name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span v-bind:style="{ width: prependWidth + 'px' }" class="input-group-text">Country</span>
                                    </div>
                                    <div class="form-control">
                                        <a :href="'/storage/' + formData.resume">@{{ formData.resume }}</a>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-md-12">
                                 <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                                 <a href="{{ route('admin.job.application.index') }}" class="btn btn-primary pull-right mr-2" type="button"><i class="fa fa-fw fa-lg fa-arrow-circle-left"></i>Cancel</a>
                             </div>--}}
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
                dataId: '{{ $dataId }}',
                formData: {
                    name: '',
                    email: '',
                    address: '',
                    contact_no: '',
                    resume: '',
                    job_id: ''
                },
                errors: {
                    name: '',
                    email: '',
                    address: '',
                    contact_no: '',
                    resume: '',
                    job_id: ''
                }
            },
            mounted: function () {

                // axios service
                this.service = axios.create({
                    baseURL: ajax_url,
                    responseType: "json"
                });

                // get job data
                this.getJob(this.dataId);

            },
            methods: {
                // get job data
                getJob: function(id) {

                    let vm = this;

                    // show loading
                    vm.loading = true;

                    // getting job data
                    vm.service.get(`job/application/${id}`)
                        .then(function (response) {

                            // response
                            let res = response.data;
                            vm.formData = res.data;

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

                    // storing job data
                    vm.service.put(`job/application/${vm.dataId}`, vm.formData)
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
