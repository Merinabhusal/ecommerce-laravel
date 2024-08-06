@extends('layouts.masters')
@section('content')

            <section class="vh-100" style="background-color: #9A616D;">
            <div class="container py-5 h-100">
              <div class="row justify-content-center mt-5">
                <div class="col-md-6">
                  <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0">
                      <div class="col-md-6 col-lg-5 d-none d-md-block">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img1.webp"
                          alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                      </div>
                      <div class="col-md-6 col-lg-7 d-flex align-items-center">
                        <div class="card-body p-4 p-lg-5 text-black">

                          <form>

                            <div class="d-flex align-items-center mb-3 pb-1">
                              <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                              <span class="h1 fw-bold mb-0">Logo</span>
                            </div>

                            <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>




                            <form action="{{route('userlogin')}}">

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <label class="form-label" for="form2Example17">Email address</label>
                                  <input type="email" id="form2Example17" class="form-control form-control-lg" />

                                </div>

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <label class="form-label" for="form2Example27">Password</label>
                                  <input type="password" id="form2Example27" class="form-control form-control-lg" />

                                </div>

                                <div class="pt-1 mb-4">
                                  {{-- <button data-mdb-button-init data-mdb-ripple-init class="btn btn-dark btn-lg btn-block" type="button">Login</button> --}}
                               <a class="btn btn-dark btn-lg btn-block" href="{{route('home')}}">Login</a>
                                </div>

                            </form>


                            <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="{{route('userregister')}}"
                                style="color: #393f81;">Register here</a></p>

                          </form>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          @endsection
