<header class="clearfix" id="main">
  <!-- MOBILE HEADER -->
  <div class="container">
    <nav id="main" class="navbar navbar-toggleable-md navbar-inverse">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="main-logo navbar-brand" href="/">
        <img class="" src="/images/logo.png" alt="Logo">
      </a>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          @foreach ($menuItems as $menuItem)
            <?php
              $status = (Request::is($menuItem->url . '*') && $menuItem->url != '')
                || (Request::is('/') && $menuItem->url == '')
                || (Request::is('about') && $menuItem->url == '') ? 'active ' : '';
              $status .= (isset($menuItem->children) ? 'children': '');
            ?>
            <li class="{{ $status }}">
              <a href="/{{ $menuItem->url }}">
                &lt;{{ $menuItem->title }}/&gt;
                @if(isset($menuItem->children) && count($menuItem->children) > 0)
                  <span class="caret"></span>
                @endif
              </a>
              @if(isset($menuItem->children) && count($menuItem->children) > 0)
                <ul>
                  @foreach($menuItem->children as $child)
                    <li class="{{ (Request::is( $child->url . '*') && $child->url != '') ? 'active' : '' }}">
                      <a href="{{ isset($child->external) ? '' : '/' }}{{ $child->url }}" target="{{ isset($child->external) ? '_blank' : '_self' }}" {{ isset($child->external) ? 'rel=nofollow' : ''}}>
                        &lt;{{ $child->title }}/&gt;
                      </a>
                    </li>
                  @endforeach
                </ul>
              @endif
            </li>
          @endforeach
        </ul>
      </div>
    </nav>
  </div>
</header>