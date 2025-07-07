import { messageBackend } from "./alert";
import { allTables } from "./datatables";
import route from "../helpers/route";
import { createOptions } from "./functions";

export const datesUserRegister = (element,url) =>{
    let tableUser;
    $.ajax({
        headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
        type:'POST',
        url:url,
        success:function(response){
            $('.preloader').hide();
            let data = response.data,
                columnas=[
                    {
                        data:'dni',
                        class:'text-center'
                    },
                    {
                        data:'name',
                        class:'text-center'
                    },
                    {
                        data:'lastname',
                        class:'text-center'
                    },
                    {
                        data:'email',
                        class:'text-center'
                    },
                    {
                        data:null,
                        render:function(data, type, row){
                                return (row.status === 1)?`
                                    <center>
                                        <span class="rounded-circle" style="width:15px; height:15px; display:inline-block; background-color:#239b56;"></span>
                                    </center>
                                `:`
                                    <center>
                                        <span class="rounded-circle" style="width:15px; height:15px; display:inline-block; background-color:#c0392b;"></span>
                                    </center>
                                `;
                        }
                    },
                    {
                        data:null,
                        render: function (data, type, row) {
                                let btn,response = `<center>
                                        <button id="editUser" type="button" class="btn text-info editUser" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id=`+row.dni+`
                                        data-name="${row.name}" data-lastname="${row.lastname}" data-email=`+row.email+`>
                                            <i class="fa fa-edit" ></i>
                                        </button>`;
                                if(data.status === 1){
                                    btn=    `<button id="deleteUser" type="button" class="btn text-danger deleteUser" data-bs-toggle="modal" data-bs-target="#modalActiveUser" data-id=`+row.dni+` data-status=`+row.status+`>
                                                <i class="fa-solid fa-user-xmark"></i>
                                            </button></center>`;
                                }else{
                                    btn=    `<button id="deleteUser" type="button" class="btn text-success deleteUser" data-bs-toggle="modal" data-bs-target="#modalActiveUser" data-id=`+row.dni+` data-status=`+row.status+`>
                                                <i class="fa-solid fa-user-plus"></i>
                                            </button></center>`;
                                }
                                return response+btn;
                        }
                    }
                ];
            tableUser = allTables(element,data,columnas);
        }
    });
    return tableUser;
}
export const datesPeriodRegister = (element,url) =>{
    let tablePeriod;
    $.ajax({
        headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
        type:'POST',
        url:url,
        success:function(response){
            $('.preloader').hide();
            let data = response.data,
                columnas=[
                    {
                        data:'id',
                        class:'text-center'
                    },
                    {
                        data:'name',
                        class:'text-center'
                    },
                    {
                        data:'description',
                        class:'text-center'
                    },
                    {
                        data:null,
                        render:function(data, type, row){
                                return (row.status === 1)?`
                                    <center>
                                        <span class="rounded-circle" style="width:15px; height:15px; display:inline-block; background-color:#239b56;"></span>
                                    </center>
                                `:`
                                    <center>
                                        <span class="rounded-circle" style="width:15px; height:15px; display:inline-block; background-color:#c0392b;"></span>
                                    </center>
                                `;
                        }
                    },
                    {
                        data:null,
                        render: function (data, type, row) {
                                let btn,response = `<center>`;
                                if(data.status === 1){
                                    btn=    `<button id="updatePeriod" type="button" class="btn text-danger deletePeriod" data-bs-toggle="modal" data-bs-target="#modalUpdatePeriod" data-id=`+row.id+` data-status=`+row.status+`>
                                                    <i class="fa-regular fa-calendar"></i>
                                            </button></center>`;
                                }else{
                                    btn=    `<button id="updatePeriod" type="button" class="btn text-success deletePeriod" data-bs-toggle="modal" data-bs-target="#modalUpdatePeriod" data-id=`+row.id+` data-status=`+row.status+`>
                                                    <i class="fa-regular fa-calendar"></i>
                                            </button></center>`;
                                }
                                return response+btn;
                        }
                    }
                ];
            tablePeriod = allTables(element,data,columnas);
        }
    });
    return tablePeriod;
}
export const datesRateRegister  = (element,url) => {
    let tablePeriod;
    $.ajax({
        headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
        type:'POST',
        url:url,
        success:function(response){
            $('.preloader').hide();
            let data = response.data,
                columnas=[
                    {
                        data:'id',
                        class:'text-center'
                    },
                    {
                        data:'name',
                        class:'text-center'
                    },
                    {
                        data:'amount',
                        class:'text-center'
                    },
                    {
                        data:null,
                        render:function(data, type, row){
                                return (row.status === 1)?`
                                    <center> 
                                        <span class="rounded-circle" style="width:15px; height:15px; display:inline-block; background-color:#239b56;"></span>
                                    </center>
                                `:`
                                    <center>
                                        <span class="rounded-circle" style="width:15px; height:15px; display:inline-block; background-color:#c0392b;"></span>
                                    </center>
                                `;
                        }
                    },
                    {
                        data:null,
                        render: function (data, type, row) {
                                let btn,response = `<center><button  type="button" class="btn text-info editRate" data-bs-toggle="modal" data-bs-target="#editRateModal" data-id=`+row.id+`
                                        data-name="${row.name}" data-amount="${row.amount}">
                                            <i class="fa fa-edit" ></i>
                                        </button>`;
                                if(data.status === 1){
                                    btn=    `<button type="button" class="btn text-danger deleteRate" data-bs-toggle="modal" data-bs-target="#modalDeleteRate" data-id=`+row.id+` data-status=`+row.status+`>
                                                    <i class="fa-regular fa-calendar"></i>
                                            </button></center>`;
                                }else{
                                    btn=    `<button type="button" class="btn text-success deleteRate" data-bs-toggle="modal" data-bs-target="#modalDeleteRate" data-id=`+row.id+` data-status=`+row.status+`>
                                                    <i class="fa-regular fa-calendar"></i>
                                            </button></center>`;
                                }
                                return response+btn;
                        }
                    }
                ];
            tablePeriod = allTables(element,data,columnas);
        }
    });
    return tablePeriod;
}
export const datesOrderRegister = (element,url) => {
     let tablePeriod;
    $.ajax({
        headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
        type:'POST',
        url:url,
        success:function(response){
            $('.preloader').hide();
            if('status' in response){
                return messageBackend(false,response.messages,route.showPeriod);
            }
            let data = response.data,
                columnas=[
                    {
                        data:'correlative',
                        class:'text-center'
                    },
                    {
                        data:'description',
                        class:'text-center'
                    },
                    {
                        data:'period',
                        class:'text-center'
                    },
                    {
                        data:'amount',
                        class:'text-center'
                    },
                    {
                        data:'person',
                        class:'text-center'
                    },
                    {
                        data:'create',
                        class:'text-center'
                    },
                    {
                        data:null,
                        render:function(data, type, row){
                                return (row.status === 1)?`
                                    <center> 
                                        <span class="rounded-circle" style="width:15px; height:15px; display:inline-block; background-color:#239b56;"></span>
                                    </center>
                                `:`
                                    <center>
                                        <span class="rounded-circle" style="width:15px; height:15px; display:inline-block; background-color:#c0392b;"></span>
                                    </center>
                                `;
                        }
                    },
                    {
                        data:null,
                        render: function (data, type, row) {
                                let btn,print= ` </button><button  type="button" class="btn text-info editOrder" data-bs-toggle="modal" data-bs-target="#editOrderModal" data-id=`+data.id+`
                                                    data-description="`+data.description+`" data-rate="`+data.id_rate+`">
                                                    <i class="fa fa-edit" ></i>
                                                </button>`,response = `<center><button  type="button" class="btn text-primary printOrder"
                                                    data-correlative="${data.correlative}" data-description="`+data.description+`" data-period="${data.period}" data-amount="${data.amount}" 
                                                    data-person="${data.person}" data-status="${data.status}" data-create="${data.create}" data-rate="${data.rate}">
                                            <i class="fa-solid fa-print"></i>
                                      `;
                                    
                                if(data.status === 1){
                                    btn=    `<button type="button" class="btn text-danger deleteOrder" data-bs-toggle="modal" data-bs-target="#modalDeleteOrder" data-id=`+data.id+` data-status=`+data.status+`>
                                                <i class="fa-solid fa-trash"></i>
                                            </button></center>`;
                                }else{
                                    btn=    `</center>`;
                                }
                                return response+btn;
                        }
                    }
                ];
            tablePeriod = allTables(element,data,columnas,{order: [[5, 'desc']]});
        }
    });
    return tablePeriod;
}
export const ratesName = (selec,url) =>{
    $.ajax({
        headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
        type:'POST',
        url:url,
        success: function(date){
            let myData = JSON.parse(date);
            let options = createOptions(myData);
            selec.html(options);
        }
    });
}