$(document).ready(function () {
  $.ajax({
    type: "POST",
    url: "../../backend/get_player.php",
    dataType: "json",
    encode: true,
  })
    .done(function (response) {
      const { player } = response;

      $("#myRanking").val(player.ranking || "Sem Ranking");
      $("#myHighScore").val(player.highScore || "Sem Score");
      $("#completeName").val(player.completeName);
      $("#birthday").val(reFormatDate(player.birthDay));
      $("#nickname").val(player.nickname);
      $("#aboutMe").val(player.about);
    })
    .fail(function (error) {
      Swal.fire({
        title: "Falha!",
        text: "Tivemos um problema ao buscar seus dados",
        icon: "error",
      });
    });

  $("#updatePlayer").submit(function (e) {
    e.preventDefault();

    if ($("#password").val() != $("#confirmPassword").val()) {
      Swal.fire({
        title: "Oops!",
        text: "Senhas não coincidem",
        icon: "warning",
      });
    }

    var formData = {
      completeName: $("#completeName").val(),
      birthDay: formatDate($("#birthday").val()),
      nickname: $("#nickname").val(),
      password: $("#password").val(),
      about: $("#aboutMe").val(),
    };

    $.ajax({
      type: "POST",
      url: "../../backend/update_player.php",
      data: formData,
      dataType: "json",
      encode: true,
    })
      .done(function (response) {
        if (response.status === "success") {
          Swal.fire({
            title: "Sucesso!",
            text: "Seus dados foram atualizados",
            icon: "success",
          });
        } else {
          Swal.fire({
            title: "Falha!",
            text: "Tivemos um problema ao atualizar seus dados",
            icon: "error",
          });
        }
      })
      .fail(function (error) {
        Swal.fire({
          title: "Falha!",
          text: "Tivemos um problema ao se conectar com o servidor",
          icon: "error",
        });
      });
  });
});
