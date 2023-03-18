<div>
    {{-- In work, do what you enjoy. --}}
    <form wire:submit.prevent="updateExpenses" class="m-2">
        <div class="form-group">
            <div class="form-group">
                <label for="ItemId" class="mb-2">Item<span style="color:red">*</span></label>
                <select class="form-control form-select" id="ItemId" wire:model="item_id">
                <option>Select One</option>
                @foreach($items as $item)
                    <option value="{{$item->id}}">{{$item->name_of_item}}</option>
                @endforeach
                </select>
                @error('item_id') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="ExpenseAmount" class="mb-2">Amount<span style="color:red">*</span></label>
                <input type="number" class="form-control" wire:model="expense_amount" id="ExpenseAmount">
                @error('expense_amount') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="NameOfPerson" class="mb-2">Name of Person Or Company<span style="color:red">*</span></label>
                <input type="text" class="form-control" wire:model="name_of_person_or_company" id="NameOfPerson">
                @error('name_of_person_or_company') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="Date" class="mb-2">Date<span style="color:red">*</span></label>
                <input type="date" class="form-control" wire:model="date" id="Date">
                @error('date') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary text-white"> Update Expenses</button>
                    <div wire:loading wire:target="updateExpenses" class="text-success">Wait We are Saving Your Data...</div>
                </div>
            </div>
        </div>
    </form>
</div>
