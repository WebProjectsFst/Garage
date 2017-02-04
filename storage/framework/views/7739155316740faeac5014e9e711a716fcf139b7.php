<?php $__env->startSection("titre"); ?>
    Accountant
<?php $__env->stopSection(); ?>

<?php $__env->startSection("buttons"); ?>
    <ul class="menu list-unstyled">
        <li class="menu-item selected"><span>Prestation Sheets</span><span class="page-path" style="display: none">/listePrestationEnAttente</span></li>
        <li class="menu-item"><span>Paid Bills</span><span class="page-path" style="display: none">/listeFacturePayee</span></li>
        <li class="menu-item"><span>Unpaid Bills</span><span class="page-path" style="display: none">/listeFactureNonPayee</span></li>
    </ul>
    <div style="margin-left: 30px; position: absolute; bottom: 50px;">
        <div class="row" style="margin-bottom: 10px;">
            <button onclick="dailyRevenue()" style="width: 200px" class="btn btn-primary btn-md">Daily Revenue</button>
        </div>
        <div class="row" style="margin-bottom: 10px">
            <button onclick="monthlyRevenue()" style="width: 200px" class="btn btn-primary btn-md">Monthly Revenue</button>
        </div>
        <div class="row" style="margin-bottom: 10px">
            <button onclick="annualRevenue()" style="width: 200px" class="btn btn-primary btn-md">Annual Revenue</button>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("imports"); ?>
    <script type="text/javascript">
        function dailyRevenue() {
            $.post("/factureController/daily", {_token: "<?php echo e(csrf_token()); ?>"}, function (data, status) {
                if(status == "success") {
                    var somme=0;
                    data.forEach(function (facture) {
                        somme+=facture.montant;
                    })
                    $("#dailyRevenueTotal").innerHTML=somme;
                    alert("Daily Revenue: "+somme);
                }
            }, "json");
        }

        function monthlyRevenue() {
            $.post("/factureController/monthly", {_token: "<?php echo e(csrf_token()); ?>"}, function (data, status) {
                if(status == "success") {
                    var somme=0;
                    data.forEach(function (facture) {
                        somme+=facture.montant;
                    })
                    alert("Daily Revenue: "+somme);
                }
            }, "json");
        }

        function annualRevenue() {
            $.post("/factureController/annual", {_token: "<?php echo e(csrf_token()); ?>"}, function (data, status) {
                if(status == "success") {
                    var somme=0;
                    data.forEach(function (facture) {
                        somme+=facture.montant;
                    })
                    alert("Daily Revenue: "+somme);
                }
            }, "json");
        }

        function init(){
            page1_init();
            page2_init();
            page3_init();
        }

        function page2_init() {
            $('#factureTable').DataTable( {
                responsive: true,
                destroy: true,
                "autoWidth": false,
                "sAjaxDataProp": 'data',
                "ajax": {
                    "url": "/factureController/payedBills",
                    "type": "POST",
                    "data": {_token: "<?php echo e(csrf_token()); ?>"}
                },
                "columns": [
                    { "data": "id" },
                    { "data": "id_fiche_prestation" },
                    { "data": "date_payement" },
                    { "data": "status" },
                    { "data": "montant" },
                ]
            } );
        }

        function page3_init() {
            $('#unpayedTable').DataTable( {
                responsive: true,
                destroy: true,
                "autoWidth": false,
                "sAjaxDataProp": 'data',
                "ajax": {
                    "url": "/factureController/unpayedBills",
                    "type": "POST",
                    "data": {_token: "<?php echo e(csrf_token()); ?>"}
                },
                "columnDefs": [
                    {
                        "targets": [ 4 ],
                        "searchable": false,
                        "orderable": false
                    }
                ],
                "columns": [
                    { "data": "id" },
                    { "data": "id_fiche_prestation" },
                    { "data": "status" },
                    { "data": "montant" },
                    {
                        data: null,
                        className: "center",
                        defaultContent: "<button style='width: 95%' onclick='pay(this)' data-toggle='modal' data-target='#editModal' class='btn btn-primary btn-sm'>Pay</button>"
                    }
                ]
            } );
        }

        function pay(element) {
            var row=element.closest("tr");
            var td=row.children[0];
            var prestrationId=td.innerHTML;
            $.post("/factureController/payBills", {_token: "<?php echo e(csrf_token()); ?>", id: prestrationId}, function(data, status) {}, "json");
            page3_init();
        }

        var table;
        function page1_init() {
            table=$('#myTable').DataTable( {
                responsive: true,
                destroy: true,
                "autoWidth": false,
                "sAjaxDataProp": 'data',
                "ajax": {
                    "url": "/getListPrestations",
                    "type": "POST",
                    "data": {_token: "<?php echo e(csrf_token()); ?>"}
                },
                "columnDefs": [
                    {
                        "targets": [ 4 ],
                        "searchable": false,
                        "orderable": false
                    }
                ],
                "columns": [
                    { "data": "id" },
                    { "data": "date_creation" },
                    { "data": "clientName" },
                    { "data": "clientLastName" },
                    { "data": "prestationLibelle" },
                    {
                        data: null,
                        className: "center",
                        defaultContent: "<button onclick='genereateFacture(this)' data-toggle='modal' data-target='#editModal' class='btn btn-primary btn-sm'>Generate</button>"
                    }
                ]
            } );
        }

        function genereateFacture(element) {
            var row=element.closest("tr");
            var td=row.children[0];
            var prestrationId=td.innerHTML;

            $.post("/getFichePrestationDetailByID", {_token: "<?php echo e(csrf_token()); ?>", id: prestrationId}, function(data, status) {
                if(status == "success") {
                    var prestation=data[0];
                    $("input[name='existing_cin']").val(prestation.cin);
                    $("input[name='name']").val(prestation.clientName);
                    $("input[name='lastName']").val(prestation.clientLastName);
                    $("input[name='telephone']").val(prestation.tel);
                    $("input[name='email_address']").val(prestation.email);
                    $("input[name='address']").val(prestation.address);

                    $("input[name='prestation']").val(prestation.prestationLibelle);
                    $("input[name='price']").val(prestation.prestationPrice+" TND");

                    if(prestation.libellePiece==null){
                        $("input[name='piece']").val("None");
                    }else{
                        $("input[name='piece']").val(prestation.libellePiece);
                    }
                    if(prestation.pricePiece==null){
                        $("input[name='piecePrice']").val("0 TND");
                    }else{
                        $("input[name='piecePrice']").val(prestation.pricePiece+((prestation.pricePiece/100)*10)+" TND");
                    }

                    var total= prestation.prestationPrice+prestation.pricePiece+((prestation.pricePiece/100)*10);
                    $("#Total").text("Total: "+total+" TND");


                    $("#montant").val(total);
                    $("#id_fiche_prestation").val(prestrationId);
                }
            }, 'json');
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("dashboard.dashboard_template", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>