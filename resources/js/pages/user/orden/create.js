import { datesOrderRegister, ratesName } from "../../../helpers/ajax";
import { messageBackend } from "../../../helpers/alert";
import { sendDatesForm, sendDniPerson} from "../../../helpers/form";
import route from "../../../helpers/route";
$(function(){
    $('.preloader').hide();
    datesOrderRegister($('#tableOrderRegister'),route.indexOrder);
    sendDatesForm({
        event:'click',
        trigger:$('#btnModalOrder'),
        url:route.selectPeriod,
        onSuccess: (response)=>{
            $('#period').val(response.data[0].name);
            $('#idPeriod').val(response.data[0].id);
        },
        onError: (response)=>{
            messageBackend(false,response.message);
        }
    });
    sendDniPerson($('#btnDni'),route.dni,$('#dni'),$('#name'),$('#lastname'));
    ratesName($('#rate'),route.showRates);
    sendDatesForm({
        event:'submit',
        trigger:$('#datesAddNewOrder'),
        url:route.createOrder,
        data:()=>$('#datesAddNewOrder').serialize(), 
        onSuccess: (response)=>{
           messageBackend(true,response.message);
        },
        onError: (response)=>{
            messageBackend(false,response.message);
        }
    });
});