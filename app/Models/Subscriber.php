<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Subscriber extends Model
{
    use HasFactory;

    protected $table = "subscribers";

    public static function getSubscriber()
    {
    	$records = DB::table('subscribers')->select('id', 'email', 'created_at')->get()->toArray();
    	return $records;
    }
}
