<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="resetAndRefresh()"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Client</h4>
            </div>
            <form id="login_form" role="form" method="POST" action="/addClient">
                <div class="modal-body">
                    <?php echo e(csrf_field()); ?>

                    <input type="numeric" style="display: none" name="returnType" value="false">
                    <div class="form-collection" style="width: 46%; display: inline-block;">
                        <div style="padding-right: 120px;">
                        <div class="row fom-row" style="width: 140%">
                            <h3 class="form-title">Client Information</h3>
                        </div>
                        <div class="row fom-row" style="width: 140%">
                            <div class="form-group">
                                <label class="col-md-5 control-label" for="existing_cin">Cin: </label>
                                <div class="col-md-7" id="existing_cin_div">
                                    <input tabindex="1" type="text" pattern="[0-9]{8}" class="form-control" id="existing_cin" name="existing_cin" placeholder="CIN (8 digits)" required />
                                    <div class="input-helper col-md-11">
                                        <table>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row fom-row" style="width: 140%">
                            <div class="form-group">
                                <label class="col-md-5 control-label" for="name">Name: </label>
                                <div class="col-md-7">
                                    <input tabindex="2" type="text" class="form-control" name="name" placeholder="Name" required />
                                </div>
                            </div>
                        </div>
                        <div class="row fom-row" style="width: 140%">
                            <div class="form-group">
                                <label class="col-md-5 control-label" for="lastName">Last Name: </label>
                                <div class="col-md-7">
                                    <input tabindex="3" type="text" class="form-control" name="lastName" placeholder="Last Name" required />
                                </div>
                            </div>
                        </div>
                        <div class="row fom-row" style="width: 140%">
                            <div class="form-group">
                                <label class="col-md-5 control-label" for="telephone">Phone Number: </label>
                                <div class="col-md-7">
                                    <input tabindex="4" type="text" pattern="[0-9]{8}"  class="form-control" name="telephone" placeholder="Phone Number (8 digits)" required />
                                </div>
                            </div>
                        </div>
                        <div class="row fom-row" style="width: 140%">
                            <div class="form-group">
                                <label class="col-md-5 control-label" for="email_address">Email Address: </label>
                                <div class="col-md-7">
                                    <input tabindex="5" type="email" class="form-control" name="email_address" placeholder="Email Address" required />
                                </div>
                            </div>
                        </div>
                        <div class="row fom-row last" style="width: 140%">
                            <div class="form-group">
                                <label class="col-md-5 control-label" for="address">Address: </label>
                                <div class="col-md-7">
                                    <input tabindex="6" type="text" class="form-control" name="address" placeholder="Address"  required />
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="form-collection" style="width: 46%; display: inline-block; vertical-align: top;">
                        <div style="padding-right: 120px;">
                            <div class="row fom-row" style="width: 140%">
                                <h3 class="form-title">Car Information</h3>
                            </div>
                            <div class="row fom-row" style="width: 140%">
                                <div class="form-group">
                                    <label class="col-md-5 control-label" for="brand">Brand: </label>
                                    <div class="col-md-7">
                                        <input tabindex="7" type="text" class="form-control" name="brand" placeholder="Car Brand" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="row fom-row" style="width: 140%">
                                <div class="form-group">
                                    <label class=" col-md-5 control-label" for="model">Model: </label>
                                    <div class="col-md-7">
                                        <input tabindex="8" type="text" class="form-control" name="model" placeholder="Car Model" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="row fom-row last" style="width: 140%">
                                <div class="form-group">
                                    <label class="col-md-5 control-label" for="registration">Registration Number: </label>
                                    <div class="col-md-3">
                                        <input pattern="[0-9]{3}" tabindex="9" type="numeric" class="form-control" name="registration-part1" required/>
                                    </div>
                                    <label class="col-sm-1 control-label" for="registration-part2" >TN </label>
                                    <div class="col-md-3">
                                        <input pattern="[0-9]{4}" tabindex="9" type="numeric" class="form-control" name="registration-part2" required/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="resetAndRefresh()"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit Client</h4>
            </div>
            <form id="login_form" role="form" method="POST" action="/updateClient">
                <div class="modal-body">
                    <?php echo e(csrf_field()); ?>

                    <div style="display: inline-block; width: 46%;" class="form-collection">
                        <div style="padding-right: 120px;">
                            <div class="row fom-row" style="width: 140%">
                                <h3 class="form-title">Client Information</h3>
                            </div>
                            <div class="row fom-row" style="width: 140%">
                                <div class="form-group">
                                    <label class="col-md-5 control-label" for="existing_cin">Cin: </label>
                                    <div class="col-md-7" id="existing_cin_div">
                                        <input tabindex="1" type="text" pattern="[0-9]{8}" class="form-control" id="existing_cin" name="existing_cin" placeholder="CIN (8 digits)" required readonly/>
                                        <div class="input-helper col-md-11">
                                            <table>
                                                <tbody></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row fom-row" style="width: 140%">
                                <div class="form-group">
                                    <label class="col-md-5 control-label" for="name">Name: </label>
                                    <div class="col-md-7">
                                        <input tabindex="2" type="text" class="form-control" name="name" placeholder="Name" required />
                                    </div>
                                </div>
                            </div>
                            <div class="row fom-row" style="width: 140%">
                                <div class="form-group">
                                    <label class="col-md-5 control-label" for="lastName">Last Name: </label>
                                    <div class="col-md-7">
                                        <input tabindex="3" type="text" class="form-control" name="lastName" placeholder="Last Name" required />
                                    </div>
                                </div>
                            </div>
                            <div class="row fom-row" style="width: 140%">
                                <div class="form-group">
                                    <label class="col-md-5 control-label" for="telephone">Phone Number: </label>
                                    <div class="col-md-7">
                                        <input tabindex="4" type="text" pattern="[0-9]{8}"  class="form-control" name="telephone" placeholder="Phone Number (8 digits)" required />
                                    </div>
                                </div>
                            </div>
                            <div class="row fom-row" style="width: 140%">
                                <div class="form-group">
                                    <label class="col-md-5 control-label" for="email_address">Email Address: </label>
                                    <div class="col-md-7">
                                        <input tabindex="5" type="email" class="form-control" name="email_address" placeholder="Email Address" required />
                                    </div>
                                </div>
                            </div>
                            <div class="row fom-row last" style="width: 140%">
                                <div class="form-group">
                                    <label class="col-md-5 control-label" for="address">Address: </label>
                                    <div class="col-md-7">
                                        <input tabindex="6" type="text" class="form-control" name="address" placeholder="Address"  required />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="display: inline-block; width: 46%; vertical-align: top" class="form-collection">
                        <div style="padding-right: 120px;">
                            <div class="row fom-row" style="width: 140%">
                                <h3 class="form-title">Car Information</h3>
                            </div>
                            <div class="row fom-row" style="width: 140%">
                                <div class="form-group">
                                    <label class="col-md-5 control-label" for="brand">Brand: </label>
                                    <div class="col-md-7">
                                        <input tabindex="7" type="text" class="form-control" name="brand" placeholder="Car Brand" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="row fom-row" style="width: 140%">
                                <div class="form-group">
                                    <label class=" col-md-5 control-label" for="model">Model: </label>
                                    <div class="col-md-7">
                                        <input tabindex="8" type="text" class="form-control" name="model" placeholder="Car Model" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="row fom-row last" style="width: 140%">
                                <div class="form-group">
                                    <label class="col-md-5 control-label" for="registration">Registration Number: </label>
                                    <div class="col-md-3">
                                        <input pattern="[0-9]{3}" tabindex="9" type="numeric" class="form-control" name="registration-part1" required/>
                                    </div>
                                    <label class="col-sm-1 control-label" for="registration-part2" >TN </label>
                                    <div class="col-md-3">
                                        <input pattern="[0-9]{4}" tabindex="9" type="numeric" class="form-control" name="registration-part2" required/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 50%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="resetAndRefresh()"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Client</h4>
            </div>
            <form id="login_form" role="form" method="POST" action="/deleteClient">
                <div class="modal-body">
                    <?php echo e(csrf_field()); ?>

                    <input name="existing_cin" style="display: none"/>
                    <p>Are you sure, you want to delete this client?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Continue</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="page-content">
    <table id="myTable" class="table table-striped table-bordered dataTable no-footer">
        <thead role="row">
            <tr>
                <th>CIN</th>
                <th>Name</th>
                <th>Last Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Address</th>
                <th>Brand</th>
                <th>Model</th>
                <th>Registration</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>