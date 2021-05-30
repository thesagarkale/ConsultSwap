<?php


namespace App\Services;


use App\Models\User;
use App\Models\UserMetadata as UserMetadataModel;
use http\Exception\InvalidArgumentException;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

class UserMetadata
{
    /**
     * @var Users
     */
    private $users;

    public function __construct(
        Users $users
    ) {
        $this->users = $users;
    }

    /**
     * @param int $userId
     * @param string $key
     * @return UserMetadataModel|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public function find(int $id)
    {
        return User::find($id);
    }

    /**
     * @param int $userId
     * @param string $key
     * @param $value
     * @return UserMetadataModel
     */
    public function store(int $userId, string $key, $value): User
    {
        $user = $this->users->find($userId);

        if ($user->hasMetadata($key, $userId)) {
            return $this->replace($userId, $key, $value);
        }

        $metadata = UserMetadataModel::create([
            'user_id' => $userId,
            'meta_key' => $key,
            'meta_value' => $value
        ]);

        return $metadata;
    }

    /**
     * @param int $userId
     * @param string $key
     * @param $value
     * @return UserMetadataModel
     */
    public function replace(int $userId, string $key, $value): User
    {
        $metadata = UserMetadataModel::query()->where('user_id', '=', $userId)->where('meta_key', '=', $key)->firstOrFail();

        $metadata->update([
            'meta_value' => $value
        ]);

        return $this->find($userId);
    }
}
