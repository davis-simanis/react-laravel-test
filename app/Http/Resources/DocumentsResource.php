<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DocumentsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'document_name' => $this->document_name,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'field_count' => $this->fields->count()
        ];
    }
}
