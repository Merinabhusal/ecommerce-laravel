@extends('layouts.masters')
@section('content')
<section class="vh-100 bg-image p-3 p-md-4 p-xl-5"
style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6 col-xxl-5">
                        <div class="card border border-light-subtle rounded-4">
                            <div class="card-body p-3 p-md-4 p-xl-5">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-5">
                                            <h4 class="text-center">Register Here</h4>
                                        </div>
                                    </div>
                                </div>
                                <form action="{{ route('userregister') }}">
                                    <div class="row gy-3 overflow-hidden">
                                        <div class="col-12">
                                            <div class="form-floating mb-3">
                                                <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" >
                                                <label for="email" class="form-label">Email</label>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-floating mb-3">
                                                <input type="password" class="form-control" name="password" id="password" value="" placeholder="Password" >
                                                <label for="password" class="form-label">Password</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating mb-3">
                                                <input type="password" class="form-control" name="confirm_password" id="confirm_password" value="" placeholder="Confirm Password" >
                                                <label for="password" class="form-label">Confirm Password</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button class="btn bsb-btn-xl btn-primary py-3" type="submit">Register Now</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="row">
                                    <div class="col-12">
                                        <hr class="mt-5 mb-4 border-secondary-subtle">
                                        <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-center">
                                            <a href="{{route('userlogin')}}" class="link-secondary text-decoration-none">Click here to login</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>




        {{-- <section class="vh-100 bg-image p-3 p-md-4 p-xl-5"
        style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6 col-xxl-5">
                        <div class="card border border-light-subtle rounded-4">
                            <div class="card-body p-3 p-md-4 p-xl-5">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-5">
                                            <h4 class="text-center">Register Here</h4>
                                        </div>
                                    </div>
                                </div>

                                <form action="{{ route('userregister') }}">
                                    <div class="row gy-3 overflow-hidden">

                                        <div class="row gy-3 overflow-hidden">
                                            <div class="col-12">

                                                <div data-mdb-input-init class="form-outline mb-4">
                                                    <label class="form-label" for="form3Example4cdg">Name</label>
                                                    <input type="name" id="form3Example4cdg" class="form-control form-control-lg" />

                                                  </div>

                                                <div data-mdb-input-init class="form-outline mb-4">
                                                    <label class="form-label" for="form2Example17">Email address</label>
                                                  <input type="email" id="form2Example17" class="form-control form-control-lg" />

                                                </div>
                                                <div data-mdb-input-init class="form-outline mb-4">
                                                    <label class="form-label" for="form3Example4cdg">Password</label>
                                                    <input type="password" id="form3Example4cdg" class="form-control form-control-lg" />

                                                  </div>

                      <div data-mdb-input-init class="form-outline mb-4">
                        <label class="form-label" for="form3Example4cdg">Confirm Password</label>
                        <input type="password" id="form3Example4cdg" class="form-control form-control-lg" />

                      </div>

                      <div class="form-check d-flex justify-content-center mb-5">
                        <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3cg" />
                        <label class="form-check-label" for="form2Example3g">
                          I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                        </label>
                      </div>

                      <div class="d-flex justify-content-center">
                        <button  type="button" data-mdb-button-init
                          data-mdb-ripple-init class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
                      </div>

                      <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="{{route('userlogin')}}"
                          class="fw-bold text-body"><u>Login here</u></a></p>

                    </form>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> --}}
      </section>





@endsection
