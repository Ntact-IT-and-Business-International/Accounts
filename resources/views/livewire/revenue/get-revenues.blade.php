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
                            <th scope="col" wire:click="sortBy('item_name')"  style="cursor: pointer;">Amount
                                @include('partials._sort-icon',['field'=>'item_name'])
                            </th>
                            <th scope="col" wire:click="sortBy('date_of_revenue')"  style="cursor: pointer;">Date Of Revenue
                                @include('partials._sort-icon',['field'=>'date_of_revenue'])
                            </th>
                            <th scope="col" wire:click="sortBy('source_of_revenue')"  style="cursor: pointer;">Source Of Revenue
                                @include('partials._sort-icon',['field'=>'source_of_revenue'])
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($revenues as $i=>$item)
                    <tr>
                        <th scope="row">{{$revenues->firstitem() + $i}}</th>
                        <td style="text-transform: capitalize">{{number_format($item->amount)}}/=</td>
                        <td style="text-transform: capitalize">{{$item->date_of_revenue}}</td>
                        <td style="text-transform: capitalize">{{$item->source_of_revenue}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 mb-2">
            Showing {{$revenues->firstItem()}} to {{$revenues->lastItem()}} out of {{$revenues->total()}} items
        </div>
        <div class="text-right col-sm-6 mb-2">
            {{$revenues->links()}}
        </div>
    </div>
    @can('add_revenue')
    <div class="row">
        <div class="text-right col-sm-12 mb-2">
            <button class="btn btn-sm btn-info mb-2" onclick="Livewire.emit('openModal', 'revenue.create')">Add Revenue (s)</button>
        </div>
    </div>
    @endcan
</div>
