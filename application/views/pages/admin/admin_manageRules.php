<title>Manage Rules</title>

<!-- !PAGE CONTENT! -->
<div class="w3-main w3-padding" style="margin-left:300px">

  <!-- ITEM CATEGORY SETTINGS  -->
  <!-- Header -->
  <header id="" class="w3-margin-top">    
    <span class="w3-xlarge w3-hover-text-grey"><i class="fa fa-gavel"></i> Rules Page Settings</span>

  </header>
  <div class="w3-col l12" id="rule_msg">
    <?php 
    if(isset($rule_set)){
      echo $rule_set;
    }
    ?>
  </div> 

  <div class="w3-col l12 well w3-margin-top">
    <form id="addRule_form" method="POST">
      <div class="w3-col l12" style="padding: 5px">
        <label>Rule Title: <br><span class="w3-tiny w3-text-grey"><i>(Title should be such that it describes the key point of Rule. For eg.Legal, Fees, Rent Pricing Structure, etc)</i></span></label>
        <input class="form-control" type="text" name="rule_title" placeholder="Enter Rule Title here... Eg.Legal, Fees, Rent Pricing Structure, etc" required>

        <label class="w3-margin-top">Rule Content: </label>
        <textarea class="form-control" rows="10" name="rule_content"  placeholder="Type the Rule Content here....Eg.Once you carefully read and accept the given terms below. You can list & rent your items, etc" required></textarea>

        <button class="w3-button w3-blue w3-padding w3-margin-right w3-margin-top btn" type="submit">Submit</button>
        <button class="w3-button w3-blue w3-padding w3-margin-right w3-margin-top btn" type="reset">Clear</button>
      </div>
    </form>
  </div>

  <div class="w3-col l12">
    <hr>
    <div class="w3-col l12 ">
      <span class="w3-xlarge"><i class="fa  fa-list-alt"></i> Manage Rules</span>
    </div> 

    <div class="w3-col l12 w3-padding-medium">
      <?php
      if (isset($all_rules)) {
        $rule_array=json_decode($all_rules,TRUE);
        $count=0;

        foreach ($rule_array as $key) {
          $rule_id=$key['rule_id'];
          $rule_title=$key['rule_title'];
          $rule_content=$key['rule_content'];

          $count++;
          echo '
          <div class="w3-col l12 w3-margin-top">
          <span><strong>'.$count.'.'.$rule_title.'</strong></span>
          
          <div class="w3-right">
          <a class="btn w3-padding-small" id="editRule_btn" name="editRule_btn" data-toggle="modal" data-target="#editRule_'.$rule_id.'" title="Edit '.$rule_title.'"><i class="fa fa-pencil"></i></a>
          <a class="btn w3-padding-small" id="delRule_btn" name="delRule_btn" href="'.base_url().'admin/admin_manageRules/delRule?rule_id='.$rule_id.'" title="Remove '.$rule_title.'"><i class="fa fa-remove"></i></a>
          </div>

          </div>
          <div >
          <p class="w3-margin-left w3-small">'.$rule_content.'</p>
          </div>



          <!-- Modal -->
          <div id="editRule_'.$rule_id.'" class="modal fade " role="dialog">
          <div class="modal-dialog modal-lg">
          <!-- Modal content-->
          <div class="modal-content col-lg-8 col-lg-offset-2">
          <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title w3-xlarge w3-text-red">Edit <span class="w3-medium">'.$rule_title.'</span></h4>
          </div>
          <div class="modal-body">
          <form method="POST" action="'.base_url().'admin/admin_manageRules/editRule">
          <input type="hidden" name="editrule_id" value="'.$rule_id.'">
          <label>Rule Title: <br><span class="w3-tiny w3-text-grey"><i>(Title should be such that it describes the key point of Rule. For eg.Legal, Fees, Rent Pricing Structure, etc)</i></span></label>
          <input class="form-control" type="text" name="editrule_title" placeholder="Enter Rule Title here... Eg.Legal, Fees, Rent Pricing Structure, etc" value="'.$rule_title.'" required>

          <label class="w3-margin-top">Rule Content: </label>
          <textarea class="form-control" rows="10" name="editrule_content" placeholder="Type the Rule Content here....Eg.Once you carefully read and accept the given terms below. You can list & rent your items, etc" >'.$rule_content.'</textarea><br>
          <button class="btn w3-blue" type="submit" name="updateRule" id="updateRule">Update</button>
          </form>
          </div>
          </div>
          </div>
          </div>
          <!--modal end-->    
          ';
        }
      }
      else{
        echo '<strong>--------------------No Rules Added--------------------------</strong>';
      } 

      ?>
      <div>

      </div>
    </div>
  </div>


  <!-- here is the script that will do the ajax. It is triggered when the form is submitted -->
  <script>
   $(function(){
     $("#addRule_form").submit(function(){
       dataString = $("#addRule_form").serialize();

       $.ajax({
         type: "POST",
         url: "<?php echo base_url(); ?>admin/admin_manageRules/addRule",
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
<!-- <script>
 $(function(){
   $("#delRule_btn").click(function(){
     dataString = $("#cat_name").val();     

     $.ajax({
       type: "POST",
       url: "<?php echo base_url(); ?>admin/admin_dash/deleteCategory?cat_id="+dataString,
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
</script> -->
<!-- ITEM CATEGORY SETTINGS END -->
<!-- End page content -->
</div>