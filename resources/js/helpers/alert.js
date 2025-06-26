import Swal from "sweetalert2";
export const messageBackend = (status,message,url='') => {
    Swal.fire({
        title: (status)?"¡¡¡Felicidades!!!":"Upps Ocurrio un error",
        icon: (status)?"success":"error",
        text:message,
    }).then((response)=>{
        if(response.isConfirmed && status == true){
            window.location.reload();    
        }
        if(response.isConfirmed && status == false && url !== ''){
            window.location.href=url;    
        }
    });
}