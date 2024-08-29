<div>
    <div class="container">
        <div class="row">
            <h2>Catálogo de productos</h2>
        </div>
        <div class="row">
            <div class="col-12">
                <p class="d-flex justify-content-end">
                    <button class="btn btn-success" wire:click="crear()" title="Crear"><i class="fas fa-check"></i> Crear</button>
                 </p>
            </div>
            <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Imagen</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datos as $dato)
                        <tr>
                            <td>{{$dato->id}}</td>
                            <td>{{$dato->title}}</td>
                            <td>{{$dato->price}}</td>
                            <td>{{$dato->description}}</td>
                            <td class="text-center">
                                <img src="{{$dato->image}}" alt="" style="width: 100px; height:100px" />
                            </td>
                            <td class="text-center">
                                <a href=""><i class="fas fa-pencil-alt"></i></a>
                                <a href=""><i class="fas fa-trash"></i></a>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        </div>
    </div>

 <!--ventana modal-->
 <div class="modal fade" id="ventana_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{$titulo}}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <form wire:submit.prevent="save">

                <div class="form-group">
                    <label for="category">Category</label>
                    <select id="category" wire:model="category" class="form-control">
                        @foreach($categorias as $categoria)
                            <option value="{{$categoria}}">{{$categoria}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" wire:model="title" class="form-control" placeholder="Title" />
                    @error('title') <span class="text text-danger">{{$message}}</span>  @enderror
                </div>

                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" wire:model="price" class="form-control" placeholder="Price" />
                    @error('price') <span class="text text-danger">{{$message}}</span>  @enderror
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea wire:model="description" id="description" class="form-control" placeholder="Description"></textarea>
                    @error('description') <span class="text text-danger">{{$message}}</span>  @enderror
                </div>

                <div class="form-group">
                    <label for="image">Foto</label>
                    <input type="file" wire:model="image" class="form-control" placeholder="Foto" />
                    @error('image') <span class="text text-danger">{{$message}}</span>  @enderror
                </div>

                <hr />
                <button type="submit" class="btn btn-primary" title="Enviar">Enviar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
      <!--/ventana modal-->

</div>
