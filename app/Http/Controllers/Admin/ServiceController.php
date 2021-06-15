<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function destroy($id)
    {
        $serviceToDelete = Service::find($id);
        $serviceToDelete->delete();
        return back();
    }
}
