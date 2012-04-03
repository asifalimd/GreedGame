<div style="clear:left; float:left;align: centre;width:400px;padding:10px;margin:10px;float:left;border: 1px solid;">
<strong>Results</strong>
<?php $dice = implode(', ', $greed->getDice());?>
<br>
Dice Values: <?php echo $dice?>;
<br>
Score:  <?php echo $greed->getScore() ?>;
<br>


</div>