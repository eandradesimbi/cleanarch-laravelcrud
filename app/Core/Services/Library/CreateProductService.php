<?php

namespace App\Core\Services\Library;

use App\Core\Common\Ports\ViewModel;
use App\Core\Domain\Library\Entities\Product;
use App\Core\Domain\Library\Exceptions\InvalidProductName;
use App\Core\Domain\Library\Ports\Persistence\ProductRepository;
use App\Core\Domain\Library\Ports\UseCases\CreateProduct\{
    CreateProductOutputPort,
    CreateProductRequestModel,
    CreateProductResponseModel,
    CreateProductUseCase,
};
use App\Core\Domain\Library\ValueObjects\ProductName;

final class CreateProductService implements CreateProductUseCase
{
    /**
     * @param CreateProductOutputPort $output
     * @param ProductRepository $productRepository
     */
    public function __construct(private CreateProductOutputPort $output, private ProductRepository $productRepository)
    {
    }

    /**
     * @param CreateProductRequestModel $requestModel
     *
     * @return ViewModel
     */
    public function execute(CreateProductRequestModel $requestModel): ViewModel
    {
        $this->validate($requestModel);

        $productName = new ProductName($requestModel->getName(), $requestModel->getCategory());
        $product = $this->productRepository->create(new Product(name: $productName));

        return $this->output->present(new CreateProductResponseModel($product));
    }

    /**
     * @param CreateProductRequestModel $requestModel
     *
     * @return void
     */
    private function validate(CreateProductRequestModel $requestModel): void
    {
        if (empty($requestModel->getFirstName())) {
            throw new InvalidProductName();
        }

        if (empty($requestModel->getLastName())) {
            throw new InvalidProductName();
        }
    }
}
