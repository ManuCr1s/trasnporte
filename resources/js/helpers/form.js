import { messageBackend } from "./alert";
import { lengthChainInputDni, validateDatesForm} from "./validation";
export const onlyNumbers = (code) => {
    let variable = code.key;
    return variable >= '0' && variable <= '9';
}
export const sendDatesLogin = (form,url) => {
    form.on('submit',function(e){
        e.preventDefault();
        $('.preloader').show();
        $.ajax({
            headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
            method:'POST',
            url:url,
            data:form.serialize(),
            success:function(response){
                $('.preloader').hide();
                if(response.status){
                    window.location.href = response.route
                }else{
                    messageBackend(response.status,response.message);
                };
            },
            error:function(xhr, status, error){
                $('.preloader').hide();
                if(xhr.status === 422 ){
                    const errors = xhr.responseJSON.errors;
                    messageBackend(false,Object.values(errors)[0][0]);
                }
            }
        });
    });
};
export const sendDniPerson = (element,url,data,name,lastname) => {
    element.on('click',function(){
        $('.preloader').show();
        if(!lengthChainInputDni(data.val())){
            let dni = {dni:data.val()};
            $.ajax({
                headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
                url:url,
                method:'POST',
                data:dni,
                success:function(response){
                    $('.preloader').hide();
                    if(response.status){
                        name.val(response.nombres);
                        lastname.val(response.apellidoPaterno+' '+response.apellidoMaterno);
                    }else{
                        messageBackend(false,response.message);
                        name.removeAttr('readonly');
                        lastname.removeAttr('readonly');
                    }
                },
                error:function(xhr, status, error){
                    $('.preloader').hide();
                            if(xhr.status === 422 ){
                                const errors = xhr.responseJSON.errors;
                                messageBackend(false,Object.values(errors)[0][0]);
                            }
                    }
            });
            
        }else{
            $('.preloader').hide();
            messageBackend(false,'Ingrese numero de DNI valido')
        }
    });
}
export const sendDatesNewUser = (form,url) => {
    form.on('submit',function(e){
        e.preventDefault();
        $('.preloader').show();
        let formdatesSerialize = form.serialize(),responseForm = validateDatesForm(formdatesSerialize);
        if(responseForm.status){
              $.ajax({
                headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
                data:formdatesSerialize,
                method:'POST',
                url:url,
                success:function(response){
                    $('.preloader').hide();
                    (response.status)?messageBackend(true,response.message):messageBackend(false,response.message);
                },
                error:function(xhr, status, error){
                    $('.preloader').hide();
                        if(xhr.status === 422 ){
                            const errors = xhr.responseJSON.errors;
                            messageBackend(false,Object.values(errors)[0][0]);
                        }
                        
                }
            });
        }else{
            messageBackend(false,responseForm.message);
        }
    });
}
export const sendDataActiveUser = (form,url) => {
    form.on('submit',function(e){
        e.preventDefault();
        $('.preloader').show();
        let data = form.serialize();
        $.ajax({
            headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
            url:url,
            data:data,
            method:'POST',
            success:function(response){
                $('.preloader').hide();
                if(response.status){
                    messageBackend(true,response.message);
                }else{
                    messageBackend(false,response.message);
                }
            },
            error:function(xhr, status, error){
                 $('.preloader').hide();
                    if(xhr.status === 422 ){
                        const errors = xhr.responseJSON.errors;
                        messageBackend(false,Object.values(errors)[0][0]);
                    }
            }
        });
    });
}