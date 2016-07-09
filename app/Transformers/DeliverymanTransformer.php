<?php

namespace CodeDelivery\Transformers;

use CodeDelivery\Models\User;
use League\Fractal\TransformerAbstract;

class DeliverymanTransformer extends TransformerAbstract
{
    /**
     * Transform the User entity
     * @param User $model
     * @return array
     */
    public function transform(User $model)
    {
        return [
            'id'         => (int) $model->id,
            'name'       => $model->name,
            'email'      => $model->email,

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}