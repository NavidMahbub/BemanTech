@extends('layouts.app')

@section('site_title', 'Content Category')

@section('page_title')
    <div class="app-title">
        <div>
            <h1>Create Content Category</h1>
        </div>
        <a href="{{ route('admin.content.category.index') }}" class="btn btn-primary icon-btn text-white"><i class="fa fa-list"></i>View Content Category List</a>
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
            Create Content Category Form
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
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span v-bind:style="{ width: prependWidth + 'px' }" class="input-group-text">Order</span>
                                    </div>
                                    <input v-model="formData.order" id="order" name="order" type="text" placeholder="Enter order" class="form-control">
                                </div>
                                <label v-if="errors.order" class="help-block text-danger" style="margin-top: 3px; margin-bottom: 0; padding: 0;">
                                    @{{ errors.order[0] }}
                                </label>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="animated-checkbox" style="margin-top: 5px;">
                                    <label>
                                        <input v-model="formData.has_child" id="has_child" name="has_child" type="checkbox"><span class="label-text">Has child content?</span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="animated-checkbox" style="margin-top: 5px; float: right;">
                                    <label>
                                        <input v-model="formData.status" id="status" name="status" type="checkbox"><span class="label-text">Active</span>
                                    </label>
                                </div>
                            </div>
                            <div style="width: 100%" v-show="formData.has_child != 1">
                                <div class="form-group col-md-12">
                                    <textarea v-model="formData.body" id="body" name="body" type="text" class="form-control"></textarea>
                                    <label v-if="errors.body" class="help-block text-danger" style="margin-top: 3px; margin-bottom: 0; padding: 0;">
                                        @{{ errors.body[0] }}
                                    </label>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span v-bind:style="{ width: prependWidth + 'px' }" class="input-group-text">Image</span>
                                        </div>
                                        <input v-model="formData.image" id="image" name="image" type="text" placeholder="Enter image" class="form-control" disabled>
                                        <div class="input-group-append">
                                            <a v-on:click="openPopup('{{ asset('admin/plugins/filemanager/dialog.php') }}?type=0&popup=1&field_id=image')" class="btn btn-outline-secondary" type="button">Browse</a>
                                        </div>
                                    </div>
                                    <label v-if="errors.image" class="help-block text-danger" style="margin-top: 3px; margin-bottom: 0; padding: 0;">
                                        @{{ errors.image[0] }}
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                                <a href="{{ route('admin.content.category.index') }}" class="btn btn-primary pull-right mr-2" type="button"><i class="fa fa-fw fa-lg fa-arrow-circle-left"></i>Cancel</a>
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
                    title: '',
                    body: '',
                    image: '',
                    order: 1,
                    has_child: '',
                    status: 1
                },
                errors: {
                    title: '',
                    body: '',
                    image: '',
                    order: 1,
                    has_child: '',
                    status: 1
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

                    // get body from editor
                    vm.formData.body = window.tinyMCE.get('body').getContent();

                    // get status
                    vm.formData.status = vm.formData.status == true ? 1 : 0;

                    // get has_child
                    vm.formData.has_child = vm.formData.has_child == true ? 1 : 0;

                    // show loading
                    vm.loading = true;

                    // storing content_category data
                    vm.service.post('content/category', vm.formData)
                        .then(function (response) {

                            // response
                            let res = response.data;

                            // clearing values
                            vm.clearObj(vm.formData);
                            vm.clearObj(vm.errors);

                            // reset
                            vm.formData.order = 1;
                            vm.formData.status = 1;
                            window.tinyMCE.get('body').setContent('');

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
