<?php $__env->startSection('titre'); ?>
  Client Form
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenu'); ?>
  <br>
   <div class="col-sm-offset-2 col-sm-8">
       <div class="panel panel-info">
           <div class="panel-heading">Inscription à la lettre d'information</div>
           <div class="panel-body">
               <?php echo Form::open(['route' => 'postClient']); ?>

                   <div class="form-group <?php echo $errors->has('email') ? 'has-error' : ''; ?>">
                       <?php echo Form::email('email', null, array('class' => 'form-control', 'placeholder' => 'Entrez votre email')); ?>

                       <?php echo $errors->first('email', '<small class="help-block">:message</small>'); ?><br>
                   </div>
                   <div class="form-group <?php echo $errors->has('nom') ? 'has-error' : ''; ?>">
                     <?php echo Form::text('nom', null, array('class' => 'form-control','placeholder' => 'Entrez votre nom')); ?>

                     <?php echo $errors->first('nom', '<small class="help-block">:message</small>'); ?>

                   </div>
                   <?php echo Form::submit('Envoyer !', ['class' => 'btn btn-info pull-right']); ?>

               <?php echo Form::close(); ?>

           </div>
       </div>
   </div>

<?php echo $__env->make('template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>