import { messageBackend } from "../../../helpers/alert";
import { sendDatesForm } from "../../../helpers/form";
import { datesPeriodRegister } from "../../../helpers/ajax";
import { clickAddModal} from '../../../helpers/functions';
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
            messageBackend(false,message.message);
        }
     });
    clickAddModal($('#tablePeriodRegister'),'.deletePeriod',{title:'title',message:'messages',resumen:'resumen',dni:'id',status:'status'},'Periodo');
    sendDatesForm({
        event:'submit',
        trigger:$('#updatePeriodForm'),
        url:route.destroyPeriod,
        data:()=>$('#updatePeriodForm').serialize(),  
        onSuccess: (message) => {
            messageBackend(true,message.message);
        },
        onError:(message) => {  
            messageBackend(false,message.message);
        }
    });
}); 