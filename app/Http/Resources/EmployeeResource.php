<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class EmployeeResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'hire_date' =>  Carbon::parse($this->hire_date)->format('d-m-Y'),
            'position' => new PositionResource($this->whenLoaded('position')),
            'status' => $this->status,
            'salary' => number_format($this->salary, 0, ',', '.'),
            'photo' => $this->photo ? asset('storage/images/employee/' . $this->photo) : asset('images/profile/user_profile.jpeg')
        ];
    }
}
