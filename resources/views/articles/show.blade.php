@extends('templates.home')

@section('article')
   <div class="container articles-container text-center">

               <div class="row">
                 <div class="col-12">
                  <h1> {{strtoupper($article->title)}}</h1>
                
                <h3>Scritto da: {{ucfirst($article->author->name)}} {{ucfirst($article->author->surname)}}</h3>
                <p>Pubblicato:{{$article->created_at}}</p>
                
                <img src="{{$article->author->picture}}" alt="picture">
                <p> {{$article->content}}</p>
               
                @foreach ($article->tag as $tag)
                  <span class="chips">
                
                        {{$tag->name}}
                  
                  </span>
                   
                @endforeach

                <form method="post" action="{{ route('comment.add') }}">
                  @csrf
                  <div class="form-group">
                      <input type="text" name="comment_body" class="form-control" placeholder="Type your comment" />
                      <input type="hidden" name="article_id" value="{{ $article->id }}" />
                  </div>
                  <div class="form-group">
                      <input type="submit" class="btn btn-warning" value="Add Comment" />
                  </div>
              </form>
                

                 </div>
               </div>
               
                
            
    <h3><a href="{{route('articles.create')}}">Crea un nuovo articolo <i class="bi bi-arrow-left-circle"></i></a></h3>
    




   </div>



@endsection
