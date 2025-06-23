export const lengthChainInputDni = (object) => {
    return ((object.replace(/ /g, "")).length !== 8);
}
export const validateDatesForm = (dates,addOptions = {}) => {
    const arrayDatos = dates.split('&');
    for(const element of arrayDatos){
         const valor = element.split('=');
        if((valor[1].replace(/ /g, "")).length === 0){
            if(Object.keys(exportOptions).length > 0){
                console.log(exportOptions);
                return {'status':false,'message':'Por favor ingrese '+addOptions[valor[0]]};
            }
            return {'status':false,'message':'Por favor ingrese '+valor[0].toUpperCase()};
        }
    }
    return {'status':true};
}