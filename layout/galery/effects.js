$(document).ready(function () {

  var img = 1;
  const n_photos = 9;

  $(".show-image").hide();
  $("#image-controls").hide();
  $(".arrow").hide();
  for (let i = 1; i <=n_photos; i++) {
    $(`#imagem${i}`).hide();     
  }

  $("#image-controls").click(function () {
    $(".show-image").fadeOut(800);
    $("#image-controls").fadeOut(800);
    $(".arrow").fadeOut(800);
    $("#gallery").fadeIn(800);
    for (let i = 1; i <=n_photos; i++) {
      $(`#imagem${i}`).fadeOut(800);     
    }
  });
  
  for (let i = 1; i <= n_photos; i++){
    $(`#img-${i}`).click(function () { 
      $("#gallery").hide();
      $(".show-image").fadeIn(800);
      $("#image-controls").fadeIn(800);
      $(".arrow").fadeIn(1500);
      $(`#imagem${i}`).fadeIn(800);
      img = i;      
    });
  }

  $("#right-arrow").click(function () {
    for (let i = 1; i <= n_photos; i++) {
      if (img == i){   
        $(`#imagem${i}`).fadeOut(800, function () {
          if (img == 9) {
            $(`#imagem${1}`).fadeIn(800);
            img = 1;
          } else {
            $(`#imagem${i+1}`).fadeIn(800);
            img++;
          }
        });
      }
    }
  });

  $("#left-arrow").click(function () { 
    for (let i = 1; i <= n_photos; i++) {
      if (img == i){   
        $(`#imagem${i}`).fadeOut(800, function () {
          if (img == 1) {
            $(`#imagem${9}`).fadeIn(800);
            img = 9;
          } else {
            $(`#imagem${i-1}`).fadeIn(800);
            img--;
          }
        });
      }
    }
  });
});
