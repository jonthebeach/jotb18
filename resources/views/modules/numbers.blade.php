<section class="numbers">
    <div class="container">
        <div class="row">
            @foreach($numbers AS $number)
                <div class="col-md-3 col-sm-6">
                    <div class="item">
                        <figure>
                            <img src="{{ $number->imagePath }}" alt="{{ $number->title }} " />
                        </figure>
                        <footer>
                            <span>{{ $number->quantity }}</span> {{ $number->title }} 
                        </footer>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>