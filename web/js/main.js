$(function () {
    $('#modalButton').click(function () {
        $('#modalx').modal('show')
                .find('#modalContent')
                .load($(this).attr('value'));
				 return false;   
    });

   
});

$(function () {
    $('#modalButtonRegister').click(function () {
        $('#modalRegister').modal('show')
                .find('#modalContentRegister')
                .load($(this).attr('value'));
				 return false;   
    });

   
});


function openNav() {

  document.getElementById("mySidenav").style.width = "300px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}