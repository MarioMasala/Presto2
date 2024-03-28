<x-layout>
    <div class="container-fluid w-100 p-0 d-flex justify-content-center bg-form">
        <div class="row justify-content-center align-items-center vh-100 w-100 p-0">
            <div class="col-12 d-flex align-items-center justify-content-center p-0">
                
                <div class="form-logout ">
                    <form action="{{route('register')}}" method="POST" class="login">
                        @csrf
                        <p class="title-form">{{ __('ui.register') }}</p>
                       
                            
                            <div class="input "> 
                                
                                <input type="text" name="name"  autocomplete="off"/><span class="label">{{ __('ui.nameregister') }}</span>
                                
                                
                            </div>
                            
                                @error('name')
                                <p class="alert-my">{{ $message }}</p>
                                @enderror
                            
                            <div class="input">
                                
                                <i class="bi bi-envelope email"></i>
                                <input type="email"  autocomplete="off" name="email"/><span class="label">{{ __('ui.emailregister') }}</span>  
                            </div>@error('email')
                            <p class="alert-my">{{ $message }}</p>
                            @enderror
                          
             
                        
                            
                            
                            
                            <div class="input">
                                <i class="bi bi-lock password"></i>
                                <input
                                type="password"
                                name="password"
                                autocomplete="off"
                            /> <span class="label">{{ __('ui.passwordregister') }}</span>
                               </div>  
                             @error('password')
                                <p class="alert-my">{{ $message }}</p>
                                @enderror
                            
                            
                            
                            <div class="input">
                                <i class="bi bi-lock password"></i>
                                <input
                                type="password"
                                id="password_confirmation" name="password_confirmation"
                                autocomplete="off"
                                /><span class="label">{{ __('ui.confirmpassword') }}</span>
                              
                            </div>  @error('password')
                                <p class="alert-my">{{ $message }}</p>
                                @enderror
                            <p class="fontSize-letter-login">
                                Hai un account?
                                <a href="" class="a-login-redirect">{{__('ui.login')}}</a>
                            </p>
                        
                        
                        <div class="btn-login-container">
                            <button class="btn-my" type="submit">{{__('ui.register')}}</button>
                        </div>
                    </form>
                </div>   
                
            </div>
        </div>
    </div>
</x-layout>


<!---  
    
    
    
    <form action="{{route('register')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Inserisci Nome:</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Inserisci Mail:</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
            
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Inserisci Password:</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">conferma la Password:</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
        </div>
        <button type="submit" class="btn btn-primary">Invia</button>
        
    </form>