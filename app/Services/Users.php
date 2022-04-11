<?php


namespace App\Services;


use App\Events\UserInductionComplete;
use App\Models\CategoryUser;
use App\Models\Follower;
use App\Models\User;
use App\Support\Pagination;
use App\Transformers\QuestionsTransformer;
use App\Transformers\UserTransformer;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Query\Builder;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

class Users
{
    /*public function search(array $params): Pagination
    {
        $defaults = [
            'page' => 1,
            'perpage' => 100,
            'sort_mode' => 'asc'
        ];

        $params = array_merge($params, $defaults);

        $query = $this->getQuery($params);

        $total = $query->count();

        $results = $query->get();

        return new Pagination($total, $params['perpage'], $params['page'], $params, $results->all(), new UserTransformer());
    }*/

   /* private function getQuery(array $params): Builder
    {

    }*/

    /**
     * @param int $id
     * @return User
     */
    public function find(int $id): User
    {
        return User::find($id);
    }

    /**
     * @param string $username
     * @return User
     */
    public function findByUsername(string $username): User
    {
        $user = User::query()->where('username', '=', $username)->firstOrFail();

        if (!$user instanceof User) {
            throw new UnprocessableEntityHttpException('User is unprocessable');
        }

        return $user;
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

    /**
     * @param int $id
     * @return Pagination
     */
    public function getFollowers(int $id): Pagination
    {
        $user = $this->find($id);

        $params = [
            'page' => 1,
            'perpage' => 20,
        ];

        $results = $user->getFollowerUsers();

        $total = count($results);

        return new Pagination($total, $params['perpage'], $params['page'], $params, $results, new UserTransformer());
    }

    /**
     * @param int $id
     * @return Pagination
     */
    public function getFollowings(int $id): Pagination
    {
        $user = $this->find($id);

        $params = [
            'page' => 1,
            'perpage' => 20,
        ];

        $results = $user->getFollowingUsers();

        $total = count($results);

        return new Pagination($total, $params['perpage'], $params['page'], $params, $results, new UserTransformer());
    }

    public function checkIfFollows(int $id, int $follow): bool
    {
        $builder = Follower::query()->where('user_id', '=', $id)
            ->where('follower_id', '=', $follow)
            ->whereNull('deleted_at');

        return $builder->count() > 0;
    }
}
