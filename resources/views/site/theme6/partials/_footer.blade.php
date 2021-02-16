@php
        $about = \App\Models\ContentCategory::where('slug', 'about')->first();
        $mission = \App\Models\ContentCategory::where('slug', 'mission-vision')->first();
        $offer = \App\Models\ContentCategory::where('slug', 'offer')->first();
        $contact = \App\Models\SettingContact::where('id', 1)->first();
@endphp
<footer id="Footer" class="clearfix">
            <div class="widgets_wrapper" style="padding:60px 0;">
                <div class="container">
                    <div class="column one-third">
                        <aside class="widget widget_text">
                            <h4>About us</h4>
                            <div class="textwidget">
                                <p style="margin-right: 5%;">
                                    {{$about->body}}
                                </p>
                                <ul style="line-height: 30px;">
                                    <li>
                                    <!-- <a href="/company">Read More</a><br> -->
                                        <i class="icon-right-circled" style="color: #8a9bee;"></i><a href="/company">Read More</a>
                                    </li>
                                </ul>
                            </div>
                        </aside>
                    </div>
                    <div class="column one-third">
                        <aside class="widget widget_text">
                            <h4>Our mission</h4>
                            <div class="textwidget">
                                <p style="margin-right: 5%;">
                                    {{$mission->body}}
                                </p>
                                <ul style="line-height: 30px;">
                                    <li>
                                        <i class="icon-right-circled" style="color: #8a9bee;"></i><a href="{{route('site.content.post.index', ['category_slug' => 'mission'])}}">Mission and Visions</a>
                                    </li>
                                </ul>
                            </div>
                        </aside>
                    </div>
                    <div class="column one-third">
                        <aside class="widget widget_text">
                            <h4>Find Us</h4>
                            <div class="textwidget">
                                <ul style="line-height: 30px;">
                                    <li>
                                        <i style="color: #8a9bee;" class="icon-right-circled"></i><a>{{$contact->primary_email}}</a>
                                    </li>
                                    
                                    <li>
                                        <i style="color: #8a9bee;" class="icon-right-circled"></i><a>{{$contact->primary_phone}}</a>
                                    </li>
                                    <li>
                                        <i style="color: #8a9bee;" class="icon-right-circled"></i><a>{{$contact->primary_fax}}</a>  
                                    </li>
                                </ul>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
            <div class="footer_copy">
                <div class="container">
                    <div class="column one">
                        <div class="copyright">
                            &copy; 2019 BeManTech Company - HTML by <a target="_blank" rel="nofollow" href="#">BeManTech</a> </div>
                    </div>
                    <ul class="social"></ul>
                </div>
            </div>
    </div>
    </footer>