@extends('layouts.app')

@section('article')
   <div class="container articles-container">
      
    <table class="w-100">
        <thead>
           <tr>
           <th scope="col">#</th>
           <th scope="col">title</th>
           <th scope="col">content</th>
           <th scope="col">author_id</th>
          
           </tr>
       </thead>
       <tbody>
       
            <tr>
                <th scope="row">{{$article->id}}</th>
                <td> {{strtoupper($article->title)}}</td>
                <td> {{ucfirst($article->author->name)}}</td>
                <td> {{ucfirst($article->author->surname)}}</td>
                <td> {{$article->content}}</td>
               
                
            </tr>


    </tbody>
    </table>
    <h3>Ritorna al forum <a href="{{route('posts.create')}}"><i class="bi bi-arrow-left-circle"></i></a></h3>
    




   </div>



@endsection
