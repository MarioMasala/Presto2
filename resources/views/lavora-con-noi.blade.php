<x-layout>

    <section class="vh-100  d-flex align-items-center justify-content-center">

<h2 class="h2-lavora">{{ __('ui.work') }}</h2>
    </section>
    <section class="vh-100 d-flex justify-content-center align-items-center ">

        <div class="login-form">
        <form class="login">
            @csrf
            <div class="container mt-4">
                <div class=" color-mywhite input pt-1 pb-2">
                  
                {{--<label for="text" class="form-label"></label>--}}
                <input type="text" class="form-control text-white " id="text"> 
                 <span class="label ">{{ __('ui.name') }}</span>
                </div>
                <div class=" color-mywhite input pt-1 pb-2">
                  
                    <i class="bi bi-envelope email pb-1"></i>
                {{--<label for="exampleInputEmail1" class="form-label"></label>--}}
                <input type="email" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp"> 
                 <span class="label">{{ __('ui.email') }}</span>
                </div>
            

                <a href="{{route('become.revisor')}}" class="btn btn-lavora  ">{{ __('ui.becomerevisor') }}</a>
            </div>
        </form>
    </div>
    </section>



</x-layout>
{{--<div class="login-form">
                    <form action="{{route('login')}}" class="login" method="POST">
                        @csrf
                        <p class="title-form third-font-text">{{__('ui.login')}}</p>
                        <div class="email-container" class="email">
                            <div class="input">
                                
                                <i class="bi bi-envelope email"></i>
                                
                                <input type="email"  autocomplete="off" name="email"/><span class="label" id="email">Email</span>
                                
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
                                /><span class="label">Password</span>
                                
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
                </div>--}}