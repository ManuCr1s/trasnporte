import { messageBackend } from "../helpers/alert";
import { sendDatesForm } from "../helpers/form";
import route from "../helpers/route";
import { validateComparePassUser, validatePassUser } from "../helpers/validation";
$(function(){
    $('.preloader').hide();
    $('#pass').on('input',function(){validatePassUser($('#passValid'),$(this));});
    $('#conpass').on('input',function(){validateComparePassUser($('#conPassValid'),$('#pass'),$(this));});
    sendDatesForm({
        event:'submit',
        trigger:$('#passUser'),
        url:route.passUser,
        data:()=>$('#passUser').serialize(), 
        onSuccess: (response)=>{
           messageBackend(true,response.message);
        },
        onError: (response)=>{
            messageBackend(false,response.message);
        }
    });
/*     $('#conpass').on('keypress',validatePassUser({pass:$('#pass').val(),conpass:$('#conpass').val()})); */
});