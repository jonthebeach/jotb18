@extends('layouts.master') 
@section('title') 404 @endsection
@section('metaDescription') Page not found @endsection
@section ('content')
<div id="e-404">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <img src="/images/pizza-404.png" alt="Pizza party error 404" />
            </div>
            <div class="col-sm-4">
                <h1>404</h1>
                <div>
                    <b>Ouch!</b> The day we were developing this page we were having a pizza party and could not deliver some decent code. Maybe you can find what you were looking for in the following sections:
                    <ul>
                        @foreach ($menuItems as $menuItem)
                            <li>
                                <a href="{{ empty($child->url) ? '/' : $child->url }}" {{ isset($menuItem->external) ? 'rel=nofollow' : ''}}>&lt;{{ $menuItem->title }}/&gt;</a>
                            </li>
                            @if(isset($menuItem->children) && count($menuItem->children) > 0)
                                @foreach ($menuItem->children as $child)
                                    @if (!isset($child->external))
                                        <li>
                                            <a href="{{ empty($child->url) ? '/' : $child->url }}" >&lt;{{ $child->title }}/&gt;</a>
                                        </li>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection