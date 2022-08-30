<!DOCTYPE html>
<html lang="en">

<head>
    @include('website.statistics.header')
</head>

<body id="page-top">
    <!-- Navigation-->
    @include('website.statistics.nav')
    <!-- Contact-->
    <section class="page-section" id="contact">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 col-xl-6 text-center">
                    <h2 class="mt-0">Adding new video from youtube</h2>
                    <hr class="divider" />
                    <p class="text-muted mb-5">Ready to start your next project with us? Send us a messages and we will
                        get back to you as soon as possible!</p>
                </div>
            </div>
            <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                <div class="col-lg-6">
                    <!-- * * * * * * * * * * * * * * *-->
                    <!-- * * SB Forms Contact Form * *-->
                    <!-- * * * * * * * * * * * * * * *-->
                    <!-- This form is pre-integrated with SB Forms.-->
                    <!-- To make this form functional, sign up at-->
                    <!-- https://startbootstrap.com/solution/contact-forms-->
                    <!-- to get an API token!-->
                    <form method="POST" action="{{ route('video.store') }}">
                        @csrf
                        <!-- Name input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="name" type="text" placeholder="Enter your name..."
                                data-sb-validations="required" name="name" />
                            <label for="name">Video Name</label>
                            @error('name')
                                <small style="color: red;">{{$message}}</small>
                            @enderror

                        </div>
                        <!-- Email address input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="link" type="text" placeholder="name@example.com"
                                data-sb-validations="required,email" name="embed_link" />
                            <label for="link">Emeded Link</label>
                            @error('embed_link')
                                <small style="color: red;">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-floating mb-3" hidden>
                            <input class="form-control" id="link" type="number" value="1"
                                placeholder="name@example.com" data-sb-validations="required,email" name="views" />
                            <label for="link">Views</label>
                        </div>
                        <!-- Submit success message-->
                        <!---->
                        <!-- This is what your users will see when the form-->
                        <!-- has successfully submitted-->
                        <div class="d-none" id="submitSuccessMessage">
                            <div class="text-center mb-3">
                                <div class="fw-bolder">Form submission successful!</div>
                                To activate this form, sign up at
                                <br />
                                <a
                                    href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                            </div>
                        </div>
                        <!-- Submit error message-->
                        <!---->
                        <!-- This is what your users will see when there is-->
                        <!-- an error submitting the form-->
                        <div class="d-none" id="submitErrorMessage">
                            <div class="text-center text-danger mb-3">Error sending message!</div>
                        </div>
                        <!-- Submit Button-->
                        <div class="d-grid">
                            <button class="btn btn-primary btn-xl enable" id="submitButton" type="submit">Add</button>
                        </div>
                    </form>
                </div>
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
