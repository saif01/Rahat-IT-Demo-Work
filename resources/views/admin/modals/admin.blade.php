<div id="formModal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <span id="form_result"></span>

                <form method="post" id="sample_form">
                    @csrf


                    <div class="form-group row">
                        <div class="col-md-6">
                            <label class="control-label req-star">Name : </label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Full Name" />
                        </div>
                        <div class="col-md-6">
                            <label class="control-label req-star">Email : </label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email Address" />
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
                                    width="100" height="125" />
                            </div>

                        </div>

                    </div>




                    <div class="row">

                        <div class="col-md-12">
                            <label class="control-label req-star">Admin Access</label>
                            <div class="input-group">

                                @foreach ($roleData as $role)


                                <div class="col-md-3">
                                    <div class="custom-control custom-checkbox mr-2">

                                        <input type="checkbox" class="custom-control-input" id="ch{{ $role->id }}" value="{{ $role->id }}" name="roles[]" ><label class="custom-control-label" for="ch{{ $role->id }}">{{ $role->name }} </label>
                                    </div>
                                </div>

                                @endforeach


                            </div>
                        </div>

                    </div>

                    <br />
                    <div class="form-group text-center">
                        <input type="submit" name="action_button" id="action_button" class="btn btn-success btn-block" value="Add" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
