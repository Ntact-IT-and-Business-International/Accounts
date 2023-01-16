<div wire:poll.5s>
    <div class="row text-right">
        <div class="col-sm-1 mb-2">
            <select class="form-control" id="sel1" wire:model='perPage'>
                <option>10</option>
                <option>50</option>
                <option>100</option>
                <option>200</option>
            </select>
        </div>
        <div class="col-sm-7">
            
        </div>
        <div class="col-sm-4 col-lg-4 col-md-4">
            <input wire:model.debounce.300ms="search" class="form-control" type="text" placeholder="Search" aria-label="Search">
        </div>
    </div><br>
    <div class="row card">
        <div class="col-lg-12 col-sm-12 col-md-12">
            <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col" wire:click="sortBy('items.id')" style="cursor: pointer;">#
                            @include('partials._sort-icon',['field'=>'items.id'])
                        </th>
                        <th scope="col" wire:click="sortBy('item_name')"  style="cursor: pointer;">Item Name
                            @include('partials._sort-icon',['field'=>'item_name'])   
                        </th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($all_items as $i=>$item)
                    <tr>
                        <th scope="row">{{$all_items->firstitem() + $i}}</th>
                        <td style="text-transform: capitalize">{{$item->item_name}}</td>
                        <td class="text-wrap">
                        <a href="{{URL::signedRoute('EditItem', ['item_id' =>$item->id])}}" class="btn btn-sm btn-info"> Edit</a>
                        <button wire:click="deleteItem({{ $item->id }})" class=" btn btn-sm btn-danger">Delete</button>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 mb-2">
            Showing {{$all_items->firstItem()}} to {{$all_items->lastItem()}} out of {{$all_items->total()}} items
        </div>
        <div class="text-right col-sm-6 mb-2">
            {{$all_items->links()}}
        </div>
    </div>
    {{-- <div class="row">
        <div class="text-right col-sm-12 mb-2">
            <button class="btn btn-sm btn-info mb-2" onclick="Livewire.emit('openModal', 'items.add-items-form')">Add Item (s)</button>
                
        </div>
    </div> --}}
</div>