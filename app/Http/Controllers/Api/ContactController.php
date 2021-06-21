<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Message;
use App\Events\NewMessage;

class ContactController extends Controller
{

    public function index($id)
    {
        $contact = User::where('id','!=',$id)->get();
        return response()->json($contact);
    }

    public function getMessageFor($id)
    {
        $message = Message::where('from', $id)->orWhere('to' , $id)->get();
        return response()->json($message);
    }


    public function sendMessage(Request $request)
    {
        $message = Message::create([
           'from' => $request->send_id,
           'to' => $request->recei_id,
           'text' => $request->text
        ]);

//        event(
//            $e = new NewMessage($message)
//        );

        event(new NewMessage($message));

        return response()->json($message);
    }

    public function show($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
