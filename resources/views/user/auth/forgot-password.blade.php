<x-layouts.auth.user>
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h5 class="nk-block-title">Forgot password?</h5>
            <div class="nk-block-des">
                <p>If you forgot your password, well, then we'll email you instructions to reset your password.</p>
            </div>
        </div>
    </div><!-- .nk-block-head -->
    <form action="{{ route('user.forgot.create') }}" class="form-validate is-alter" method="post">
        @csrf
        
        <div class="form-group">
            <div class="form-label-group">
                <label class="form-label" for="email">Email</label>
            </div>
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
            <button class="btn btn-lg btn-primary btn-block">Send Reset Link</button>
        </div>
    </form><!-- form -->
    <div class="form-note-s2 pt-5">
        <a href="{{ route('user.login') }}"><strong>Return to login</strong></a>
    </div>
</x-layouts.auth.user>