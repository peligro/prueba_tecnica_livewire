<div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form wire:submit.prevent="save">

                    <div class="form-group">
                        <label for="correo">E-Mail</label>
                        <input type="text" wire:model="correo" class="form-control" placeholder="E-Mail" />
                        @error('correo') <span class="text text-danger">{{$message}}</span>  @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" wire:model="password" class="form-control" placeholder="Contraseña" />
                        @error('password') <span class="text text-danger">{{$message}}</span>  @enderror
                    </div>
                    <hr />
                    <button type="submit" class="btn btn-primary" title="Enviar">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</div>
