<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
</head>
<body>
    <div class="container">
        <header>
            <img src="{{ url('assets/images/header.png') }}" class="w-100 img-fluid" />
        </header>
        <main class="my-5 main-body">
            @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif
            <div class="row mb-3">
                <div class="col-12">
                    <h4>Contact Details</h4>
                </div>
            </div>
            <form action="{{ url('form') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="fname" class="form-label primary-label">First Name <span class="text-danger fw-bold">*</span></label>
                            <input type="text" class="form-control" name="fname" id="fname" maxlength="30" />
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="lname" class="form-label primary-label">Last Name <span class="text-danger fw-bold">*</span></label>
                            <input type="text" class="form-control" name="lname" id="lname" maxlength="30" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="phone" class="form-label secondary-label">Phone <span class="text-danger fw-bold">*</span></label>
                            <input type="text" class="form-control" name="phone" id="phone" maxlength="30" />
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="email" class="form-label secondary-label fst-italic">Email Address <span class="text-danger fw-bold">*</span></label>
                            <input type="email" class="form-control" name="email" id="email" maxlength="50" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="promo_code" class="form-label secondary-label">Promo Code</label>
                            <input type="text" class="form-control" name="promo_code" id="promo_code" maxlength="7" />
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="reference" class="form-label secondary-label">How did you hear about us?</label>
                            <select name="reference" id="reference" class="form-select">
                                <option value="">--</option>
                                <option value="Social Media">Social Media</option>
                                <option value="From a Friend">From a Friend</option>
                                <option value="Email">Email</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row display-none" id="other-field">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="other" class="form-label secondary-label">Other, please specify</label>
                            <input type="text" class="form-control" name="other" id="other" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="terms_and_conditions" id="terms_and_conditions">
                            <label class="form-check-label">
                                <a href="javascript:;" class="link-primary secondary-label" data-bs-toggle="modal" data-bs-target="#termsAndConditionModal">I agree to the terms and conditions of this event</a>
                            </label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </main>
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <div class="col-12">
                <div class="d-flex justify-content-end fw-bold fs-18">
                    For assistance please call 555-5555 or email&nbsp;<a href="mailto:test@test.com">test@test.com</a>.
                </div>
            </div>
        </footer>
    </div>
    <div class="modal fade" id="termsAndConditionModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Terms and Conditions</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul>
                        <li>All cancellation requests must be received by March 1, 2022.</li>
                        <li>All cancellation requests are subject to a $100 cancellation fee.</li>
                        <li>No one under the age of 16 will be allowed on the show floor.</li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ url('assets/js/jquery.min.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap.min.js') }}"></script>
    <script>
    $(document).ready(function () {
        $('#reference').change(function (e) { 
            e.preventDefault();
            var reference = $(this).val();
            if(reference == 'Other') {
                $('#other-field').removeClass('display-none');
            } else {
                $('#other-field').addClass('display-none');
            }
        });
    });
    </script>
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\InputRequest') !!}
</body>
</html>