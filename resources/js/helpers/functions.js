export const clickTbodyDates = (datatable,extraOptions = {}) => {
    datatable.on('click','.editUser',function(){
        let btn = $(this);
        $('#'+extraOptions.dni+'Edit').val(btn.data('id'));
        $('#'+extraOptions.name+'Edit').val(btn.data('name'));
        $('#'+extraOptions.lastname+'Edit').val(btn.data('lastname'));
        $('#'+extraOptions.email+'Edit').val(btn.data('email'));
    });
};
export const clickAddModal = (element,extraOptions = {},option='') =>{
    let messages = {
        title:'', 
        message:'', 
        resumen:''
    }
    element.on('click','.deleteUser',function(){
        let btn = $(this);
        if(btn.data('status')==1){
                messages = {
                    title: 'Desactivar '+option,
                    message:'¿Desea desactivar el '+option+'?',
                    resumen:'El'+option+' desactivado, esta deshabilidato en el sistema'
                }
                $('#'+extraOptions.title).text(messages.title);
                $('#'+extraOptions.message).text(messages.message);
                $('#'+extraOptions.resumen).text(messages.resumen);
                $('#'+extraOptions.dni).val(btn.data('id'));
                $('#'+extraOptions.status).val(btn.data('status'));
        }else{
                messages = {
                    title:'Activar '+option,
                    message:'¿Desea activar el '+option+'?',
                    resumen:'El '+option+' activado, esta habilidato en el sistema'
                }
                $('#'+extraOptions.title).text(messages.title);
                $('#'+extraOptions.message).text(messages.message);
                $('#'+extraOptions.resumen).text(messages.resumen);
                $('#'+extraOptions.dni).val(btn.data('id'));
                $('#'+extraOptions.status).val(btn.data('status'));
        }   
    });
}