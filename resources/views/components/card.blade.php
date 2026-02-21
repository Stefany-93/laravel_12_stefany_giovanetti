<div class="card mx-auto card-custom" style="width: 18rem;">
    <img src="{{$sandwich['img']}}" alt="" class="img-custom">
    <div class="card-body">
        <h5 class="card-title">{{$name}}</h5>
        <a href="{{route('sandwich.detail', ['id' => $id])}}" class="btn btn-primary">Scopri il panino</a>
    </div>
</div>