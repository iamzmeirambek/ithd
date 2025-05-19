<?php

namespace app\CommandBus\Commands\Category;

use Spatie\DataTransferObject\DataTransferObject;

class DestroyCategoryCommand extends DataTransferObject
{
    public int $id;
}
