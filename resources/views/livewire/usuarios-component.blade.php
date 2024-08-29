<div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p class="d-flex justify-content-end">
                    <button class="btn btn-success" wire:click="crearUsuarios()" title="Crear"><i class="fas fa-check"></i> Crear</button>
                 </p>
            </div>
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-boredered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Correo</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Avatar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                    foreach($datos->data as $dato)
                    {
                        ?>
                            <tr>
                                <td><?php echo $dato->id; ?></td>
                                <td><?php echo $dato->email; ?></td>
                                <td><?php echo $dato->first_name; ?></td>
                                <td><?php echo $dato->last_name; ?></td>
                                <td class="text-center">
                                    <img src="<?php echo $dato->avatar; ?>" alt="<?php echo $dato->first_name; ?>" />
                                </td>
                            </tr>
                            <?php
                    }
                    ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
