<title>General Settings</title>

<!-- !PAGE CONTENT! -->
<div class="w3-main w3-padding" style="margin-left:300px">

  <!-- ITEM CATEGORY SETTINGS  -->
  <!-- Header -->
  <header id="" class="w3-margin">    
    <span class="w3-xlarge w3-hover-text-grey"><i class="fa fa-sitemap"></i> Ijarline Item Category Settings</span>

  </header>
  <div class="w3-col l12" id="category_msg"></div> 

  <div class="w3-col l12 well ">
    <div class="w3-col l6 w3-left" style="padding: 5px">
      <span class="w3-hover-text-grey w3-margin-left"><i class="fa fa-plus"></i> Add New Category</span>
      <form id="add_newCategory" method="post">
        <div class="w3-margin-bottom w3-small">
          <div class="col-lg-4 ">
            <button type="submit" class="btn w3-button w3-margin-top w3-blue w3-margin-left w3-center" id="addCategory_btn"><i></i> Add Category</button>
          </div>
          <div class="col-lg-8">
            <input type="text" name="new_cat_name" id="new_cat_name" placeholder="Enter New Category..." autocomplete="off" class="w3-margin-left w3-margin-top w3-input" required>
          </div>
        </div>
      </form> 
    </div>
    <div class="w3-col l6" style="padding: 5px">

      <span class="w3-hover-text-grey w3-margin-left"><i class="fa fa-sort-alpha-asc"></i> All Categories</span>
      <div class="w3-margin-bottom w3-margin-top w3-small">
        <div class="col-lg-8">       
          <select name="cat_name" id="cat_name" class="w3-margin-left w3-margin-top w3-select">
            <option value="all">ALL</option>
            <?php
            if (isset($all_category)) {
              $cat_array=json_decode($all_category,TRUE);

              foreach ($cat_array as $key) {
                $cat_id=$key['cat_id'];
                $cat_name=$key['cat_name'];

                echo '<option value="'.$cat_id.'">'.strtoupper($cat_name).'</option>';
              }
            }
            else{
              echo '<option disabled>No Categories Added</option>';
            } 

            ?>

          </select>
        </div>
        <div class="col-lg-4 ">
          <button class="btn w3-button w3-margin-top w3-blue w3-margin-left" id="catDelete_btn" title="Delete Category"><i class="fa fa-remove"></i> </button>
        </div>

      </div>


    </div>

  </div>


  <!-- here is the script that will do the ajax. It is triggered when the form is submitted -->
  <script>
   $(function(){
     $("#add_newCategory").submit(function(){
       dataString = $("#add_newCategory").serialize();

       $.ajax({
         type: "POST",
         url: "<?php echo base_url(); ?>admin/admin_generalSettings/addCategory",
         data: dataString,
           return: false,  //stop the actual form post !important!

           success: function(data)
           {

             $("#category_msg").html(data);
             setTimeout(function() {
              window.location.reload();
            }, 1200);
           }

         });

         return false;  //stop the actual form post !important!

       });
   });
 </script>
 <script>
   $(function(){
     $("#catDelete_btn").click(function(){
       dataString = $("#cat_name").val();     

       $.ajax({
         type: "POST",
         url: "<?php echo base_url(); ?>admin/admin_generalSettings/deleteCategory?cat_id="+dataString,
         data: dataString,
           return: false,  //stop the actual form post !important!

           success: function(data)
           {

             $("#category_msg").html(data);
             setTimeout(function() {
              window.location.reload();
            }, 1200);
           }

         });



     });
   });
 </script>
 <!-- ITEM CATEGORY SETTINGS END -->

 <!-- MEMBERSHIP PKG. SETTINGS  -->
 <!-- Header -->

 <header id="" class="w3-margin">
  <span class="w3-xlarge w3-hover-text-grey"><i class="fa fa-vcard"></i> Membership Package Settings</span>
</header> 

<!-- add membership div -->
<div class="w3-col l12 well">

  <div class="w3-col l6 w3-left" style="padding: 5px">

    <form id="add_newPackage" method="POST">
      <div class="w3-margin-bottom w3-small">
        <div class="w3-col l12">
          <div class="col-lg-4">
            <label class="text-left">Name: <span class="w3-tiny"><br>(of Membership Pkg.)</span></label>
          </div>
          <div class="col-lg-8">
            <input type="text" name="pack_name" id="pack_name" placeholder="Eg. Basic, Pro, etc." autocomplete="off" class=" w3-input" required>
          </div>
        </div>
        <div class="w3-col l12 w3-margin-top">
          <div class="col-lg-4">
            <label class="text-left">Benefit Details: <span class="w3-tiny"><br>(of Membership Pkg.)</span></label>
          </div>
          <div class="col-lg-8">
            <input type="text" name="pack_details[]" id="pack_details[]" placeholder="Eg. Monthly support, Great Visibilty, etc." autocomplete="off" class=" w3-margin-bottom  w3-input" required>
            <div id="more_details_div"></div>
            <a class="w3-right w3-button btn fa fa-plus w3-small" id="more_packDetailBtn" name="more_packDetailBtn" style="padding:0">&nbsp;More</a>
          </div>
        </div>

      </div>      
    </div>
    <div class="w3-col l6" style="padding: 5px">      
      <div class="w3-margin-bottom w3-small">
        <div class="w3-col l12 w3-margin-top">
          <div class="col-lg-5">
            <label class="text-left">Validity: <span class="w3-tiny"><br>(of Membership Pkg.)</span></label>
          </div>
          <div class="col-lg-3">
            <input type="number" name="pack_validity" id="pack_validity" min="1" max="12" placeholder="Eg.1,etc." autocomplete="off" class=" w3-input w3-margin-bottom" required>
          </div>
          <div class="col-lg-4">
            <select id="pack_period" name="pack_period" class="w3-select">
              <option value="M">Monthly</option>
              <option value="Y">Yearly</option>
            </select>
          </div>
        </div>
        <div class="w3-col l12 w3-margin-top">
         <div class="col-lg-5">
          <label class="text-left">Package Cost (ر.س): <span class="w3-tiny"><br>(of Membership Pkg.)</span></label>
        </div>
        <div class="col-lg-3">
          <input type="number" name="pack_cost" id="pack_cost" min="0" placeholder="Eg.5,etc." autocomplete="off" class=" w3-input w3-margin-bottom" required>
        </div>
        <div class="col-lg-4">
          <button type="submit" class="btn w3-button w3-blue w3-right w3-center" id="addPackage_btn"><i></i> Add Package</button>
        </div>         
      </div>
    </div>
  </form> 

</div>
<div class="w3-col l12" id="package_msg"></div>
</div>

<!-- add membership end -->

<!-- all Membership packages  -->
<div class="w3-col l12">
  <?php
  if (isset($all_packages)) {
    $pack_array=json_decode($all_packages,TRUE);       

    foreach ($pack_array as $key) {
      $pack_id=$key['pack_id'];
      $pack_name=$key['pack_name'];
      $pack_cost=$key['pack_cost'];
      $pack_details=json_decode($key['pack_details'],TRUE);
      $pack_period="";
      $pack_code=$key['pack_code'];
      $pack_validity=$key['pack_validity'];
      $activation_status=$key['activation_status'];

      switch ($key['pack_period']) {
        case 'M':
        $pack_period='month';
        break;

        case 'Y':
        $pack_period='year';
        break;

        default:

        break;
      }

      echo '
      <div class="w3-quarter w3-margin-bottom w3-card-4" style="margin-right:24px">    
      <ul class="w3-ul w3-light-grey w3-center">      
      <li class="w3-dark-grey w3-xlarge w3-padding-32">
      <button class="w3-circle w3-light-grey w3-border w3-left w3-padding-small w3-button w3-medium" style="margin: -40px 20px 5px -25px;" data-toggle="modal" data-target="#editPack_'.$pack_id.'" title="Edit '.$pack_name.'"><i class="fa fa-pencil"></i></button>
      <a class="w3-circle w3-light-grey w3-border w3-right w3-padding-small w3-button w3-medium" style="margin: -40px -10px 5px 5px;" href="'.base_url().'admin/admin_generalSettings/delPack?pack_id='.$pack_id.'" title="Delete '.$pack_name.'"><i class="fa fa-remove"></i></a>

      '.strtoupper($pack_name).'&nbsp;<span class="w3-tiny">[#'.$pack_code.']</span>

      </li>';
      foreach ($pack_details as $pack) {
        echo '<li class="w3-padding-16">'.$pack.'</li>';
      }
      echo '       
      <li class="w3-padding-small">
      <h2>'.$pack_cost.' <span class="w3-medium">ر.س</span></h2>
      <span class="w3-opacity">per '.$pack_period.'</span>
      </li>
      <li class="w3-light-grey w3-padding-24">
      <a class="w3-button w3-black w3-padding-large" onclick="activate(\''.$pack_id.'\',\''.$activation_status.'\')">
        ';

      if($activation_status==0){echo "Activate";}
      else{echo "Deactivate";}

      echo '
      </a>
      </li>
      </ul>
      </div>

      <!-- Modal -->
      <div id="editPack_'.$pack_id.'" class="modal fade " role="dialog">
      <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content col-lg-8 col-lg-offset-2">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title w3-xlarge w3-text-red">Edit <span class="w3-medium"> Membership Package: '.$pack_name.'</span></h4>
      </div>
      <div class="modal-body w3-small">
      <form method="POST" action="'.base_url().'admin/admin_generalSettings/editPack">
      <input type="hidden" name="editpack_id" value="'.$pack_id.'">

      <label>Package Name:</label>
      <input class="form-control w3-margin-bottom" type="text" name="editpack_name" placeholder="Enter Pack Name here..." value="'.$pack_name.'" required>

      <label>Package Details:</label>';      
      foreach ($pack_details as $pack) {
        echo '
        <input class="form-control w3-margin-bottom" type="text" name="editpack_details[]" placeholder="More Benefits..." value="'.$pack.'" required>';
      }
      echo '

      <label>Package Validity:</label>
      <div class="col-lg-12" style="padding:0">
      <div class="col-lg-6 w3-padding-right" style="padding:0">
      <input class="form-control w3-margin-bottom" type="number" min="1" max="12" name="editpack_validity" placeholder="eg.1,2,etc" value="'.$pack_validity.'" required>
      </div>
      <div class="col-lg-6 " style="padding:0">
      <select id="editpack_period" name="editpack_period" class="form-control">';?>
      <option value="M" <?php if($key['pack_period']=='M'){echo "selected"; } ?> >Monthly</option>
      <option value="Y" <?php if($key['pack_period']=='Y'){echo "selected"; } ?> >Yearly</option>
      <?php echo '
      </select>
      </div> 
      </div>        
      <br>

      <label>Package Cost (ر.س):</label>
      <div class="col-lg-12" style="padding:0">
      <div class="col-lg-6 w3-padding-right" style="padding:0">      
      <input class="form-control w3-margin-bottom" type="number" min="0" name="editpack_cost" placeholder="Cost" value="'.$pack_cost.'" required>
      </div>
      <div class="col-lg-6" style="padding:0">
       <button class="btn w3-blue w3-right" type="submit" name="updatePackage" id="updatePackage">Update</button>
      </div> 
      </div>
      <br> 
      </form>
      </div>
      </div>
      </div>
      </div>'; 
    }
  }
  else{
    echo '<strong>--------------------No Package Added--------------------------</strong>';
  } 

  ?>
</div>
<!-- all membership packages end -->



<!-- End page content -->
</div>
<script type="text/javascript">
 function activate(id,status)
 {
       $.ajax({
        type:'post',
        url:'<?php echo base_url(); ?>admin/admin_generalSettings/activatePackage',
        data:{
          pack_id:id,
          status:status
        },
        success:function(response) {
          location.reload();
          //alert(response);
        }
      });
     
}

</script>
<!-- here is the script that will do the ajax. It is triggered when the form is submitted -->
<script>
 $(function(){
   $("#add_newPackage").submit(function(){
     dataString = $("#add_newPackage").serialize();

     $.ajax({
       type: "POST",
       url: "<?php echo base_url(); ?>admin/admin_generalSettings/addPackage",
       data: dataString,
           return: false,  //stop the actual form post !important!

           success: function(data)
           {

             $("#package_msg").html(data);
             setTimeout(function() {
              window.location.reload();
            }, 1200);
           }

         });

         return false;  //stop the actual form post !important!

       });
 });
</script>
<script>
 $(function(){
   $("#catDelete_btn").click(function(){
     dataString = $("#cat_name").val();     

     $.ajax({
       type: "POST",
       url: "<?php echo base_url(); ?>admin/admin_generalSettings/deleteCategory?cat_id="+dataString,
       data: dataString,
           return: false,  //stop the actual form post !important!

           success: function(data)
           {

             $("#category_msg").html(data);
             setTimeout(function() {
              window.location.reload();
            }, 1200);
           }

         });



   });
 });
</script>
<!-- MEMBERSHIP PKG. SETTINGS END -->

<!-- script to add more image upload input field on button click -->

<script>
  $(document).ready(function() {
    var wrapper         = $("#more_details_div"); 
    var add_button      = $("#more_packDetailBtn"); 

    var x = 1; 
    $(add_button).click(function(e){ 
      e.preventDefault();      
            $(wrapper).append('<div class="w3-margin-bottom"><a href="#" class="delete w3-text-grey w3-right fa fa-remove" title="Delete field"></a><input type="text" name="pack_details[]" id="pack_details[]" placeholder="More Benefits..." autocomplete="off" class="w3-margin-bottom  w3-input" required></div>'); //add li box            

          });

    $(wrapper).on("click",".delete", function(e){ 
      e.preventDefault(); $(this).parent('div').remove(); x--;
    })
  });
</script>
<!-- script ends -->
<!-- End page content -->
</div>