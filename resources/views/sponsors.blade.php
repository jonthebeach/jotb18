@extends('layouts.master') 
@section('title') Sponsors @endsection
@section('metaDescription') If you are looking for the perfect event to be in touch with developers and DevOps & to take the pulse of the latest innovations and trends in the world of Big Data become a sponsor at JOTB 2018! @endsection
@section ('content')
<div id="spon-sors-page">
    @include('modules.headerSponsors')
    <section class="companies invert">
        <div class="container">
            <div class="row">
                <div class="col">
                    @include('modules.sponsors')
                </div>
            </div>
        </div>
    </section>
    @include('modules.numbers')
    <section class="packs">
        <div class="container">
            <h2>Sponsorship Packages</h2>
            <div class="table">
                <table>
                    <thead>
                        <tr>
                            @foreach ($sponsorsTable->header as $sponsor)
                                <th>
                                    {{ $sponsor }}
                                </th>
                            @endforeach
                        </tr>
                    </thead>
                        @foreach ($sponsorsTable->table as $tbody)
                            <tbody>
                                @foreach ($tbody as $row)
                                    <tr class="{{ $row->class }}">
                                        @foreach ($row->columns as $column)
                                            <td>
                                                @if ($column === 'true')
                                                    <span class='true'></span>
                                                @elseif ($column === '')
                                                    <span class='false'></span>
                                                @else
                                                    {{ $column }}
                                                @endif
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        @endforeach
                    <tfoot>
                        <tr>
                            <td colspan="6">
                                *Sponsors compromise to provide a minimum of 30% of these tickets to women employees of the company. 
                                ** Only until tickets are available and not applicable to workshops
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <h2>Other Packages</h2>
            <div class="row">
                @foreach ($packs as $pack)
                    <div class="col-md-6 col-lg-3 my-3">
                        <div class="other-pack">
                            <header class="clearfix">
                                <h3>{{ $pack-> title }}</h3>
                                <p class="price"><span>€</span>{{ number_format($pack->price) }}</p>
                                <p class="max">Max. {{ $pack->max }}</p>
                            </header>
                            <article class="styled-content">
                                {!! $pack->description !!}
                            </article>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @include('modules.map')
    @include('modules.previousEditions')
</div>
@endsection