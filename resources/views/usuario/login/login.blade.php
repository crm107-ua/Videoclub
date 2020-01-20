<span class="container"><a class="container" style="margin-left:50px">Inicio de sesión</a></span>
<form method="POST" action="{{ route('login') }}">
        @csrf 
        <input id="email" style="margin-bottom:20px; color:white" placeholder="Email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        <input id="password" style="margin-bottom:20px" placeholder="Password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
        <button type="submit" class="btn btn-primary">{{ __('Login') }} </button>
        <a href="{{url('/redirect')}}" class="btn btn-primary" style="width: 90px;" ><img src="https://img.icons8.com/officel/344/facebook-new.png" alt="Smiley face" height="23" width="23"></a>
    </form>


