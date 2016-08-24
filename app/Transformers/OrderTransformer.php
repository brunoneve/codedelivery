<?php

namespace CodeDelivery\Transformers;

use League\Fractal\TransformerAbstract;
use CodeDelivery\Models\Order;

/**
 * Class OrderTransformer
 * @package namespace CodeDelivery\Transformers;
 */
class OrderTransformer extends TransformerAbstract
{


    protected $availableIncludes = ['cupom','items','client','deliveryman'];

    /**
     * Transform the \Order entity
     * @param Order $model
     * @return array
     */
    public function transform(Order $model)
    {
        switch ($model->status){
            case 0:
                $statusText = 'Pendente';
                break;
            case 1:
                $statusText = 'A caminho';
                break;
            case 2:
                $statusText = 'Entregue';
                break;
            case 3:
                $statusText = 'Cancelado';
                break;
            default:
                $statusText = 'Errro Status';
                break;
        }
        return [
            'id'         => (int) $model->id,
            'total'      => (float) $model->total,
            'status'     => (int) $model->status,
            'statusText' => $statusText,
            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

    /**
     * @param Order $model
     * @return \League\Fractal\Resource\Item
     */
    public function includeClient(Order $model)
    {
        return $this->item($model->client,new ClientTransformer());
    }

    /**
     * @param Order $model
     * @return \League\Fractal\Resource\Item|null
     */
    public function includeDeliveryman(Order $model)
    {
        if (!$model->deliveryman)
        {
            return null;
        }
        return $this->item($model->deliveryman,new DeliverymanTransformer());
    }

    /**
     * @param Order $model
     * @return \League\Fractal\Resource\Item|null
     */
    public function includeCupom(Order $model)
    {
        if (!$model->cupom)
        {
            return null;
        }
        return $this->item($model->cupom,new CupomTransformer());
    }

    /**
     * @param Order $model
     * @return \League\Fractal\Resource\Collection
     */
    public function includeItems(Order $model)
    {
        return $this->collection($model->items,new OrderItemTransformer());
    }

}
