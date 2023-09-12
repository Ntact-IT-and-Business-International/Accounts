
<div wire:poll.0s>
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
                        <th scope="col" wire:click="sortBy('purchases.id')" style="cursor: pointer;">#
                            @include('partials._sort-icon',['field'=>'purchases.id'])
                        </th>
                        <th scope="col" wire:click="sortBy('name_of_item')"  style="cursor: pointer;">Name of Item
                            @include('partials._sort-icon',['field'=>'name_of_item'])
                        </th>
                        <th scope="col" wire:click="sortBy('quantity')"  style="cursor: pointer;">Quantity
                            @include('partials._sort-icon',['field'=>'quantity'])
                        </th>
                        <th scope="col" wire:click="sortBy('unit_price')"  style="cursor: pointer;">Unit Price
                            @include('partials._sort-icon',['field'=>'unit_price'])
                        </th>
                        <th scope="col" wire:click="sortBy('unit_price')"  style="cursor: pointer;">Total Price
                            @include('partials._sort-icon',['field'=>'unit_price'])
                        </th>
                        <th scope="col" wire:click="sortBy('date_of_purchase')"  style="cursor: pointer;"> Date
                            @include('partials._sort-icon',['field'=>'date_of_purchase'])
                        </th>
                        {{--<th>Option</th>--}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($purchases as $i=>$purchase)
                    <tr>
                        <th scope="row">{{$purchases->firstitem() + $i}}</th>
                        <td style="text-transform: capitalize">{{$purchase->name_of_item}}</td>
                        <td style="text-transform: capitalize">{{$purchase->quantity}}</td>
                        <td style="text-transform: capitalize">{{ number_format($purchase->unit_price)}}</td>
                        <td style="text-transform: capitalize">{{ number_format($purchase->unit_price * $purchase->quantity)}}</td>
                        <td style="text-transform: capitalize">{{$purchase->date_of_purchase}}</td>
                        <td class="text-wrap">
                        <a href="{{URL::signedRoute('EditPurchase', ['purchase_id' =>$purchase->id])}}" class="btn btn-sm btn-info mb-1"> Edit</a>
                        <button wire:click="deletePurchase({{ $purchase->id }})" class=" btn btn-sm btn-danger">Delete</button>
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
            Showing {{$purchases->firstItem()}} to {{$purchases->lastItem()}} out of {{$purchases->total()}} items
        </div>
        <div class="text-right col-sm-6 mb-2">
            {{$purchases->links()}}
        </div>
    </div>
    <div class="row">
        <div class="text-right col-sm-12 mb-2">
            <button class="btn btn-sm btn-info mb-2" onclick="Livewire.emit('openModal', 'purchase.add-purchase')">Add Purchase (s)</button>

        </div>
    </div>
</div>
