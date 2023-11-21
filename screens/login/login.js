$(document).ready(function () {
  $("#loginForm").submit(function (e) {
    e.preventDefault();

    var formData = {
      user: $("#user").val(),
      password: $("#password").val(),
    };

    $.ajax({
      type: "POST",
      url: "backend/verificar_login.php",
      data: formData,
      dataType: "json",
      encode: true,
    })
      .done(function (response) {
        if (response.status === "success") {
          alert("Login bem-sucedido!");
        } else {
          Swal.fire({
            title: "Oops!",
            text: "Usuário não encontrado, ou os dados inseridos estão incorretos!",
            icon: "error",
          });
        }
      })
      .fail(function (error) {
        console.error(error);
        Swal.fire({
          title: "Falha!",
          text: "Tivemos um problema ao tentar realizar o login",
          icon: "error",
        });
      });
  });
});
