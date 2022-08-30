<!DOCTYPE html>
<html lang="en">

<head>
    @include('website.statistics.header')
</head>

<body id="page-top">
    <!-- Navigation-->
    <!-- Contact-->
    <section class="page-section" id="contact">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 col-xl-6 text-center">
                    <h2 class="mt-0">All videos from youtube</h2>
                    <hr class="divider" />
                    @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif

                </div>
            </div>
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            @php
                                $i = 1;
                            @endphp
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Embeded Link</th>
                            <th scope="col">Views</th>
                            <th scope="col">Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($videos as $video)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $video->name }}</td>
                                <td>{{ $video->embed_link }}</td>
                                <td>{{ $video->views }}</td>
                                <td>
                                    <a href="{{ route('video.show', $video->id) }}"><button type="button"
                                            class="btn btn-success">Show</button></a>
                                    <a href="{{ route('video.edit', $video->id) }}"><button type="button"
                                            class="btn btn-info">Edit</button></a>
                                    <button type="button" class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-4 text-center mb-5 mb-lg-0">
                    <i class="bi-phone fs-2 mb-3 text-muted"></i>
                    <div>(+970) 597902438</div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer-->
    @include('website.statistics.footer')

    <!-- Script -->
    @include('website.statistics.script')
</body>

</html>
