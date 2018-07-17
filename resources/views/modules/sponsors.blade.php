@if (count($sponsorsGroups) > 0)
    <h2>Sponsors</h2>
    <div class="row">
        @foreach($sponsorsGroups as $sponsorsGroup)
            <div class="col-lg-6 my-2">
                <div class="group">
                    <h3>{{ $sponsorsGroup->first()->sponsorsGroups->title }}</h3>
                    <div class="row mx-1">
                        @foreach($sponsorsGroup as $sponsor)
                            <div class="col-lg-{{ count($sponsorsGroup) > 1 ? '6' : '12' }} px-1">
                                <div class="item">
                                    <a 
                                        href="{{ count($sponsor->jobs) > 0 ? action('JobsPageController@detail', ['id' => $sponsor->id]) : $sponsor->url }}" 
                                        target="{{ count($sponsor->jobs) > 0 ? '_self' : '_blank' }}"
                                    >
                                        <img src="{{ $sponsor->imagePath }}" alt="{{ $sponsor->title }}">
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif