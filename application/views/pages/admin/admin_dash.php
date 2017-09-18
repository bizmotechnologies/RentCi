
<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:320px">

     <!-- Header -->
  <header id="" class="w3-margin">    
    <span class="w3-xlarge w3-hover-text-grey"><i class="fa fa-sitemap"></i> Ijarline Item Category</span>
    
  </header>

    <div class="w3-col l12 well w3-margin-top">
      <div class="w3-col l6 " style="padding: 5px">
        <span class="w3-hover-text-grey w3-margin-left"><i class="fa fa-plus"></i> Add New Category</span>
        <form id="add_newCategory" method="post">
        <div class="w3-margin-bottom">
          <div class="col-lg-4 ">
              <button type="submit" class="btn w3-button w3-margin-top w3-blue w3-margin-left w3-center" id="addCategory_btn"><i></i> Add Category</button>
            </div>
            <div class="col-lg-8">
              <input type="text" name="new_cat_name" id="new_cat_name" placeholder="Enter New Category..." autocomplete="off" class="w3-margin-left w3-margin-top w3-input">
            </div>
        </div>
        </form>  
      </div>
      <div class="w3-col l6 w3-border-left" style="padding: 5px">
         
        <span class="w3-hover-text-grey w3-margin-left"><i class="fa fa-sort-alpha-asc"></i> All Categories</span>
        <div class="w3-margin-bottom">
          <div class="col-lg-8">
              <select name="cat_name" id="cat_name" class="w3-margin-left w3-margin-top w3-select">
                <option>Art & leisure</option>
                <option>Art & leisure</option>
                <option>Art & leisure</option>
                <option>Art & leisure</option>
                <option>Art & leisure</option>
              </select>
            </div>
          <div class="col-lg-4 ">
              <button class="btn w3-button w3-margin-top w3-blue w3-margin-left"><i class="fa fa-pencil"></i> </button>
              <button class="btn w3-button w3-margin-top w3-blue w3-margin-left"><i class="fa fa-remove"></i> </button>
            </div>
            
        </div>
            
        
      </div>
    </div>

<!-- End page content -->
</div>

<!-- here is the script that will do the ajax. It is triggered when the form is submitted -->
<script>
   $(function(){
       $("#add_newCategory").submit(function(){
         dataString = $("#add_newCategory").serialize();

         $.ajax({
           type: "POST",
           url: "<?php echo base_url(); ?>admin/admin_dash/addCategory",
           data: dataString,
           return: false,  //stop the actual form post !important!

           success: function(data)
           {
               alert(data);
           }

         });

         return false;  //stop the actual form post !important!

      });
   });
</script>