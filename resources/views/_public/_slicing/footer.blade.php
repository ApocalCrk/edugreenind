<footer class="noprint">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <ul class="social">
                    <li><a href="{{ $identitas->facebook }}"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="{{ $identitas->twitter }}"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="{{ $identitas->instagram }}"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="https://api.whatsapp.com/send?phone=@if(substr($identitas->telp2, 0, 2) == '08')+62{{substr($identitas->telp2, 1)}}@else{{$identitas->telp2}}@endif"><i class="fa fa-whatsapp"></i></a></li>
                    <li><a href="mailto:{{$identitas->email}}"><i class="fa fa-envelope"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <p class="copyright">Copyright &copy; 2021 TemplateMo X Punten.inc</p>
            </div>
        </div>
    </div>
</footer>