@extends('layouts.app')
@section('content')
    <div class="container">
        <form id="offer-form" method="POST" action="" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label
                    style="font-size: 1.2rem; margin-right: 1rem; display: inline-block; width: 20rem; padding: 1rem 0 1rem 0;"
                    for="exampleInputEmail1">Offer Name In Arabic:</label>
                <input style="font-size: 1.2rem" type="text" class="form-control" placeholder="Enter Offer Name"
                    class="forminput" name="name_ar">
                <br>
                {{-- ERROR MESSAGE --}}
                <small id="name_ar_error" style="color: red" class="form-text text-danger"></small>

            </div>
            <div class="form-group">
                <label
                    style="font-size: 1.2rem; margin-right: 1rem; display: inline-block; width: 20rem; padding: 1rem 0 1rem 0;"
                    for="exampleInputEmail1">Offer Name In English:</label>
                <input style="font-size: 1.2rem" type="text" class="form-control" placeholder="Enter Offer Name"
                    class="forminput" name="name_en">
                <br>
                {{-- ERROR MESSAGE --}}
                <small id="name_en_error" style="color: red" class="form-text text-danger"></small>
            </div>
            <div class="form-group">
                <label
                    style="font-size: 1.2rem; margin-right: 1rem; display: inline-block; width: 20rem; padding: 1rem 0 1rem 0;"
                    for="exampleInputPassword1">Offer Price: </label>
                <input style="font-size: 1.2rem" type="text" class="form-control" placeholder="Enter Offer Price"
                    class="forminput" name="price">
                <br>
                {{-- ERROR MESSAGE --}}
                <small id="price_error" style="color: red" class="form-text text-danger"></small>

            </div>
            <div class="form-group">
                <label
                    style="font-size: 1.2rem; margin-right: 1rem; display: inline-block; width: 20rem; padding: 1rem 0 1rem 0;"
                    for="exampleInputPassword1">Offer Details In Arabic: </label>
                <input style="font-size: 1.2rem" type="text" class="form-control" placeholder="Enter Offer Details"
                    class="forminput" name="details_ar">
                <br>
                {{-- ERROR MESSAGE --}}
                <small id="details_ar_error" style="color: red" class="form-text text-danger"></small>
            </div>
            <div class="form-group">
                <label
                    style="font-size: 1.2rem; margin-right: 1rem; display: inline-block; width: 20rem; padding: 1rem 0 1rem 0;"
                    for="exampleInputPassword1">Offer Details In English: </label>
                <input style="font-size: 1.2rem" type="text" class="form-control" placeholder="Enter Offer Details"
                    class="forminput" name="details_en">
                <br>
                {{-- ERROR MESSAGE --}}
                <small id="details_en_error" style="color: red" class="form-text text-danger"></small>
            </div>
            <div class="form-group">
                <label
                    style="font-size: 1.2rem; margin-right: 1rem; display: inline-block; width: 20rem; padding: 1rem 0 1rem 0;"
                    for="photo">Choose Your Photo: </label>
                <input id="photo" style="font-size: 1.2rem" type="file" class="form-control" class="forminput"
                    name="photo">
                <br>
                {{-- ERROR MESSAGE --}}
                <small id="photo_error" style="color: red" class="form-text text-danger"></small>
            </div>
            <div class="alert alert-success" role="alert" id="success-msg" style="display: none;">
                تم الحفظ بنجاح
            </div>
            <button id="save_offer" class="btn btn-primary">Save Offer</button>
        </form>
    </div>
@endsection

@section('script')
    <script>
        $(document).on('click', '#save_offer', function(e) {
            e.preventDefault();
            var formData = new FormData($('#offer-form')[0]);
            $('#name_ar_error').text('');
            $('#name_en_error').text('');
            $('#price_error').text('');
            $('#details_ar_error').text('');
            $('#details_en_error').text('');
            $('#photo_error').text('');
            $.ajax({
                type: 'post',
                enctype: 'multipart/form-data',
                url: '{{ route('ajax.offer.store') }}',
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data.status == true) {
                        // alert(data.msg);
                        $('#success-msg').show();
                    }
                },
                error: function(reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function(key, val) {
                        $('#' + key + '_error').text(val[0]);
                    });

                }
            });
        })
    </script>
@endsection
