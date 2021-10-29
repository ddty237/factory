<?php

namespace App;

use Illuminate\Http\Request;

function checkedCategorie(Request $request)
{
    if($request->haveCategorie == 'on'){
        return 'disabled';
    }else{
        return '';
    }
}

