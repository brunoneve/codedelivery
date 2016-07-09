<?php

namespace CodeDelivery\Transformers;
use League\Fractal\TransformerAbstract;
use CodeDelivery\Models\User;
/**
 * Class UserTransformer
 * @package namespace CodeDelivery\Transformers;
 */
class UserTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['client'];
    /**
     * Transform the \User entity
     * @param User $model
     * @return array
     */
    public function transform(User $model)
    {
        return [
            'id'         => (int) $model->id,
            'name'       => $model->name,
            'email'      => $model->email,
            'role'       => $model->role,

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
    /**
     * @param User $model
     * @return \League\Fractal\Resource\Item
     */
    public function includeClient(User $model)
    {
        if ($model->client)
        {
            return $this->item($model->client, new ClientTransformer());
        }
        return null;
    }
}