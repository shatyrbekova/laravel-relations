<?php

namespace App\Http\Controllers;
use App\Article;
use App\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewArticleCreated;
use App\Tag;
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
        
         $articles = Article::paginate(10);
         return view('articles.index', compact( 'articles'));
         
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();
        $tags =Tag::all(); //tags non è collegato altri tags nel controller
        return view('articles.create', compact('authors','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        $request->validate(['title'=>'required|unique:articles|max:255']);
        $request->validate(['content'=>'required']);

        $newArticle =new Article();
        $newAuthor = new Author();
        $data =$request ->all();
        $this->getAndSaveDetails($newArticle, $request);
        Mail::to('info@inbox.it')->send(new NewArticleCreated($newArticle));
        return redirect()->route('articles.show', $newArticle->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

       
        
        $article=Article::find($id);
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    private function getAndSaveDetails(Article $article, $data){
           $article->title=$data['title'];
           $article->content=$data['content'];
           $article->author_id = $data['author_id'];
           $article->save();

           foreach($data['tags']as $tagsId){
               $article->tag()->attach($tagsId);
           }
    }
}
