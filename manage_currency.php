<?php
   require('top.inc.php');
   $currencyName='';
   $buy='';
   $sell='';
   $folder='';
   $filename='';
   $tempname='';
   $c_logo='';
   $link='';
   if(isset($_GET['id']) && $_GET['id']!=''){
      $id=get_safe_value($conn,$_GET['id']);
      $sql="select  * from  currencies where  id='$id'";
      $res=mysqli_query($conn,$sql);
      $check=mysqli_num_rows($res);
      if($check>0){
         $row=mysqli_fetch_assoc($res);
         $currencyName=$row['currencyName'];
         $buy=$row['Buy'];
         $sell=$row['Sell'];
         $c_logo=$row['c_logo'];
         $link=$row['link'];
      }else{
         header('location:currency.php');
         die();   
      }      
}
   if(isset($_POST['submit'])){
      $currencyName=get_safe_value($conn,$_POST['categories']);
      $buy=get_safe_value($conn,$_POST['buy']);
      $sell=get_safe_value($conn,$_POST['sell']);
      $link=get_safe_value($conn,$_POST['link']);
      $filename=$_FILES['file']['name'];
      $tempname=$_FILES['file']['tmp_name'];
      $folder='images/'.$filename;
      
      move_uploaded_file($tempname,$folder);
      
      $sql="select  * from  currencies where  currenyName='$currencyName'";
      $res=mysqli_query($conn,$sql);
      $check=mysqli_num_rows($res);
      if($check>0){
         echo "<div class='alert  alert-warning'> already  exist
         </div>";
      }else{
      if(isset($_GET['id']) && $_GET['id']!=''){
         $sql="update currencies set currencyName='$currencyName',Buy='$buy', Sell='$sell' ,link='$link' ,c_logo='$folder'    where id='$id'";
         mysqli_query($conn,$sql);    
      }else{
        $sql="insert  into  currencies(currencyName,Buy,Sell,c_logo,link) values ('$currencyName','$buy','$sell','$folder','$link')";
        mysqli_query($conn,$sql);
      }

      header('location:currency.php');
      die();
   }
}  
?>
    <div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>E-Currency </strong><small> Form</small></div>
                        <div class="card-body card-block">
                        <form method="post"  enctype="multipart/form-data">
                            <div class="form-group">
                               <label for="company" class=" form-control-label">currency</label>
                               <input type="text"  name="categories" placeholder="Enter currency name" class="form-control" required value="<?php echo  $currencyName; ?>">
                            </div>
                            <div class="form-group">
                               <label for="company" class=" form-control-label">Buy</label>
                               <input type="text"  name="buy" placeholder="Enter Buy  Curency" class="form-control" required value="<?php echo  $buy; ?>">
                            </div>
                            <div class="form-group">
                               <label for="company" class=" form-control-label">Sell</label>
                               <input type="text"  name="sell" placeholder=" Enter Sell  Currency" class="form-control" required value="<?php echo  $sell; ?>">
                            </div>
                            <div class="form-group">
                               <label for="company" class=" form-control-label">Link</label>
                               <input type="text"  name="link" placeholder="Enter  Link" class="form-control" required value="<?php echo  $link; ?>">
                            </div>
                            <div class="form-group">
                               <label for="company" class=" form-control-label">Upload  logo</label>
                               <input type="file"  name="file"  class="form-control" required value="<?php  echo $c_logo; ?>">
                            </div>
                                                       
                           <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
                           <span id="payment-button-amount">Submit</span>
                           </button>
                           </form> 
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         
<?php
   require('footer.inc.php');
?>