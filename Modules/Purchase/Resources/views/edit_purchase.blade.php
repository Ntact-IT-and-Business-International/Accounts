@extends('layouts.app')

@section('content')
    @livewire('purchase.edit-purchase',['purchase_id' =>$purchase_id])
@endsection