@extends('layouts.app')

@section("content")

        <!-- Contact Section-->
        <section class="page-section masthead" id="contact">
            <div class="container">
                <!-- Contact Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Edytujesz klienta {{$customer->id}}</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
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
                        <form action="{{route('customers.update', ['klienci'=>$customer->id])}}" method="POST" id="contactForm" data-sb-form-api-token="API_TOKEN">
                            {{csrf_field() }}
                            @method('PUT')
                            <!-- Name input-->
                            <div class="form-floating mb-3">
                                <input value="{{ $customer->name}}" class="form-control" id="name" name="name" typ e="text" placeholder="Nazwa" required="required" data-sb-validations="Wpisz nazwę klienta" />
                                <label>Nazwa klienta</label>
                                <p class="help-block text-danger"></p>
                            </div>
                            <!-- Email address input-->
                            <div class="form-floating mb-3">
                                <input value="{{ $customer->address}}" class="form-control" id="address" name="address" type="text" placeholder="Adres klienta" required="required" data-sb-validations="Wprowadź adres" />
                                <label>Adres</label>
                                <p class="help-block text-danger"></p>

                            </div>
                            <!-- Phone number input-->
                            <div class="form-floating mb-3">
                                <input value="{{ $customer->nip}}" class="form-control" id="nip" name="nip" type="text" placeholder="Numer NIP" required="required" data-sb-validations="Wprowadź numer NIP." />
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
                            <button class="btn btn-primary btn-xl" id="submitButton" type="submit">Zapisz dane klienta</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
@endsection