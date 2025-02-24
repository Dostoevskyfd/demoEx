<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Score;
use App\Models\Categorie;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Work extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id', 'id');
    }
    public function categorie(): BelongsTo
    {
        return $this->belongsTo(Categorie::class, 'category_id', 'id');
    }
    public function score(): BelongsTo
    {
        return $this->belongsTo(Score::class, 'scores_id', 'id');
    }
}
