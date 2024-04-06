<footer class="myfooter text-center text-lg-start ">
    <div class="row justify-content-evenly align-items-center w-100 ">
        {{-- TITOLO E ICONE --}}
        <div class="col-3 text-center d-flex flex-column justify-content-center align-items-center">
            <p class="display-6 mb-0">Presto.it</p>
            <div class="myicons-footer">
                <a href="https://www.linkedin.com/in/mariomasala-dev-web-developer-full-stack" class="p-3 icon-footer" id="linkedin">
                    <i class="bi bi-linkedin"></i>
                </a>
                <a href="https://github.com/MarioMasala" class="p-3 icon-footer" id="github">
                    <i class="bi bi-github"></i>
                </a>
                <a href="https://shorturl.at/bmuwG" class="p-3 icon-footer" id="google">
                    <i class="bi bi-google"></i>
                </a>
                <a href="https://www.youtube.com/channel/UCHfUan0kzJ8TigvfgqwoxdA" class="p-3 icon-footer" id="youtube">
                    <i class="bi bi-youtube"></i>
                </a>
            </div>
        </div>
        {{-- RICONOSCIMENTI --}}
        <div class="col-3 text-center">
            <p class="fw-lighter footer-paragraph">{{ __('ui.paragraph') }}</p>
        </div>
        {{-- LAVORA CON NOI --}}
        <div class="col-3 text-center">
            <p id="control-footer-p" class="mb-3 fw-lighter">Vuoi lavorare con noi?</p>
            {{-- <p class="fw-lighter">Registrati e clicca qui sotto</p> --}}
            <a href="{{route('lavora-con-noi')}}" class="mybutton-footer text-center">{{ __('ui.becomerevisor') }}</a>
        </div>
    </div>
    {{-- PARAGRAFO COPYRIGHT --}}
    <p class="fw-lighter footer-copyright">© 2024 Copyright: Acodisti Anonimi</p>
    <img class="img-footer" src="/media/city-footer.png" alt="">
</footer>
