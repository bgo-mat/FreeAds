<?php

namespace App\Http\Controllers;

use App\Models\Messages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function showIndex()
    {
        return view('index');
    }

    public function showAccueil()
    {
        return view('accueil');
    }
    public function showProfil()
    {
        return view('profil');
    }
    public function showNewAnnonce()
    {
        return view('newAnnonce');
    }
    public function showMessagerie()
    {
        $user = Auth::user();

        $messages_recus = Messages::with('sender')->where('receiver_id', $user->id)->get();

        $messages_envoyes = Messages::with('receiver')->where('sender_id', $user->id)->get();

        return view('messagerie', [
            'messages_recus' => $messages_recus,
            'messages_envoyes' => $messages_envoyes
        ]);
    }

    public function showNewMessage()
    {
        return view('newMessage');
    }

    public function showNewMessage2($dest, Request $request)
    {

        $object = $request->object;

        return view('newMessage2', [
            'dest' => $dest,
            'object' =>$object
        ]);

    }



}
