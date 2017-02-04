<?php $__env->startSection("titre"); ?>
    Receptioniste
<?php $__env->stopSection(); ?>

<?php $__env->startSection("buttons"); ?>
    <ul class="menu list-unstyled">
        <li class="menu-item selected"><span>Create Prestation Sheet</span><span class="page-path" style="display: none">/createFichePrestation</span></li>
        <li class="menu-item" id="Yoo1"><span>Client List</span><span class="page-path" style="display: none">/listeClient</span></li>
        <li class="menu-item" id="yoo2"><span>Consulter Liste Client</span><span class="page-path" style="display: none">/m</span></li>
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
            $('#myTable').DataTable();
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

            //Workers
            $.post("/workers", {_token: "<?php echo e(csrf_token()); ?>"}, function(data, status) {
                var selectTag=$("select[name='workers']")[0];
                var html="<option selected disabled value=''>Please select a worker</option>";
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