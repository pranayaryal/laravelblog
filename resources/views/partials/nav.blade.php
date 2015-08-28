<nav class="top-bar" data-topbar role="navigation">
    <ul class="title-area">
        <li class="name">
            <h1><a href="/">BLOG</a></h1>
        </li>
    </ul>

    <section class="top-bar-section">

        <ul class="left">
          <li><a href="/articles">Articles</a></li>

          <li>
            @yield('logout') 
          </li>
          <li>
            @yield('login')
          </li>
          <li>
            @yield('register')
          </li>
        </ul>

        <ul class="righeet">
            <li>{!! link_to_action('ArticlesController@show', "Go to the latest blog: ".$latest->title, [$latest->id])!!}</li>
            
        </ul>
    </section>
</nav>