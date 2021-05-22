<?php


namespace App\Services;


use App\Events\UserInductionComplete;
use App\Models\CategoryUser;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class Users
{
    /**
     * @param int $id
     * @return User
     */
    public function find(int $id): User
    {
        return User::find($id)->firstOrFail();
    }

    /**
     * @param int $user_id
     * @param array $keys
     * @return Collection
     */
    public function attachCategories(int $user_id, array $keys): Collection
    {
        foreach ($keys as $key) {
            CategoryUser::create([
                'user_id' => $user_id,
                'category_id' => $key
            ]);
        }

        $user = $this->find($user_id);

        UserInductionComplete::dispatch($user);

        return $this->find($user_id)->categories()->get();
    }
}
