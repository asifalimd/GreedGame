<div style="align: centre;width:600px;padding:10px;margin:10px;float:left;border: 1px solid;">
<?php $throws = ($greed) ?$greed->getThrows() :'';?>
<form action="<?php echo url_for('@nDraws') ?>" method="POST">
 
 <?php echo $form?>

        <input type="submit" value="Draw" />
</form>

<?php echo link_to(' <h3>Go Back to Home</h3>', '@homepage')?>
</div>