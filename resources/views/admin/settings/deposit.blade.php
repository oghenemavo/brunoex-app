<form action="{{ route('admin.validate.deposit', $deposit->id) }}" method="POST">
    @csrf
    @method('PUT')

    <p>Amount: {{ $deposit->amount }}</p>

    <input type="hidden" name="status" value="{{ $deposit->status }}">

    <select name="action">
        <option value="1">Accept</option>
        <option value="2">Reject</option>
    </select>

    <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-primary">
            Invest
        </button>
    </div>

</form>