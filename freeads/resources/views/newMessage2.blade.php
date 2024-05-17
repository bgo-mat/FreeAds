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

    <div class="blocNewMessage">
        <div class="blocHeadMessage">
            <a href="/messages">
                <img src="{{URL::asset('/image/fleche.png')}}" class="flecheReturn" alt="icone de flèche pour revenir en arrière"/>
            </a>
            <p>New message</p>
        </div>

        <div class="form-container-article">

            <form method="post" action="{{ url('/sendMessage') }}" enctype="multipart/form-data">
                @csrf
                <div class="input-group">
                    <label for="name">Destinataire</label>
                    <p>{{ $dest }}</p>
                    <input type="text" id="name" style="display: none"  name="destinataire" value="{{ $dest }}">
                </div>
                <div class="input-group">
                    <label for="name">Objet</label>
                    <input type="text" id="name" style="display:none" name="object" value="">
                </div>
                <div class="input-group">
                    <label for="name">Contenue du message</label>
                    <textarea id="password" name="texte" rows="10" cols="77">
                </textarea>
                </div>
                <div class="button-group">
                    <button type="submit" class="submit-btn">Envoyer</button>
                </div>
            </form>
        </div>

    </div>


</div>
</body>
</html>

