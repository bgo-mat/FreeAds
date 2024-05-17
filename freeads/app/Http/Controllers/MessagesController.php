<?php

namespace App\Http\Controllers;

use App\Models\Messages;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{
    public function sendMessage(Request $request)
    {
        $user = Auth::user();
        $receiver_id=User::where("name",$request->destinataire)->first();

         Messages::create([
            'sender_id' => $user->id,
            'receiver_id' => $receiver_id->id,
            'content' =>$request->texte ,
             'object' =>$request->object ,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('main.messagerie');
    }

    public function openMessage($id)
    {
        $message = Messages::find($id);
        $dataToUpdate['first_click'] = now();

        $message->update($dataToUpdate);

        $from = User::find($message->sender_id);

        return view('afficheMessage',[
            'message' => $message,
            'from' => $from,
            ]);
    }
}
