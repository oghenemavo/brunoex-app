<x-layouts.auth.user>
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h5 class="nk-block-title">Signup</h5>
            <div class="nk-block-des">
                <p>Create a New Brunoex Account</p>
            </div>
        </div>
    </div><!-- .nk-block-head -->

    <form class="form-validate is-alter" action="{{ route('user.signup.create') }}" method="post">
        @csrf

        <div class="form-group">
            <label class="form-label" for="name">Full Name</label>
            <div class="form-control-wrap">
                <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="Enter your full name" required autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="form-label" for="email">Email</label>
            <div class="form-control-wrap">
                <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Enter your email address" required>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="form-label" for="password">Password</label>
            <div class="form-control-wrap">
                <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                    <em class="passcode-icon icon-show icon ni ni-eye"></em>
                    <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                </a>
                <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter your password" minlength="6" required>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <div class="custom-control custom-control-xs custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="checkbox" name="checkbox" required>
                <label class="custom-control-label" for="checkbox">
                    I agree to Brunoex <a tabindex="-1" href="#">Privacy Policy</a> 
                    &amp; <a tabindex="-1" href="#"> Terms.</a>
                </label>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-lg btn-primary btn-block">Signup</button>
        </div>
    </form><!-- form -->

    <div class="form-note-s2 pt-4"> 
        Already have an account ? 
        <a href="{{ route('user.login') }}"><strong>Sign in instead</strong></a>
    </div>
    <!-- <div class="text-center pt-4 pb-3">
        <h6 class="overline-title overline-title-sap"><span>OR</span></h6>
    </div>
    <ul class="nav justify-center gx-8">
        <li class="nav-item"><a class="nav-link" href="#">Google</a></li>
    </ul> -->
</x-layouts.auth.user>