<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    /**
     * @return BelongsTo
     */
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
