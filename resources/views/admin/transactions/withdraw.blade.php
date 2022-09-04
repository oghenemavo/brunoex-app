<form action="{{ route('admin.validate.withdraw', $withdraw->id) }}" method="POST">
    @csrf
    @method('PUT')

    <p>Amount: {{ $withdraw->amount }}</p>

    <input type="hidden" name="status" value="{{ $withdraw->status }}">

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