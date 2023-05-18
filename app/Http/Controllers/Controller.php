<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}



// $table->id();
// $table->string('full_name');
// $table->string('user_name');
// $table->string('email');
// $table->string('birthdate');
// $table->string('phone');
// $table->string('address');
// $table->string('password');
// $table->string('user_image');
// $table->timestamps();