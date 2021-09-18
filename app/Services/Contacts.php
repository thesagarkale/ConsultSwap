<?php


namespace App\Services;


use App\Models\Message;
use App\Models\User;
use App\Support\Pagination;
use App\Transformers\UserTransformer;

class Contacts
{
    /**
     * This will return paginated response for existing conversation of the user
     * @param int $userId
     * @param array $params
     * @return Pagination
     */
    public function getAvailableContacts(int $userId, array $params = []): Pagination
    {
        $defaults = [
            'perpage' => 20,
            'page' => 1,
            'sort_by' => 'last_name',
            'sort_mode' => 'asc',
        ];

        $params = array_merge($params, $defaults);

        $messageQuery = Message::query()->where('to','=', $userId)->select('from')
            ->union(Message::query()->where('from', '=', $userId)->select('to')->getQuery())->get();

        $query = User::query()->whereIn('id', $messageQuery->toArray())->orderBy($params['sort_by'], $params['sort_mode']);

        $total = $query->count();

        $offset = ($params['page'] - 1) * $params['perpage'];

        $query->offset($offset)->limit($params['perpage']);

        $results = $query->get();

        return new Pagination($total, $params['perpage'], $params['page'], $params, $results->all(), new UserTransformer());
    }
}