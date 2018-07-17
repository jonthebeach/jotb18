@extends('layouts.master') 
@section('title') Blog @endsection
@section('metaDescription') Blog of J on the beach @endsection
@section ('content')
<div id="blog-items">
    @include('modules.headerBlogItems')
    <section>
        <div class="container">
            <div class="row">
                @foreach($blogItems AS $blogItem)
                    <div class="col-12 col-md-4">
                        <a class="blog-item" href="{{ action('BlogItemsPageController@detail', ['id' => $blogItem->id]) }}">
                            <header style="background: url({{ $blogItem->imagePath }}) center; background-size: cover"></header>
                            <article>
                                <h3>{{ $blogItem->title }}</h3>
                                <div class="description">
                                    {{ strip_tags($blogItem->description) }}
                                </div>
                            </article>
                            <footer>
                                <div class="author">
                                    Created by {{ $blogItem->author }}
                                </div>
                                <div class="date">
                                    {{ date_format(date_create($blogItem->created_at), 'Y-m-d') }}
                                </div>
                            </footer>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @include('modules.numbers')
    @include('modules.map')
    @include('modules.previousEditions')
</div>
@endsection