<div>
    {{-- Do your work, then step back. --}}
    <form wire:submit.prevent="updatePurchase" class="m-2">
        <div class="form-group">
            <div class="form-group">
                <label for="NameOfItem" class="mb-2">Name of Item<span style="color:red">*</span></label>
                <input type="text" class="form-control" wire:model="name_of_item" id="NameOfItem" readonly>
                @error('name_of_item') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="Quantity" class="mb-2">Quantity<span style="color:red">*</span></label>
                <input type="text" class="form-control" wire:model="quantity" id="Quantity">
                @error('quantity') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="UnitPrice" class="mb-2">Unit Price<span style="color:red">*</span></label>
                <input type="number" class="form-control" wire:model="unit_price" id="UnitPrice">
                @error('unit_price') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="row">
                <div class="col-12 text-center">
                <button type="submit" class="btn btn-primary text-white"> Update Purchase</button>
                <div wire:loading wire:target="updatePurchase" class="text-success">Wait We are Saving Your Data...</div>
                </div>
            </div>
        </div>
    </form>
</div>
