@if($sortBy !== $field)
    <i class="text-muted ti-arrow-up"></i>
    <i class="ti-arrow-down"></i>
@elseif($sortDirection == 'asc')
    <i class="color:rgbs(38, 38, 236, 0.774) ti-arrow-up"></i>
@else
    <i class="color:rgbs(38, 38, 236, 0.774) ti-arrow-down"></i>
@endif
