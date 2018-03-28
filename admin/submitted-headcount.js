window.onload = function() {

  // var edit = document.getElementsByName('edit');
  // edit.forEach(function())


  var edit = [].slice.call(document.getElementsByClassName("btn-primary"));

  var start, mid, end = 0;

  edit.forEach(function(element, index) {
    element.addEventListener("click", function() {
      // alert("you clicked button " + edit[index].id);

      // doc = document.getElementsByClassName('mid');
      // doc[0].innerText

      


    });
  });

  // alert(edit.length);
  // for (var i = 0; i < bEdit.length; i++) {
  //   alert(edit[i].id);
  //
  // }

  // function clickAction(e) {
  //   alert(e.id);
  //
  // }

}
