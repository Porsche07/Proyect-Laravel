<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;
    protected $primaryKey = 'shift_id';
    protected $fillable = ['calendar_id', 'opening_time', 'closing_time'];

    public function calendar()
    {
        return $this->belongsTo(Calendar::class, 'calendar_id', 'calendar_id');
    }
}
