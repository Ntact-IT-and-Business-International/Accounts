@extends('layouts.app')

@section('content')

@livewire('items.edit-items',['item_id' =>$item_id])

@endsection
