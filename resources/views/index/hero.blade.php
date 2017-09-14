<!--Mask-->
<div class="view hm-black-light hero" id="home">
    <div class="full-bg-img flex-center">
      <div class="white-text text-center">
        @foreach ($users as $user)
          <h2 class="intro-heading wow fadeIn">{{ ucfirst($user->name) }}</h2>
        @endforeach
        <h3 class="intro-subtext wow fadeIn" data-wow-delay="0.2s">Web Developer</h3>
        <a href="#about"><i class="fa fa-"></i></a>
      </div>
    </div>
</div>
<!--/.Mask-->
