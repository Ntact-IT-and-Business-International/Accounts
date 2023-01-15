<div>
    {{-- The whole world belongs to you. --}}
    <form wire:submit.prevent="updateItem" class="m-2">
            <div class="form-group">
                <div class="form-group">
                    <label for="ItemName" class="mb-2">Item Name<span style="color:red">*</span></label>
                    <input type="text" class="form-control" wire:model="item_name" id="ItemName">
                    @error('item_name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary text-white"> Update Item</button>
                        <div wire:loading wire:target="updateItem" class="text-success">Wait We are Saving Your Data...</div>
                    </div>
                </div>
            </div>
    </form>
</div>

