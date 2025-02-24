<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Work;
class Score extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function work(): HasMany
    {
        return $this->hasMany(Work::class, 'foreign_key');
    }
}
