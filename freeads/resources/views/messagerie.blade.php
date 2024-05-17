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

    <div class="blocMainMessagerie">
        <form method="get" action="{{ url("/newMessage") }}">
            <button>Nouveau message</button>
        </form>
        <div class="blocMessagerie">
            <div class="blocReceive">
                <h1>Messages reçus</h1>
                <div class="blocMessageContent">
                    @foreach ($messages_recus as $message)
                        <div class="blocEnfMsg">
                            <p class="txtMessage">From : {{ $message->sender->name }} - {{ $message->object }}</p>
                            @if($message->first_click ===null)
                                <p style="color:red">New</p>
                            @endif
                            <form method="get"  action="{{ url("/openMessage/{$message->id}") }}">
                                @csrf
                                <button class="btnRep">Ouvrir</button>
                            </form>
                        </div>
                    @endforeach

                </div>
            </div>
            <div class="blocReceive">
                <h1>Messages envoyés</h1>
                <div class="blocMessageContent">
                    @foreach ($messages_envoyes as $message)
                        <div class="blocEnfMsg">
                            <p class="txtMessage">To : {{ $message->receiver->name }} - {{ $message->object }}</p>
                        </div>
                    @endforeach
                </div>
            </div>


        </div>
    </div>


</div>
</body>
</html>

