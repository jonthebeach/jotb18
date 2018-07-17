<footer id="main-footer">
    <div class="first">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <h3>Follow
                        <a href="https://twitter.com/JOTB2018" target="_blank" rel="nofollow">@JOTB2018</a>
                    </h3>
                    @if(count($tweets))
                        <div class="tweets">
                            @foreach ($tweets as $tweet)
                            <div class="tweet">
                                <a target="_blank" href=" https://twitter.com/JOTB2018/statuses/{{$tweet[ 'id']}}" rel="nofollow">{{$tweet['text']}}</a>
                            </div>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="get-in-touch">
                                <h3>Get in touch</h3>
                                <p>
                                    <a href="mailto:{{ config('app.email') }}">{{ config('app.email') }}</a>
                                </p>
                                <p>
                                    <a href="tel:{{ config('app.phone') }}">{{ config('app.phone') }}</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Newsletter</h3>
                            @include('modules.newsletterForm', ['form' => 'footer'])
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <figure class="logo-footer">
                        <img src="/images/logo_footer.png" alt="JOTB2018">
                    </figure>
                </div>
            </div>
        </div>
    </div>
    <div class="second">
        <div class="container">
            <div class="rrss">
                <a class="youtube" href="https://www.youtube.com/c/Jonthebeach" target="_blank" rel="nofollow"></a>
                <a class="twitter" href="https://twitter.com/JOTB2018" target="_blank" rel="nofollow"></a>
                <a class="google" href="https://plus.google.com/+Jonthebeach" target="_blank" rel="nofollow"></a>
                <a class="facebook" href="https://www.facebook.com/jotb17/" target="_blank" rel="nofollow"></a>
                <a class="slideshare" href="https://www.slideshare.net/JontheBeach" target="_blank" rel="nofollow"></a>
            </div>
        </div>
    </div>
</footer>