<title>Dashboard</title>
<!-- !PAGE CONTENT! -->
<div class="w3-main w3-padding" style="margin-left:300px">

  <!-- ITEM CATEGORY SETTINGS  -->
  <!-- Header -->
  <header id="" class="w3-margin-top">    
    <span class="w3-xlarge w3-hover-text-grey"><i class="fa fa-list"></i> Rent List</span>

  </header>
  
  <div class="w3-col l12 well w3-margin-top">
    <table class="table table-striped table-responsive w3-small">
      <thead>
        <tr>
          <th>#</th>
          <th>Item Name</th>
          <th>Total Views</th>
          <th>Posted on</th>
          <th>Expires on</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          if (isset($all_rentList)) {
            
            $rentList_array=json_decode($all_rentList,TRUE);
            $color="w3-green";
            $text="w3-text-green"; 
            $live="Is Live";
            foreach ($rentList_array as $key) {
              $expiry_period = strtotime("+".$key['expiry_period']." month", strtotime($key['posted_date']));
              $expiry_date = date("d M Y", $expiry_period);
             $posted_date = date_format(date_create($key['posted_date']),'d M Y');
              if($key['isLive']==0)
              { 
                 $color="w3-red";
                 $text="w3-text-red"; 
                 $live="Is Expired";
              }

              echo '
              <tr>
              <td><div title="'.$live.'" class="w3-circle w3-tiny '.$color.' '.$text.' w3-center fa fa-check" style="margin:0:padding:2px"></div></td>
              <td>'.$key['item_name'].'</td>
              <td>'.$key['total_views'].'</td>
              <td>'.$posted_date.'</td>
              <td>'.$expiry_date.'</td>
              </tr>';
            }
          }
        ?>
        <tr></tr>
      </tbody>
    </table>
  </div>

  <div class="w3-col l12"></div>


  <!-- here is the script that will do the ajax. It is triggered when the form is submitted -->
  <script>
   $(function(){
     $("#addRule_form").submit(function(){
       dataString = $("#addRule_form").serialize();

       $.ajax({
         type: "POST",
         url: "<?php echo base_url(); ?>admin/admin_manageSettings/addRule",
         data: dataString,
           return: false,  //stop the actual form post !important!

           success: function(data)
           {

             $("#rule_msg").html(data);
             setTimeout(function() {
              window.location.reload();
            }, 1200);
           }

         });

         return false;  //stop the actual form post !important!

       });
   });
 </script>

 <!-- ITEM CATEGORY SETTINGS END -->
 <!-- End page content -->
</div>