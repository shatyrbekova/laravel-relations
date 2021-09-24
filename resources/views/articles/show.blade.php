@extends('templates.home')

@section('article')
   <div class="container articles-container text-center">


                <h2> {{strtoupper($article->title)}}</h2>
                
                <h3> {{ucfirst($article->author->name)}}</h3>
                <h3> {{ucfirst($article->author->surname)}}</h3>
                <img src="{{$article->author->picture}}" alt="picture">
                <p> {{$article->content}}</p>
                Tags:
                @foreach ($article->tag as $tag)
                  <span class="chips">
                
                        {{$tag->name}}
                  
                  </span>
              
                
               
                   
                @endforeach
               
                
            
    <h3><a href="{{route('articles.create')}}">Ritorna al forum <i class="bi bi-arrow-left-circle"></i></a></h3>
    




   </div>



@endsection
