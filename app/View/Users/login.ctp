<section ng-controller="FormsController">
	<div class="container-fluid" style="padding-top: 20px;">
		<div class="row">
			<div class="col-xs-6 col-md-4">

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Ingrese su email y contraseña para iniciar la sesión</h3>
                    </div>
                    <div class="panel-body" ng-controller="LoginFormController" cg-busy="{promise:httpRequestPromise,message:'Un momento'}">

                        <form name="form" novalidate="" ng-submit="submit()">

                            <div class="form-group">
                                <label>Email o dirección de correo electrónico</label>
                                <input type="email" name="email" ng-model="model.email" required class="form-control" placeholder="Ingrese su correo o email"  >
                                <div data-ng-messages="form.$submitted && form.email.$error" class="help-block">
                                    <div data-ng-message="email">
                                        - La <b>dirección de correo electrónico</b> debe ser valida.
                                    </div>
                                    <div data-ng-message="required">
                                        - La <b>dirección de correo electrónico</b> es requerida.
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Contraseña</label>
                                <input type="password" name="password" ng-model="model.password" required minlength="7" class="form-control" placeholder="Ingrese su contraseña" >
                                <div data-ng-messages="form.$submitted && form.password.$error" class="help-block">
                                    <div data-ng-message="minlength" >
                                        - La <b>contraseña</b> debe tener como mínimo 7 caracteres.
                                    </div>
                                    <div data-ng-message="required" >
                                        - La <b>contraseña</b> es requerida.
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Entrar</button>

                        </form>

                    </div>
                    <div class="panel-footer">
                        <button ng-click="newUser()" type="button" class="btn btn-link">New User?</button>
                        <button ng-click="recoverAccount()" type="button" class="btn btn-link">Forgot your password?</button>
                    </div>
                </div>

			</div>
			<div class="col-xs-12 col-sm-6 col-md-8">
			</div>
		</div>
	</div>
</section>

<script type="text/ng-template" id="recoverAccountModal.html">
    <div class="modal-header">
        <h3 class="modal-title">Olvido su contraseña?</h3>
    </div>
    <div class="modal-body" cg-busy="{promise:httpRequestPromise,message:'Un momento'}">

        <form id="form" name="form" novalidate="" ng-submit="submit()">

            <div class="form-group">
                <label>Email o dirección de correo electrónico</label>
                <input type="email" name="email" ng-model="model.email" required class="form-control" placeholder="Ingrese su correo o email"  >
                <div data-ng-messages="form.$submitted && form.email.$error" class="help-block">
                    <div data-ng-message="email">
                        - La <b>dirección de correo electrónico</b> debe ser válida.
                    </div>
                    <div data-ng-message="required">
                        - La <b>dirección de correo electrónico</b> es un requisito.
                    </div>
                </div>
            </div>

        </form>
        <!--        <pre>{{form | json}}</pre>-->

    </div>
    <div class="modal-footer">
        <button class="btn btn-warning" ng-click="cancel()">Cancel</button>
        <button form="form" class="btn btn-primary" type="submit">recuperar mi cuenta</button>
    </div>
</script>

<script type="text/ng-template" id="verifyEmailModal.html">
    <div class="modal-header">
        <h3 class="modal-title">Escriba su correo electrónico para verificar su cuenta</h3>
    </div>
    <div class="modal-body" cg-busy="{promise:httpRequestPromise,message:'Un momento'}">

        <form id="form" name="form" novalidate="" ng-submit="submit()">

            <div class="form-group">
                <label>Email o dirección de correo electrónico</label>
                <input type="email" name="email" ng-model="model.email" required class="form-control" placeholder="Ingrese su correo o email"  >
                <div data-ng-messages="form.$submitted && form.email.$error" class="help-block">
                    <div data-ng-message="email">
                        - La <b>dirección de correo electrónico</b> debe ser válida.
                    </div>
                    <div data-ng-message="required">
                        - La <b>dirección de correo electrónico</b> es un requisito.
                    </div>
                </div>
            </div>

        </form>
        <!--        <pre>{{form | json}}</pre>-->

    </div>
    <div class="modal-footer">
        <button class="btn btn-warning" ng-click="cancel()">Cancel</button>
        <button form="form" class="btn btn-primary" type="submit">recuperar mi cuenta</button>
    </div>
</script>

<script type="text/ng-template" id="newUserModal.html">
    <div class="modal-header">
        <h3 class="modal-title">Nuevo usuario</h3>
    </div>
    <div class="modal-body" cg-busy="{promise:httpRequestPromise,message:'Un momento'}">

        <form id="form" name="form" novalidate="" ng-submit="submit()">

            <div class="form-group">
                <label>Primer Nombre</label>
                <input type="text" name="name" ng-model="model.name" required class="form-control" placeholder="Maria">
                <div data-ng-messages="form.$submitted && form.name.$error" class="help-block">
                    <div data-ng-message="required">
                        - La <b>nombre</b> es un requisito.
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Primer Apellido</label>
                <input type="text" name="lastName" ng-model="model.lastName" required class="form-control" placeholder="Bella">
                <div data-ng-messages="form.$submitted && form.lastName.$error" class="help-block">
                    <div data-ng-message="required">
                        - El <b>apellido</b> es un requisito.
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Email o dirección de correo electrónico</label>
                <input type="email" name="email" ng-model="model.email" required class="form-control" placeholder="Ingrese su correo o email"  >
                <div data-ng-messages="form.$submitted && form.email.$error" class="help-block">
                    <div data-ng-message="email">
                        - La <b>dirección de correo electrónico</b> debe ser válida.
                    </div>
                    <div data-ng-message="required">
                        - La <b>dirección de correo electrónico</b> es un requisito.
                    </div>
                </div>
            </div>

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

            <div class="checkbox">
                <label>
                    <input type="checkbox" name="termsOfService" ng-model="model.termsOfService" required value="accepted"> He leído y acepto los <a href="/terms-of-service" target="_blank" class="a-blue">Términos del Servicio</a>
                </label>
                <div data-ng-messages="form.$submitted && form.termsOfService.$error" class="help-block">
                    <div data-ng-message="required" >
                        - Aceptar los <b>Términos del Servicio</b> es un requisito.
                    </div>
                </div>
            </div>

        </form>

<!--        <pre>{{form | json}}</pre>-->

    </div>
    <div class="modal-footer">
        <button class="btn btn-warning" ng-click="cancel()">Cancelar</button>
        <button form="form" class="btn btn-primary" type="submit">Enviar</button>
    </div>
</script>
