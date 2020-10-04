<?php
  function warn($alert, $id=0)
  {
    if($id==0)
      echo ('<div class="alert alert-success">'.$alert.'</div>');
    else
      echo ('<div class="alert alert-danger">'.$alert.'</div>');
  }
?>
