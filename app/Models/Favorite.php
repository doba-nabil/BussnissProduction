<?php

namespace App\Models;

use App\Cart\Money;
use App\Models\PaymentMethod;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{

    /**
     * Don't auto-apply mass assignment protection.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Fetch the model that was favorited.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function favorited()
    {
        return $this->morphTo();
    }
}
