<?php

namespace App\Transformers;

use App\Models\ModelInterface;

interface TransformerInterface
{
    public static function transformSingle(ModelInterface $data): array;

    public static function transformArray(array $data): array;
}