<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NotificationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if($this->object_type == 7){
            return [
                'id' => $this->id,
                'read' => $this->read,
                'school_id' => $this->school_id,
                'object' => \App\Models\Student::getStudent($this->object_id),
                'to_role' => \App\Models\User::getRole($this->to_role),
                'from_role' => \App\Models\User::getRole($this->from_role),
                'object_type' => 'student',
                'financial_secreatary_permission' => \App\Models\Student::getStudent($this->object_id),
                
                // 'text' => $this->name . '  =>  Price : Tsh ' . number_format($this->price),
                // 'price' => $this->price,
            ];
        }
        elseif ($this->object_type == 2) {
            // return [
            //     'id' => '$this->id',
            //     // 'student' => \App\Models\Student::getStudent($this->object_id),
            //     // 'text' => $this->name . '  =>  Price : Tsh ' . number_format($this->price),
            //     // 'price' => $this->price,
            // ];
        }
    }
}