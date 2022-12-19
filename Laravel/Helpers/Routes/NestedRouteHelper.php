<?php
namespace App\Helpers\Routes\Web;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;
class Helper
{
    /**
     * Creates resource routes for a child resource of a parent resource.
     * With a specific format.
     * @param string $name Name of the parent resource
     * @param string $child Name of the child resource
     * @param string $controller Controller name of the child
     */
    public static function get($name, $child, $controller)
    {
        Route::middleware('permission')->resource($name.'.'.$child, $controller, [
            // Rename index and creat for parent specific calls. 
            // Example: /user/1/roles/create --> users.roles.user-create
            'names' => [
                'index' => $name.'.'.$child.'.'.Str::singular($name).'-index',
                'create' => $name.'.'.$child.'.'.Str::singular($name).'-create',
                ]
            ])->only(['index', 'store', 'create']);
        Route::prefix('/'.$name)->name($name.'.')->group(function() use ($child, $controller) {
            Route::middleware('permission')->resource($child, $controller)->except(['store']);
        });
    }
}