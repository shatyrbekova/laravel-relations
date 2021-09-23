@extends('templates.home')

@section('create')
    <div class="container">
         <h3>Crea un nuovo articolo</h3>

         <form action="{{route('articles.store')}}" method="post">
            @csrf
            <div class="form-group ">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control">
            </div>

            <div class="form-group ">
                <label for="content">Content</label>
                <input type="text" name="content" id="content" class="form-control">
            </div>

            <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="author_id">Options</label>
                    </div>
                    <select class="custom-select" id="author_id" name="author_id">
                      <option selected>Choose...</option>
                      @foreach ($authors as $author)
                          <option value="{{$author->id}}"> {{$author->name}}</option>
                      @endforeach
                    </select>
                </div>
            </div>
            div class="form-group">
                 <input type="submit" value="Salva" class="form-control">
            </div>

        </form>
     
    </div>


@endsection