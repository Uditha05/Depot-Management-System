  var update1 = function () {
    if ($("#toggler1").is(":checked")) {
    	
        $('#dis').prop('disabled', false);
        $('#diesel').prop('disabled', false);
    }
    else {
    	
        $('#dis').prop('disabled', 'disabled');
        $('#diesel').prop('disabled', 'disabled');
    }
  };
  $(update1);
  $("#toggler1").change(update1);  


  var update2 = function () {
    if ($("#toggler2").is(":checked")) {
      
        $('#arr').prop('disabled', false);
    }
    else {
      
        $('#arr').prop('disabled', 'disabled');
    }
  };
  $(update2);
  $("#toggler2").change(update2);