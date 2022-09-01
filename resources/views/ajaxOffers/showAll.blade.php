@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="alert alert-success" id="success_msg" role="alert" style="display: none">
            تم الحذف بنجاح
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Details</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Operations</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($offers as $offer)
                    <tr class="OfferRow{{ $offer->id }}">
                        <th scope="row">1</th>
                        <td>{{ $offer->name }}</td>
                        <td>{{ $offer->price }}</td>
                        <td>{{ $offer->details }}</td>
                        <td><img src="{{ asset($offer->photo) }}" height="100" width="100" alt=""></td>
                        <td>
                            <a href="{{ route('ajax.offer.edit', $offer->id) }}" class=" btn btn-primary">Update</a>
                            <a offer_id='{{ $offer->id }}' href="" class="delete_btn btn btn-warning">AJAX
                                Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('script')
    <script>
        //DELETE
        $(document).on('click', '.delete_btn', function(e) {
            e.preventDefault();
            var offer_id = $(this).attr('offer_id');
            $.ajax({
                type: 'post',
                url: "{{ route('ajax.offer.delete') }}",
                data: {
                    '_token': "{{ csrf_token() }}",
                    'id': offer_id
                },
                success: function(data) {
                    if (data.status == true) {
                        $('#success_msg').show();
                    }
                    $('.OfferRow' + data.id).remove();
                },
                error: function(reject) {}
            });
        });
    </script>
@endsection
