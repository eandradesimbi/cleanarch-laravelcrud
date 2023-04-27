<?php

namespace App\Core\Domain\Library\Ports\UseCases\ListProduct;

use App\Core\Common\Ports\ViewModel;

interface ListProduct{

    public function execute(): ViewModel;
}