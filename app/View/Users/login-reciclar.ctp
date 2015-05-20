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