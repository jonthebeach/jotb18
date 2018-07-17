@extends('layouts.master') 
@section('title') {{ $blogItem->title }} @endsection
@section('metaDescription') Blog of J on the beach @endsection
@section ('content')
<div id="blog-item-detail">
    @include('modules.headerBlogItem')
    <section>
        <div class="container">
            <div class="styled-content">
                {!! $blogItem->description !!}
            </div>
        </div>
    </section>
    @include('modules.numbers')
    @include('modules.map')
    @include('modules.previousEditions')
</div>
@endsection