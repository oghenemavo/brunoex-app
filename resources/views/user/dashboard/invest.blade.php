<x-layouts.dashboard.user>

    <x-slot name="header">

        <div class="nk-block-between-md g-4">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title fw-normal"> Manage Event Category</h3>
                <div class="nk-block-des">
                    <p>You can manage event category setup.</p>
                </div>
            </div>
            <div class="nk-block-head-content">
                <ul class="nk-block-tools gx-3">
                    <!-- <li><a href="#" class="btn btn-icon btn-primary" data-toggle="modal" data-target="#create_event_ticket"><em class="icon ni ni-plus"></em></a></li> -->
                </ul>
            </div>
        </div>
    </x-slot>

    <div class="nk-block nk-block-lg">
        <div class="row g-gs">
            <div class="col-lg-8">
                <div class="card card-bordered h-100">
                    <div class="card-inner">
                        <form action="#">
                            <div class="form-group">
                                <label class="form-label" for="amount">Amount</label>
                                <div class="form-control-wrap">
                                    <input type="number" class="form-control" id="amount" name="amount" min="" max="">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-lg btn-primary">Save Informations</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

</x-layouts.dashboard.user>


<!-- <form action="{{ route('user.make.investment') }}" method="POST">
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

    <select name="plan">
        <option value="1">plan 1</option>
        <option value="2">plan 2</option>
    </select>

    <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-primary">
            Invest
        </button>
    </div>

</form> -->