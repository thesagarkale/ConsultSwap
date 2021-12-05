<?php

namespace App\Services;

use App\Events\NewMessage;
use App\Models\Message;
use App\Models\User;
use App\Support\Pagination;
use App\Transformers\MessagesTransformer;
use App\Transformers\UserTransformer;
use Illuminate\Support\Facades\Auth;

class Messages
{
    /**
     * @param array $params
     * @return Pagination
     */
    public function search(array $params): Pagination
    {
        $defaults = [
            'page' => 1,
            'perpage' => 100,
            'sort_by' => 'created_at',
            'sort_mode' => 'asc'
        ];

        $params = array_merge($params, $defaults);

        $query = $this->getQuery($params);

        $total = $query->count();

        $results = $query->get();

        return new Pagination($total, $params['perpage'], $params['page'], $params, $results->all(), new MessagesTransformer());
    }

    /**
     * @param array $input
     * @return array
     */
    public function createFromInput(array $input): array
    {
        $message = Message::create([
            'to' => $input['to'],
            'from' => Auth::user()->id,
            'message' => $input['message'],
        ]);

        broadcast(new NewMessage($message));

        //dispatch();

        return MessagesTransformer::transformSingle($message);
    }

    /**
     * @param array $params
     * @return \Illuminate\Database\Eloquent\Builder
     */
    private function getQuery(array $params)
    {
        $query = Message::query();

        if ($params['contact_id'] ?? false) {
            $query->where(function ($query) use ($params) {
                $query->where('from', '=', $params['contact_id'])
                    ->where('to', '=', Auth::user()->id);
            })->orWhere(function ($query) use ($params) {
                $query->where('from', '=', Auth::user()->id)
                    ->where('to', '=', $params['contact_id']);
            });
        }

        return $query;
    }
}