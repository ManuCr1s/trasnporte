import { datesOrderRegister, ratesName } from "../../../helpers/ajax";
import { messageBackend } from "../../../helpers/alert";
import { sendDatesForm, sendDniPerson} from "../../../helpers/form";
import { createPage,clickAddModal,clickOrdersDates } from "../../../helpers/functions";
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
    ratesName($('.rate'),route.showRates);
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
    createPage($('#tableOrderRegister'));
    clickAddModal($('#tableOrderRegister'),'.deleteOrder',{title:'title',message:'messages',resumen:'resumen',dni:'id',status:'status'},'Orden');
    sendDatesForm({
        event:'submit',
        trigger:$('#deleteOrderForm'),
        url:route.destroyOrder,
        data:()=>$('#deleteOrderForm').serialize(), 
        onSuccess: (response)=>{
           messageBackend(true,response.message);
        },
        onError: (response)=>{
            messageBackend(false,response.message);
        }
    });
    clickOrdersDates($('#tableOrderRegister'),{id:'id',description:'description',rate:'rate'});
    sendDatesForm({
        event:'submit',
        trigger:$('#sendUpdateDatesOrder'),
        url:route.updateOrder,
        data:()=>$('#sendUpdateDatesOrder').serialize(), 
        onSuccess: (response)=>{
           messageBackend(true,response.message);
        },
        onError: (response)=>{
            messageBackend(false,response.message);
        }
    });
});