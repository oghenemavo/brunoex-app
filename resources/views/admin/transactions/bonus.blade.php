<form action="{{ route('admin.add.bonus') }}" method="POST">
    @csrf

    <div class="form-group row">
        <label for="uuid" class="col-md-4 col-form-label text-md-right">uuid</label>
        <div class="col-md-6">
            <input type="text" id="uuid" class="form-control" name="uuid" required>
            @if ($errors->has('uuid'))
                <span class="text-danger">{{ $errors->first('uuid') }}</span>
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