<?php


namespace App\Transformers;


use App\Models\TickTransaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Transactions
{
    /**
     * @var array
     */
    private $transactions;

    public function __construct(Collection $transactions)
    {
        $this->transactions = $transactions;
    }

    public function getTransactions(): Collection
    {
        return $this->transactions;
    }

    public function getLastTransaction(): TickTransaction
    {
        return $this->getTransactions()->last();
    }
}
