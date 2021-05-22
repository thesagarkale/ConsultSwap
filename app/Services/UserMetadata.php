<?php


namespace App\Services;


use App\Models\UserMetadata as UserMetadataModel;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

class UserMetadata
{
    public function createFromInput(int $user_id, string $key, $value): UserMetadataModel
    {
        $collection = UserMetadataModel::query()->where('user_id', '=', $user_id)
            ->where('meta_key', '=', $key)->get();

        if ($collection->count() > 1) {
            throw new UnprocessableEntityHttpException('More that one metadata found');
        }

        if ($collection->count()) {
            dd($collection->first());
        }

        $metadata = UserMetadataModel::create([
            'user_id' => $user_id,
            'meta_key' => $key,
            'meta_value' => $value
        ]);

        return $metadata;
    }
}
