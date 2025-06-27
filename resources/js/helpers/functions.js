export const clickTbodyDates = (datatable,extraOptions = {}) => {
    datatable.on('click','.editUser',function(){
        let btn = $(this);
        $('#'+extraOptions.dni+'Edit').val(btn.data('id'));
        $('#'+extraOptions.name+'Edit').val(btn.data('name'));
        $('#'+extraOptions.lastname+'Edit').val(btn.data('lastname'));
        $('#'+extraOptions.email+'Edit').val(btn.data('email'));
    });
};
export const clickRatesDates = (datatable,extraOptions = {}) => {
    datatable.on('click','.editRate',function(){
        let btn = $(this);
        $('#'+extraOptions.name+'Edit').val(btn.data('name'));
        $('#'+extraOptions.amount+'Edit').val(btn.data('amount'));
        $('#'+extraOptions.id+'Edit').val(btn.data('id'));
    });
};
export const clickAddModal = (element,action,extraOptions = {},option='') =>{
    let messages = {
        title:'', 
        message:'', 
        resumen:''
    }
    element.on('click',action,function(){
        let btn = $(this);
        if(btn.data('status')==1){
                messages = {
                    title: 'Desactivar '+option,
                    message:'¿Desea desactivar '+option+'?',
                    resumen:'El '+option+' desactivado, esta deshabilidato en el sistema'
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
export const createOptions = (myData)=>{
    let fragment = document.createDocumentFragment(); 
    let defaultOption = document.createElement('option');
    defaultOption.value = 0;
    defaultOption.text = 'SELECCIONE';
    fragment.appendChild(defaultOption);
    $.each(myData, function(index, param) {
        let option = document.createElement('option');
        option.value = Object.values(param)[0];
        option.text = Object.values(param)[1].toUpperCase()+' - '+Object.values(param)[2];
        fragment.appendChild(option);
    });
    return fragment;
}