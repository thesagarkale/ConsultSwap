<?php


namespace App\Transformers;


use App\Models\Tick;
use Illuminate\Support\Collection;

class Ticks
{
    /**
     * @var Tick
     */
    private $tick;
    /**
     * @var array
     */
    private $includes;

    public function __construct(Tick $tick, array $includes = [])
    {
        $this->tick = $tick;
        $this->includes = $includes;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->tick->id,
            'related_to' => $this->tick->related_to,
            'related_id' => $this->tick->related_id,
            'created_by' => $this->tick->created_by,
            'transactions' => (new Transactions($this->tick->transactions()->get()->toArray())),
        ];
    }

    public function toCollection(): Collection
    {
        return new Collection($this->toArray());
    }
}
