<div id="formModal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <span id="form_result"></span>

                <form method = "POST"  id="sample_form">
                    @csrf


                    <div class="form-group">
                        <label class="control-label req-star">Title : </label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Enter Full Title" />
                    </div>

                    <div class="form-group">
                        <label class="req-star">Details</label>
                        <textarea class="form-control" id="details" name="details" ></textarea>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                                <label class="req-star"> Image</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input " name="image" id="inputGroupFile01"
                                            aria-describedby="inputGroupFileAddon01"
                                            onchange="document.getElementById('preview1').src = window.URL.createObjectURL(this.files[0])"
                                            >
                                        <label class="custom-file-label" for="inputGroupFile01">Choose
                                            file</label>
                                    </div>
                                </div>


                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <img id="preview1" alt="Image Not Selected" class="rounded mx-auto d-block"
                                    width="150" height="100" />
                            </div>

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
