<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    //

    public function validateRequest($validator)
    {
        if ($validator->fails()) {
            return false;
        }

        return true;
    }
}
