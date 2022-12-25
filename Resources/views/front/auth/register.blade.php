@extends('layouts.pages')

@section('content')
  <div class="form-register">
    <section class="top-spase-register">

      <div class="form_wrapper">
        <div class="form_container">
          <div class="title_container">
            <h2>فرم ثبت نام کاربر جدید</h2>
          </div>
          <div class="row clearfix">
            <div class="">
              <form action="{{ route('auth.register.store') }}" method="post">
                @csrf
                <div class="row clearfix">

                <div class="col_half">
                    <div class="input_field">
                      <span>
                        <i aria-hidden="true" class="fas fa-user-plus"></i>
                      </span>
                      <input type="text" name="first_name" placeholder="نام" value="{{ old('first_name') }}"/>
                    </div>
                    @error('first_name')
                        <div class="error text-danger ">{{ $message }}</div>
                    @enderror
                    <br>
                  </div>

                <div class="col_half">
                    <div class="input_field">
                      <span>
                        <i aria-hidden="true" class="fas fa-user-plus"></i>
                      </span>
                      <input type="text" name="last_name" placeholder="نام خانوادگی" required value="{{ old('last_name') }}"/>
                    </div>
                    @error('last_name')
                        <div class="error text-danger ">{{ $message }}</div>
                    @enderror
                    <br>
                  </div>
                </div>
                
                <div class="input_field"> <span><i aria-hidden="true" class="fas fa-user-circle"></i>
                  </span>
                  <input type="text" name="user_name" placeholder="نام کاربری" required value="{{ old('user_name') }}"/>
                </div>
                @error('user_name')
                    <div class="error text-danger ">{{ $message }}</div>
                @enderror
                
                <br>
                <div class="input_field"> <span><i aria-hidden="true" class="fas far fa-address-card"></i>
                  </span>
                  <input type="text" name="position" placeholder="سمت" required value="{{ old('position') }}"/>
                </div>
                @error('position')
                    <div class="error text-danger ">{{ $message }}</div>
                @enderror
                <br>

                <div class="input_field"> <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
                  <input type="email" name="email" placeholder="ایمیل" required value="{{ old('email') }}"/>
                </div>
                @error('email')
                    <div class="error text-danger ">{{ $message }}</div>
                @enderror
                <br>

                <div class="input_field"> <span><i aria-hidden="true" class="fa fa-mobile-alt"></i></span>
                  <input type="number" name="mobile" placeholder="شماره موبایل" required value="{{ old('mobile') }}"/>
                </div>
                @error('mobile')
                    <div class="error text-danger ">{{ $message }}</div>
                @enderror
                <br>

                <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
                  <input type="password" name="password" placeholder="گذرواژه" required />
                </div>
                @error('password')
                    <div class="error text-danger ">{{ $message }}</div>
                @enderror
                <br>

                <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
                  <input type="password" name="password_confirmation" placeholder="تکرار گذرواژه" required />
                </div>
                @error('password_confirmation')
                    <div class="error text-danger">{{ $message }}</div>
                @enderror


                <div class="input_field radio_option">

                  <input type="radio" name="gender" id="rd1" value="female">
                  <label for="rd1">زن</label>
                  <input type="radio" name="gender" id="rd2" value="male">
                  <label for="rd2">مرد</label>
                </div>
                @error('gender')
                    <div class="error text-danger">{{ $message }}</div>
                @enderror

                <div class="all-link-vrod">

                  <a href="{{ route('auth.login.show') }}" class="b-login">ورود</a>
                  <button class="b-register" type="submit">ثبت نام</button>
                </div>
                <div class="advert">
                  <img src="{{ asset('assets/pages/img/advert1.jpg') }}" alt="">
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>


    </section>
  </div>
@endsection

@push('script')
  <script>
    $(".searchd").on("click", function() {
      $(".searchbox").addClass("open", 1000);
    });

    $(".close").on("click", function() {
      $(".searchbox").removeClass("open", 1000);
    });
  </script>
  <script>
    $(document).ready(function() {
      $('#contact_form').bootstrapValidator({
          // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
          feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
          },
          fields: {
            first_name: {
              validators: {
                stringLength: {
                  min: 2,
                },
                notEmpty: {
                  message: 'Please enter your First Name'
                }
              }
            },
            last_name: {
              validators: {
                stringLength: {
                  min: 2,
                },
                notEmpty: {
                  message: 'Please enter your Last Name'
                }
              }
            },
            user_name: {
              validators: {
                stringLength: {
                  min: 8,
                },
                notEmpty: {
                  message: 'Please enter your Username'
                }
              }
            },
            user_password: {
              validators: {
                stringLength: {
                  min: 8,
                },
                notEmpty: {
                  message: 'Please enter your Password'
                }
              }
            },
            confirm_password: {
              validators: {
                stringLength: {
                  min: 8,
                },
                notEmpty: {
                  message: 'Please confirm your Password'
                }
              }
            },
            email: {
              validators: {
                notEmpty: {
                  message: 'Please enter your Email Address'
                },
                emailAddress: {
                  message: 'Please enter a valid Email Address'
                }
              }
            },
            contact_no: {
              validators: {
                stringLength: {
                  min: 12,
                  max: 12,
                  notEmpty: {
                    message: 'Please enter your Contact No.'
                  }
                }
              },
              department: {
                validators: {
                  notEmpty: {
                    message: 'Please select your Department/Office'
                  }
                }
              },
            }
          }
        })
        .on('success.form.bv', function(e) {
          $('#success_message').slideDown({
            opacity: "show"
          }, "slow") // Do something ...
          $('#contact_form').data('bootstrapValidator').resetForm();

          // Prevent form submission
          e.preventDefault();

          // Get the form instance
          var $form = $(e.target);

          // Get the BootstrapValidator instance
          var bv = $form.data('bootstrapValidator');

          // Use Ajax to submit form data
          $.post($form.attr('action'), $form.serialize(), function(result) {
            console.log(result);
          }, 'json');
        });
    });
  </script>
@endpush
