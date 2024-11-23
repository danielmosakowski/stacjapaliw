@extends('layouts.app')

@section("content")

        <!-- Contact Section-->
        <section class="page-section masthead" id="contact">
            <div class="container">
                <!-- Contact Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Edytujesz fakturę {{$invoice->id}}</h2>
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
                        <form action="{{route('invoices.update', ['id'=>$invoice->id])}}" method="POST" id="contactForm" data-sb-form-api-token="API_TOKEN">
                            {{csrf_field() }}
                            @method('PUT')
                            <!-- Name input-->
                            <div class="form-floating mb-3">
                                <input value="{{ $invoice->number}}" class="form-control" id="number" name="number" typ e="text" placeholder="Numer faktury" required="required" data-sb-validations="Wpisz numer faktury" />
                                <label>Numer faktury</label>
                                <p class="help-block text-danger"></p>
                            </div>
                            <!-- Email address input-->
                            <div class="form-floating mb-3">
                                <input value="{{ $invoice->date}}" class="form-control" id="date" name="date" type="text" placeholder="Data wystawienia" required="required" data-sb-validations="Wprowadź datę" />
                                <label>Data wystawienia</label>
                                <p class="help-block text-danger"></p>

                            </div>
                            <!-- Phone number input-->
                            <div class="form-floating mb-3">
                                <input value="{{ $invoice->total}}" class="form-control" id="total" name="total" type="text" placeholder="Kwota faktury" required="required" data-sb-validations="Wprowadź kwotę." />
                                <label>Kwota</label>
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
                            <button class="btn btn-primary btn-xl" id="submitButton" type="submit">Zapisz fakturę</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
@endsection