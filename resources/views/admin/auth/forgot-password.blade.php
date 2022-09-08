<x-layouts.auth.admin>
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h5 class="nk-block-title">Reset password</h5>
            <div class="nk-block-des">
                <p>If you forgot your password, well, then we'll email you instructions to reset your password.</p>
            </div>
        </div>
    </div>
    <form class="form-validate" action="{{ route('user.forgot.create') }}" method="POST">
        @csrf
        <div class="form-group">
            <div class="form-label-group">
                <label class="form-label" for="email">Email</label>
            </div>
            <div class="form-control-wrap">
                <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter your email address" required autofocus>
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
    </form>
    <div class="form-note-s2 text-center pt-4">
        <a href="{{ route('admin.login') }}"><strong>Return to login</strong></a>
    </div>
</x-layouts.auth.admin>


<form method="POST">
    @csrf

    <div class="form-group row">
            <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
        <div class="col-md-6">
                <input type="text" id="email_address" class="form-control" name="email" required autofocus>
            @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
        </div>
    </div>

    <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-primary">
            Request Password Reset
        </button>
    </div>

</form>