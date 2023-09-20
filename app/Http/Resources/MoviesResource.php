<?php

namespace App\Http\Resources;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MoviesResource extends JsonResource
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
            'title' => $this->title,
            'director' => $this->director,
            'image_url' => $this->image_url,
            'duration' => $this->duration,
            'release_date' => $this->release_date,
            'genre' => $this->genre,
            'metadata' => [
                'total' => Movie::count()
            ]
        ];
    }
}
