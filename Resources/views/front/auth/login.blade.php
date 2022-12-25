@extends('layouts.pages')

@section('content')
  <div class="form-register">
    <section class="top-spase-register">

      <div class="form_wrapper">
        <div class="form_container">
          <div class="title_container">
            <h2> ورود به پرتال انجمن صنفی انبوه سازان مسکن البرز
            </h2>
          </div>
          <div class="row ">

            <form action="{{ route('auth.login') }}" method="post" style="width: 100%;">

              <div class="input_field"> <span><i aria-hidden="true" class="fa fa-mobile-alt"></i></span>
                <input type="number" name="mobile" placeholder="شماره موبایل" required />
              </div>
              @error('mobile')
                    <div class="error text-danger ">{{ $message }}</div>
                @enderror

              <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
                <input type="password" name="password" placeholder="گذرواژه" required />
              </div>
              @error('password')
                    <div class="error text-danger ">{{ $message }}</div>
                @enderror

              <div class="save-login mb-1">
                <input type="checkbox" class="my-h">
                <label class="ms-2" for=""> مرا به خاطر بسپار</label>
              </div>

              @if(session()->get('error'))
                <div class="alert alert-danger text-center"> {{ session()->get('error') }} </div>
              @endif

              <input class="button text-center" type="submit" value="ورود" />
              <div class="link-register">
                <a href="{{ route('pages.reset') }}">گذرواژه را فراموش کرده اید؟</a>
                <br>
                <a href="{{ route('auth.register.show') }}">ثبت نام در سایت</a>
              </div>
                @csrf
            </form>

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
                  message: 'لطفا نام خود را وارد کنید'
                }
              }
            },
            last_name: {
              validators: {
                stringLength: {
                  min: 2,
                },
                notEmpty: {
                  message: 'لطفا نام خانوادگی خود را وارد کنید'
                }
              }
            },
            user_name: {
              validators: {
                stringLength: {
                  min: 8,
                },
                notEmpty: {
                  message: 'لطفا نام کاربری خود را وارد کنید'
                }
              }
            },
            user_password: {
              validators: {
                stringLength: {
                  min: 8,
                },
                notEmpty: {
                  message: 'لطفا رمز عبور خود را وارد کنید'
                }
              }
            },
            confirm_password: {
              validators: {
                stringLength: {
                  min: 8,
                },
                notEmpty: {
                  message: 'لطفا رمز عبور خود را تایید کنید'
                }
              }
            },
            email: {
              validators: {
                notEmpty: {
                  message: 'لطفا آدرس ایمیل خود را وارد کنید'
                },
                emailAddress: {
                  message: 'لطفا یک آدرس ایمیل معتبر وارد کنید'
                }
              }
            },
            contact_no: {
              validators: {
                stringLength: {
                  min: 12,
                  max: 12,
                  notEmpty: {
                    message: 'لطفا شماره تماس خود را وارد کنید'
                  }
                }
              },

            }
          }
        })
        .on('success.form.bv', function(e) {
          $('#success_message').slideDown({
            opacity: "show"
          }, "slow")
          $('#contact_form').data('bootstrapValidator').resetForm();

          e.preventDefault();
          var $form = $(e.target);
          var bv = $form.data('bootstrapValidator');

          $.post($form.attr('action'), $form.serialize(), function(result) {
            console.log(result);
          }, 'json');
        });
    });
  </script>
@endpush
