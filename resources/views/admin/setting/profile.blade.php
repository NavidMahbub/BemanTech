@extends('layouts.app')

@section('site_title', 'Profile Update')

@section('page_title')
    <div class="app-title">
        <div>
            <h1>Profile Update</h1>
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
            Profile Update Form
        </div>
        <div class="tile-body" style="padding: 40px;">
            <div class="row">
                <div class="col-md-8 offset-md-2 mt-3">
                    <form v-on:submit.prevent="submitForm()" id="create_form">
                        <div class="row">
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
                                <div class="wrap-custom-file" style="margin: 0 auto; margin-top: 10px;">
                                    <input @change="onImageChange" type="file" name="image" id="image" accept=".gif, .jpg, .png"/>
                                    <label for="image"
                                           style="background-image: url({{ auth()->user()->image ? url('storage/' . auth()->user()->image) : asset('image/avatar.jpg') }}); background-size: cover;">
                                        <i class="fa fa-plus-circle"></i>
                                    </label>
                                </div>
                                <label v-if="errors.phone" class="help-block text-danger" style="margin-top: 3px; margin-bottom: 0; padding: 0;">
                                    @{{ errors.phone[0] }}
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
                    name: '',
                    email: '',
                    phone: '',
                    image: '',
                },
                errors: {
                    id: '',
                    name: '',
                    email: '',
                    phone: '',
                    image: '',
                }
            },
            mounted: function () {
                // axios service
                this.service = axios.create({
                    baseURL: ajax_url,
                    responseType: "json"
                });
                // get contact
                this.getProfileUpdate();
            },
            methods: {
                onImageChange(e) {
                    let files = e.target.files || e.dataTransfer.files;
                    if (!files.length)
                        return;
                    this.createImage(files[0]);
                    let path = URL.createObjectURL(e.target.files[0]);
                    $('.wrap-custom-file').find('label').css('background-image', 'url(' + path + ')');
                },
                createImage(file) {
                    let reader = new FileReader();
                    let vm = this;
                    reader.onload = (e) => {
                        vm.formData.image = e.target.result;
                    };
                    reader.readAsDataURL(file);
                },
                // get contact data
                getProfileUpdate: function() {
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
                    vm.service.post('setting/update-profile', vm.formData)
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

@section('style')
    <style>
        .wrap-custom-file {
            position: relative;
            display: inline-block;
            width: 150px;
            height: 150px;
            margin: 0 0.5rem 1rem;
            text-align: center;
        }

        .wrap-custom-file input[type="file"] {
            position: absolute;
            top: 0;
            left: 0;
            width: 2px;
            height: 2px;
            overflow: hidden;
            opacity: 0;
        }

        .wrap-custom-file label {
            z-index: 1;
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            right: 0;
            width: 100%;
            overflow: hidden;
            padding: 0 0.5rem;
            cursor: pointer;
            background-color: #fff;
            border-radius: 4px;
            transition: -webkit-transform 0.4s;
            transition: transform 0.4s;
            transition: transform 0.4s, -webkit-transform 0.4s;
        }

        .wrap-custom-file label span {
            display: block;
            margin-top: 2rem;
            font-size: 1.4rem;
            color: #777;
            transition: color 0.4s;
        }

        .wrap-custom-file label .fa {
            position: absolute;
            bottom: 1rem;
            left: 50%;
            -webkit-transform: translatex(-50%);
            transform: translatex(-50%);
            font-size: 1.5rem;
            color: lightcoral;
            transition: color 0.4s;
        }

        .wrap-custom-file label:hover span, .wrap-custom-file label:hover .fa {
            color: #333;
        }

        .wrap-custom-file label.file-ok {
            background-size: cover;
            background-position: center;
        }

        .wrap-custom-file label.file-ok span {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 0.3rem;
            font-size: 1.1rem;
            color: #000;
            background-color: rgba(255, 255, 255, 0.7);
        }

        .wrap-custom-file label.file-ok .fa {
            display: none;
        }
    </style>
@endsection
