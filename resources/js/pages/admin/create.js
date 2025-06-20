import {datesUserRegister} from '../../helpers/ajax';
import { sendDniPerson,onlyNumbers,sendDatesNewUser,sendDataActiveUser} from '../../helpers/form';
import { clickTbodyDates, clickAddModal} from '../../helpers/functions';
import route from '../../helpers/route';
$(function(){
    datesUserRegister($('#tableUserRegister'),route.indexUser);
    sendDniPerson($('#btnDni'),route.dni,$('#dni'),$('#nombres'),$('#apellidos'));
    $('#dni').on('keypress',onlyNumbers);
    sendDatesNewUser($('#datesAddNewUser'),route.createUser);
    clickTbodyDates($('#tableUserRegister'),{dni:'dni',lastname:'apellidos',name:'nombres',email:'email'});
    clickAddModal($('#tableUserRegister'),{title:'title',message:'messages',resumen:'resumen',dni:'dniUser',status:'status'});
    sendDataActiveUser($('#activeUserForm'),route.destroy);
}); 