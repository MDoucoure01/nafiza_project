<x-guest-layout>
    <div class="container">
        <div class="card-top"></div>
        <div class="card">
            <h1 class="title"><span>{{ env('APP_NAME') }}</span>Connexion <span class="msg">Register a new membership</span>
            </h1>
            <div class="col-sm-12">
                <x-validation-errors class="mb-4 text-danger" />
                <form id="sign_in" method="POST">
                    @csrf
                    <div class="input-group"> <span class="input-group-addon"> <i class="zmdi zmdi-account"></i> </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" placeholder="Adresse email" :value="old('email')" required autofocus>
                        </div>
                    </div>
                    <div class="input-group"> <span class="input-group-addon"> <i class="zmdi zmdi-lock"></i> </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Mot de passe" utocomplete="current-password" required>
                        </div>
                    </div>
                    <div class="">
                        <input type="checkbox" name="remember" id="rememberme" class="filled-in chk-col-pink">
                        <label for="rememberme">Se souvenir de moi</label>
                    </div>
                    <div class="text-center">
                        <button style="width: 100%" class="btn btn-raised waves-effect g-bg-blue" >Se connecter</button>
                    </div>
                    <div class="text-center"> <a href="{{ route('password.request') }}">Mot de passe oublié ?</a></div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
