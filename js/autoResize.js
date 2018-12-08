var Resize = function () {
  var objet = document.getElementById("resize");
  var parent = objet.parentNode;
  var p_size = {
    x: parent.offsetWidth,
    y: parent.offsetHeight
  };
  var c_size = {
    x: objet.getAttribute("mywidth"),
    y: objet.getAttribute("myheight")
  };
  var n_size = {
    x: p_size.x * c_size.x / 100,
    y: p_size.y * c_size.y / 100
  };

  if (n_size.x <= n_size.y) {
    objet.style.width = n_size.x + "px";
    objet.style.height = n_size.x + "px";
  } else {
    objet.style.width = n_size.y + "px";
    objet.style.height = n_size.y + "px";
  }
  console.log(n_size);
};

window.onresize = Resize;
Resize();
