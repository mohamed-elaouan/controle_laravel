<x-MasterPage title="Home-Page">
    <script>
        const Confirmation = () => {

        }
    </script>
    <div class="container">
        <h1>Article Page</h1>
        <a href="{{ route('Produit.create') }}" class="btn btn-primary">Add New</a>
        <div
            style="display: flex;flex-direction: row;flex-wrap: wrap;justify-content: space-around;gap:15px; margin-top: 10px">
            @foreach ($ListArticle as $item)
                <div class="card" style="width: 18rem;">
                    {{-- ../../../storage/app/public/    {{ asset('storage/' . $item->Photo_Url) }} --}}
                    {{-- "https://picsum.photos/500/300" ---> afficher les images aleatoirement --}}
                    <td>
                        <a href="{{ route('Produit.show', $item->id) }}">
                            <img class="card-img-top" src={{ asset('storage/' . $item->image1) }} alt="Title"></a>
                    </td>
                    <div class="card-body">
                        <p class="card-text" style="text-align: start"> + {{ $item->description }}</p>
                        <div class="row">
                            <p class="text-danger fw-bold">{{ $item->prix }}dh</p>
                            {{-- @auth --}}
                            {{-- @if (auth()->user()->id === $item->Profile_id) --}}

                            <div style="display: flex;justify-content: space-evenly;">
                                <a href="{{ route('Produit.edit', $item->id) }}" class="btn btn-warning fa-solid fa-pen"
                                    style="width: fit-content"></a>
                                @can('delete',$item)
                                    <form method="POST" style="width: fit-content"
                                        action="{{ route('Produit.destroy', $item->id) }}">
                                        @method('DELETE')
                                        @csrf{{--  atack les angection SQL --}}
                                        <button type="submit" style="inset: all"
                                            onclick="return confirm('Voulez vous vraiment supprimer cette publication ? ')"
                                            class="btn btn-danger fa-solid fa-trash" style="width: fit-content">
                                        </button>
                                    </form>
                                @endcan
                            </div>
                            {{-- @endif --}}
                            {{-- @endauth --}}


                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{-- <div>{{ $ListArticle->links() }}</div> --}}


    </div>
</x-MasterPage>
