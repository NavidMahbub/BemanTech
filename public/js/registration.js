$(function() {

    $("#acceptTerms").change(function() {
        if(this.checked) {
            $("#paymentBtn").removeAttr('disabled');
        } else {
            $("#paymentBtn").attr('disabled','disabled');
        }
    });

    $('#player_mobile').change(function() {
        $('#phone').val($(this).val());
    });

    // get divisions
    getDivisionList();

    // disable district code
    $('#district_code').attr('disabled', true);

    // get districts
    $('body').on('change', '#geo_division_id', function() {
        getDistrictList('?division=' + $(this).val())
    });

    // get upazilas
    $('body').on('change', '#geo_district_id', function(e) {
        getUpazilaList('?district=' + $(this).val())
        var selected = $("option:selected", this);
        $('#district_code').val(selected.data('code'));
    });

    // get unions
    $('body').on('change', '#geo_upazila_id', function() {
        getUnionList('?upazila=' + $(this).val())
    });

});

function getDivisionList($query = '') {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        async: false
    });
    // api url
    let url = '/ajax/geo/filter/division' + $query;
    // list array
    var list = [];
    // get data from api
    $.get(url, function (data) {
        list = data;
    });
    let options = '<option value=""></option>';
    $.each(list, function (key, value) {
        options += '<option value="' + value.id + '">' + value.name_bng + '</option>'
    });
    $('#geo_division_id').html(options);
}

function getDistrictList($query = '') {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        async: false
    });
    // api url
    let url = '/ajax/geo/filter/district' + $query;
    // list array
    var list = [];
    // get data from api
    $.get(url, function (data) {
        list = data;
    });
    let options = '<option value=""></option>';
    $.each(list, function (key, value) {
        options += '<option value="' + value.id + '"  data-code="' + value.code + '">' + value.name_bng + '</option>'
    });
    $('#geo_district_id').html(options);
}

function getUpazilaList($query = '') {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        async: false
    });
    // api url
    let url = '/ajax/geo/filter/upazila' + $query;
    // list array
    var list = [];
    // get data from api
    $.get(url, function (data) {
        list = data;
    });
    let options = '<option value=""></option>';
    $.each(list, function (key, value) {
        options += '<option value="' + value.id + '">' + value.name_bng + '</option>'
    });
    $('#geo_upazila_id').html(options);
}

function getUnionList($query = '') {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        async: false
    });
    // api url
    let url = '/ajax/geo/filter/union' + $query;
    // list array
    var list = [];
    // get data from api
    $.get(url, function (data) {
        list = data;
    });
    let options = '<option value=""></option>';
    $.each(list, function (key, value) {
        options += '<option value="' + value.id + '">' + value.name_bng + '</option>'
    });
    $('#geo_union_id').html(options);
}


$(document).ready(function() {
    $('input[type="file"]').each(function(){
        // Refs
        var $file = $(this),
            $label = $file.next('label'),
            $labelText = $label.find('span'),
            labelDefault = $labelText.text();

        // When a new file is selected
        $file.on('change', function(event){
            var fileName = $file.val().split( '\\' ).pop(),
                tmppath = URL.createObjectURL(event.target.files[0]);
            //Check successfully selection
            if( fileName ){
                $('#image-error').css('z-index', '-1');
                $label
                    .addClass('file-ok')
                    .css('background-image', 'url(' + tmppath + ')');
                $labelText.text(fileName);
            }else{
                $label.removeClass('file-ok');
                $labelText.text(labelDefault);
            }
        });

// End loop of file input elements
    });
});

$('#formSubmit').click(function ($e) {
    $e.preventDefault();
    alert('ok');
});
