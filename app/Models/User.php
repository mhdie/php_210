<?php

namespace App\Models;

use App\Helpers\InputFilter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Hashing\BcryptHasher;

class User extends Model
{
    public $timestamps = false;
    protected $guarded = ["id"];
    protected $fillable = ["first_name", "last_name", "username", "email", "password"];

    protected $BCrypt;

    public function setPasswordAttribute($value)
    {
        $this->BCrypt = new BcryptHasher();
        $this->attributes['password'] = $this->BCrypt->make($value);
    }

    public static $validationRules = [
        'first_name' => [],
        'last_name' => [],
        'username' => [],
        'email' => [],
        'password' => [],
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public static function clean(array $input)
    {
        return array_filter([
            'first_name' => isset($input['first_name']) ? InputFilter::topPersianCharacter($input['first_name']) : null,
            'last_name' => isset($input['last_name']) ? InputFilter::topPersianCharacter($input['last_name']) : null,
            'username' => isset($input['username']) ? InputFilter::toValidCaseInsensitive($input['username']) : null,
            'email' => isset($input['email']) ? InputFilter::toValidCaseInsensitive($input['email']) : null,
            'password' => isset($input['password']) ? trim($input['password']) : null,
        ]);
    }
}
