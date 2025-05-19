<?php

namespace App\CommandBus\Commands\Category;

use Spatie\DataTransferObject\DataTransferObject;

class ReorderCategoryCommand extends DataTransferObject
{
    public array $categories;
}
