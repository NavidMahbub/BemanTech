<script src="{{ asset('admin/plugins/axios/0.18.0/axios.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/plugins/es6-promise/es6-promise.auto.min.js') }}" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

<!-- Base url for ajax endpoint -->
<script type="text/javascript">
    let port = ':8000';
    let url = window.location.protocol + '//' + window.location.hostname + port;
    var ajax_url = `${url}/ajax/`;
</script>

<script>
    function responsive_filemanager_callback(field_id){
        if (field_id == 'image1') {
            let url = $('#'+field_id).val();
            url = url.replace(/^.*\/\/[^\/]+/, '');
            vueApp.formData.image1 = url;
        } else if (field_id == 'image2') {
            let url = $('#'+field_id).val();
            url = url.replace(/^.*\/\/[^\/]+/, '');
            vueApp.formData.image2 = url;
        } else if (field_id == 'image3') {
            let url = $('#'+field_id).val();
            url = url.replace(/^.*\/\/[^\/]+/, '');
            vueApp.formData.image3 = url;
        } else if (field_id == 'image4') {
            let url = $('#'+field_id).val();
            url = url.replace(/^.*\/\/[^\/]+/, '');
            vueApp.formData.image4 = url;
        } else if (field_id == 'image5') {
            let url = $('#'+field_id).val();
            url = url.replace(/^.*\/\/[^\/]+/, '');
            vueApp.formData.image5 = url;
        } else if (field_id == 'logo') {
            let url = $('#'+field_id).val();
            url = url.replace(/^.*\/\/[^\/]+/, '');
            vueApp.formData.logo = url;
        } else {
            let url = $('#'+field_id).val();
            url = url.replace(/^.*\/\/[^\/]+/, '');
            vueApp.formData.image = url;
        }
    }
</script>