export const lengthChainInputDni = (object) => {
    return ((object.replace(/ /g, "")).length !== 8);
}
export const validateDatesForm = (dates) => {
    const arrayDatos = dates.split('&');
    for(const element of arrayDatos){
         const valor = element.split('=');
        if((valor[1].replace(/ /g, "")).length === 0){
            return {'status':false,'message':'Por favor ingrese '+valor[0].toUpperCase()};
        }
    }
    return {'status':true};
}