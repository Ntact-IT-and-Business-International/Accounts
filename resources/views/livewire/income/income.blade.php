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
                        <th scope="col" wire:click="sortBy('incomes.id')" style="cursor: pointer;">#
                            @include('partials._sort-icon',['field'=>'incomes.id'])
                        </th>
                        <th scope="col" wire:click="sortBy('amount')"  style="cursor: pointer;">Amount
                            @include('partials._sort-icon',['field'=>'amount'])
                        </th>
                        <th scope="col" wire:click="sortBy('source_of_income')"  style="cursor: pointer;">Source of Income
                            @include('partials._sort-icon',['field'=>'source_of_income'])
                        </th>
                        <th scope="col" wire:click="sortBy('created_at')"  style="cursor: pointer;"> Date
                            @include('partials._sort-icon',['field'=>'created_at'])
                        </th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($income as $i=>$item)
                    <tr>
                        <th scope="row">{{$income->firstitem() + $i}}</th>
                        <td style="text-transform: capitalize">{{ number_format($item->amount)}}</td>
                        <td style="text-transform: capitalize">{{$item->source_of_income}}</td>
                        <td style="text-transform: capitalize">{{$item->created_at}}</td>
                        <td class="text-wrap">
                        <a href="{{URL::signedRoute('EditIncome', ['income_id' =>$item->id])}}" class="btn btn-sm btn-info mb-1"> Edit</a>
                        <button wire:click="deleteIncome({{ $item->id }})" class=" btn btn-sm btn-danger">Delete</button>
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
            Showing {{$income->firstItem()}} to {{$income->lastItem()}} out of {{$income->total()}} items
        </div>
        <div class="text-right col-sm-6 mb-2">
            {{$income->links()}}
        </div>
    </div>
    <div class="row">
        <div class="text-right col-sm-12 mb-2">
            <button class="btn btn-sm btn-info mb-2" onclick="Livewire.emit('openModal', 'income.add-income')">Add Income (s)</button>

        </div>
    </div>
</div>
