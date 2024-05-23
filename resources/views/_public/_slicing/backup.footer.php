<section class="section colored noprint" id="contact-us">
        <div class="container">
            <!-- ***** Section Title Start ***** -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="center-heading">
                        <h2 class="section-title">Kirim Pesan</h2>
                    </div>
                </div>
                <div class="offset-lg-3 col-lg-6">
                    <div class="center-text">
                        <p>Jika anda punya kritik atau saran silahkan kirim pesan kepada kami melalui form dibawah.</p>
                    </div>
                </div>
            </div>
            <!-- ***** Section Title End ***** -->

            <div class="row">
                <!-- ***** Contact Text Start ***** -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <h5 class="margin-bottom-30">Keep in touch</h5>
                    <div class="contact-text">
                        <p>
                            Tetap terhubung dengan kami melalui:
                            <br>
                            <i class="fa fa-phone"></i> {{$identitas->telp1}}
                            <br>
                            <i class="fa fa-envelope"></i> {{$identitas->email}}
                        </p>
                    </div>
                    <iframe src="{{ $identitas->googlemap }}" frameborder="0" height="200" class="col-lg-12 col-md-12 col-sm-12 mb-2"></iframe>
                </div>
                <!-- ***** Contact Text End ***** -->

                <!-- ***** Contact Form Start ***** -->
                <div class="col-lg-8 col-md-6 col-sm-12">
                    <div class="contact-form">
                        <form id="contact" action="/mailto" method="post">
                            @csrf
                            <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <fieldset>
                                <input name="name" type="text" class="form-control" id="name" placeholder="Nama Lengkap" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <fieldset>
                                <input name="email" type="email" class="form-control" id="email" placeholder="Alamat E-Mail" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                <textarea name="message" rows="6" class="form-control" id="message" placeholder="Pesan Anda" required=""></textarea>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                <button type="submit" id="form-submit" class="main-button">Kirim Pesan</button>
                                </fieldset>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- ***** Contact Form End ***** -->
            </div>
        </div>
    </section>