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
                            <th scope="col" wire:click="sortBy('selling_price')"  style="cursor: pointer;">Item Name
                                @include('partials._sort-icon',['field'=>'selling_price'])
                            </th>
                            <th scope="col" wire:click="sortBy('selling_price')"  style="cursor: pointer;">Buying Price
                                @include('partials._sort-icon',['field'=>'selling_price'])
                            </th>
                            <th scope="col" wire:click="sortBy('date_of_revenue')"  style="cursor: pointer;">Selling Price
                                @include('partials._sort-icon',['field'=>'selling_price'])
                            </th>
                            <th scope="col" wire:click="sortBy('date_of_revenue')"  style="cursor: pointer;">Sold Quantity
                                @include('partials._sort-icon',['field'=>'date_of_revenue'])
                            </th>
                            <th scope="col" wire:click="sortBy('selling_price')"  style="cursor: pointer;">Profit Generated
                                @include('partials._sort-icon',['field'=>'selling_price'])
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($sold_items as $i=>$item)
                    <tr>
                        <th scope="row">{{$sold_items->firstitem() + $i}}</th>
                        <td style="text-transform: capitalize">{{@$item->items->item_name}}</td>
                        <td style="text-transform: capitalize">{{\Modules\Purchase\Entities\Purchases::itemBuyingPrice($item->item_id)}}</td>
                        <td style="text-transform: capitalize">{{number_format($item->selling_price)}}/=</td>
                        <td style="text-transform: capitalize">{{number_format($item->quantity_sold)}}</td>
                        <td style="text-transform: capitalize">({{($item->selling_price - Modules\Purchase\Entities\Purchases::itemBuyingPrice($item->item_id))}}@) {{number_format(($item->quantity_sold) * ($item->selling_price - Modules\Purchase\Entities\Purchases::itemBuyingPrice($item->item_id)))}}/=</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 mb-2">
            Showing {{$sold_items->firstItem()}} to {{$sold_items->lastItem()}} out of {{$sold_items->total()}} items
        </div>
        <div class="text-right col-sm-6 mb-2">
            {{$sold_items->links()}}
        </div>
    </div>
    @can('add_sold_items')
    <div class="row">
        <div class="text-right col-sm-12 mb-2">
            <button class="btn btn-sm btn-info mb-2" onclick="Livewire.emit('openModal', 'sold-items.add-sold-item')">Add Sold Item</button>
        </div>
    </div>
    @endcan
</div>
