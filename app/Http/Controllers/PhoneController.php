<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use App\Models\User;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    public function createPhone(Request $request)
    {
        if (User::where('id', $request->user_id)) {
            $phone = new Phone();
            $phone->phone = $request->phone;
            $phone->user_id = $request->user_id;
            $phone->save();

            $status = "phone";

            return response()->json(compact('status', 'phone'), 200);
        }

        $status = "failed";

        return response()->json(compact('status'), 401);
    }

    public function getPhone(Request $request)
    {
        $phone = Phone::where('user_id', $request->user_id)->get();

        $status = "success";

        return response()->json(compact('status', 'phone'), 200);
    }
}
