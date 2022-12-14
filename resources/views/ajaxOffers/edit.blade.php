@extends('layouts.app')
@section('content')
    <div class="container">
        <form id="offer-form" method="POST" action="">
            @csrf
            <div class="form-group" style="display: none;">
                <label
                    style=" font-size: 1.2rem; margin-right: 1rem; display: inline-block; width: 20rem; padding: 1rem 0 1rem 0;"
                    for="exampleInputEmail1">Offer ID:</label>
                <input style="font-size: 1.2rem" type="text" class="form-control" placeholder="Enter Offer Name"
                    class="forminput" name="id" value="{{ $offer->id }}">
                <br>
                @error('name')
                    <small style="color: red" class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label
                    style="font-size: 1.2rem; margin-right: 1rem; display: inline-block; width: 20rem; padding: 1rem 0 1rem 0;"
                    for="exampleInputEmail1">Offer Name In Arabic:</label>
                <input style="font-size: 1.2rem" type="text" class="form-control" placeholder="Enter Offer Name"
                    class="forminput" name="name_ar" value="{{ $offer->name_ar }}">
                <br>
                @error('name')
                    <small style="color: red" class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label
                    style="font-size: 1.2rem; margin-right: 1rem; display: inline-block; width: 20rem; padding: 1rem 0 1rem 0;"
                    for="exampleInputEmail1">Offer Name In English:</label>
                <input style="font-size: 1.2rem" type="text" class="form-control" placeholder="Enter Offer Name"
                    class="forminput" name="name_en" value="{{ $offer->name_en }}">
                <br>
                @error('name')
                    <small style="color: red" class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label
                    style="font-size: 1.2rem; margin-right: 1rem; display: inline-block; width: 20rem; padding: 1rem 0 1rem 0;"
                    for="exampleInputPassword1">Offer Price: </label>
                <input style="font-size: 1.2rem" type="text" class="form-control" placeholder="Enter Offer Price"
                    class="forminput" name="price" value="{{ $offer->price }}">
                <br>
                @error('price')
                    <small style="color: red" class="form-text text-danger">{{ $message }}</small>
                @enderror

            </div>
            <div class="form-group">
                <label
                    style="font-size: 1.2rem; margin-right: 1rem; display: inline-block; width: 20rem; padding: 1rem 0 1rem 0;"
                    for="exampleInputPassword1">Offer Details In Arabic: </label>
                <input style="font-size: 1.2rem" type="text" class="form-control" placeholder="Enter Offer Details"
                    class="forminput" name="details_ar" value="{{ $offer->details_ar }}">
                <br>
                @error('details')
                    <small style="color: red" class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label
                    style="font-size: 1.2rem; margin-right: 1rem; display: inline-block; width: 20rem; padding: 1rem 0 1rem 0;"
                    for="exampleInputPassword1">Offer Details In English: </label>
                <input style="font-size: 1.2rem" type="text" class="form-control" placeholder="Enter Offer Details"
                    class="forminput" name="details_en" value="{{ $offer->details_en }}">
                <br>
                @error('details')
                    <small style="color: red" class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label
                    style="font-size: 1.2rem; margin-right: 1rem; display: inline-block; width: 20rem; padding: 1rem 0 1rem 0;"
                    for="photo">Choose Your Photo: </label>
                <input id="photo" style="font-size: 1.2rem" type="file" class="form-control" class="forminput"
                    name="photo">
                <br>
                @error('photo')
                    <small style="color: red" class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="alert alert-success" role="alert" id="success-msg" style="display: none;">
                ???? ?????????? ??????????
            </div>
            <button id="update_offer" class="btn btn-primary">Update Offer</button>
        </form>
    </div>
@endsection

@section('script')
    <script>
        $(document).on('click', '#update_offer', function(e) {
            e.preventDefault();
            var formData = new FormData($('#offer-form')[0]);
            $.ajax({
                type: 'post',
                enctype: 'multipart/form-data',
                url: '{{ route('ajax.offer.update') }}',
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

                }
            });
        })
    </script>
@endsection
