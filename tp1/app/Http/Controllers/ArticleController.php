<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Etudient;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        if ($user) {
            $articles = Article::all();
            $userID = $user->id;
            $etudiant = Etudient::where('user_id', $userID)->first();
            if ($etudiant) {
                $etudiantId = $etudiant->id;
                return view('articles.index', compact('articles', 'etudiantId'));
            }
        }
        $message = "You must be logged as an student user to view articles.";
        return view('articles.index', compact('message'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $etudiants = Etudient::all();
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userID = Auth::user()->id;
        $etudiant = Etudient::where('user_id', $userID)->first();
        // dd($etudiant->id);
        $article = Article::create([
            'titre' => $request->titre,
            'contenu' => $request->contenu,
            'date_de_creation' => $request->date_de_creation,
            'langue' => $request->langue,
            'etudient_id' => $etudiant->id,
        ]);

        return redirect()->route('article.index')->with('success', 'Article created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $etudiants = Etudient::all();
        return view('articles.edit', compact('article', 'etudiants'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $article->update([
            'titre' => $request->titre,
            'contenu' => $request->contenu,
            'date_de_creation' => $request->date_de_creation,
            'langue' => $request->langue,
            'etudient_id' => $request->etudient_id,
        ]);

        return redirect()->route('article.show', $article)->with('success', 'Article updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('article.index')->with('success', 'Article deleted successfully');
    }
}
