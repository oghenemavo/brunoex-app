<form action="{{ route('admin.plans.update', $plan->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group row">
        <label for="plan_name" class="col-md-4 col-form-label text-md-right">plan_name</label>
        <div class="col-md-6">
            <input type="text" id="plan_name" class="form-control" name="plan_name" value="{{ $plan->name }}" required>
            @if ($errors->has('plan_name'))
            <span class="text-danger">{{ $errors->first('plan_name') }}</span>
            @endif
        </div>
    </div>

    <select name="profit_type">
        <option value="percentage">Percentage</option>
        <option value="fixed">Fixed</option>
    </select>

    <div class="form-group row">
        <label for="profit" class="col-md-4 col-form-label text-md-right">profit</label>
        <div class="col-md-6">
            <input type="number" id="profit" class="form-control" name="profit" min="0.1" max="100" step="0.01" value="{{ $plan->meta['profit'] }}" required>
            @if ($errors->has('profit'))
            <span class="text-danger">{{ $errors->first('profit') }}</span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="min_deposit" class="col-md-4 col-form-label text-md-right">min_deposit</label>
        <div class="col-md-6">
            <input type="number" id="min_deposit" class="form-control" name="min_deposit" min="0.1" step="0.01" value="{{ $plan->meta['min_deposit'] }}" required>
            @if ($errors->has('min_deposit'))
            <span class="text-danger">{{ $errors->first('min_deposit') }}</span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="max_deposit" class="col-md-4 col-form-label text-md-right">max_deposit</label>
        <div class="col-md-6">
            <input type="number" id="max_deposit" class="form-control" name="max_deposit" min="0.1" step="0.01" value="{{ $plan->meta['max_deposit'] }}" required>
            @if ($errors->has('max_deposit'))
            <span class="text-danger">{{ $errors->first('max_deposit') }}</span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="description" class="col-md-4 col-form-label text-md-right">description</label>
        <div class="col-md-6">
            <input type="text" id="description" class="form-control" name="description" value="{{ $plan->meta['description'] }}">
            @if ($errors->has('description'))
            <span class="text-danger">{{ $errors->first('description') }}</span>
            @endif
        </div>
    </div>

    <select name="duration_unit">
        <option value="daily">Daily</option>
        <option value="weekly">Weekly</option>
        <option value="monthly">Monthly</option>
        <option value="annually">Annually</option>
    </select>

    <div class="form-group row">
        <label for="duration" class="col-md-4 col-form-label text-md-right">duration</label>
        <div class="col-md-6">
            <input type="number" id="duration" class="form-control" name="duration" min="1" step="1" value="{{ $plan->meta['duration'] }}" required>
            @if ($errors->has('duration'))
            <span class="text-danger">{{ $errors->first('duration') }}</span>
            @endif
        </div>
    </div>

    <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-primary">
            Invest
        </button>
    </div>

</form>