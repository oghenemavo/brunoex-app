<form action="{{ route('user.make.deposit') }}" method="POST">
    @csrf

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
            Deposit
        </button>
    </div>

</form>