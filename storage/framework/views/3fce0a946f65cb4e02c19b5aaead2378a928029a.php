<?php $__env->startSection("titre"); ?>
    Receptioniste
<?php $__env->stopSection(); ?>

<?php $__env->startSection("buttons"); ?>
    <ul class="menu list-unstyled">
        <li class="menu-item selected"><span>Creer Fiche Prestation</span><span class="page-path" style="display: none">/ok</span></li>
        <li class="menu-item" id="Yoo1"><span>Ajouter Cient</span><span class="page-path" style="display: none">/i</span></li>
        <li class="menu-item" id="yoo2"><span>Consulter Liste Client</span><span class="page-path" style="display: none">/m</span></li>
    </ul>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("content"); ?>
    <form action="<?php echo e(url('dashboard/create')); ?>" method="POST" class="dashboard-form" autocomplete="off">
        <input type="numeric" style="display: none" name="client_id">
        <div class="col-md-6 form-collection">
            <div>
                <div class="row">
                    <h3 class="form-title">Client Information</h3>
                </div>
                <div id="existing_client_form">
                    <div class="row">
                        <div class="form-group">
                            <label class="col-md-5 control-label" for="existing_cin">Cin: </label>
                            <div class="col-md-7" id="existing_cin_div">
                                <input tabindex="1" type="number" class="form-control" id="existing_cin" name="existing_cin" placeholder="CIN" onkeyup="cinHelper(this)" onfocus="showCinHelper()" required />
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
                    <div class="row">
                        <div class="form-group">
                            <label class="col-md-5 control-label" for="name">Name: </label>
                            <div class="col-md-7">
                                <input tabindex="2" type="text" class="form-control" name="name" placeholder="Client Name" required />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label class="col-md-5 control-label" for="lastName">Last Name: </label>
                            <div class="col-md-7">
                                <input tabindex="3" type="text" class="form-control" name="lastName" placeholder="Client Last Name" required />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label class="col-md-5 control-label" for="telephone">Phone Number: </label>
                            <div class="col-md-7">
                                <input tabindex="4" type="number" class="form-control" name="telephone" placeholder="Client Phone Number" required />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label class="col-md-5 control-label" for="email_address">Email Address: </label>
                            <div class="col-md-7">
                                <input tabindex="5" type="email" class="form-control" name="email_address" placeholder="Client Email Address" required />
                            </div>
                        </div>
                    </div>
                    <div class="row last">
                        <div class="form-group">
                            <label class="col-md-5 control-label" for="address">Address: </label>
                            <div class="col-md-7">
                                <input tabindex="6" type="text" class="form-control" name="address" placeholder="Client Address"  required />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5 form-collection">
            <div>
                <div class="row">
                    <h3 class="form-title">Prestation</h3>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label class="col-md-5 control-label" for="prestation">Prestation Type: </label>
                        <div class="col-md-7">
                            <select class="form-control" name="prestation" required>
                                <option selected disabled value="">Please select a type</option>
                            </select>
                            
                        </div>
                    </div>
                </div>
                <div class="row middle">
                    <div class="form-group">
                        <label class="col-md-offset-3 col-md-2 control-label" for="price">price </label>
                        <div class="col-md-4">
                            <input tabindex="9" type="numeric" class="form-control" name="price" placeholder="price" disabled/>
                        </div>
                    </div>
                </div>
                <div class="row last">
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
                <div class="row">
                    <h3 class="form-title">Worker</h3>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label class="col-md-5 control-label" for="workers">Worker: </label>
                        <div class="col-md-7">
                            <select class="form-control" tabindex="7" name="workers" required>
                                <option selected disabled value="">Please select a worker</option>
                            </select>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 form-collection">
            <div class="new_client_form">
                <div class="row">
                    <h3 class="form-title">Car Information</h3>
                </div>
                <div class="row">
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
                <div class="row last">
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="registration">Registration Number: </label>
                        <div class="col-md-9">
                            <input tabindex="9" type="numeric" class="form-control" name="registration" placeholder="Car Registration Number" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="buttons-collection">
            <input type="reset" class="btn btn-default btn-lg" value="Reset" tabindex="-1"/>
            <input type="submit" class="btn btn-primary btn-lg" value="Confirm"/>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("imports"); ?>
    <script type="text/javascript">

        var clients;
        var searchedCin;
        var prestations;
        var workers;

        $(document).ready(function(){

            $("select[name='prestation']").change(function () {
                var id=this.value;
                prestations.forEach(function (prestation) {
                    if(prestation.id == id){
                        $("input[name='price']").val(prestation.prix+" TND");
                        return;
                    }
                })
            });

            //Prestation
            $.get("/prestations", function(data, status) {
                var selectTag=$("select[name='prestation']")[0];
                var html=selectTag.innerHTML;
                if(status == "success") {
                    prestations=data;
                    data.forEach(function (prestation){
                        html+="<option value='"+prestation.id+"'>"+prestation.libelle+"</option>";
                    })
                    selectTag.innerHTML=html;
                }
            }, 'json');

            //Workers
            $.get("/workers", function(data, status) {
                var selectTag=$("select[name='workers']")[0];
                var html=selectTag.innerHTML;
                if(status == "success") {
                    workers=data;
                    data.forEach(function (worker){
                        if(worker.id_prestation_employee != null){
                            html+="<option disabled class='busy' value='"+worker.NSS+"'>"+worker.prenom+"  "+worker.nom+"-busy</option>";
                        }else {
                            html+="<option value='"+worker.NSS+"'>"+worker.prenom+"  "+worker.nom+"</option>";
                        }
                    })
                    selectTag.innerHTML=html;
                }
            }, "json");


            $(document).click(function (event) {
                if(!jQuery(event.target).closest("#existing_cin_div").length){
                    hideCinHelper();
                }
            })

            $("input[name='existing_cin']").keydown(function (e) {
                var code = e.keyCode || e.which;
                if (code == '9') {
                    $(".input-helper").hide();
                }
            });

            var date=new Date();
            var days=(date.getDay()<10?'0':'') + date.getDay();
            var months=(date.getMonth()<10?'0':'') + (date.getMonth()+1);
            var hours=(date.getHours()<10?'0':'') + date.getHours();
            var minutes=(date.getMinutes()<10?'0':'') + date.getMinutes()
            $("input[name='date']").val(days+' / '+months+' / '+date.getFullYear()+'   '+hours+':'+minutes);
        });

        function cinHelper(element) {
            searchedCin=$("input[name='existing_cin']").val();
            var inputs=$(".new_client_form input");
            var helper=$(".input-helper table tbody");
            if(searchedCin){
                $.get("/clients?existing_cin="+searchedCin, function(data,status){
                    if(status == "success"){
                        var html="";
                        clients=data;
                        if(jQuery.isEmptyObject(data)){
                            searchedCin="";
                            html="<h4 class='no_client'>(No matching client)</h4>";
                            var i;
                            for(i=0; i<inputs.length; i++) {
                                inputs[i].removeAttribute("disabled");
                            }
                        }else {
                            data.forEach(function(client) {
                                html+='<tr onclick="selectClient(this)"><td style="display: none" class="client-id">'+client.id+'</td><td>'+'<b class="search-highlight">'+searchedCin+'</b>'+client.cin.substring(searchedCin.length, client.cin.length)+'</td><td>'+client.nom+'</td><td>'+client.prenom+'</td></tr>';
                            });
                        }
                        helper[0].innerHTML=html;
                        $(".input-helper").show();
                    }
                },"json");
            }else{
                $(".input-helper").hide();
            }
            if(element){
                var i;
                for(i=0; i<inputs.length; i++) {
                    inputs[i].removeAttribute("disabled");
                    inputs[i].value="";
                }
            }else {
                $(".input-helper").show();
            }
        }

        function selectClient(element){
            var id=element.children[0].innerHTML;
            var inputs=$(".new_client_form input");
            var i;
            for(i=0; i<inputs.length; i++) {
                inputs[i].setAttribute("disabled", "");
            }
            $(".input-helper").hide();
            var c;
            clients.forEach(function (client) {
                if(client.id == id){
                    c=client;
                    return;
                }
            })
            searchedCin=c.cin;
            $("#existing_client_form input[name='existing_cin']").val(c.cin);
            $("input[name='client_id']").val(c.id);
            $(".new_client_form input[name='name']").val(c.nom);
            $(".new_client_form input[name='lastName']").val(c.prenom);
            $(".new_client_form input[name='telephone']").val(c.tel);
            $(".new_client_form input[name='email_address']").val(c.email);
            $(".new_client_form input[name='address']").val(c.addresse);
            $(".new_client_form input[name='brand']").val(c.marque_voiture);
            $(".new_client_form input[name='model']").val(c.modele_voiture);
            $(".new_client_form input[name='registration']").val(c.matricule_voiture);
        }

        function hideCinHelper(){
            var helper=$(".input-helper table tbody");
            $(".input-helper").hide();
            helper[0].innerHTML="";
        }

        function showCinHelper() {
            if($("input[name='existing_cin']").val() != ""){
                cinHelper(false);
            }
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("dashboard.dashboard_template", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>