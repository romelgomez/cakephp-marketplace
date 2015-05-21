<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12">

            <?php
            if($data['status'] === 'success'){
                ?>

                <div class="row">
                    <div class="col-xs-6 col-md-4">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Establecer nueva contraseña</h3>
                            </div>
                            <div class="panel-body">

                                <form name="form" novalidate="" ng-submit="submit()">

                                    <input type="hidden" id="id" name="id" value="<?php echo $data['id']; ?>">
                                    <input type="hidden" id="key" name="key" value="<?php echo $data['key']; ?>">

                                    <div class="form-group">
                                        <label>Contraseña</label>
                                        <input type="password" name="password" ng-model="model.password" required minlength="7" class="form-control" placeholder="Ingrese su contraseña" >
                                        <div data-ng-messages="form.$submitted && form.password.$error" class="help-block">
                                            <div data-ng-message="minlength" >
                                                - La <b>contraseña</b> debe tener como mínimo 7 caracteres.
                                            </div>
                                            <div data-ng-message="required" >
                                                - La <b>contraseña</b> es un requisito.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Confirmar la contraseña</label>
                                        <input type="password" name="passwordAgain" ng-model="model.passwordAgain" match="password" required minlength="7" class="form-control" placeholder="Ingrese su contraseña nuevamente" >
                                        <div data-ng-messages="form.$submitted && form.password.$error" class="help-block">
                                            <div data-ng-message="minlength" >
                                                - La <b>contraseña</b> debe tener como mínimo 7 caracteres.
                                            </div>
                                            <div data-ng-message="required" >
                                                - La <b>contraseña</b> es un requisito.
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Save</button>

                                </form>

                                <pre>{{form | json}}</pre>

                            </div>
                        </div>

                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-8">
                    </div>
                </div>

            <?php
            }else{
                switch ($data['message']) {
                    case "user-not-exist":
                        echo '<div class="alert alert-danger" role="alert">This request is invalid.</div>';
                        break;
                    case "this-link-is-invalid":
                        echo '<div class="alert alert-danger" role="alert">This link is expired or is invalid.</div>';
                        break;
                    default:
                        echo '<div class="alert alert-danger" role="alert">An unexpected error occurred</div>';
                }
            }
            ?>

		</div>
	</div>
</div>