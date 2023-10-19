  var formSignin = document.querySelector('#signin')
  var formSignup = document.querySelector('#signup')
  var btnColor = document.querySelector('.btnColor')
  
  document.querySelector('#btnSignin')
    .addEventListener('click', () => {
      formSignin.style.left = "25px"
      formSignup.style.left = "450px"
      btnColor.style.left = "0px"
  })
  
  document.querySelector('#btnSignup')
    .addEventListener('click', () => {
      formSignin.style.left = "-450px"
      formSignup.style.left = "25px"
      btnColor.style.left = "110px"
  })

  function aumentarDiv() {
    var container = document.getElementById("container");
    var mainlog = document.getElementById("mainlog");
    container.style.height = "855px"; // Defina a altura desejada

  }


  function diminuirDiv() {
    var container = document.getElementById("container");
    var mainlog = document.getElementById("mainlog");
    container.style.height = "450px"; // Defina a altura desejada
  }


  