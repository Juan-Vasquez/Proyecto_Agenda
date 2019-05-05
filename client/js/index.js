// $(function(){
//   var l = new Login();
// })


// class Login {
//   constructor() {
//     this.submitEvent()
//   }

//   submitEvent(){
//     $('form').submit((event)=>{
//       event.preventDefault()
//       this.sendForm()
//     })
//   }

//   sendForm(){
//     let form_data = new FormData();
//     form_data.append('username', $('#user').val())
//     form_data.append('password', $('#password').val())
//     $.ajax({
//       url: '../server/check_login.php',
//       type: 'POST',
//       data: form_data,
//       success: function(php_response){
//         if(php_response == "OK"){
//           window.location.href = 'main.html'
//         }else{
//           alert(php_response.msg)
//         }
//       },
//       error: function(){
//         alert("error en la comunicación con el servidor");
//       }
//     })
//   }
// }


$(document).ready(function(){
  $("#form").submit(sendForm);
});

function sendForm(event){
  event.preventDefault()
  var form_data = new FormData()
  form_data.append('username', $('#user').val())
  form_data.append('password', $('#password').val())
  $.ajax({
    url: '../server/check_login.php',
    type: 'POST',
    data: form_data,
    cache: false,
    processData: false,
    contentType: false,
    
    success: function(php_response){
     if(php_response == "OK"){
      window.location.href = 'main.html'
     }else{
      alert(php_response)
     }
    },
    error: function(){
      alert("Error en la comunciacion con el servidor")
    }
  })
}
