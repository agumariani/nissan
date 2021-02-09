
const $btnDescargar = document.querySelector("#btnDescargar"),
  $tablaDatos = document.querySelector("#tablaDatos");

  $btnDescargar.addEventListener("click", function() {
    let tableExport = new TableExport($tablaDatos, {
        exportButtons: false, 
        filename: "Datos TestDrives",
        sheetname: "Hoja 1",
    });
    let datos = tableExport.getExportData();
    let preferenciasDocumento = datos.tablaDatos.xlsx;
    tableExport.export2file(preferenciasDocumento.data, preferenciasDocumento.mimeType, preferenciasDocumento.filename, preferenciasDocumento.fileExtension, preferenciasDocumento.merges, preferenciasDocumento.RTL, preferenciasDocumento.sheetname);
  });

