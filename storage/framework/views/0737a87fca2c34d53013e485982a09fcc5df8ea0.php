<?php $__env->startSection("titre"); ?>
    Worker
<?php $__env->stopSection(); ?>

<?php $__env->startSection("buttons"); ?>
    <?php
        $employee= Session::get('employee');
        echo("<input id='employee_id' style='display: none' value='".$employee->NSS."'/>");
    ?>
    <input style="display: none" name="prestation_id"/>
    <ul class="menu list-unstyled">
        <li class="menu-item selected"><span>Prestation Sheet</span><span class="page-path" style="display: none">/workOnFichePrestation</span></li>
    </ul>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("content"); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection("imports"); ?>
    <script type="text/javascript">
        function whatToReset() {
            $("textarea[name='diagnostic']").val("");
            $("textarea[name='solution']").val("");
            $("textarea[name='reparation']").val("");
            $("select[name='pieces']").val("");
        }
        
        $(document).ready(function () {
            setTimeout(function() {
                var EID = $("#employee_id").val();
                var FID = $("input[name='ficheprestationId']");
                $("input[name='employeeId']").val(EID);

                $.post("/fichePrestationByNSS", {_token: "<?php echo e(csrf_token()); ?>", nss_employee: EID}, function (data, status) {
                    if (status == "success") {
                        if(data != ""){
                            var prestation=data[0];
                            FID.val(prestation.id);
                            $("#date_creation").text(prestation.date_creation);

                            $("input[name='prestation_id']").val(prestation.id);
                            $.post("/prestations", { _token: "<?php echo e(csrf_token()); ?>", id: prestation.id_prestation}, function (data, status) {
                                if (status == "success") {
                                    $("#type_prestation").text(data[0].libelle);
                                }
                            }, "json");
                            $.post("/clients", { _token: "<?php echo e(csrf_token()); ?>", id: prestation.id_client}, function (data, status) {
                                if (status == "success") {
                                    var client=data[0];
                                    $("input[name='brand']").val(client.marque_voiture);
                                    $("input[name='model']").val(client.modele_voiture);
                                    var reg=client.matricule_voiture;
                                    var res=reg.split("TN");
                                    $("input[name='registration-part1']").val(res[0]);
                                    $("input[name='registration-part2']").val(res[1]);
                                }
                            }, "json");
                        }else {
                            setTimeout(function () {
                                location.reload();
                            }, 60000);
                            var content=$(".content")[0];
                            content.innerHTML="<div class='noWork'><span>(No Work Is Available)</span></div>";
                        }
                    }
                }, "json");
                $.post("/pieces", {_token: "<?php echo e(csrf_token()); ?>"}, function (data, status) {
                    if (status == "success") {
                        var selectTag = $("select[name='pieces']")[0];
                        var html = "<option selected value=''>None</option>";
                        data.forEach(function (piece) {
                            if (piece.quantity > 0) {
                                html += "<option value='" + piece.reference + "'>" + piece.marque + " " + piece.type + " " + piece.libelle + "</option>";
                            } else {
                                html += "<option disabled class='busy' value='" + piece.reference + "'>" + piece.marque + " " + piece.type + " " + piece.libelle + "</option>";
                            }
                        })
                        selectTag.innerHTML = html;
                    }
                }, "json");
                /*if($("input[name='prestation_id']").val() != 0){
                    var clinetId;
                    $.post("/fichePrestation", { _token: "<?php echo e(csrf_token()); ?>", ficheprestation_id: fichePrestationId}, function (data, status) {
                        if (status == "success") {
                            var ficheprestation = data[0];
                            var dateSpan=$("#date_creation");
                            dateSpan.text(ficheprestation.date_creation);
                            var typePrestationId=ficheprestation.id_prestation;
                            var clientId=ficheprestation.id_client;
                            $.post("/prestations", { _token: "<?php echo e(csrf_token()); ?>", id: typePrestationId}, function (data, status) {
                                if (status == "success") {
                                    var prestation=data[0];
                                    var typePrestationSpan = $("#type_prestation");
                                    typePrestationSpan.text(prestation.libelle);
                                }
                            }, "json");
                            $.post("/clients", { _token: "<?php echo e(csrf_token()); ?>", id: clientId}, function (data, status) {
                                if (status == "success") {
                                    var client=data[0];
                                    $("input[name='brand']").val(client.marque_voiture);
                                    $("input[name='model']").val(client.modele_voiture);
                                    var reg=client.matricule_voiture;
                                    var res=reg.split("TN");
                                    $("input[name='registration-part1']").val(res[0]);
                                    $("input[name='registration-part2']").val(res[1]);
                                }
                            }, "json");
                        }
                    }, "json");
                }else{
                    var content=$(".content")[0];
                    content.innerHTML="<div class='noWork'><span>(No Work Is Available)</span></div>";
                }*/
            }, 50);
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("dashboard.dashboard_template", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>