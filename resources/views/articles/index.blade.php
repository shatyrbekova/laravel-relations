@extends('layouts.app')

@section('content')
<div class="container posts-container">
    <h3>Aggiungi un nuovo post <a href="{{route('articles.create')}}"><i class="bi bi-plus-square"></i></a></h3>
     <table class="table">
     <thead>
         <tr>
         <th scope="col" >#</th>
         <th scope="col">TITLE</th>
         <th scope="col">CONTENT</th>
         <th scope="col">AUTHOR</th>
         <th scope="col">ACTIONS</th>
        
         </tr>
     </thead>
     <tbody>
         @foreach($allArticles as $article)
             <tr>
                 <th scope="row" class="id">{{$article->id}}</th>
                 <td>{{strtoupper($article->title)}}</td>
                 <td>{{$article->content}}</td>
                 <td>{{$article->author}}</td>
                 
               
                 <td>
                     <a href="{{ route('articles.show', $post) }}">
                         <button class="btn btn-warning">
                             <i class="bi bi-zoom-in"></i>
                         </button>
                     </a>
 
                     
                     
                    
                </td>
                 
             </tr>

@endsection