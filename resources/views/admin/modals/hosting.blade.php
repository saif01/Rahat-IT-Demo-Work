<div id="formModal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <span id="form_result"></span>

                <form method="post" id="sample_form">
                    @csrf

                    <div class="row">

                        <div class="form-group col-md-6">
                            <label class="control-label">Hosting Plan Name : </label>
                            <input type="text" name="plan_name" id="plan_name" class="form-control" placeholder="Enter Hosting Plan Name" />
                        </div>

                        <div class="form-group col-md-6">
                            <label class="control-label">Hosting storage : </label>
                            <input type="text" name="storage" id="storage" class="form-control" placeholder="Enter Hosting Storage Name" />
                        </div>

                    </div>

                    <div class="row">

                        <div class="form-group col-md-6">
                            <label class="control-label">Hosting Monthly Transfer : </label>
                            <input type="text" name="monthly_transfer" id="monthly_transfer" class="form-control" placeholder="Enter Hosting Monthly Transfer" />
                        </div>

                        <div class="form-group col-md-6">
                            <label class="control-label">Hosting Control Panel : </label>
                            <input type="text" name="control_panel" id="control_panel" class="form-control" placeholder="Enter Hosting Plan Name" />
                        </div>

                    </div>

                    <div class="row">

                        <div class="form-group col-md-6">
                            <label class="control-label">Number Of Domain : </label>
                            <input type="text" name="domain" id="domain" class="form-control" placeholder="Enter Number Of Domain Host" />
                        </div>

                        <div class="form-group col-md-6">
                            <label class="control-label">Number Of Subdomain : </label>
                            <input type="text" name="subdomain" id="subdomain" class="form-control" placeholder="Enter Number Of Subdomain Host" />
                        </div>

                    </div>

                    <div class="row">

                        <div class="form-group col-md-6">
                            <label class="control-label">Number Of Email Account : </label>
                            <input type="text" name="email_account" id="email_account" class="form-control" placeholder="Enter Number Of Email Account" />
                        </div>

                        <div class="form-group col-md-6">
                            <label class="control-label">Number Of Database : </label>
                            <input type="text" name="database" id="database" class="form-control" placeholder="Enter Number Of Database" />
                        </div>

                    </div>

                    <div class="row">

                        <div class="form-group col-md-6">
                            <label class="control-label">Old Price : </label>
                            <input type="number" name="old_price" id="old_price" class="form-control" placeholder="Enter Old Price" />
                        </div>

                        <div class="form-group col-md-6">
                            <label class="control-label">Final Price : </label>
                            <input type="number" name="final_price" id="final_price" class="form-control" placeholder="Enter Final Price" />
                        </div>

                    </div>

                    <br />
                    <div class="form-group text-center">
                        <input type="hidden" name="action" id="action" value="Add" />
                        <input type="hidden" name="hidden_id" id="hidden_id" />
                        <input type="submit" name="action_button" id="action_button" class="btn btn-success btn-block" value="Add" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
