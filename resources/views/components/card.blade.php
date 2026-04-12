<div class="card mx-auto card-custom" style="width: 18rem;">
    <img src="{{Storage::url($panino->img)}}" alt="" class="sandwich-custom">
    <div class="card-body bg-rosa text-marrone">
        <h5 class="card-title">{{$panino->name}}</h5>
        <p>Creato da: {{ $panino->user->name }}</p>

        <div class="d-flex justify-content-between gap-2">
            <a href="{{ route('panini.show', compact('panino')) }}" class="btn btn-outline-danger">Scopri</a>
            @auth
                @if ($panino->user_id == \Illuminate\Support\Facades\Auth::id())
                    <a href="{{ route('panini.edit', compact('panino')) }}" class="btn btn-outline-danger">Modifica</a>

                    <form action="{{ route('panini.delete', compact('panino')) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-outline-danger" type="submit">Elimina</button>
                    </form>
                @endif
            @endauth
        </div>

    </div>
</div>
