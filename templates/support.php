<?php include 'header_main.php'; ?>
 <section class="site-sectionn" style="background-image: url(images/query.jpg); background-repeat: no-repeat;
    background-attachment:scroll;
background-position: center center; background-size:cover;">

<div class="container">
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="form-wrap">
      <h2 class="mb-5">Any Query  &nbsp; <i class="fa fa-question" style="font-size:36px"></i></h2>
      <form method="post">
	  <p class="error"><?php echo $error; ?></p>
	  <input type="hidden" name="support_for" value="<?php echo $_SESSION['user_id']; ?>"/>
            <div class="row">
            <div class="col-md-12 form-group">
              <label for="name">Name:</label>
              <input type="text" id="name" class="form-control py-2" name="support_name">
            </div>
          </div>
   <div class="row">
            <div class="col-md-12 form-group">
              <label for="name">Email Address:</label>
              <input type="text" id="name" class="form-control py-2" name="support_email">
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 form-group">
              <label for="name">Course:</label>
              <input type="text" id="name" class="form-control py-2" name="support_course">
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 form-group">
              <label for="name">Lesson.No:</label>
              <input type="numbers" id="name" class="form-control py-2" name="support_lesson">
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-12 form-group">
              <label for="name">Query Details*</label>
              <textarea id="name" class="form-control py-2" name="support_query"></textarea>
            </div>
          </div>
  
          
          <div class="row">
            <div class="col-md-6 form-group">
              <button type = "submit" class="btn btn-primary px-3 py-2" style="background-color:#C03F53;">Submit Query</button>

            </div>
          </div>
        </form>
      </div>
  </div>
</div>
</div>
</section>
<?php include 'footer_main.php'; ?>