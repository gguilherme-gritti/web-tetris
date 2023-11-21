function formatDate(dataString) {
  var data = new Date(dataString);

  var dia = data.getUTCDate();
  var mes = data.getUTCMonth() + 1;
  var ano = data.getUTCFullYear();

  var dataFormatada =
    (dia < 10 ? "0" : "") + dia + "/" + (mes < 10 ? "0" : "") + mes + "/" + ano;

  return dataFormatada;
}
