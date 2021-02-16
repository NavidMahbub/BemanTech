<tr>
    <td style="padding-left:10px; text-align: center;" valign="middle">
        <a href="{{ url('/') }}"><img style="height: 130px; padding: 15px 0;" src="{{ $setting_site->logo }}" border="0"></a>
    </td>
</tr>
<tr>
    <td colspan="2" valign="top">
        <div id="menutopdiv" style="width: 100%;">
            <ul id="menutop" class="menutop">

                @foreach($site_nav as $nav)
                    @if(empty($nav->dropdown))
                        <li>
                            <a href="{{ $nav->url }}">{{ $nav->title }}</a>
                        </li>
                    @else
                        <li>
                            <a href="javascript:void(0)" style="text-transform:none">{{ $nav->title }}</a>
                            <ul class="sub-menutop">
                                @foreach($nav->dropdown as $subnav)
                                    <li>
                                        <a href="{{ $subnav->url }}">{{ $subnav->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </td>
</tr>
