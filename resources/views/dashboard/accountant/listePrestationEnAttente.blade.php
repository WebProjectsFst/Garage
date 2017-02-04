<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="resetAndRefresh()"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Generate Bill</h4>
            </div>
            <form id="login_form" role="form" method="POST" action="/factureController/create">
                <div class="modal-body">
                    {{ csrf_field() }}
                    <input type="text" id="montant" name="montant" style="display: none">
                    <input type="text" id="id_fiche_prestation" name="id_fiche_prestation" style="display: none">
                    <div style="display: inline-block; width: 46%;" class="form-collection">
                        <div style="padding-right: 120px;">
                            <div class="row fom-row" style="width: 140%">
                                <h3 class="form-title">Client Information</h3>
                            </div>
                            <div class="row fom-row" style="width: 140%">
                                <div class="form-group">
                                    <label class="col-md-5 control-label" for="existing_cin">Cin: </label>
                                    <div class="col-md-7" id="existing_cin_div">
                                        <input disabled tabindex="1" type="text" pattern="[0-9]{8}" class="form-control" id="existing_cin" name="existing_cin" placeholder="CIN (8 digits)" required readonly/>
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
                                        <input disabled tabindex="2" type="text" class="form-control" name="name" placeholder="Name" required />
                                    </div>
                                </div>
                            </div>
                            <div class="row fom-row" style="width: 140%">
                                <div class="form-group">
                                    <label class="col-md-5 control-label" for="lastName">Last Name: </label>
                                    <div class="col-md-7">
                                        <input disabled tabindex="3" type="text" class="form-control" name="lastName" placeholder="Last Name" required />
                                    </div>
                                </div>
                            </div>
                            <div class="row fom-row" style="width: 140%">
                                <div class="form-group">
                                    <label class="col-md-5 control-label" for="telephone">Phone Number: </label>
                                    <div class="col-md-7">
                                        <input disabled tabindex="4" type="text" pattern="[0-9]{8}"  class="form-control" name="telephone" placeholder="Phone Number (8 digits)" required />
                                    </div>
                                </div>
                            </div>
                            <div class="row fom-row" style="width: 140%">
                                <div class="form-group">
                                    <label class="col-md-5 control-label" for="email_address">Email Address: </label>
                                    <div class="col-md-7">
                                        <input disabled tabindex="5" type="email" class="form-control" name="email_address" placeholder="Email Address" required />
                                    </div>
                                </div>
                            </div>
                            <div class="row fom-row last" style="width: 140%">
                                <div class="form-group">
                                    <label class="col-md-5 control-label" for="address">Address: </label>
                                    <div class="col-md-7">
                                        <input disabled tabindex="6" type="text" class="form-control" name="address" placeholder="Address"  required />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="display: inline-block; width: 46%; vertical-align: top">
                        <div class="form-collection">
                            <div style="padding-right: 120px;">
                                <div class="row fom-row" style="width: 140%">
                                    <div class="form-group">
                                        <label class="col-md-5 control-label" for="prestation">Prestation Type: </label>
                                        <div class="col-md-7">
                                            <input disabled class="form-control" name="prestation"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row fom-row middle" style="width: 140%">
                                    <div class="form-group">
                                        <label class="col-md-offset-3 col-md-2 control-label" for="price">price </label>
                                        <div class="col-md-4">
                                            <input tabindex="9" type="numeric" class="form-control" name="price" placeholder="price" disabled/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-collection">
                        <div style="padding-right: 120px;">
                            <div class="row fom-row" style="width: 140%">
                                <div class="form-group">
                                    <label class="col-md-5 control-label" for="piece">Replacement Part: </label>
                                    <div class="col-md-7">
                                        <input disabled class="form-control" name="piece"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row fom-row middle" style="width: 140%">
                                <div class="form-group">
                                    <label class="col-md-offset-3 col-md-2 control-label" for="piecePrice">price </label>
                                    <div class="col-md-4">
                                        <input tabindex="9" type="numeric" class="form-control" name="piecePrice" placeholder="price" disabled/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div>
                            <h1 style="float: right" id="Total"></h1>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Generate</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="page-content">
    <table id="myTable" class="table table-striped table-bordered dataTable no-footer">
        <thead role="row">
        <tr>
            <th>ID</th>
            <th>Creation Date</th>
            <th>Client Name</th>
            <th>Client Last Name</th>
            <th>Prestation</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>