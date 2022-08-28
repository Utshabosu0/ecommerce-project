<?php

use Illuminate\Support\Facades\DB;

function roleName($id){

    $roleData = DB::table('roles')->where('id', $id)->first();
    
    return $roleData->name ?? '';

}











?>