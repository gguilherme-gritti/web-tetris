$(document).ready(function () {
  $("#userForm").submit(function (e) {
    e.preventDefault();

    console.log("salve, mano to ficando maluco");

    if ($("#registerPassword").val() != $("#confirmPassword").val()) {
      Swal.fire({
        title: "Ops!",
        text: "Senhas não Coincidem!",
        icon: "warning",
      });

      return;
    }

    var formData = {
      completeName: $("#completeName").val(),
      birthDay: formatDate($("#birthDay").val()),
      nickname: $("#nickname").val(),
      password: $("#registerPassword").val(),
      about: $("#about").val(),
    };

    $.ajax({
      type: "POST",
      url: "backend/insert_player.php",
      data: formData,
      dataType: "json",
      encode: true,
    })
      .done(function (response) {
        if (response.status === "warning") {
          Swal.fire({
            title: "Ops!",
            text: response.message,
            icon: "warning",
          });
          return;
        }

        clearRegister();
        Swal.fire({
          title: "Sucesso!",
          text: "Player Cadastrado",
          icon: "success",
        });
      })
      .fail(function (error) {
        console.error(error);
        Swal.fire({
          title: "Falha!",
          text: "Tivemos um problema ao cadastrar o usuário",
          icon: "error",
        });
      });
  });

  function clearRegister() {
    $("#completeName").val("");
    $("#birthDay").val("");
    $("#nickname").val("");
    $("#registerPassword").val("");
    $("#confirmPassword").val("");
    $("#about").val("");
  }
});
