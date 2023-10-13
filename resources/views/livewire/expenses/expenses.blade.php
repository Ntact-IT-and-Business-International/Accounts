
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
                        <th scope="col" wire:click="sortBy('expenses.id')" style="cursor: pointer;">#
                            @include('partials._sort-icon',['field'=>'expenses.id'])
                        </th>
                        <th scope="col" wire:click="sortBy('item_name')"  style="cursor: pointer;">Item
                            @include('partials._sort-icon',['field'=>'item_name'])
                        </th>
                        <th scope="col" wire:click="sortBy('expense_amount')"  style="cursor: pointer;">Amount
                            @include('partials._sort-icon',['field'=>'expense_amount'])
                        </th>
                        <th scope="col" wire:click="sortBy('name_of_person_or_company')"  style="cursor: pointer;">Person | Company
                            @include('partials._sort-icon',['field'=>'name_of_person_or_company'])
                        </th>
                        <th scope="col" wire:click="sortBy('date')"  style="cursor: pointer;"> Date
                            @include('partials._sort-icon',['field'=>'date'])
                        </th>
                        @can('view_expenses_option')
                        <th>Option</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach ($expenses as $i=>$expense)
                    <tr>
                        <th scope="row">{{$expenses->firstitem() + $i}}</th>
                        <td style="text-transform: capitalize">{{$expense->name_of_item}}</td>
                        <td style="text-transform: capitalize">{{ number_format($expense->expense_amount)}}/=</td>
                        <td style="text-transform: capitalize">{{$expense->name_of_person_or_company}}</td>
                        <td style="text-transform: capitalize">{{$expense->date}}</td>
                        @can('view_expenses_option')
                        <td class="text-wrap">
                        @can('edit_expenses')
                        <a href="{{URL::signedRoute('EditExpenses', ['expenses_id' =>$expense->id])}}" class="btn btn-sm btn-info mb-1"> Edit</a>
                        @endcan
                        @can('delete_expenses')
                        <button wire:click="deleteExpenses({{ $expense->id }})" class=" btn btn-sm btn-danger">Delete</button>
                        @endcan
                        </td>
                        @endcan
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 mb-2">
            Showing {{$expenses->firstItem()}} to {{$expenses->lastItem()}} out of {{$expenses->total()}} items
        </div>
        <div class="text-right col-sm-6 mb-2">
            {{$expenses->links()}}
        </div>
    </div>
    <div class="row">
        <div class="text-right col-sm-12 mb-2">
            <button class="btn btn-sm btn-info mb-2" onclick="Livewire.emit('openModal', 'expenses.add-expenses-form')">Add expenses (s)</button>

        </div>
    </div>
</div>
