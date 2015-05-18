<section ng-controller="FormsController">
	<div class="container-fluid" style="padding-top: 20px;">
		<div class="row">
			<div class="col-xs-6 col-md-4">

				<section ng-controller="LoginFormController">

					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">Ingrese su email y contraseña para iniciar la sesión</h3>
						</div>
						<div class="panel-body" cg-busy="{promise:httpRequestPromise,message:'Loading'}">

							<div class="alert alert-danger" ng-show="form.$submitted && (sizeOf(form.$error)!=0)">

								<div data-ng-messages="form.$submitted && form.email.$error" class="text-danger">
									<div data-ng-message="email">
										- La <b>dirección de correo electrónico</b> debe ser valida.
									</div>
									<div data-ng-message="required">
										- La <b>dirección de correo electrónico</b> es requerida.
									</div>
								</div>

								<div data-ng-messages="form.$submitted && form.password.$error" class="text-danger">
									<div data-ng-message="minlength" >
										- La <b>contraseña</b> debe tener como mínimo 7 caracteres.
									</div>
									<div data-ng-message="required" >
										- La <b>contraseña</b> es requerida.
									</div>
								</div>

							</div>

							<form name="form" novalidate="" ng-submit="submit()">

								<alert ng-repeat="alert in alerts" type="{{alert.type}}" dismiss-on-timeout="4000" close="closeAlert($index)">{{alert.msg}}</alert>

								<div class="form-group">
									<label>Email o dirección de correo electrónico</label>
									<input type="email" name="email" ng-model="model.email" required class="form-control" placeholder="Ingrese su correo o email"  >
								</div>

								<div class="form-group">
									<label>Contraseña</label>
									<input type="password" name="password" ng-model="model.password" required minlength="7" class="form-control" placeholder="Ingrese su contraseña" >
								</div>

								<button type="submit" class="btn btn-primary">Entrar</button>

							</form>

							<br>

							<!--                        {{ user | json }}-->
							<!--                        <pre>{{ loginForm | json }}</pre>-->

						</div>
						<div class="panel-footer">
							<button id="new-user" type="button" class="btn btn-link">New User?</button>
							<button id="recover" type="button" class="btn btn-link">Forgot your password?</button>
						</div>
					</div>

				</section>

			</div>
			<div class="col-xs-12 col-sm-6 col-md-8">
			</div>
		</div>
	</div>


	<!-- Modal Nuevo usuario -->
	<div class="modal fade" id="new-user-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<form role="form" id="new-user-form" action="#" method="post" accept-charset="utf-8">

					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
						<h4 class="modal-title">New user</h4>
					</div>

					<div class="modal-body">

						<div class="message"></div>

						<div class="form-group">
							<label for="new-user-name"><span class="glyphicon glyphicon-user"></span> Name</label>
							<input type="text" class="form-control" id="new-user-name" name="new-user-name" placeholder="Eje: Maria, MariaSharapova, TennisShop.LA">
							<span class="help-block" style="display: none;">Required</span>
						</div>

						<div class="form-group">
							<label for="new-user-email"><span class="glyphicon glyphicon-envelope"></span> Email</label>
							<input type="email" class="form-control" id="new-user-email" name="new-user-email" placeholder="Eje: maria@gmail.com">
							<span class="help-block" style="display: none;">Required</span>
						</div>

						<div class="form-group">
							<label for="new-user-password"><span class="glyphicon glyphicon-lock"></span> Password</label>
							<input type="password" class="form-control" id="new-user-password" name="new-user-password">
							<span class="help-block" style="display: none;">Required</span>
						</div>

						<div class="form-group">
							<label for="new-user-password-again"><span class="glyphicon glyphicon-lock"></span> Confirm Password</label>
							<input type="password" class="form-control" id="new-user-password-again" name="new-user-password-again">
							<span class="help-block" style="display: none;">Required</span>
						</div>

						<div class="checkbox">
							<label>
								<input id="terms-of-service" name="terms-of-service" type="checkbox" value="accepted"> I have read and accept the <a href="/terms-of-service" target="_blank" class="a-blue">Terms of Service</a>
							</label>
							<span class="help-block" style="display: none; color:#FF0000;">Required</span>
						</div>

					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Send</button>
					</div>

				</form>
			</div>
		</div>
	</div>


	<!-- Modal Olvido de la contraseña  -->
	<div class="modal fade" id="recover-account-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<form role="form" id="recover-account-form" action="#" method="post" accept-charset="utf-8">

					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
						<h4 class="modal-title">Forgot your password?</h4>
					</div>

					<div class="modal-body">

						<div class="message"></div>

						<div class="form-group">
							<label for="recover-account-email"><span class="glyphicon glyphicon-envelope"></span> Email</label>
							<input type="email" class="form-control" id="recover-account-email" name="recover-account-email" placeholder="Eje: maria@gmail.com">
							<span class="help-block" style="display: none;">Required</span>
						</div>

					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-primary">send</button>
					</div>

				</form>
			</div>
		</div>
	</div>

	<!-- Modal Verify email  -->
	<div class="modal fade" id="verify-email-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<form role="form" id="verify-email-form" action="#" method="post" accept-charset="utf-8">

					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
						<h4 class="modal-title">Write your email for verify your account</h4>
					</div>

					<div class="modal-body">

						<div class="message"></div>

						<div class="form-group">
							<label for="verify-email"><span class="glyphicon glyphicon-envelope"></span> Email</label>
							<input type="email" class="form-control" id="verify-email" name="verify-email" placeholder="Eje: maria@gmail.com">
							<span class="help-block" style="display: none;">Required</span>
						</div>

					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-primary">Send email</button>
					</div>

				</form>
			</div>
		</div>
	</div>
</section>

<div ng-controller="ModalDemoCtrl">
    <script type="text/ng-template" id="myModalContent.html">
        <div class="modal-header">
            <h3 class="modal-title">I'm a modal!</h3>
        </div>
        <div class="modal-body">
            <ul>
                <li ng-repeat="item in items">
                    <a ng-click="selected.item = item">{{ item }}</a>
                </li>
            </ul>
            Selected: <b>{{ selected.item }}</b>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" ng-click="ok()">OK</button>
            <button class="btn btn-warning" ng-click="cancel()">Cancel</button>
        </div>
    </script>

    <button class="btn btn-default" ng-click="open()">Open me!</button>
    <button class="btn btn-default" ng-click="open('lg')">Large modal</button>
    <button class="btn btn-default" ng-click="open('sm')">Small modal</button>
    <div ng-show="selected">Selection from a modal: {{ selected }}</div>
</div>
