<div class="col-lg-4 col-md-12 col-sm-12 col-12">
    <div class="sidebar-area">
        <div class="sidebar-top">
            <img src="
                @if($user->image)
                    {{ getFile($user->image) }}
                @else
                    {{ asset('/') }}assets/frontend/images/user-img.jpg
                @endif
                    " alt="images">
            <h3>{{ \Illuminate\Support\Facades\Auth::user()->name }}</h3>
            <p>Web Developer</p>
        </div>
        <div class="sidebar-links">
            <ul>
                <li><a href="{{ route('user.my-profile') }}" class="{{ @$myProfileActiveClass }}"><span><iconify-icon icon="mdi:user"></iconify-icon></span> <span>My Profile</span></a></li>
                <li><a href="{{ route('user.all-members') }}" class="{{ @$allMemberActiveClass }}"><span><iconify-icon icon="mdi:users-group"></iconify-icon></span> <span>All Member</span></a></li>
                <li><a href="{{ route('user.transaction-history') }}" class="{{ @$transactionActiveClass }}">
                        <span><iconify-icon icon="mdi:file-transfer-outline"></iconify-icon></span> <span>Transaction History</span></a>
                </li>
                @if(auth()->user()->role != 1)
                <li>
                    <a href="{{ route('user.request-member') }}" class="{{ @$requestMemberActiveClass }}">
                        <span><iconify-icon icon="carbon:intent-request-create"></iconify-icon></span> <span>Request member</span></a>
                </li>
                @endif
                <li><a href="{{ route('user.logout') }}"><span><iconify-icon icon="fe:logout"></iconify-icon></span> <span>Log Out</span></a></li>
            </ul>
        </div>
    </div>
</div>
