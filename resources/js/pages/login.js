import {sendDatesLogin as login} from '../helpers/form'; 
import route from '../helpers/route';
$(function(){
    $('.preloader').hide();
    login($('#datesLogin'),route.login);
});