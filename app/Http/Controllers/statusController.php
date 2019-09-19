<?php

namespace App\Http\Controllers;

use App\Model\Backend\Admin;
use Illuminate\Http\Request;

class statusController extends Controller
{
    public function statusAction(Request $request)
    {
        $id = $request->admin_id;
        $item = Admin::find($id);
        $statusItem = $item->status;
        if ($statusItem ==='0') {
            $item->status = '1';
        } else {
            $item->status = '0';
        }
        $item->save();
        $value=$item->status;
        return $value;
    }
}
