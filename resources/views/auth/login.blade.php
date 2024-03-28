<x-layout>
    <div class="container-fluid p-0 h-100 w-100 d-flex justify-content-center bg-form">
        <div class="row justify-content-center align-items-center vh-100 w-100 p-0">
            <div class="col-12 d-flex align-items-center justify-content-center p-0">
                <div class="login-form">
                    <form action="{{route('login')}}" class="login" method="POST">
                        @csrf
                        <p class="title-form third-font-text">{{__('ui.login')}}</p>
                        <div class="email-container" class="email">
                            <div class="input">
                                
                                <i class="bi bi-envelope email"></i>
                                
                                <input type="email"  autocomplete="off" name="email"/><span class="label" id="email">{{ __('email') }}</span>
                                
                            </div> @error('email')
                            <p class="alert-my">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="password-container">
                            <div class="input">
                                
                                <i class="bi bi-lock password" ></i>
                                
                                <input
                                type="password"
                                name="password"
                                autocomplete="off"
                                /><span class="label">{{ __('ui.password') }}</span>
                                
                            </div> @error('password')
                            <p class="alert-my">{{ $message }}</p>
                            @enderror
                            <p class="fontSize-letter-login">
                               {{__('ui.notaccount')}}
                                <a href="" class="a-login-redirect">{{__('ui.register')}}</a>
                            </p>
                        </div>
                        
                        <div class="btn-login-container">
                            <button class="btn-my" type="submit">{{__('ui.login')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
<!--  <form action="{{route('login')}}" method="POST">
    @csrf
    
    <div class="mb-3">
        <label for="email" class="form-label">Inserisci Mail:</label>
        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
        
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Inserisci Password:</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    
    
    <button type="submit" class="btn btn-primary">Invia</button>
    
</form>