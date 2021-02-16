<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class SliderCollection extends ResourceCollection
{
    protected $response;

    public function __construct($request, $response = null)
    {
        parent::__construct($request);

        $this->response = $response;
    }

    public function toArray($request)
    {
        return SliderResource::collection($this->collection);
    }

    public function with($request)
    {
        if ($this->response)
        {
            return [
                'message' => $this->response['message'] ?? '',
                'status' => $this->response['status'] ?? '',
                'code' => $this->response['code'] ?? ''
            ];
        }

        return [];
    }
}

