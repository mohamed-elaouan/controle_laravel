<x-MasterPage title="Edit Articles">
    <div style="display: flex;flex-direction: column;align-items: center;">
        <h1>Modification :</h1>
        @if ($errors->any())
            <div class="alert alert-danger container" role="alert">
                <h4>Errors :</h4>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form style="display: flex;flex-direction: column;width: 60%;gap: 10px;" enctype="multipart/form-data"
            action="{{ route('Produit.update', $article->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="exampleInputEmail1">Decription :</label><span style="color: red">*</span>
                <textarea class="form-control"  name="description" id="exampleFormControlTextarea1" rows="5">{{ $article->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Prix:</label><span style="color: red">*</span>
                <input type="number" name="prix" value="{{ $article->prix }}" class="form-control">
                <input type="text" name="id" hidden value="{{ $article->id }}">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Image 1:</label><span style="color: red">*</span>
                <input type="file" name="image1" accept="image/*" class="form-control">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Image 2:</label><span style="color: red">*</span>
                <input type="file" name="image2" accept="image/*" class="form-control">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Image 3:</label>
                <input type="file" name="image3" accept="image/*" class="form-control">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Image 4:</label>
                <input type="file" name="image4" accept="image/*" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>



    </div>
</x-MasterPage>
