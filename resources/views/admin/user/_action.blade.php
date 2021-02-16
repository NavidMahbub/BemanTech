<a style="z-index: 99999999; margin-bottom: 3px;" href="{{ route('admin.user.edit', ['id' => $data->id]) }}" class="btn btn-primary icon-btn text-white">
    <i style="margin-top: -5px; margin-right: 0;" class="fa fa-pencil-square fa-2x"></i>
</a>
<button style="z-index: 99999999; margin-bottom: 3px;" id="delete_{{ $data->id }}" data-did="{{ $data->id }}" type="button" class="delete btn btn-primary icon-btn text-white">
    <i style="margin-top: -5px; margin-right: 0;" class="fa fa-trash fa-2x"></i>
</button >
<a style="z-index: 99999999; margin-bottom: 3px;" href="{{ route('admin.user.approve', ['id' => $data->id]) }}" class="btn btn-primary icon-btn text-white">
    <i style="margin-top: -5px; margin-right: 0;" class="fa fa-{{ $data->approved == 0 ? 'check-square' : 'close' }} fa-2x"></i>
</a>
