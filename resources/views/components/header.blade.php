<style>
    nav {
        display: flex;
        align-items: center;
        justify-content: space-around;
    }

    .pages a {
        margin-inline: 10px;
        text-decoration: none;
        font
    }
</style>
<nav style="background: cyan;height: 70px;">
    Logo
    <div class="pages d-flex" style="align-items: center;">
        {{-- <a href={{ route('home') }}>Home</a> --}}
        <a href="{{ route('Produit.index') }}">Produts</a>
        {{-- <a href="">Profil</a> --}}
        <div class="auth" style="margin-left: 60px">
            @guest
                <a href={{ route('SignIn') }}>Sign In</a>
                <a href={{ route('SignUp') }}>Sign Up</a>
            @endguest
            @auth
                <div class="dropdown">
                    <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        {{ auth()->user()->name }}
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        {{-- <a class="dropdown-item" href="{{ route('myarticle') }}">My Articles</a> --}}
                        <a class="dropdown-item" href="{{ route('Logout') }}">Sign-Out</a>
                    </div>
                </div>
            @endauth
        </div>


    </div>
</nav>
{{-- once : pour execute code une fois --}}
@once
@endonce
