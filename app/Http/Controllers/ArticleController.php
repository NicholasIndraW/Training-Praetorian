<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('index', compact('articles'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $image = $request->file('image');
        $new_name = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('storage/images'), $new_name);

        Article::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'image' => $new_name,
            'penulis' => $request->penulis
        ]);
        return redirect('/');
    }

    public function edit($id)
    {
        $article = Article::find($id);
        return view('edit', compact('article'));
    }

    public function update(Request $request, $id)
    {
        $image = $request->file('image');
        $new_name = time() . '.' . $image->getClientOriginalExtension();
        $image->move(storage_path('images'), $new_name);

        Article::where('id', $id)
            ->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'image' => $new_name,
                'penulis' => $request->penulis
            ]);

        return redirect('/');
    }

    public function destroy($id)
    {
        $image = Article::find($id);
        Storage::delete('images/' . $image->image);
        Article::destroy($id);
        return redirect('/');
    }
}
