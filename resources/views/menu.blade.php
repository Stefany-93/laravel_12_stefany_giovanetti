<x-layout>
        
    <div class="container-fluid bg-body-secondary bg-rosa">
        <div class="row h-75 justify-content-center align-items-center">
            <div class="col-12 mt-1 px-0 py-0">
                <h1 class="text-center display-4 shadow text-marrone bg-rosa">
                    PANINI
                </h1>
            </div>
        </div>
        <div class="row justify-content-center align-items-center">
            @foreach ($sandwiches as $sandwich)
                <div class="col-12 col-md-3 py-5">
                    <x-card
                        :sandwich="$sandwich"
                        name="{{$sandwich['name']}}"
                        id="{{$sandwich['id']}}"
                        description="{{$sandwich['description']}}"
                        img="{{$sandwich['img']}}"
                        panino="{{$sandwich['panino']}}"
                        >
                    </x-card>
                </div> 
            @endforeach
        </div>
    </div>

</x-layout>