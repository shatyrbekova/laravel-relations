@extends('templates.home')

@section('article')
   <div class="container articles-container">
      

                <h2> {{strtoupper($article->title)}}</h2>
                
                <h3> {{ucfirst($article->author->name)}}</h3>
                <h3> {{ucfirst($article->author->surname)}}</h3>
                <img src="{{$article->author->picture}}" alt="picture">
                <p> {{$article->content}}</p>
               
                
            
    <h3>Ritorna al forum <a href="{{route('articles.create')}}"><i class="bi bi-arrow-left-circle"></i></a></h3>
    




   </div>



@endsection
