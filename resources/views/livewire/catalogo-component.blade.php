<div>
    <div class="container">
        <div class="row">
            <h2>Catálogo de productos</h2>
        </div>
        <div class="row">

                @foreach($datos as $dato)
                <div class="col-4">
                <div class="card" style="width: 18rem; margin-bottom: 20px;">
                    <img src="{{$dato->image}}" class="card-img-top" style="width: 286px; height:180px;" alt="{{$dato->title}}" />
                    <div class="card-body">
                      <h5 class="card-title">{{$dato->title}}</h5>
                      <p class="card-text">{{substr($dato->description, 0, 40)}}...</p>
                      <a href="{{route('ruta_catalogo_detalle', ['id'=>$dato->id])}}" class="btn btn-danger" title="Comprar {{$dato->title}}"><i class="fas fa-long-arrow-alt-right"></i> Comprar</a>
                    </div>
                </div>
            </div>
                @endforeach

        </div>
    </div>
</div>
