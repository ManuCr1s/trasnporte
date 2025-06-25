import { datesRateRegister } from "../../../helpers/ajax";
import { messageBackend } from "../../../helpers/alert";
import { sendDatesForm } from "../../../helpers/form";
import { clickAddModal, clickRatesDates } from "../../../helpers/functions";
import route from "../../../helpers/route";
$(function(){
    $('.preloader').hide();
        datesRateRegister($('#tableRateRegister'),route.indexRate)
        sendDatesForm({
                event:'submit',
                trigger:$('#sendDatesRate'),
                url:route.createRate,
                data:()=>$('#sendDatesRate').serialize(),  
                onSuccess: (message) => {
                        messageBackend(true,message.message);
                },
                onError:(message) => {  
                        messageBackend(false,message.message);
                }
        })
        clickRatesDates($('#tableRateRegister'),{id:'id',name:'name',amount:'amount'})
        clickAddModal($('#tableRateRegister'),'.deleteRate',{title:'title',message:'messages',resumen:'resumen',dni:'id',status:'status'},'Taza de Pago');
        sendDatesForm({
                event:'submit',
                trigger:$('#activeRateForm'),
                url:route.destroyRate,
                data:()=>$('#activeRateForm').serialize(), 
                onSuccess: (message) => {
                        messageBackend(true,message.message);
                },
                onError:(message) => {  
                        messageBackend(false,message.message);
                } 
        });
        sendDatesForm({
                event:'submit',
                trigger:$('#sendUpdateDatesRate'),
                url:route.updateRate,
                data:()=>$('#sendUpdateDatesRate').serialize(), 
                onSuccess: (message) => {
                        messageBackend(true,message.message);
                },
                onError:(message) => {  
                        messageBackend(false,message.message);
                } 
        });
});
