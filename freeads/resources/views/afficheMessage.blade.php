<!DOCTYPE html>
<html>
<head>
    <title>Slide Navbar</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
<div class="mainPage">
    <div class="navBarre">
        <form action="{{ url("/showAllArticles") }}">
            <button>Voir toute les annonces</button>
        </form>
        <a href="/newAnnonce">
            <button>Créé une annonce</button>
        </a>
        <a href="/profil">
            <button>Modifier le profil</button>
        </a>
        <form action="{{ url("/infoProfil") }}">
            <button>Voir mes infos personnel</button>
        </form>
        <form method="get" action="{{ url("/messages") }}">
            <button>Messagerie</button>
        </form>
        <form method="post" action="{{ url("/logout") }}">
            @csrf
            <button>Déconnexion</button>
        </form>
    </div>

    <div class="blocAffMessagerie">
        <a href="/messages">
            <img src="{{URL::asset('/image/fleche.png')}}" class="flecheReturn" alt="icone de flèche pour revenir en arrière"/>
        </a>
<p class="messagePage">From : {{ $from->name }}</p>
        <p></p>
        <p>Objet : </p>
        <p class="messagePage">{{ $message->object }}</p>
        <p>Message :</p>
        <p class="contentMessage messagePage">{{ $message->content }}</p>
        <form method="get"  action="{{ url("/newMessage2/{$from->name}") }}">
            @csrf
            <input type="text" id="name" name="object" style="display:none">
            <button class="btnRep2">Répondre</button>
        </form>
    </div>


</div>
</body>
</html>

