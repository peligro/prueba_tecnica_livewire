<div>
    <div class="container">
        <div class="row">
            <h2>Compras</h2>
        </div>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Usuario</th>
                            <th>Monto</th>
                            <th>Producto</th>
                            <th>Token</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datos as $dato)

                            <tr>
                                <td>{{$dato->id}}</td>
                                <td>{{$dato->users->name}}</td>
                                <td>USD {{$dato->monto}}</td>
                                <td>{{$dato->producto}}</td>
                                <td>{{$dato->token}}</td>
                                <td>{{ Carbon\Carbon::parse($dato->fecha)->format('d/m/Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
