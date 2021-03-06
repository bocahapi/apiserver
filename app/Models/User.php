<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * @package App\Models
 */
class User extends Model 
{
	protected $table = "users";
    protected $primaryKey = "uid";
    protected $fillable = [
        'email',
        'username',
        'password'
    ];

}