<div class="account-wrap">
    <div class="account-item clearfix js-item-menu">
        <div class="image">
            <img src="{{ asset('images/icon/avatar-01.jpg') }}" alt="John Doe" />
        </div>
        <div class="content">
            <a class="js-acc-btn" href="#">
                @if(Auth::check())
                {{ auth()->user()->name }}
                @endif
            </a>
        </div>
        <div class="account-dropdown js-dropdown">
            <div class="info clearfix">
                <div class="image">
                    <a href="#">
                        <img src="{{ asset('images/icon/avatar-01.jpg') }}" alt="John Doe" />
                    </a>
                </div>
                <div class="content">
                    <h5 class="name">
                        <a href="#"> 
                            @if(Auth::check())
                            {{ auth()->user()->name }}
                            @endif
                        </a>
                    </h5>
                    <span class="email">
                        @if(Auth::check())
                        {{ auth()->user()->email }}
                        @endif
                    </span>
                </div>
            </div>
            <div class="account-dropdown__body">
                <div class="account-dropdown__item">
                    <a href="{{ route('user.profile.show', auth()->user()) }}">
                        <i class="zmdi zmdi-account"></i>Profile</a>
                </div>
                <div class="account-dropdown__item">
                    <a href="#">
                        <i class="zmdi zmdi-settings"></i>Setting</a>
                </div>
                <div class="account-dropdown__item">
                    <a href="#">
                        <i class="zmdi zmdi-money-box"></i>Billing</a>
                </div>
            </div>
            <div class="account-dropdown__footer">
                <form action="/logout" method="post">
                @csrf
                <button class="btn btn-danger">Logout</button>
                </form>
            </div>
        </div>
    </div>
</div>