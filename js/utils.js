function formatDate(dataString = null) {
  var data = new Date(dataString);

  var dia = data.getUTCDate();
  var mes = data.getUTCMonth() + 1;
  var ano = data.getUTCFullYear();

  var dataFormatada =
    (dia < 10 ? "0" : "") + dia + "/" + (mes < 10 ? "0" : "") + mes + "/" + ano;

  return dataFormatada;
}

function reFormatDate(dataString) {
  var componentes = dataString.split("/");

  var dataFormatada =
    componentes[2] + "-" + componentes[1] + "-" + componentes[0];

  return dataFormatada;
}
