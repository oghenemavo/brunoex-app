<form action="{{ route('user.make.transfer') }}" method="POST">
    @csrf

    <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-right">email</label>
        <div class="col-md-6">
            <input type="email" id="email" class="form-control" name="email" required>
            @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="narration" class="col-md-4 col-form-label text-md-right">Narration</label>
        <div class="col-md-6">
            <input type="text" id="narration" class="form-control" name="narration" required>
            @if ($errors->has('narration'))
                <span class="text-danger">{{ $errors->first('narration') }}</span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="amount" class="col-md-4 col-form-label text-md-right">Amount</label>
        <div class="col-md-6">
            <input type="number" id="amount" class="form-control" name="amount" min="0.1" step="0.01" required>
            @if ($errors->has('amount'))
                <span class="text-danger">{{ $errors->first('amount') }}</span>
            @endif
        </div>
    </div>


    <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-primary">
            Invest
        </button>
    </div>

</form>