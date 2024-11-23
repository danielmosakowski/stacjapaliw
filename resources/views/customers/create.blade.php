@extends('layouts.app')

@section("content")

        <!-- Contact Section-->
        <section class="page-section masthead" id="contact">
            <div class="container">
                <!-- Contact Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Dodaj klienta</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <!-- Contact Section Form-->
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-xl-7">
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- * * SB Forms Contact Form * *-->
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- This form is pre-integrated with SB Forms.-->
                        <!-- To make this form functional, sign up at-->
                        <!-- https://startbootstrap.com/solution/contact-forms-->
                        <!-- to get an API token!-->
                        <form action="{{route('customers.store')}}" method="POST" id="contactForm" data-sb-form-api-token="API_TOKEN">
                            {{csrf_field() }}
                            <!-- Name input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="name" value="{{old('name')}}" name="name" typ e="text" placeholder="Nazwa"  data-sb-validations="Wpisz nazwę klienta" data-validation-required-message="Wprowadź klienta" />
                                <label>Nazwa klienta</label>
                                <p class="help-block text-danger"></p>
                            </div>
                            <!-- Email address input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="address" value="{{old('address')}}" name="address" type="text" placeholder="Adres klienta"  data-sb-validations="Wprowadź adres" data-validation-required-message="Wprowadź adres" />
                                <label>Adres</label>
                                <p class="help-block text-danger"></p>

                            </div>
                            <!-- Phone number input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="nip" value="{{old('nip')}}" name="nip" type="text" placeholder="Numer NIP"  data-sb-validations="Wprowadź numer NIP." data-validation-required-message="Wprowadź nip" />
                                <label>NIP</label>
                                 <p class="help-block text-danger"></p>
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
                                    <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                                </div>
                            </div>
                            <!-- Submit error message-->
                            <!---->
                            <!-- This is what your users will see when there is-->
                            <!-- an error submitting the form-->
                            <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                            <!-- Submit Button-->
                            <button class="btn btn-primary btn-xl" id="submitButton" type="submit">Dodaj klienta</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
@endsection