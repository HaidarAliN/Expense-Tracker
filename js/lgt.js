$(document).ready(function(){
    $("#logout").click(function(){
      if(confirm('Are you sure you want to logout?'))
      {
          location.href = 'php/logout.php';
      }
    });
  });