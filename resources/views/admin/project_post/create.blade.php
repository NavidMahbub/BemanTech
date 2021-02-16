@extends('layouts.app')

@section('site_title', 'ProjectPost')

@section('page_title')
    <div class="app-title">
        <div>
            <h1>Create Project Post</h1>
        </div>
        <a href="{{ route('admin.project.post.index') }}" class="btn btn-primary icon-btn text-white"><i class="fa fa-list"></i>View ProjectPost List</a>
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
            Create Project Post Form
        </div>
        <div class="tile-body" style="padding: 40px;">
            <div class="row">
                <div class="col-md-8 offset-md-2 mt-3">
                    <form v-on:submit.prevent="submitForm()" id="create_form">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span v-bind:style="{ width: prependWidth + 'px' }" class="input-group-text">Category</span>
                                    </div>
                                    <select v-model="formData.project_category_id" id="project_category_id"
                                            name="project_category_id" class="form-control">
                                        <option :key="'project_category_id'" value="">Select category</option>
                                        <option v-for="(project_category, index) in project_categories" :key="'project_category_id' + index" :value="project_category.id">
                                            @{{ project_category.title }}
                                        </option>
                                    </select>
                                </div>
                                <label v-if="errors.project_category_id" class="help-block text-danger" style="margin-top: 3px; margin-bottom: 0; padding: 0;">
                                    @{{ errors.project_category_id[0] }}
                                </label>
                            </div>
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
                            <template v-for="(data, index) in formData.body">
                                <div class="form-group col-md-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span v-bind:style="{ width: prependWidth + 'px' }" class="input-group-text">Key</span>
                                        </div>
                                        <input v-model="formData.body[index].key" :id="'key' + index" :name="'key' + index" type="text" placeholder="Enter key" class="form-control">
                                        <template v-if="formData.body.length > 1 && index > 0">
                                            <div class="input-group-append" style="cursor: pointer;" @click="removeKeyValuePair(index)">
                                                <span class="input-group-text"><i class="fa fa-fw fa-lg fa-remove"></i></span>
                                            </div>
                                        </template>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <textarea v-model="formData.body[index].value" :id="'value' + index" :name="'value' + index" type="text" class="form-control"></textarea>
                                </div>
                            </template>
                            <div class="form-group col-md-12 text-center">
                                <button type="button" class="btn btn-primary" @click="addKeyValuePair()"><i class="fa fa-fw fa-lg fa-plus-circle"></i>Add More</button>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span v-bind:style="{ width: prependWidth + 'px' }" class="input-group-text">Image 1</span>
                                    </div>
                                    <input v-model="formData.image1" id="image1" name="image1" type="text" placeholder="Enter image" class="form-control" disabled>
                                    <div class="input-group-append">
                                        <a v-on:click="openPopup('{{ asset('admin/plugins/filemanager/dialog.php') }}?type=0&popup=1&field_id=image1')" class="btn btn-outline-secondary" type="button">Browse</a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span v-bind:style="{ width: prependWidth + 'px' }" class="input-group-text">Image 2</span>
                                    </div>
                                    <input v-model="formData.image2" id="image2" name="image2" type="text" placeholder="Enter image" class="form-control" disabled>
                                    <div class="input-group-append">
                                        <a v-on:click="openPopup('{{ asset('admin/plugins/filemanager/dialog.php') }}?type=0&popup=1&field_id=image2')" class="btn btn-outline-secondary" type="button">Browse</a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span v-bind:style="{ width: prependWidth + 'px' }" class="input-group-text">Image 3</span>
                                    </div>
                                    <input v-model="formData.image3" id="image3" name="image3" type="text" placeholder="Enter image" class="form-control" disabled>
                                    <div class="input-group-append">
                                        <a v-on:click="openPopup('{{ asset('admin/plugins/filemanager/dialog.php') }}?type=0&popup=1&field_id=image3')" class="btn btn-outline-secondary" type="button">Browse</a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span v-bind:style="{ width: prependWidth + 'px' }" class="input-group-text">Image 4</span>
                                    </div>
                                    <input v-model="formData.image4" id="image4" name="image4" type="text" placeholder="Enter image" class="form-control" disabled>
                                    <div class="input-group-append">
                                        <a v-on:click="openPopup('{{ asset('admin/plugins/filemanager/dialog.php') }}?type=0&popup=1&field_id=image4')" class="btn btn-outline-secondary" type="button">Browse</a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span v-bind:style="{ width: prependWidth + 'px' }" class="input-group-text">Image 5</span>
                                    </div>
                                    <input v-model="formData.image5" id="image5" name="image5" type="text" placeholder="Enter image" class="form-control" disabled>
                                    <div class="input-group-append">
                                        <a v-on:click="openPopup('{{ asset('admin/plugins/filemanager/dialog.php') }}?type=0&popup=1&field_id=image5')" class="btn btn-outline-secondary" type="button">Browse</a>
                                    </div>
                                </div>
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
                                <a href="{{ route('admin.project.post.index') }}" class="btn btn-primary pull-right mr-2" type="button"><i class="fa fa-fw fa-lg fa-arrow-circle-left"></i>Cancel</a>
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
                project_categories: '',
                formData: {
                    project_category_id: '',
                    title: '',
                    body: [
                        {
                            key: '',
                            value: ''
                        }
                    ],
                    image1: '',
                    image2: '',
                    image3: '',
                    image4: '',
                    image5: '',
                    status: 1
                },
                errors: {
                    project_category_id: '',
                    title: '',
                    status: 1
                }
            },
            mounted: function () {

                // axios service
                this.service = axios.create({
                    baseURL: ajax_url,
                    responseType: "json"
                });

                // get project categories
                this.getProjectCategories();

            },
            methods: {

                // get project categories
                getProjectCategories: function() {

                    let vm = this;

                    // show loading
                    vm.loading = true;

                    // getting component data
                    vm.service.get(`project/category`)
                        .then(function (response) {

                            // response
                            let res = response.data;
                            vm.project_categories = res.data;

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

                addKeyValuePair: function() {

                    this.formData.body.push({
                        key: '',
                        value: ''
                    });

                    this.$nextTick(function () {
                        this.activateTexteditor();
                    });

                },

                removeKeyValuePair: function(index) {

                    this.formData.body.splice(index, 1);

                    this.$nextTick(function () {
                        this.activateTexteditor();
                    });

                },

                activateTexteditor: function() {

                    window.tinymce.init({
                        relative_urls: false,
                        remove_script_host: false,
                        selector: "textarea", theme: "modern", height: 200,
                        plugins: [
                            "advlist autolink link image lists charmap print preview hr anchor pagebreak",
                            "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
                            "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
                        ],
                        toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
                        toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
                        image_advtab: true,
                        external_filemanager_path: "/admin/plugins/filemanager/",
                        filemanager_title: "Responsive Filemanager",
                        external_plugins: {"filemanager": "/admin/plugins/filemanager/plugin.min.js"}
                    });

                    tinymce.EditorManager.editors.forEach(function(editor) {
                        var old_global_settings = tinymce.settings;
                        tinymce.settings = editor.settings;
                        tinymce.EditorManager.execCommand('mceRemoveEditor', false, editor.id);
                        tinymce.EditorManager.execCommand('mceAddEditor', false, editor.id);
                        tinymce.settings = old_global_settings;
                    });
                },

                // submit form
                submitForm: function () {

                    let vm = this;

                    // get status
                    vm.formData.status = vm.formData.status == true ? 1 : 0;

                    // get image url
                    vm.formData.image = $('#image').val();

                    // populating key value pair data
                    let keyValue = [];
                    vm.formData.body.forEach(function (data, index) {
                        keyValue.push({
                            key: data.key,
                            value: window.tinyMCE.get('value' + index).getContent()
                        });
                    });
                    vm.formData.body = keyValue;

                    // show loading
                    vm.loading = true;

                    // storing project_post data
                    vm.service.post('project/post', vm.formData)
                        .then(function (response) {

                            // response
                            let res = response.data;

                            // clearing values
                            vm.clearObj(vm.formData);
                            vm.clearObj(vm.errors);

                            // resetting value for body
                            vm.formData.body = [
                                {
                                    key: '',
                                    value: ''
                                }
                            ];

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
