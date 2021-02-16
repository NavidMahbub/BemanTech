@if(auth()->user()->type == 0)
    <a style="z-index: 99999999; margin-bottom: 5px;" href="{{ route('admin.blog.post.approve', ['id' => $data->id]) }}" class="btn btn-primary icon-btn text-white">
        <i style="margin-top: -5px; margin-right: 0;" class="fa fa-{{ $data->status == 1 ? 'remove' : 'check-square' }} fa-2x"></i>
    </a>
@endif
<a style="z-index: 99999999; margin-bottom: 5px;" href="{{ route('admin.blog.post.edit', ['id' => $data->id]) }}" class="btn btn-primary icon-btn text-white">
    <i style="margin-top: -5px; margin-right: 0;" class="fa fa-pencil-square fa-2x"></i>
</a>
<button style="z-index: 99999999; margin-bottom: 5px;" id="delete_{{ $data->id }}" data-did="{{ $data->id }}" type="button" class="delete btn btn-primary icon-btn text-white">
    <i style="margin-top: -5px; margin-right: 0;" class="fa fa-trash fa-2x"></i>
</button >
