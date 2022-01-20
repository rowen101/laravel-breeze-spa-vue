<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MainModel;

class DailyTask extends Model
{
    protected $table = 'core_daily_tasks';
    protected $fillable = [
        'week', 'site', 'district', 'ticket', 'type', 'subject', 'raisedby', 'position', 'department', 'days', 'hitmiss', 'status', 'sla', 'remarks', 'publish'
    ];
}
