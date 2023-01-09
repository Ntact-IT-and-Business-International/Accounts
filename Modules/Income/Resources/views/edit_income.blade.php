@extends('layouts.app')

@section('content')
    @livewire('income.edit-income',['income_id' =>$income_id])
@endsection
