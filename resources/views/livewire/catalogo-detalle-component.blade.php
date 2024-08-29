<div>
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('ruta_catalogo')}}">Catálogo</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{$datos->title}}</li>
            </ol>
          </nav>
        <div class="row">
            <h4>Comprar</h4>
            <ul>
                <li>Nombre: {{$datos->title}}</li>
                <li>Categoría: {{$datos->category}}</li>
                <li>Detalle: {{$datos->description}}</li>
                <li>Precio: USD {{number_format($datos->price, 0, '', '')}}</li>
                <li>Orden de compra: {{'orden_'.$compra->id}}</li>
            </ul>
        </div>
        @if($pagado==0)
        <div class="row">
            <hr/>
            <form action="{{$pagos->url}}" name="form" method="post">
                <input type="hidden" name="token_ws" value="{{$pagos->token}}" />
                <button type="submit" class="btn btn-danger" title="Pagar"><i class="fas fa-dollar-sign"></i> Pagar</button>
            </form>
            <script type="text/javascript">

        </script>
        </div>
        @endif
        @if($pagado==1)
        <div class="row">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Pagado</strong> La orden {{$token_ws}} ha sido pagada exitosamente.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
        </div>
        @endif

    </div>
</div>
