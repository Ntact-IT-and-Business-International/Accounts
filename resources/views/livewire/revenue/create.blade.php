<div>
    {{-- Do your work, then step back. --}}
    <form wire:submit.prevent="submit" class="m-2">
        <div class="form-group">
            <div class="form-group">
                <label for="Amount" class="mb-2">Amount<span style="color:red">*</span></label>
                <input type="text" class="form-control" wire:model="amount" id="NameOfItem">
                @error('amount') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="Date" class="mb-2">Date<span style="color:red">*</span></label>
                <input type="date" class="form-control" wire:model="dateOfRevenue" id="Quantity">
                @error('dateOfRevenue') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="Source" class="mb-2">Source<span style="color:red">*</span></label>
                <input type="text" class="form-control" wire:model="sourceOfFunds" id="Quantity" readonly>
                @error('sourceOfFunds') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary text-white"> Add Revenue</button>
                    <div wire:loading wire:target="submit" class="text-success">Wait We are Saving Your Data...</div>
                </div>
            </div>
    </form>
</div>
