<?php

use Illuminate\Support\Facades\Auth;

function permission_check($permission){
    if(!Auth::user()->hasPermissionTo($permission)) {
        flash()->addWarning('Your are not authorize to access this files');
        return false;
    }
    return true;
}
