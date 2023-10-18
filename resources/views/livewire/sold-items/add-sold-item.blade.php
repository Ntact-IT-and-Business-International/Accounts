<div>
    {{-- Do your work, then step back. --}}
    <form wire:submit.prevent="submit" class="m-2">
        <div class="form-group">
            <div class="form-group">
                <label for="NameOfItem" class="mb-2">Name of Item<span style="color:red">*</span></label>
                <select class="form-control" wire:model="itemId" id="NameOfItem">
                    <option value="">Select an item</option>
                    @foreach($items as $item)
                        <option value="{{$item->id}}">{{$item->item_name}}</option>
                    @endforeach
                </select>
                @error('itemId') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="Date" class="mb-2">Selling Price<span style="color:red">*</span></label>
                <input type="text" class="form-control" wire:model="sellingPrice" id="sellingPrice">
                @error('sellingPrice') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="text" class="mb-2">Quantity Sold<span style="color:red">*</span></label>
                <input type="text" class="form-control" wire:model="quantity" id="quantity">
                @error('quantity') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="Date" class="mb-2">Date Of Selling<span style="color:red">*</span></label>
                <input type="date" class="form-control" wire:model="dateOfSelling" id="dateOfSelling">
                @error('dateOfSelling') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary text-white"> Add Sold Item</button>
                    <div wire:loading wire:target="submit" class="text-success">Wait We are Saving Your Data...</div>
                </div>
            </div>
    </form>
</div>
