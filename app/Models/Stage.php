<?php

namespace App\Models;

use App\Http\HasHashedId;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    use HasFactory;
    use HasHashedId;

    protected $hashOnly = true;

    public $appends = ['hash'];

    protected $guarded = [];

    protected $fillable = ['user_id', 'background', 'stage_type', 'displayable'];

    public function users() {
        return $this->belongsToMany('App\Models\User');
    }
}
