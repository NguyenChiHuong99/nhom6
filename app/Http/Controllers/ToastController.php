<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ToastController extends Controller
{
    public function saveToastToSession(Request $request)
    {
        // Lưu thông báo vào session
        session()->flash('toast', [
            'type' => $request->input('type'),
            'title' => $request->input('title'),
            'text' => $request->input('text')
        ]);

        return response()->json(['message' => 'Toast saved to session successfully']);
    }
}
