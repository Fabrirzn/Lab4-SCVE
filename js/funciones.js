
function muestraErrorCargaFoto() {
        document.getElementById('alertaFoto').style.display = 'block';     
  }
  setTimeout(OcultarErrorCargaFoto, 4000);

function OcultarErrorCargaFoto() {
    document.getElementById('alertaFoto').style.display = 'none';
}

function muestraExito() {
    document.getElementById('Exito').style.display = 'block';
}

function ocutaExito() {
document.getElementById('Exito').style.display = 'none';
}

setTimeout(ocutaExito, 5000);




var validoyEnvioEditarMiVenta = () =>{
    var frm = document.getElementsByClassName("formEditar");
    var i;
    for (i = 0; i < frm.length; i++) {
        if(frm[i].idProd.checked) {
            if(frm[i].prd_foto1.value !== ''){
                ocutaExito();
                OcultarErrorCargaFoto();
                document.getElementById('actualiza').value = '1';
                muestraExito();
                return true               
            }
            else{
                muestraErrorCargaFoto();
                return false;
            }
          }
    }   
    
}