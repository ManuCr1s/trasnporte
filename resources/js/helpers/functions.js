export const clickTbodyDates = (datatable,extraOptions = {}) => {
    datatable.on('click','.editUser',function(){
        let btn = $(this);
        $('#'+extraOptions.dni+'Edit').val(btn.data('id'));
        $('#'+extraOptions.name+'Edit').val(btn.data('name'));
        $('#'+extraOptions.lastname+'Edit').val(btn.data('lastname'));
        $('#'+extraOptions.email+'Edit').val(btn.data('email'));
    });
};
export const clickAddModal = (element,extraOptions = {}) =>{
    let messages = {
        title:'', 
        message:'', 
        resumen:''
    }
    element.on('click','.deleteUser',function(){
        let btn = $(this);
        if(btn.data('status')==1){
                messages = {
                    title:'Desactivar Usuario',
                    message:'¿Desea desactivar al Usuario?',
                    resumen:'El usuario desactivado ya no tendra acceso al sistema'
                }
                $('#'+extraOptions.title).text(messages.title);
                $('#'+extraOptions.message).text(messages.message);
                $('#'+extraOptions.resumen).text(messages.resumen);
                $('#'+extraOptions.dni).val(btn.data('id'));
                $('#'+extraOptions.status).val(btn.data('status'));
        }else{
                messages = {
                    title:'Activar Usuario',
                    message:'¿Desea activar al Usuario?',
                    resumen:'El usuario activado tendra acceso al sistema'
                }
                $('#'+extraOptions.title).text(messages.title);
                $('#'+extraOptions.message).text(messages.message);
                $('#'+extraOptions.resumen).text(messages.resumen);
                $('#'+extraOptions.dni).val(btn.data('id'));
                $('#'+extraOptions.status).val(btn.data('status'));
        }   
    });
}