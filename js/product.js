  window.onload = function () {
      //set up var for changeimg function
      var index = 0;
      var imgs = document.getElementsByClassName("img");
      var dots = document.getElementsByClassName("dots")[0];
      var dotss = dots.children;
      var len = imgs.length;
      var timer = null;
      dotss[0].className = "active";
      //change pictures
      function ChangeImg() {
          index++;
          if (index >= len) index = 0;
          for (var i = 0; i < len; i++) {
              imgs[i].style.display = 'none';
              dotss[i].className = "quiet";
          }
          imgs[index].style.display = 'block';
          dotss[index].className = "active";
      }
      for (var i = 0; i < len; i++) {
          dotss[i].index = i;
          dotss[i].onmouseover = function () {
              for (var j = 0; j < len; j++) {
                  imgs[j].style.display = 'none';
                  dotss[j].className = "quiet";
              }
              this.className = "active";
              index = this.index;
              imgs[index].style.display = 'block';
          }
      }
      wrapper.onmouseover = function () {
          clearInterval(timer);
      }
      wrapper.onmouseout = function () {
          timer = setInterval(ChangeImg, 2000);
      }
      timer = setInterval(ChangeImg, 2000);
      //funtion to display product description
      document.getElementById("sub").setAttribute("disabled", "disabled");
      document.getElementById("plus").addEventListener("click", plus);
      document.getElementById("sub").addEventListener("click", subs);
  }
  //function to display the total price
  var totalPrice = 0;
  var valueCount = 0;
  //function to calculate the total price
  function priceTotal() {
      var unitPrice = document.getElementById("price").innerHTML;
      var count = document.getElementsByClassName("inputNum")[0].value;
      totalPrice = Number(count) * unitPrice;
      document.getElementById("tPrice").value = totalPrice.toFixed(2);
  }
  //function for plus button
  function plus() {
      valueCount++;
      document.getElementById("textNum").value = valueCount;
      if (valueCount >= 1) {
          document.getElementById("sub").removeAttribute("disabled")
          document.getElementById("plus").classList.remove("disabled")
      }
      priceTotal();
  }
  // function for subs button
  function subs() {
      valueCount--;
      document.getElementById("textNum").value = valueCount;
      if (valueCount == 0) {
          document.getElementById("sub").setAttribute("disabled", "disabled")
      }
      priceTotal();
  }