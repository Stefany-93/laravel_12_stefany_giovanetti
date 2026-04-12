<x-layout>
    <div class="container-fluid">
        @if (session()->has('successMessage'))
            <div class="alert alert-success pt-5">
                {{session('successMessage')}}
            </div>
        @endif
        @if (session()->has('errorMessage'))
            <div class="alert alert-danger pt-5">
                {{session('errorMessage')}}
            </div>
        @endif
        <div class="row height-custom align-items-center justify-content-center">
            <div class="col-12">
                <h1 class="text-center display-1 title">MORTADELLOVE</h1>
            </div>
        </div>
    </div>
</x-layout>