<div id="formModal_2" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Admin Record Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <span id="form_result_2"></span>

                <form method="post" id="sample_form_2">
                    @csrf


                    <div class="form-group row">
                        <div class="col-md-6">
                            <label class="control-label req-star">Name : </label>
                            <input type="text" name="name" id="name_2" class="form-control" placeholder="Enter Full Name" />
                        </div>
                        <div class="col-md-6">
                            <label class="control-label req-star">Email : </label>
                            <input type="email" name="email" id="email_2" class="form-control" placeholder="Enter Email Address" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">


                                <label class="control-label req-star">Password : </label>
                                <input type="text" name="password" class="form-control mb-2" placeholder="Enter Account Password" />

                                <label class="req-star">User Image</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input " name="image" id="inputGroupFile01"
                                            aria-describedby="inputGroupFileAddon01"
                                            onchange="document.getElementById('preview1_2').src = window.URL.createObjectURL(this.files[0])"
                                            >
                                        <label class="custom-file-label" for="inputGroupFile01">Choose
                                            file</label>
                                    </div>
                                </div>


                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <img id="preview1_2" alt="Image Not Selected" class="rounded mx-auto d-block"
                                    width="100" height="125" />
                            </div>

                        </div>

                    </div>




                    <br />

                    <label class="control-label badge text-success">User Access</label>
                    <div class="form-group row" id="roleCheckBoxData">

                    </div>

                    <br />
                    <div class="form-group text-center">
                        <input type="hidden" name="hidden_id_2" id="hidden_id_2" />
                        <input type="submit" name="action_button" id="action_button_2" class="btn btn-success btn-block" value="Edit" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
