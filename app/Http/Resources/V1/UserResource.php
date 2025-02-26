<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type'=>'user',
            'id' => $this->id,
            'attributes' => [
                'name' => $this->name,
                'email' => $this->email,
                'isManager'=>$this->is_manager,
                $this->mergeWhen($request->routeIs('authors.*'),[
                    'email_verified_at' => $this->email_verified_at,
                    'created_at' => $this->created_at,
                    'updated_at' => $this->updated_at,
                ]),
            ],
            'included' => TicketResource::collection($this->whenLoaded('tickets')),
            'links' => [
                'self' => route('authors.show', ['author' => $this->id])
            ]
        ];
    }
}
