<x-layout>
        
    <div class="container-fluid bg-body-secondary">
        <div class="row h-75 justify-content-center align-items-center">
            <div class="col-12 mt-1 px-0 py-0 bg-bianco">
                <h1 class="text-center display-4 shadow text-marrone bg-rosa">
                    Profilo di {{ \Illuminate\Support\Facades\Auth::user()->name }}
                </h1>
            </div>
        </div>
        <div class="row justify-content-center align-items-center bg-bianco min-vh-100">
            @forelse (\Illuminate\Support\Facades\Auth::user()->panini as $panino)
                <div class="col-12 col-md-4 mb-3">
                    <x-card :panino="$panino" />
                </div>
            @empty
                <h4 class="text-center">Non hai ancora creato nessun panino</h4>
            @endforelse
        </div>
    </div>

</x-layout>