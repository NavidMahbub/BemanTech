<footer>
    <div class="footer-area black-bg ptb-80">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-4">
                    <div class="footer-widget md-30">
                        <h4 style="color: #ffffff; font-size: 15px; font-weight: 700; margin-bottom: 20px; text-transform: uppercase;">Contact</h4>
                        <div class="address">
                            <ul class="list-unstyled contact">
                                <li><p><strong><i class="fa fa-map-marker"></i> </strong> {{ $setting_contact->address }}</p></li>
                                <li><p><strong><i class="fa fa-envelope"></i></strong> {{ $setting_contact->primary_email }}</p></li>
                                <li><p><strong><i class="fa fa-envelope"></i></strong> {{ $setting_contact->secondary_email }}</p></li>
                                <li> <p><strong><i class="fa fa-phone"></i></strong> {{ $setting_contact->primary_phone }}</p></li>
                                <li> <p><strong><i class="fa fa-phone"></i></strong> {{ $setting_contact->secondary_phone }}</p></li>
                                <li> <p><strong><i class="fa fa-print"></i> </strong> {{ $setting_contact->primary_fax }}</p></li>
                                <li> <p><strong><i class="fa fa-skype"></i> </strong> {{ $setting_contact->skype }}</p></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4">
                    @include('site.theme1.widgets.footer.widget1')
                </div>
                <div class="col-md-3 col-sm-4 hidden-sm">
                    @include('site.theme1.widgets.footer.widget2')
                </div>
                <div class="col-md-3 col-sm-4">
                    @include('site.theme1.widgets.footer.widget3')
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom-area">
        <div class="container">
            <div class="social-icons text-center">
                <label>Find Us:</label>
                <a href="{{ $setting_contact->facebook }}"><i class="fa fa-facebook"></i></a>
                <a href="{{ $setting_contact->twitter }}"><i class="fa fa-twitter"></i></a>
                <a href="{{ $setting_contact->google_plus }}"><i class="fa fa-google-plus"></i></a>
                <a href="{{ $setting_contact->linkedin }}"><i class="fa fa-linkedin"></i></a>
                <a href="{{ $setting_contact->youtube }}"><i class="fa fa-youtube"></i></a>
                <a href="{{ $setting_contact->skype }}"><i class="fa fa-skype"></i></a>
            </div>
            <div class="copyright text-center">
                <p>{{ $setting_site->copyright_text }}</p>
                <a href="javascript:void(0)">{{ $setting_seo->author }}</a>
            </div>
        </div>
    </div>
</footer>
