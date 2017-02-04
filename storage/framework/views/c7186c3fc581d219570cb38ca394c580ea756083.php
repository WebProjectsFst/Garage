
<form onchange="loaded()" action="/dashboard/create" id="add_fiche_prestation_form" method="POST" class="dashboard-form" autocomplete="off">
    <?php echo e(csrf_field()); ?>

    <input type="numeric" style="display: none" name="client_id">
    <input type="numeric" style="display: none" name="returnType" value="true">
    <div class="col-md-6 form-collection">
        <div>
            <div class="row fom-row">
                <h3 class="form-title">Client Information</h3>
            </div>
            <div id="existing_client_form">
                <div class="row fom-row">
                    <div class="form-group">
                        <label class="col-md-5 control-label" for="existing_cin">Cin: </label>
                        <div class="col-md-7" id="existing_cin_div">
                            <input tabindex="1" type="text" pattern="[0-9]{8}" class="form-control" id="existing_cin" name="existing_cin" placeholder="CIN (8 digits)" onkeyup="cinHelper(this)" onclick="showCinHelper()" required />
                            <div class="input-helper col-md-11">
                                <table>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="new_client_form">
                <div class="row fom-row">
                    <div class="form-group">
                        <label class="col-md-5 control-label" for="name">Name: </label>
                        <div class="col-md-7">
                            <input tabindex="2" type="text" class="form-control" name="name" placeholder="Name" required />
                        </div>
                    </div>
                </div>
                <div class="row fom-row">
                    <div class="form-group">
                        <label class="col-md-5 control-label" for="lastName">Last Name: </label>
                        <div class="col-md-7">
                            <input tabindex="3" type="text" class="form-control" name="lastName" placeholder="Last Name" required />
                        </div>
                    </div>
                </div>
                <div class="row fom-row">
                    <div class="form-group">
                        <label class="col-md-5 control-label" for="telephone">Phone Number: </label>
                        <div class="col-md-7">
                            <input tabindex="4" type="text" pattern="[0-9]{8}"  class="form-control" name="telephone" placeholder="Phone Number (8 digits)" required />
                        </div>
                    </div>
                </div>
                <div class="row fom-row">
                    <div class="form-group">
                        <label class="col-md-5 control-label" for="email_address">Email Address: </label>
                        <div class="col-md-7">
                            <input tabindex="5" type="email" class="form-control" name="email_address" placeholder="Email Address" required />
                        </div>
                    </div>
                </div>
                <div class="row fom-row last">
                    <div class="form-group">
                        <label class="col-md-5 control-label" for="address">Address: </label>
                        <div class="col-md-7">
                            <input tabindex="6" type="text" class="form-control" name="address" placeholder="Address"  required />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-5 form-collection">
        <div>
            <div class="row fom-row">
                <h3 class="form-title">Prestation</h3>
            </div>
            <div class="row fom-row">
                <div class="form-group">
                    <label class="col-md-5 control-label" for="prestation">Prestation Type: </label>
                    <div class="col-md-7">
                        <select class="form-control" tabindex="10" name="prestation" required>

                        </select>
                        
                    </div>
                </div>
            </div>
            <div class="row fom-row middle">
                <div class="form-group">
                    <label class="col-md-offset-3 col-md-2 control-label" for="price">price </label>
                    <div class="col-md-4">
                        <input tabindex="9" type="numeric" class="form-control" name="price" placeholder="price" disabled/>
                    </div>
                </div>
            </div>
            <div class="row fom-row last">
                <div class="form-group">
                    <label class="col-md-5 control-label" for="date">Current Date/Time: </label>
                    <div class="col-md-7">
                        <input tabindex="9" type="text" class="form-control" name="date" disabled/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-5 form-collection">
        <div>
            <div class="row fom-row">
                <h3 class="form-title">Worker</h3>
            </div>
            <div class="row fom-row">
                <div class="form-group">
                    <label class="col-md-5 control-label" for="workers">Worker: </label>
                    <div class="col-md-7">
                        <select class="form-control" tabindex="11" name="workers" required>

                        </select>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8 form-collection">
        <div class="new_client_form">
            <div class="row fom-row">
                <h3 class="form-title">Car Information</h3>
            </div>
            <div class="row fom-row">
                <div class="form-group">
                    <label class="col-md-1 control-label" for="brand">Brand: </label>
                    <div class="col-md-5">
                        <input tabindex="7" type="text" class="form-control" name="brand" placeholder="Car Brand" />
                    </div>
                    <label class=" col-md-1 control-label" for="model">Model: </label>
                    <div class="col-md-5">
                        <input tabindex="8" type="text" class="form-control" name="model" placeholder="Car Model" />
                    </div>
                </div>
            </div>
            <div class="row fom-row last">
                <div class="form-group">
                    <label class="col-md-3 control-label" for="registration-part1">Registration Number: </label>
                    <div class="col-md-2">
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
    <div class="buttons-collection">
        <input type="reset" class="btn btn-default btn-lg" value="Reset" onclick="enableFields()" tabindex="-1"/>
        <input type="submit" class="btn btn-primary btn-lg" value="Confirm"/>
    </div>
</form>