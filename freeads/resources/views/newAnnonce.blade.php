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
    <div class="form-container-article">
        <a href="/accueil">
            <img src="{{URL::asset('/image/fleche.png')}}" class="flecheReturn" alt="icone de flèche pour revenir en arrière"/>
        </a>
        <h2 class="form-title">Créé une annonce</h2>
        <form method="post" action="{{ url('/createArticle') }}" enctype="multipart/form-data">
            @csrf
            <div class="input-group">
                <label for="name">Titre</label>
                <input type="text" id="name" name="title" required>
            </div>
            <div class="input-group">
                <label for="name">Description</label>
                <textarea id="password" name="description" rows="4" cols="50">
</textarea>
            </div>
            <div class="input-group">
                <label for="name">Images</label>
                <input type="file" id="file" name="images[]" multiple>
            </div>
            <div class="input-group">
                <label for="name">Prix</label>
                <input type="text" id="password" name="price" required>
            </div>
            <div class="input-group">
                <label for="location">Localisation</label>
                <select id="location" name="location" required>
                    <option value="Lyon">Lyon</option>
                    <option value="Paris">Paris</option>
                    <option value="Marseille">Marseille</option>
                    <option value="Bordeaux">Bordeaux</option>
                    <option value="Toulouse">Toulouse</option>
                    <option value="Nice">Nice</option>
                    <option value="Brest">Brest</option>
                </select>
            </div>
            <div class="input-group">
                <label for="type">Type</label>
                <select id="type" name="type" required>
                    <option value="Animaux">Animaux</option>
                    <option value="Meuble">Meuble</option>
                    <option value="Gaming">Gaming</option>
                    <option value="Mode">Mode</option>
                    <option value="Jouet">Jouet</option>
                </select>
            </div>

            <div class="button-group">
                <button type="submit" class="submit-btn">Ajouter l'annonce</button>
            </div>
        </form>

    </div>
</div>

</body>
</html>

