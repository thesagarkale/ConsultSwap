<?php


namespace App\Services;


use App\Models\Notification;
use App\Support\Pagination;
use App\Transformers\NotificationsTransformer;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Notifications
{
    private $availablePatchKeys = [
        'read_at'
    ];
    /**
     * @param array $input
     * @return array
     */
    public function createFromInput(array $input): array
    {
        $notification = Notification::create([
            'user_id' => $input['user_id'],
            'related_to' => $input['related_to'],
            'related_id' => $input['related_id'],
            'notification' => $input['notification'],
            'url' => $input['url'],
        ]);

        return NotificationsTransformer::transformSingle($notification);
    }

    /**
     * @param array $params
     * @return Pagination
     */
    public function search(array $params): Pagination
    {
        $defaults = [
            'perpage' => 10,
            'page' => 1,
            'sort_by' => 'created_at',
            'sort_mode' => 'desc',
        ];

        $params = array_merge($defaults, $params);

        $query = $this->getQueryFromParams($params, Notification::query());

        $total = $query->count();

        $offset = ($params['page'] - 1) * $params['perpage'];

        $query->offset($offset)->limit($params['perpage']);

        $results = $query->get();

        return new Pagination($total, $params['perpage'], $params['page'], $params, $results->all(), new NotificationsTransformer());
    }

    /**
     * @param int $id
     * @return Model
     */
    public function find(int $id): Model
    {
        return Notification::query()->where('id', '=', $id)->firstOrFail();
    }

    /**
     * @param array $params
     * @param Builder $query
     * @return Builder
     */
    private function getQueryFromParams(array $params, Builder $query): Builder
    {
        if ($params['user_id'] ?? false) {
            $query->where('user_id', '=', $params['user_id']);
        }

        if (isset($params['is_read'])) {
            if ((bool) $params['is_read']) {
                $query->whereNotNull('read_at');
            } else {
                $query->whereNull('read_at');
            }
        }

        return $query;
    }

    /**
     * @param int $id
     * @param array $input
     * @return Model
     */
    public function patchFromInput(int $id, array $input): Model
    {
        $notification = $this->find($id);

        $payload = array_intersect_key($input, array_flip($this->availablePatchKeys));

        $notification->update($payload);

        return $this->find($id);
    }
}