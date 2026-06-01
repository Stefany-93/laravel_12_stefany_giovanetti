<x-layout>
    <div class="container-fluid bg-body-secondary">
        <div class="row h-75 justify-content-center align-items-center">
            <div class="col-12 mt-1 px-0 py-0 bg-bianco">
                <h2 class="text-center display-4 shadow text-marrone bg-rosa">
                    Profilo di {{ Auth::user()->name }}
                </h2>
            </div>
        </div>
        <div class="row justify-content-center align-items-center bg-bianco min-vh-100">
            @forelse(Auth::user()->sandwiches as $sandwich)
                <div class="col-12 col-md-3 py-5">
                    <x-card :sandwich="$sandwich" />
                </div>
            @empty
            <div class="col-12 justify-content-center text-center">
                <h2 class="text-marrone mb-5">
                    NON HAI ANCORA CARICATO IL TUO PANINO
                </h2>
                <a href="{{ route('sandwich.create')}}" class="btn btn-outline-danger">Crea il tuo primo panino</a>
            </div>
            @endforelse
        </div>
    </div>
</x-layout>