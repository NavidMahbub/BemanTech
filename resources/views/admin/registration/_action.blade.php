<a style="z-index: 99999999; margin-bottom: 3px;" href="{{ route('admin.registration.show', ['id' => $data->id]) }}" class="btn btn-primary icon-btn text-white">
    <i style="margin-top: -5px; margin-right: 0;" class="fa fa-eye fa-2x"></i>
</a>
@if(auth()->user()->type == 0 || auth()->user()->type == 2)
    <a style="z-index: 99999999; margin-bottom: 3px;" href="{{ route('admin.registration.edit', ['id' => $data->id]) }}" class="btn btn-primary icon-btn text-white">
        <i style="margin-top: -5px; margin-right: 0;" class="fa fa-pencil fa-2x"></i>
    </a>
    <a style="z-index: 99999999; margin-bottom: 3px;" href="{{ route('admin.registration.approve', ['id' => $data->id]) }}" class="btn btn-primary icon-btn text-white">
        <i style="margin-top: -5px; margin-right: 0;" class="fa fa-{{ $data->approved == 0 ? 'check-square' : 'close' }} fa-2x"></i>
    </a>
    <a style="z-index: 99999999; margin-bottom: 3px;" href="{{ route('admin.registration.sms', ['id' => $data->id]) }}" class="btn btn-primary icon-btn text-white">
        <i style="margin-top: -5px; margin-right: 0;" class="fa fa-envelope fa-2x"></i>
    </a>
@endif
