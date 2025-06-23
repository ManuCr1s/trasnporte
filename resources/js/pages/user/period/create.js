import { messageBackend } from "../../../helpers/alert";
import { sendDatesForm } from "../../../helpers/form";
import { datesPeriodRegister } from "../../../helpers/ajax";
import route from "../../../helpers/route";
$(function(){
    $('.preloader').hide();
    datesPeriodRegister($('#tablePeriodRegister'),route.indexPeriod);
    sendDatesForm({
        event:'submit',
        trigger:$('#sendDatesPeriod'),
        url:route.createPeriod,
        validate:true,
        data:()=>$('#sendDatesPeriod').serialize(),   
        onSuccess: (message) => {
            messageBackend(true,message.message);
        },
        onError:(message) => {  
            messageBackend(true,message.message);
        }
     });
}); 