<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CanadaProvince extends Model
{
    protected $connection = 'mysql';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * Override table name
     * @var string
     */
    protected $table = 'canada_province';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        
    ];
}
