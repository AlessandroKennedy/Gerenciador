
  $('.mf-title').html('Cotações de preços');
  handleFileSelect()
    var ExcelToJSON = function() {
      this.parseExcel = function(file) {
        var reader = new FileReader();
        reader.onload = function(e) {
          var data = e.target.result;
          var workbook = XLSX.read(data, {
            type: 'binary'
          });
          workbook.SheetNames.forEach(function(sheetName) {
            var XL_row_object = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheetName]);
            var json_object = JSON.stringify(XL_row_object);
            console.log(JSON.parse(json_object));
            var planilha = JSON.parse(json_object);
            console.log(planilha.length)
            $('#table').show();
            var quantidade= planilha.length; 
            var total = 4750.00; 
            var table = '';
            var i = 0;
            var tr = ''
            var k=0
            var chaves = Object.keys(planilha[i]);
            while(k < chaves.length){
              tr += '<th>' + chaves[k] + '</th>';
              k++
            }
            while (i < quantidade) {
              var chaves = Object.keys(planilha[i]);
           
              
            ///  tr += '<th>' + chaves[i] + '</th>';
              table += '<tr><td>' + planilha[i][chaves[0]]+ '</td>';
              for(j=1;j<chaves.length;j++){
                produto = planilha[i][chaves[j]];
                table += '<td>R$ '+produto+'</td>';
               // table += '<tr><td>' + produto + '</td>';
              fornecedor = planilha[i][chaves[j]];
              }
              i++;
            }
            $('#table tbody').html(table);
            $('#table thead tr').html(tr);
            $('table').on('scroll', function () {
              $("table > *").width($("table").width() + $("table").scrollLeft());
          });
          })
        };
        reader.onerror = function(ex) {
          console.log(ex);
        };
        reader.readAsBinaryString(file);
      };
  };

  async function handleFileSelect() {
    var file =await createFile();
    var xl2json = new ExcelToJSON();
    xl2json.parseExcel(file);
  }
  async function createFile(){
  let response = await fetch('https://cdn.nickbuilder.com.br/b4aa264e-566a-4532-97e7-6ca3af5cc72c/doc/planilha cotação.xlsx');
  let data = await response.blob();
  let metadata = {
    type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
  };
  let files = new File([data], "quotes.jpg", metadata);
  // ... do something with the file or return it
  return files
}


  