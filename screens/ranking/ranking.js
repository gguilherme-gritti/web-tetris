$(document).ready(function () {
  $.ajax({
    type: "POST",
    url: "../../backend/get_ranking.php",
    dataType: "json",
    encode: true,
  })
    .done(function (response) {
      if (response.status === "success") {
      } else {
        Swal.fire({
          title: "Oops!",
          text: "Nenhum histórico de pontuação encontrado",
          icon: "warning",
        });
      }
    })
    .fail(function (error) {
      console.log(error);
      Swal.fire({
        title: "Falha!",
        text: "Tivemos um problema ao buscar o ranking",
        icon: "error",
      });
    });
});
