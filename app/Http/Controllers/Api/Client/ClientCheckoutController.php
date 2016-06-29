<?php

namespace CodeDelivery\Http\Controllers\Api\Client;

use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Http\Requests;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\ProductRepository;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;


class ClientCheckoutController extends Controller
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
     * @var ProductRepository
     */
    private $productRepository;
    /**
     * @var OrderService
     */
    private $service;

    /**
     * CheckoutController constructor.
     * @param OrderRepository $repository
     * @param UserRepository $userRepository
     * @param ProductRepository $productRepository
     * @param OrderService $service
     */
    public function __construct(
        OrderRepository $repository,
        UserRepository $userRepository,
        ProductRepository $productRepository,
        OrderService $service)
    {
        $this->repository = $repository;
        $this->userRepository = $userRepository;
        $this->productRepository = $productRepository;
        $this->service = $service;
    }

    public function index()
    {
        $id = Authorizer::getResourceOwnerId();

        $clientId = $this->userRepository->find($id)->client->id;
        $orders = $this->repository->with('items')->scopeQuery(function($query) use ($clientId) {
           return $query->where('client_id', '=',$clientId);
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
