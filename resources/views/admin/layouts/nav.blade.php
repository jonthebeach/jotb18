<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="/admin/speakers">JOTB Admin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                @if (Auth::guest())
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                @else
                    <li class="nav-item"><a class="nav-link" href="{{ action('Admin\SpeakersController@index') }}">Speakers</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ action('Admin\SupportersController@index') }}">Supp and orgs</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Sponsors <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="nav-link" href="{{ action('Admin\SponsorsController@index') }}">Sponsors</a>
                            <a class="nav-link" href="{{ action('Admin\SponsorsGroupsController@index') }}">Sponsors Groups</a>
                        </div>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ action('Admin\JobsController@index') }}">Jobs</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ action('Admin\MembersController@index') }}">Members</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ action('Admin\WorkshopsController@index') }}">Workshops</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ action('Admin\TopicsController@index') }}">Topics</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Schedule <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="nav-link" href="{{ action('Admin\TalkController@index') }}">Talks</a>
                            <a class="nav-link" href="{{ action('Admin\ScheduleItemController@index') }}">Schedule Items</a>
                        </div>
                    </li>
                    <li class="nav-item"></li>
                    <li class="nav-item"><a class="nav-link" href="{{ action('Admin\BlogItemsController@index') }}">Blog</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Media <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="nav-link" href="{{ action('Admin\VideoGroupsController@index') }}">Video groups</a>
                            <a class="nav-link" href="{{ action('Admin\VideosController@index') }}">Videos</a>
                            <a class="nav-link" href="{{ action('Admin\EventImagesController@index') }}">Images</a>
                        </div>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ action('Admin\SponsorshipPackageController@index') }}">Sponsorship</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </li>
                @endif
            </ul>
        </div>
        <a href="/">JOTB web</a>
    </div>
</nav>