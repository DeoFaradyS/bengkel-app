@extends('layouts.app')

@section('title', 'Home')
@section('body-class', 'bg-white')

@section('content')
<x-navbar.main />
<div class="flex flex-col gap-10">
    @include('home.hero')
    @include('home.benefits')

</div>
@endsection