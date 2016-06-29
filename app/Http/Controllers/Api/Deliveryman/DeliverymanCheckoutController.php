<?php

namespace CodeDelivery\Http\Controllers\Api\Deliveryman;

use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Http\Requests;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Services\OrderService;
use Illuminate\Http\Request;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;


class DeliverymanCheckoutController extends Controller
{
    /**
     * @var OrderRepository
     */
    private $repository;
    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var OrderService
     */
    private $service;

    /**
     * CheckoutController constructor.
     * @param OrderRepository $repository
     * @param UserRepository $userRepository
     * @param OrderService $service
     */
    public function __construct(
        OrderRepository $repository,
        UserRepository $userRepository,
        OrderService $service)
    {
        $this->repository = $repository;
        $this->userRepository = $userRepository;
        $this->service = $service;
    }

    public function index()
    {
        $id = Authorizer::getResourceOwnerId();
        $orders = $this->repository->with('items')->scopeQuery(function($query) use ($id) {
           return $query->where('user_deliveryman_id', '=',$id);
        })->paginate();

        return $orders;
    }
    public function create()
    {
        $products = $this->productRepository->products();
        return view('customer.order.create', compact('products'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $id = Authorizer::getResourceOwnerId();

        $clientId = $this->userRepository->find($id)->client->id;
        $data['client_id'] = $clientId;
        $order = $this->service->create($data);
        $order = $this->repository->with('items')->find($order->id);
        return $order;

    }

    public function show($id)
    {
        $order = $this->repository->with(['client','items','cupom'])->find($id);
        $order->items->each(function($item){
            $item->product;
        });
        return $order;
    }
}
