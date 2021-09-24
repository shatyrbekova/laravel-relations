@extends('templates.home')

@section('create')
    <div class="container">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
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
           <br>
            <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="author_id">Autore</label>
                    </div>
                    <select class="custom-select" id="author_id" name="author_id">
                      <option selected>Sceglie....</option>
                      @foreach ($authors as $author)
                          <option value="{{$author->id}}"> {{ucfirst($author->name)}} {{ucfirst($author->surname)}}</option>
                      @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                 <input type="submit" value="Salva" class="form-control">
            </div>

        </form>
     
    </div>


@endsection
