import { datesOrderRegister } from "../../../helpers/ajax";
import route from "../../../helpers/route";
$(function(){
    $('.preloader').hide();
    datesOrderRegister($('#tableOrderRegister'),route.indexOrder);
});