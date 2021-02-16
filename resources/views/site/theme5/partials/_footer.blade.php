<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4">
                <div class="fcontact">
                    {{ $setting_contact->address }} - {{ $setting_contact->po }}<br>
                    <b>Phone:</b> {{ $setting_contact->primary_phone }}, {{ $setting_contact->secondary_phone }}<br>
                    <b>E-mail:</b> {{ $setting_contact->primary_email }}<br>
                </div>
            </div>
            <div class="col-sm-4">
                <h5>Find Us:</h5>
                <div class="social_icon">
                    <a href="{{ $setting_contact->facebook }}"><i class="fab fa-facebook"></i></a>
                    <a href="{{ $setting_contact->youtube }}"><i class="fab fa-youtube"></i></a>
                    <a href="{{ $setting_contact->linkedin }}"><i class="fab fa-linkedin"></i></a>
                    <a href="{{ $setting_contact->twitter }}"><i class="fab fa-twitter-square"></i></a>
                </div>
            </div>
            <div class="col-sm-4">
                <p class="float-right back_to_top"><a href="#"><i class="fas fa-arrow-up"></i></a></p>
                <p>
                    {{ $setting_site->copyright_text }}<br>
                    <a href="{{ route('site.content.post.index', ['category_slug' => 'privacy']) }}">Privacy</a>
                    &middot;
                    <a href="{{ route('site.content.post.index', ['category_slug' => 'terms']) }}">Terms</a>
                </p>
            </div>
        </div>
    </div>
</footer>