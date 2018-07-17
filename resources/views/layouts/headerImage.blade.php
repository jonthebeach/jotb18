<!-- HEADER IMAGE -->
<section class="headerimage styled-content" style="{{isset($imagePath) ? 'background:url(' . $imagePath .') no-repeat center' : ''}}">
    <div class="container">
        <div class="row align-items-center">
            <div class="overlay">
                <div class="text">
                    <div class="col-12">
                        <h1>@yield('headerImageTitle')</h1>
                    </div>
                    <div class="col-lg-5 col-md-8">
                        <br>
                        @yield('headerImageContent')
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>