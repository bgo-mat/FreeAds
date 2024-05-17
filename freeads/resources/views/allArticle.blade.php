<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
    <title>All Articles</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">
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
    <div class="blocFind">
        <h1 class="header-title">Articles</h1>

            <form method="get" class="search-container" action="{{ url('/filter') }}" enctype="multipart/form-data">
                @csrf
                <input type="text" class="search-bar" name="title" placeholder="Rechercher...">
                <select class="filter-menu" name="type" id="category-filter">
                    <option value="">Catégories</option>
                    <option value="Animaux">Animaux</option>
                    <option value="Meuble">Meuble</option>
                    <option value="Gaming">Gaming</option>
                    <option value="Mode">Mode</option>
                    <option value="Jouet">Jouet</option>
                </select>
                <select class="filter-menu" name="location" id="price-filter">
                    <option value="">Villes</option>
                    <option value="Lyon">Lyon</option>
                    <option value="Paris">Paris</option>
                    <option value="Marseille">Marseille</option>
                    <option value="Bordeaux">Bordeaux</option>
                    <option value="Toulouse">Toulouse</option>
                    <option value="Nice">Nice</option>
                    <option value="Brest">Brest</option>
                </select>
                <select class="filter-menu" name="order" id="price-filter">
                    <option value="">Trier par...</option>
                    <option value="vieux">Plus vieux</option>
                    <option value="recent">Plus récent</option>

                </select>
                <button class="search-button" type="submit">Rechercher</button>
            </form>


    </div>
    <div class="blacArticles">

        @foreach ($articles as $article)
            <div class="article-container">
                <h2 class="article-title">{{ $article->title }}</h2>
                <p class="article-description">{{ $article->description }}</p>
                <p class="article-location">Location: {{ $article->location }}</p>
                <p class="article-price">Price: {{ $article->price }}</p>
                <p class="article-price">Type: {{ $article->type }}</p>
                <div class="carousel">
                    <div class="carousel-inner images-container">
                        @foreach ($article->images as $index => $image)
                            <img src="{{ asset('storage/' . $image->url) }}" alt="Image for {{ $article->title }}" class="article-image carousel-image {{ $index == 0 ? 'active' : '' }}">
                        @endforeach
                    </div>
                    <a class="carousel-control prev">❮</a>
                    <a class="carousel-control next">❯</a>
                </div>
                @if (Auth::check() && Auth::user()->id == $article->created_by)
                    <div class="blocBtn">
                        <form class="formBtn" method="get" action="{{ url("/editArticleView/{$article->id}") }}">
                            @csrf
                            <button class="edit-article-btn">Edit Article</button>
                        </form>
                        <form class="formBtn" method="post" action="{{ url("/deleteArticle/{$article->id}") }}">
                            @csrf
                            <button class="delete-article-btn">Delete Article</button>
                        </form>
                    </div>
                @endif
            </div>
        @endforeach
    </div>

</div>

</body>
</html>
