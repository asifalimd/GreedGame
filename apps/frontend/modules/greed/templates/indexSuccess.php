<div >

<?php if ($action =='nDraws'):?>
 <?php include_partial('form', array('greed' => $greed, 'form' => $form))?>
 
<?php else:?>
  <div style="align: centre;width:400px;padding:10px;margin:10px;float:left;border: 1px solid;">
  
  <?php echo link_to('<h3>Click to throw 5 dice randomly</h3>', '@homepage?play=1')?>
  </div>
  <div style="width:400px;margin:10px;padding:10px;float:left;border: 1px solid;">
 
  <?php echo link_to(' <h3>Click below to Enter Dice</h3>', '@nDraws')?>
  </div> 
<?php endif;?>

  <?php if (isset($greed)):?>
    <?php include_partial('score', array('greed' => $greed))?>
  <?php endif;?>  

</div>