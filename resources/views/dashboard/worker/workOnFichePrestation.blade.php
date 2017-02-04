<form action="/updatePrestation" id="work_on_fichePrestation_form" method="POST" class="dashboard-form" autocomplete="off">
    {{ csrf_field() }}
    <input style="display: none;" name="ficheprestationId" value=""/>
    <input style="display: none;" name="employeeId" value=""/>
    <div style="width: 95%" class="col-md-11 form-collection">
        <div>
            <div style="width: 100%; text-align: center;" class="row fom-row">
                <h3 class="form-title">Prestation Sheet</h3>
            </div>
            <div>
                <div class="row fom-row">
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="diagnostic">Diagnostic: </label>
                        <div class="col-md-10">
                            <textarea rows="5" style="resize: none;" tabindex="2" type="text" class="form-control" name="diagnostic" placeholder="Diagnostic..." required ></textarea>
                        </div>
                    </div>
                </div>
                <div class="row fom-row">
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="solution">Solution: </label>
                        <div class="col-md-4">
                            <textarea style="resize: none;" tabindex="2" type="text" class="form-control" name="solution" placeholder="Solution..." required ></textarea>
                        </div>
                        <label class="col-md-2 control-label" for="reparation">Reparation Type: </label>
                        <div class="col-md-4">
                            <textarea style="resize: none;" tabindex="2" type="text" class="form-control" name="reparation" placeholder="Reparation Type..." required ></textarea>
                        </div>
                    </div>
                </div>
                <div class="row fom-row">
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="pieces">Replacement part: </label>
                        <div class="col-md-4">
                            <select class="form-control" tabindex="10" name="pieces">
                                <option selected>Please select</option>
                            </select>
                        </div>
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
                        <input tabindex="7" type="text" class="form-control" name="brand" placeholder="Car Brand" required disabled/>
                    </div>
                    <label class=" col-md-1 control-label" for="model">Model: </label>
                    <div class="col-md-5">
                        <input tabindex="8" type="text" class="form-control" name="model" placeholder="Car Model" required disabled/>
                    </div>
                </div>
            </div>
            <div class="row fom-row last">
                <div class="form-group">
                    <label class="col-md-3 control-label" for="registration-part1">Registration Number: </label>
                    <div class="col-md-2">
                        <input pattern="[0-9]{3}" tabindex="9" type="numeric" class="form-control" name="registration-part1" required disabled/>
                    </div>
                    <label class="col-sm-1 control-label" for="registration-part2" >TN </label>
                    <div class="col-md-3">
                        <input pattern="[0-9]{4}" tabindex="9" type="numeric" class="form-control" name="registration-part2" required disabled/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 form-collection">
        <div class="row fom-row">
            <p id="data_para"><b>Date: </b><span id="date_creation"></span></p>
            <p><b>Prestation Type: </b><span id="type_prestation">Vidange</span></p>
        </div>
    </div>

    <div class="buttons-collection">
        <input type="button" class="btn btn-default btn-lg" value="Reset" onclick="whatToReset()" tabindex="-1"/>
        <input type="submit" class="btn btn-primary btn-lg" value="Confirm"/>
    </div>
</form>