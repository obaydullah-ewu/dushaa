<!-- Header Area -->
<header class="header">
    <nav class="header-nav inner-nav  @if(URL::to('/') != url()->current()) headerColor @endif">
        <div class="container">
            <div class="navigation">
                <a href="{{ route('home') }}"><img src="{{ asset('/') }}assets/frontend/images/logo.png" alt="logo"></a>
                <ul>
                    <li class="nav-item"><a href="{{ route('home') }}" class="nav-link active">Home</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">শতবর্ষের মিলনমেলা</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Members</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Gallery</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Attraction</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Contact</a></li>
                </ul>
                @if(\Illuminate\Support\Facades\Auth::check())
                    <a href="{{ route('user.my-profile') }}" class="default-button white-button"><span>My Profile</span></a>
                @else
                    <a href="{{ route('login') }}" class="default-button white-button"><span>Login/Register</span></a>
                @endif
            </div>
        </div>
    </nav>
    <div class="container @if(URL::to('/') != url()->current()) d-none @endif">
        <div class="banner-content ptb-70">
            @if($event)
            <h3>DR. MUHAMMAD SHAHIDULLAH HALL ALUMNI ASSOCIATION</h3>
            <h1>{{ $event->name }}</h1>
            <h4>DATE: {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $event->date)->format('d M, Y') }}</h4>
            <h4>VENUE: {{ $event->venue }}</h4>
            <h4>REGISTRATION DEADLINE: {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $event->registration_deadline)->format('d M, Y') }}</h4>
            <div class="deadline-countdown">
                <ul id="example">
                    <li id="day"><span class="days">00</span>
                        <p class="days_text">Days</p></li>
                    <li id="hour"><span class="hours">00</span>
                        <p class="hours_text">Hours</p></li>
                    <li id="minute"><span class="minutes">00</span>
                        <p class="minutes_text">Minutes</p></li>
                    <li id="second"><span class="seconds">00</span>
                        <p class="seconds_text">Seconds</p></li>
                </ul>
            </div>
            <div class="group-button mt-30">
                <a href="#" class="default-button"><span>Register</span></a>
            </div>
            @endif
        </div>
    </div>
</header>
