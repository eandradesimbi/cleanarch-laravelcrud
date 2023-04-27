<?php

namespace App\Core\Services\Library;

use App\Core\Common\Ports\ViewModel;
use App\Core\Domain\Library\Ports\Persistence\ProductRepository;
use App\Core\Domain\Library\Ports\UseCases\ListProduct\{
    ListProductOutputPort,
    ListProductsResponseModel,
    ListProductsUseCase
};

final class ListProductsService implements ListProductsUseCase{

    /**
     * Summary of __construct
     * @param ListProductOutputPort $output
     * @param ProductRepository $repository
     */
    public function __construct(private ListProductOutputPort $output, private ProductRepository $repository){

    }

    public function execute(): ViewModel{
        $products = $this->repository->getAll();
        return $this->output->present(new ListProductsResponseModel($products));
    }
}