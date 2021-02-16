<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BlogPostResource extends JsonResource
{
    private $response;
    protected $transformer;

    public function __construct($request, $response = null)
    {
        parent::__construct($request);

        $this->response = $response;
        $this->transformer = $this->getTransformer();
    }

    public function toArray($request)
    {
        if ($this->resource)
        {
            switch($this->transformer)
            {
                case 'basic':
                    return $this->basicTransformer();
                case 'list':
                    return $this->listTransformer();
                case 'card':
                    return $this->cardTransformer();
                default:
                    return $this->defaultTransformer();
            }
        }

        return [];
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

    public static function getTransformer()
    {
        if (request()->has('transformer'))
        {
            return request()->get('transformer');
        }

        return null;
    }

    public function basicTransformer()
    {
        return [
            'name' => $this->name,
        ];
    }

    public function listTransformer()
    {
        return [
            'name' => $this->name,
        ];
    }

    public function cardTransformer()
    {
        return [
            'name' => $this->name,
        ];
    }

    public function defaultTransformer()
    {
        return [
            'name' => $this->name,
        ];
    }
}
