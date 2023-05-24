<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'product' => $this->resource->product,
            'col' => $this->resource->col,
            'address' => $this->resource->address,
            'status' => $this->resource->status,
            'date' => $this->resource->created_at,
        ];
    }
}
