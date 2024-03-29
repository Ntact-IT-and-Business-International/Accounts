<div>
    {{-- The Master doesn't talk, he acts. --}}
    <form wire:submit.prevent="updateIncome" class="m-2">
        <div class="form-group">
            <div class="form-group">
                <label for="Amount" class="mb-2">Amount<span style="color:red">*</span></label>
                <input type="number" class="form-control" wire:model="amount" id="Amount">
                @error('amount') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="SourceOfIncome" class="mb-2">Source of Income<span style="color:red">*</span></label>
                <input type="text" class="form-control" wire:model="source_of_income" id="SourceOfIncome">
                @error('source_of_income') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary text-white"> Update Income</button>
                    <div wire:loading wire:target="updateIncome" class="text-success">Wait We are Saving Your Data...</div>
                </div>
            </div>
        </div>
    </form>
</div>
