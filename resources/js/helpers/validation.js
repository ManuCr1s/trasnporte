export const lengthChainInputDni = (object) => {
    return ((object.replace(/ /g, "")).length !== 8);
}
export const validateDatesForm = (dates,addOptions = {}) => {
    const arrayDatos = dates.split('&');
    for(const element of arrayDatos){
         const valor = element.split('=');
        if((valor[1].replace(/ /g, "")).length === 0){
            if(Object.keys(addOptions).length > 0){
                return {'status':false,'message':'Por favor ingrese '+addOptions[valor[0]]};
            }
            return {'status':false,'message':'Por favor ingrese '+valor[0].toUpperCase()};
        }
    }
    return {'status':true};
}
export const validatePassUser = (message,object) => {
    const value = object.val().replace(/ /g, '');
    if (value.length > 7) {
        message.removeClass('invalid-feedback').addClass('valid-feedback');
        message.text('Contraseña valida');
        object.removeClass('is-invalid').addClass('is-valid');
    } else {
        message.removeClass('valid-feedback').addClass('invalid-feedback');
        message.text('La contraseña no es valida');
        object.removeClass('is-valid').addClass('is-invalid');
    }
};
export const validateComparePassUser = (message,firts,second) => {
    let valueOne = firts.val().replace(/ /g, ''),valueTwo = second.val().replace(/ /g, '');
    if(valueOne === valueTwo){
        message.removeClass('invalid-feedback').addClass('valid-feedback');
        message.text('Las contraseñas coinciden');
        second.removeClass('is-invalid').addClass('is-valid');
    } else {
        message.removeClass('valid-feedback').addClass('invalid-feedback');
        message.text('Las contraseñas no coinciden');
        second.removeClass('is-valid').addClass('is-invalid');
    }
}