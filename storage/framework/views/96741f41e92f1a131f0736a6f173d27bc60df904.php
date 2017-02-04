<?php $__env->startSection("titre"); ?>
    Receptioniste
<?php $__env->stopSection(); ?>

<?php $__env->startSection("buttons"); ?>
    <ul class="menu list-unstyled">
        <li class="menu-item selected"><span>Create Prestation Sheet</span><span class="page-path" style="display: none">/createFichePrestation</span></li>
        <li class="menu-item" id="Yoo1"><span>Client List</span><span class="page-path" style="display: none">/listeClient</span></li>
    </ul>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("content"); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection("imports"); ?>
    <script type="text/javascript">

        var clients;
        var searchedCin;
        var prestations;
        var workers;

        function init(){
            page1_init();
            page2_init();
        }

        function page2_init() {
            $('#myTable').DataTable( {
                responsive: true,
                destroy: true,
                "autoWidth": false,
                "sAjaxDataProp": 'data',
                "ajax": {
                    "url": "/clients",
                    "type": "POST",
                    "data": {_token: "<?php echo e(csrf_token()); ?>"}
                },
                "columnDefs": [
                    {
                        "targets": [ 9 ],
                        "searchable": false,
                        "orderable": false
                    }
                ],
                "columns": [
                    { "data": "cin" },
                    { "data": "prenom" },
                    { "data": "nom" },
                    { "data": "tel" },
                    { "data": "email" },
                    { "data": "addresse" },
                    { "data": "marque_voiture" },
                    { "data": "modele_voiture" },
                    { "data": "matricule_voiture" },
                    {
                        data: null,
                        className: "center",
                        defaultContent: "<button onclick='editClient(this)' data-toggle='modal' data-target='#editModal' class='btn btn-primary btn-sm' style='margin-right: 5px'>Edit</button><button onclick='deleteClient(this)' data-toggle='modal' data-target='#deleteModal' class='btn btn-danger btn-sm'>Delete</button>"
                    }
                ]
            } );
            var filterParent=$("#myTable_filter").parent();
            filterParent.append("<button type='button' data-toggle='modal' data-target='#myModal' class='btn btn-primary btn-md' style='display: inline; float: right; margin-right: 20px;'>Add Client</button>");
        }

        function deleteClient(element) {
            var cinField=$("#deleteModal input[name='existing_cin']");
            var row=element.closest("tr");
            cinField.val(row.children[0].innerHTML);
        }

        function editClient(element){
            var cinField=$("#editModal input[name='existing_cin']");
            var nameField=$("#editModal input[name='name']");
            var lastNameField=$("#editModal input[name='lastName']");
            var phoneField=$("#editModal input[name='telephone']");
            var emailField=$("#editModal input[name='email_address']");
            var addressField=$("#editModal input[name='address']");
            var brandField=$("#editModal input[name='brand']");
            var modelField=$("#editModal input[name='model']");
            var registrationPart1Field=$("#editModal input[name='registration-part1']");
            var registrationPart2Field=$("#editModal input[name='registration-part2']");

            var row=element.closest("tr");
            cinField.val(row.children[0].innerHTML);
            nameField.val(row.children[1].innerHTML);
            lastNameField.val(row.children[2].innerHTML);
            phoneField.val(row.children[3].innerHTML);
            emailField.val(row.children[4].innerHTML);
            addressField.val(row.children[5].innerHTML);
            brandField.val(row.children[6].innerHTML);
            modelField.val(row.children[7].innerHTML);

            var reg=row.children[8].innerHTML;
            var res=reg.split("TN");
            registrationPart1Field.val(res[0]);
            registrationPart2Field.val(res[1]);
        }

        function page1_init() {
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
            $.post("/prestations", {_token: "<?php echo e(csrf_token()); ?>"}, function(data, status) {
                var selectTag=$("select[name='prestation']")[0];
                var html="<option selected disabled value=''>Please select a type</option>";
                if(status == "success") {
                    prestations=data;
                    data.forEach(function (prestation){
                        html+="<option value='"+prestation.id+"'>"+prestation.libelle+"</option>";
                    })
                    selectTag.innerHTML=html;
                }
            }, 'json');

            //Workers[
            $.post("/workers", {_token: "<?php echo e(csrf_token()); ?>"}, function(data, status) {
                var selectTag=$("select[name='workers']")[0];
                selectTag.innerHTML="<option selected disabled value=''>Please select a worker</option>";
                if(status == "success") {
                    workers=data;
                    data.forEach(function (worker){
                        $.post("/fichePrestationByNSS", {_token: "<?php echo e(csrf_token()); ?>", nss_employee: worker.NSS}, function (data2, status2) {
                            if(status2 == "success"){
                                if(data2!=""){
                                    selectTag.innerHTML+="<option disabled class='busy' value='"+worker.NSS+"'>"+worker.prenom+"  "+worker.nom+"-busy</option>";
                                }else{
                                    selectTag.innerHTML+="<option value='"+worker.NSS+"'>"+worker.prenom+"  "+worker.nom+"</option>";
                                }
                            }
                        }, "json");
                    })
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
            var days=(date.getDate()<10?'0':'') + date.getDate();
            var months=(date.getMonth()<10?'0':'') + (date.getMonth()+1);
            var hours=(date.getHours()<10?'0':'') + date.getHours();
            var minutes=(date.getMinutes()<10?'0':'') + date.getMinutes()
            $("input[name='date']").val(days+' / '+months+' / '+date.getFullYear()+'   '+hours+':'+minutes);
        }

        function cinHelper(element) {
            searchedCin=$("input[name='existing_cin']").val();
            var inputs=$(".new_client_form input");
            var helper=$(".input-helper table tbody");
            if(searchedCin){
                $.post("/clients", {_token: "<?php echo e(csrf_token()); ?>", existing_cin: searchedCin}, function(data,status){
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
            var reg=c.matricule_voiture;
            var res=reg.split("TN");
            $(".new_client_form input[name='registration-part1']").val(res[0]);
            $(".new_client_form input[name='registration-part2']").val(res[1]);
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

        function enableFields(){
            var inputs=$(".new_client_form input");
            var i;
            for(i=0; i<inputs.length; i++) {
                inputs[i].removeAttribute("disabled");
            }

            setTimeout(function(){
                var date=new Date();
                var days=(date.getDate()<10?'0':'') + date.getDate();
                var months=(date.getMonth()<10?'0':'') + (date.getMonth()+1);
                var hours=(date.getHours()<10?'0':'') + date.getHours();
                var minutes=(date.getMinutes()<10?'0':'') + date.getMinutes()
                $("input[name='date']").val(days+' / '+months+' / '+date.getFullYear()+'   '+hours+':'+minutes);
            }, 10);
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("dashboard.dashboard_template", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>