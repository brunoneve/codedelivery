<?php

namespace CodeDelivery\Transformers;

use League\Fractal\TransformerAbstract;
use CodeDelivery\Models\OrderItem;

/**
 * Class OrderItemTransformer
 * @package namespace CodeDelivery\Transformers;
 */
class OrderItemTransformer extends TransformerAbstract
{


    /**
     * @var array
     */
    protected $defaultIncludes = ['product'];
    /**
     * Transform the \OrderItem entity
     * @param OrderItem $model
     * @return array
     */
    public function transform(OrderItem $model)
    {
        return [
            'id'         => (int) $model->id,
            'product_id' => (int) $model->product_id,
            'qtd'        => (int) $model->qtd,
            'price'      => (float)$model->price,

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

    /**
     * @param OrderItem $model
     * @return \League\Fractal\Resource\Item
     */
    public function includeProduct(OrderItem $model)
    {
        return $this->item($model->product, new ProductTransformer());
    }
}
