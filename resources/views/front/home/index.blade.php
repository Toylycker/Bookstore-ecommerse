@extends('front.layouts.app')
@section('title') Best books in the world @endsection
@section('content')
    @if($discount->count() > 0)
        @include('front.home.index.discount')
    @endif
    @if($bestseller->count() > 0)
        @include('front.home.index.bestseller')
    @endif
    @if($popular->count() > 0)
        @include('front.home.index.popular')
    @endif
    @if($recommend->count() > 0)
        @include('front.home.index.recommend')
    @endif
    @if($new->count() > 0)
        @include('front.home.index.new')
    @endif
@endsection