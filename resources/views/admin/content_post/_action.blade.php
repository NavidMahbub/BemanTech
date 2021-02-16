<a style="z-index: 99999999;" href="{{ route('admin.content.category.post.edit', ['category_id' => Session::get('content_category_id'), 'id' => $data->id]) }}" class="btn btn-primary icon-btn text-white">
    <i style="margin-top: -5px; margin-right: 0;" class="fa fa-pencil-square fa-2x"></i>
</a>
<button id="delete_{{ $data->id }}" data-did="{{ $data->id }}" type="button" class="delete btn btn-primary icon-btn text-white">
    <i style="margin-top: -5px; margin-right: 0;" class="fa fa-trash fa-2x"></i>
</button >
