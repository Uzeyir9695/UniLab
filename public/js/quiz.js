$(document).ready(function(){
    $(document).on("click", "#addOption", function(e){
        e.preventDefault();
      $(".beforeOption").before('<div class="form-inline after"><select class="form-control" name="correct_answer[]"><option value="true">სწორია</option><option value="false">არასწორია</option></select><input type="text" name="option[]" id="option" class="form-control input my-2" autocomplete="off"><i style="font-size: 20px" class="fas fa-trash-alt ml-2 removeOption"></i></div>');
    });

    $(document).on("click", ".removeOption", function(){
        $(this).parent('div').remove();
    });

    $(document).on("click", "#addImageLink", function(){
      $(".beforeVideo").before('<div class="form-inline"><input type="url" class="form-control" id="image" name="image[]" required> <i style="font-size: 20px" class="fas fa-trash-alt ml-2 removeImageLink"></i></div>')
    });
    $(document).on("click", ".removeImageLink", function() {
        $(this).parent("div").remove();
    });

    $(document).on("click", "#addVideoLink", function(){
      $(".beforeSubmit").before('<div class="form-inline"><input type="url" class="form-control"  id="video" name="video[]" required> <i style="font-size: 20px" class="fas fa-trash-alt ml-2 removeVideoLink"></i></div>')
    });
    $(document).on("click", ".removeVideoLink", function() {
        $(this).parent("div").remove();
    });
    
    // Hide Submit button by default and show when type is selected
    $(".hideButton").hide();
    $(".list").change(function(){
        $(".hideButton").show();
    });
  });