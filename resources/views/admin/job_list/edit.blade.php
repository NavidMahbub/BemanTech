@extends('layouts.app')

@section('site_title', 'Job')

@section('page_title')
    <div class="app-title">
        <div>
            <h1>Edit Job</h1>
        </div>
        <a href="{{ route('admin.job.list.index') }}" class="btn btn-primary icon-btn text-white"><i class="fa fa-list"></i>View Job List</a>
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
            Edit Job Form
        </div>
        <div class="tile-body" style="padding: 40px;">
            <div class="row">
                <div class="col-md-8 offset-md-2 mt-3">
                    <form v-on:submit.prevent="submitForm()" id="create_form">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span v-bind:style="{ width: prependWidth + 'px' }" class="input-group-text">Title</span>
                                    </div>
                                    <input v-model="formData.title" id="title" name="title" type="text" placeholder="Enter title" class="form-control">
                                </div>
                                <label v-if="errors.title" class="help-block text-danger" style="margin-top: 3px; margin-bottom: 0; padding: 0;">
                                    @{{ errors.title[0] }}
                                </label>
                            </div>
                            <div class="form-group col-md-12">
                                <textarea v-model="formData.description" id="description" name="description" type="text" class="form-control"></textarea>
                                <label v-if="errors.description" class="help-block text-danger" style="margin-top: 3px; margin-bottom: 0; padding: 0;">
                                    @{{ errors.description[0] }}
                                </label>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span v-bind:style="{ width: prependWidth + 'px' }" class="input-group-text">Vacancy</span>
                                    </div>
                                    <input v-model="formData.vacancy" id="vacancy" name="vacancy" type="text" placeholder="Enter vacancy" class="form-control">
                                </div>
                                <label v-if="errors.vacancy" class="help-block text-danger" style="margin-top: 3px; margin-bottom: 0; padding: 0;">
                                    @{{ errors.vacancy[0] }}
                                </label>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span v-bind:style="{ width: prependWidth + 'px' }" class="input-group-text">Salary</span>
                                    </div>
                                    <input v-model="formData.salary" id="salary" name="salary" type="text" placeholder="Enter salary" class="form-control">
                                </div>
                                <label v-if="errors.salary" class="help-block text-danger" style="margin-top: 3px; margin-bottom: 0; padding: 0;">
                                    @{{ errors.salary[0] }}
                                </label>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span v-bind:style="{ width: prependWidth + 'px' }" class="input-group-text">Company Name</span>
                                    </div>
                                    <input v-model="formData.company_name" id="company_name" name="company_name" type="text" placeholder="Enter company name" class="form-control">
                                </div>
                                <label v-if="errors.company_name" class="help-block text-danger" style="margin-top: 3px; margin-bottom: 0; padding: 0;">
                                    @{{ errors.company_name[0] }}
                                </label>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span v-bind:style="{ width: prependWidth + 'px' }" class="input-group-text">Country</span>
                                    </div>
                                    <input v-model="formData.country" id="country" name="country" type="text" placeholder="Enter country" class="form-control">
                                </div>
                                <label v-if="errors.country" class="help-block text-danger" style="margin-top: 3px; margin-bottom: 0; padding: 0;">
                                    @{{ errors.country[0] }}
                                </label>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span v-bind:style="{ width: prependWidth + 'px' }" class="input-group-text">Person Name</span>
                                    </div>
                                    <input v-model="formData.person_name" id="person_name" name="person_name" type="text" placeholder="Enter person name" class="form-control">
                                </div>
                                <label v-if="errors.person_name" class="help-block text-danger" style="margin-top: 3px; margin-bottom: 0; padding: 0;">
                                    @{{ errors.person_name[0] }}
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
                                        <span v-bind:style="{ width: prependWidth + 'px' }" class="input-group-text">Designation</span>
                                    </div>
                                    <input v-model="formData.designation" id="designation" name="designation" type="text" placeholder="Enter designation" class="form-control">
                                </div>
                                <label v-if="errors.designation" class="help-block text-danger" style="margin-top: 3px; margin-bottom: 0; padding: 0;">
                                    @{{ errors.designation[0] }}
                                </label>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span v-bind:style="{ width: prependWidth + 'px' }" class="input-group-text">Attachment</span>
                                    </div>
                                    <input v-model="formData.attachment" id="attachment" name="attachment" type="text" placeholder="Enter attachment" class="form-control" disabled>
                                    <div class="input-group-append">
                                        <a v-on:click="openPopup('{{ asset('admin/plugins/filemanager/dialog.php') }}?type=0&popup=1&field_id=attachment')" class="btn btn-outline-secondary" type="button">Browse</a>
                                    </div>
                                </div>
                                <label v-if="errors.attachment" class="help-block text-danger" style="margin-top: 3px; margin-bottom: 0; padding: 0;">
                                    @{{ errors.attachment[0] }}
                                </label>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span v-bind:style="{ width: prependWidth + 'px' }" class="input-group-text">Expiry Date</span>
                                    </div>
                                    <input v-model="formData.expiry_date" id="expiry_date" name="expiry_date" type="date" placeholder="Enter expiry_date" class="form-control">
                                </div>
                                <label v-if="errors.expiry_date" class="help-block text-danger" style="margin-top: 3px; margin-bottom: 0; padding: 0;">
                                    @{{ errors.expiry_date[0] }}
                                </label>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="animated-checkbox" style="margin-top: 5px;">
                                    <label>
                                        <input v-model="formData.status" id="status" name="status" type="checkbox"><span class="label-text">Active</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                                <a href="{{ route('admin.job.list.index') }}" class="btn btn-primary pull-right mr-2" type="button"><i class="fa fa-fw fa-lg fa-arrow-circle-left"></i>Cancel</a>
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
                dataId: '{{ $dataId }}',
                formData: {
                    title: '',
                    description: '',
                    vacancy: '',
                    salary: '',
                    company_name: '',
                    country: '',
                    person_name: '',
                    email: '',
                    designation: '',
                    attachment: '',
                    expiry_date: '',
                    type: 0,
                    status: 1
                },
                errors: {
                    title: '',
                    description: '',
                    vacancy: '',
                    salary: '',
                    company_name: '',
                    country: '',
                    person_name: '',
                    email: '',
                    designation: '',
                    attachment: '',
                    expiry_date: '',
                    type: 0,
                    status: 1
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
                    vm.service.get(`job/list/${id}`)
                        .then(function (response) {

                            // response
                            let res = response.data;
                            vm.formData = res.data;

                            // set description data
                            $('#description').val(vm.formData.description);

                            // set status
                            vm.formData.status = vm.formData.status == 1 ? true : false;

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

                    // get status
                    vm.formData.status = vm.formData.status == true ? 1 : 0;

                    // get body from editor
                    vm.formData.description = window.tinyMCE.get('description').getContent();

                    // get attachment url
                    vm.formData.attachment = $('#attachment').val();

                    // show loading
                    vm.loading = true;

                    // storing job data
                    vm.service.put(`job/list/${vm.dataId}`, vm.formData)
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
