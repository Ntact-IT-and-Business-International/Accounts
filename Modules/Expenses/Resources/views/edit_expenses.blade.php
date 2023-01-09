@extends('layouts.app')

@section('content')
    @livewire('expenses.edit-expenses',['expenses_id' =>$expenses_id])
@endsection
