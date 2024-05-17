<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
{
    public function createArticle(Request $request)
    {
        $user = Auth::user();

        $article = Articles::create([
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'price' => $request->price,
            'type' => $request->type,
            'created_by' => $user->id,
            'created_at' => now(),
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('images', 'public');
                Images::create([
                    'article_id' => $article->id,
                    'url' => $path,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        return redirect()->route('main.article');
    }

    public function read()
    {
        $articles = Articles::with('images')->get();

        return view('allArticle', ['articles' => $articles]);
    }

    public function deleteArticle($id)
    {
        $article = Articles::find($id);
        if ($article) {
            $article->delete();
            return redirect()->route('main.article');
        }
    }

    public function editArticleView($id)
    {
        $article = Articles::find($id);
        if ($article) {
            return view('edit', ['article' => $article]);
        }
    }

    public function editArticle($id, Request $request)
    {
        $article = Articles::find($id);

        $dataToUpdate = [];
        if ($request->filled('title')) {
            $dataToUpdate['title'] = $request->title;
        }
        if ($request->filled('description')) {
            $dataToUpdate['description'] = $request->description;
        }
        if ($request->filled('price')) {
            $dataToUpdate['price'] = $request->price;
        }
        if ($request->filled('location')) {
            $dataToUpdate['location'] = $request->location;
        }
        if ($request->filled('type')) {
            $dataToUpdate['type'] = $request->type;
        }

        if (!empty($dataToUpdate)) {
            $article->update($dataToUpdate);
        }

        $images = Images::where('article_id', $id)->get();

        if ($request->hasFile('images')) {
            foreach ($images as $img) {
                $img->delete();
            }

            foreach ($request->file('images') as $image) {
                $path = $image->store('images', 'public');
                Images::create([
                    'article_id' => $id,
                    'url' => $path,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }


        }

        return redirect()->route('main.article');

    }

    public function filter(Request $request)
    {
        $query = Articles::query();

        if ($request->filled('title')) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }

        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }
        if ($request->filled('order')) {
            if($request->order==="vieux"){
                $query->orderBy('created_at', 'asc');
            }else if($request->order==="recent"){
                $query->orderBy('created_at', 'desc');
            }
        }

        $articles = $query->get();

        return view('allArticle', ['articles' => $articles]);
    }


}
