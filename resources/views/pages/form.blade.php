@extends('layouts.backend')

@section('css')
    <link rel="stylesheet" href="{{ asset('js/plugins/select2/css/select2.min.css') }}">
@endsection

@section('js')
    <script src="{{ asset('js/lib/jquery.min.js') }}"></script>
    <script src="{{ asset('js/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/plugins/jquery-validation/additional-methods.min.js') }}"></script>

    <script type="module">
        Codebase.helpersOnLoad(['jq-validation']);
    </script>
@endsection

@section('content')
    <!-- Page Content -->
    <main>
        <!-- Page Content -->
        <div class="content content-full">
            <!-- Hero -->
            <div class="block block-rounded block-transparent bg-image bg-image-bottom"
                style="background-image: url('{{ asset('assets/media/photos/photo13@2x.jpg') }}');">
                <div class="block-content bg-primary-dark-op">
                    <div class="py-3 text-center">
                        <h1 class="h2 fw-bold text-white mb-2">Dashboard</h1>
                        <nav class="breadcrumb text-center text-white">
                            <a class="breadcrumb-item text-white" href="javascript:void(0)">Home >></a>
                            <a class="breadcrumb-item text-white" href="javascript:void(0)">Library >></a>
                            <a class="breadcrumb-item text-white" href="javascript:void(0)">Data >></a>
                            <span class="breadcrumb-item text-white active">Bootstrap</span>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- END Hero -->
            <div class="row">
                <div class="col-12">
                    <div class="block block-rounded">
                        <div class="block-content">
                            <div class="block-header block-header-default">
                                <h3 class="block-title text-primary">
                                    <button type="button" class="btn bg-primary btn-info me-1 mb-1">
                                        <i class="fa fa-plus opacity-50 me-1"></i> Add Users
                                    </button>
                                </h3>
                            </div>
                            <div class="block-content block-content-full overflow-x-auto">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="block block-rounded mb-0">
                                            <div class="block-content">
                                                {{-- <form class="js-validation" action="#" method="POST"
                                                    onsubmit="return false;">

                                                    <div class="row mb-4">
                                                        <div class="col-6">
                                                            <div class="form-floating">
                                                                <input type="text" class="form-control"
                                                                    id="register4-firstname val-username " name="register4-firstname"
                                                                    placeholder="Enter your firstname">
                                                                <label class="form-label" for="val-username">Username <span
                                                                        class="text-danger">*</span></label>

                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-floating">
                                                                <input type="text" class="form-control"
                                                                    id="register4-lastname" name="register4-lastname"
                                                                    placeholder="Enter your lastname">
                                                                <label class="form-label"
                                                                    for="register4-lastname">Lastname</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-4">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control"
                                                                id="register4-company" name="register4-company"
                                                                placeholder="Enter your company">
                                                            <label class="form-label"
                                                                for="register4-company">Company</label>
                                                        </div>
                                                    </div>
                                                    <div class="mb-4">
                                                        <div class="form-floating">
                                                            <input type="email" class="form-control" id="register4-email"
                                                                name="register4-email" placeholder="Enter your email">
                                                            <label class="form-label" for="register4-email">Email</label>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <div class="col-6">
                                                            <div class="form-floating js-pw-strength-container">
                                                                <label class="p-2 form-label"
                                                                    for="example-pw-strength2">Another
                                                                    Password Field</label>
                                                                <input type="password" class="js-pw-strength form-control"
                                                                    id="example-pw-strength2" name="example-pw-strength2">
                                                                <div
                                                                    class="js-pw-strength-progress pw-strength-progress mt-1">
                                                                </div>
                                                                <p class="js-pw-strength-feedback form-text mb-0"></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-floating js-pw-strength-container">
                                                                <label class="p-2 form-label"
                                                                    for="example-pw-strength2">Another
                                                                    Password Field</label>
                                                                <input type="password" class="js-pw-strength form-control"
                                                                    id="example-pw-strength2" name="example-pw-strength2">
                                                                <div
                                                                    class="js-pw-strength-progress pw-strength-progress mt-1">
                                                                </div>
                                                                <p class="js-pw-strength-feedback form-text mb-0"></p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="mb-4">


                                                    </div>

                                                    <div class="mb-4">
                                                        <div class="form-floating">
                                                            <input type="text" class="js-flatpickr form-control"
                                                                id="example-flatpickr-range" name="example-flatpickr-range"
                                                                placeholder="Select Date Range" data-mode="range"
                                                                data-min-date="today">

                                                            <label class="form-label" for="register4-password2">Date
                                                                Range</label>
                                                        </div>
                                                    </div>

                                                    <div class="mb-4">
                                                        <div class="form-floating">
                                                            <input type="text" class="js-flatpickr form-control"
                                                                id="example-flatpickr-datetime-24"
                                                                name="example-flatpickr-datetime-24"
                                                                data-enable-time="true" data-time_24hr="true">
                                                            <label class="form-label" for="register4-password2">Calendar
                                                                and time picker
                                                                (24-hour format)</label>
                                                        </div>
                                                    </div>


                                                    <div class="mb-4">
                                                        <div class="form-floating">
                                                            <select class="form-select" id="contact1-subject"
                                                                name="contact1-subject" size="1">
                                                                <option value="1">Support</option>
                                                                <option value="2">Billing</option>
                                                                <option value="3">Management</option>
                                                                <option value="4">Feature Request</option>
                                                            </select>
                                                            <label class="form-label"
                                                                for="register4-password2">Dropdown</label>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <p class="text-muted">
                                                                Default multiple select input turns into a tags input
                                                            </p>
                                                        </div>
                                                        <div class="col-lg-8 col-xl-8">
                                                            <div class="mb-4">
                                                                <select class="js-select2 form-select"
                                                                    id="example-select2-multiple"
                                                                    name="example-select2-multiple" style="width: 100%;"
                                                                    data-placeholder="Choose many.." multiple>
                                                                    <option></option>
                                                                    <!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                                                    <option value="1" selected>HTML</option>
                                                                    <option value="2" selected>CSS</option>
                                                                    <option value="3">JavaScript</option>
                                                                    <option value="4">PHP</option>
                                                                    <option value="5">MySQL</option>
                                                                    <option value="6">Ruby</option>
                                                                    <option value="7">Angular</option>
                                                                    <option value="8">React</option>
                                                                    <option value="9">Vue.js</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-4">
                                                        <!-- CKEditor 5 Inline Container -->
                                                        <label class="form-label"
                                                            for="register4-password2">Ckeditor</label>
                                                        <div id="js-ckeditor5-inline">Hello inline CKEditor 5! Click this
                                                            text to edit it!</div>
                                                    </div>
                                                    <div class="mb-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="" id="register4-terms"
                                                                name="register4-terms">
                                                            <label class="form-check-label" for="register4-terms">Agree to
                                                                terms?</label>
                                                        </div>
                                                    </div>
                                                    <div class="mb-4">
                                                        <button type="submit" class="btn btn-primary">
                                                            <i class="fa fa-plus opacity-50 me-1"></i> Register
                                                        </button>
                                                    </div>
                                                </form> --}}
                                                <form class="js-validation" action="be_forms_validation.html"
                                                    method="POST">
                                                    <div class="block block-rounded">
                                                        <div class="block-header block-header-default">
                                                            <h3 class="block-title">Example form</h3>
                                                            <div class="block-options">
                                                                <button type="button" class="btn-block-option">
                                                                    <i class="si si-wrench"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="block-content block-content-full">
                                                            <!-- Regular -->
                                                            <h2 class="content-heading">Regular</h2>
                                                            <div class="row items-push">
                                                                <div class="col-lg-4">
                                                                    <p class="fs-sm text-muted">
                                                                        Username, email and password validation made easy
                                                                        for your login/register forms
                                                                    </p>
                                                                </div>
                                                                <div class="col-lg-8 col-xl-5">
                                                                    <div class="mb-4">
                                                                        <label class="form-label"
                                                                            for="val-username">Username <span
                                                                                class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control"
                                                                            id="val-username" name="val-username"
                                                                            placeholder="Enter a username..">
                                                                    </div>
                                                                    <div class="mb-4">
                                                                        <label class="form-label" for="val-email">Email
                                                                            <span class="text-danger">*</span></label>
                                                                        <input type="email" class="form-control"
                                                                            id="val-email" name="val-email"
                                                                            placeholder="Your valid email..">
                                                                    </div>
                                                                    <div class="mb-4">
                                                                        <label class="form-label"
                                                                            for="val-password">Password <span
                                                                                class="text-danger">*</span></label>
                                                                        <input type="password" class="form-control"
                                                                            id="val-password" name="val-password"
                                                                            placeholder="Choose a safe one..">
                                                                    </div>
                                                                    <div class="mb-4">
                                                                        <label class="form-label"
                                                                            for="val-confirm-password">Confirm Password
                                                                            <span class="text-danger">*</span></label>
                                                                        <input type="password" class="form-control"
                                                                            id="val-confirm-password"
                                                                            name="val-confirm-password"
                                                                            placeholder="..and confirm it!">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- END Regular -->

                                                            <!-- Advanced -->
                                                            <h2 class="content-heading">Advanced</h2>
                                                            <div class="row items-push">
                                                                <div class="col-lg-4">
                                                                    <p class="fs-sm text-muted">
                                                                        You can easily validate any kind of data you like
                                                                        either it is in a normal input, a textarea or a
                                                                        select box
                                                                    </p>
                                                                </div>
                                                                <div class="col-lg-8 col-xl-5">
                                                                    <div class="mb-4">
                                                                        <label class="form-label"
                                                                            for="val-suggestions">Suggestions <span
                                                                                class="text-danger">*</span></label>
                                                                        <textarea class="form-control" id="val-suggestions" name="val-suggestions" rows="5"
                                                                            placeholder="What would you like to see?"></textarea>
                                                                    </div>
                                                                    <div class="mb-4">
                                                                        <label class="form-label" for="val-skill">Best Skill
                                                                            <span class="text-danger">*</span></label>
                                                                        <select class="form-select" id="val-skill"
                                                                            name="val-skill">
                                                                            <option value="">Please select</option>
                                                                            <option value="html">HTML</option>
                                                                            <option value="css">CSS</option>
                                                                            <option value="javascript">JavaScript</option>
                                                                            <option value="angular">Angular</option>
                                                                            <option value="react">React</option>
                                                                            <option value="vuejs">Vue.js</option>
                                                                            <option value="ruby">Ruby</option>
                                                                            <option value="php">PHP</option>
                                                                            <option value="asp">ASP.NET</option>
                                                                            <option value="python">Python</option>
                                                                            <option value="mysql">MySQL</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="mb-4">
                                                                        <label class="form-label"
                                                                            for="val-currency">Currency <span
                                                                                class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control"
                                                                            id="val-currency" name="val-currency"
                                                                            placeholder="$21.60">
                                                                    </div>
                                                                    <div class="mb-4">
                                                                        <label class="form-label"
                                                                            for="val-website">Website <span
                                                                                class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control"
                                                                            id="val-website" name="val-website"
                                                                            placeholder="http://example.com">
                                                                    </div>
                                                                    <div class="mb-4">
                                                                        <label class="form-label" for="val-phoneus">Phone
                                                                            (US) <span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control"
                                                                            id="val-phoneus" name="val-phoneus"
                                                                            placeholder="212-999-0000">
                                                                    </div>
                                                                    <div class="mb-4">
                                                                        <label class="form-label" for="val-digits">Digits
                                                                            <span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control"
                                                                            id="val-digits" name="val-digits"
                                                                            placeholder="5">
                                                                    </div>
                                                                    <div class="mb-4">
                                                                        <label class="form-label" for="val-number">Number
                                                                            <span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control"
                                                                            id="val-number" name="val-number"
                                                                            placeholder="5.0">
                                                                    </div>
                                                                    <div class="mb-4">
                                                                        <label class="form-label" for="val-range">Range
                                                                            [1, 5] <span
                                                                                class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control"
                                                                            id="val-range" name="val-range"
                                                                            placeholder="4">
                                                                    </div>
                                                                    <div class="mb-4">
                                                                        <a href="#" data-bs-toggle="modal"
                                                                            data-bs-target="#modal-terms">Terms &amp;
                                                                            Conditions</a> <span
                                                                            class="text-danger">*</span>
                                                                        <div class="form-check">
                                                                            <input type="checkbox"
                                                                                class="form-check-input" id="val-terms"
                                                                                name="val-terms" value="1">
                                                                            <label class="form-check-label"
                                                                                for="val-terms">I agree</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- END Advanced -->

                                                            <!-- Third Party Plugins -->
                                                            <h2 class="content-heading">Third Party Plugins</h2>
                                                            <div class="row items-push">
                                                                <div class="col-lg-4">
                                                                    <p class="fs-sm text-muted">
                                                                        Check out how easy it is to enable the validation on
                                                                        third party plugins such as Select2
                                                                    </p>
                                                                </div>
                                                                <div class="col-lg-8 col-xl-5">
                                                                    <div class="mb-4">
                                                                        <label class="form-label"
                                                                            for="val-select2">Select2 <span
                                                                                class="text-danger">*</span></label>
                                                                        <select class="js-select2 form-select"
                                                                            id="val-select2" name="val-select2"
                                                                            style="width: 100%;"
                                                                            data-placeholder="Choose one..">
                                                                            <option></option>
                                                                            <!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                                                            <option value="html">HTML</option>
                                                                            <option value="css">CSS</option>
                                                                            <option value="javascript">JavaScript</option>
                                                                            <option value="angular">Angular</option>
                                                                            <option value="react">React</option>
                                                                            <option value="vuejs">Vue.js</option>
                                                                            <option value="ruby">Ruby</option>
                                                                            <option value="php">PHP</option>
                                                                            <option value="asp">ASP.NET</option>
                                                                            <option value="python">Python</option>
                                                                            <option value="mysql">MySQL</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="mb-4">
                                                                        <label class="form-label"
                                                                            for="val-select2-multiple">Select2 Multiple
                                                                            <span class="text-danger">*</span></label>
                                                                        <select class="js-select2 form-select"
                                                                            id="val-select2-multiple"
                                                                            name="val-select2-multiple"
                                                                            style="width: 100%;"
                                                                            data-placeholder="Choose at least two.."
                                                                            multiple>
                                                                            <option></option>
                                                                            <!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                                                            <option value="html">HTML</option>
                                                                            <option value="css">CSS</option>
                                                                            <option value="javascript">JavaScript</option>
                                                                            <option value="angular">Angular</option>
                                                                            <option value="react">React</option>
                                                                            <option value="vuejs">Vue.js</option>
                                                                            <option value="ruby">Ruby</option>
                                                                            <option value="php">PHP</option>
                                                                            <option value="asp">ASP.NET</option>
                                                                            <option value="python">Python</option>
                                                                            <option value="mysql">MySQL</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- END Third Party Plugins -->

                                                            <!-- Submit -->
                                                            <div class="row items-push">
                                                                <div class="col-lg-7 offset-lg-4">
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Submit</button>
                                                                </div>
                                                            </div>
                                                            <!-- END Submit -->
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
@endsection
