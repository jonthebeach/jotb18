@extends('layouts.headerImage', ['imagePath' => $blogItem->imagePath]) 

@section('headerImageTitle') {{ $blogItem->title }} @endsection 