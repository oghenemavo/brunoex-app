<form action="{{ route('user.reset.create') }}" method="POST">
    @csrf

    <input type="hidden" name="token" value="{{ $token }}">

    <div class="form-group row">
            <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
        <div class="col-md-6">
                <input type="text" id="email_address" class="form-control" name="email" required autofocus>
            @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
        </div>
    </div>
    
    <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
        <div class="col-md-6">
                <input type="password" id="password" class="form-control" name="password" required>
            @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif
        </div>
    </div>
    
    <div class="form-group row">
            <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
        <div class="col-md-6">
                <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" required>
            @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
            @endif
        </div>
    </div>

    <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-primary">
            Password Reset
        </button>
    </div>

</form>