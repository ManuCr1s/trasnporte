import jsPDF from 'jspdf';
export const clickTbodyDates = (datatable,extraOptions = {}) => {
    datatable.on('click','.editUser',function(){
        let btn = $(this);
        $('#'+extraOptions.dni+'Edit').val(btn.data('id'));
        $('#'+extraOptions.name+'Edit').val(btn.data('name'));
        $('#'+extraOptions.lastname+'Edit').val(btn.data('lastname'));
        $('#'+extraOptions.email+'Edit').val(btn.data('email'));
    });
};
export const clickRatesDates = (datatable,extraOptions = {}) => {
    datatable.on('click','.editRate',function(){
        let btn = $(this);
        $('#'+extraOptions.name+'Edit').val(btn.data('name'));
        $('#'+extraOptions.amount+'Edit').val(btn.data('amount'));
        $('#'+extraOptions.id+'Edit').val(btn.data('id'));
    });
};
export const clickAddModal = (element,action,extraOptions = {},option='') =>{
    let messages = {
        title:'', 
        message:'', 
        resumen:''
    }
    element.on('click',action,function(){
        let btn = $(this);
        if(btn.data('status')==1){
                messages = {
                    title: 'Desactivar '+option,
                    message:'¿Desea desactivar '+option+'?',
                    resumen:'El '+option+' desactivado, esta deshabilidato en el sistema'
                }
                $('#'+extraOptions.title).text(messages.title);
                $('#'+extraOptions.message).text(messages.message);
                $('#'+extraOptions.resumen).text(messages.resumen);
                $('#'+extraOptions.dni).val(btn.data('id'));
                $('#'+extraOptions.status).val(btn.data('status'));
        }else{
                messages = {
                    title:'Activar '+option,
                    message:'¿Desea activar el '+option+'?',
                    resumen:'El '+option+' activado, esta habilidato en el sistema'
                }
                $('#'+extraOptions.title).text(messages.title);
                $('#'+extraOptions.message).text(messages.message);
                $('#'+extraOptions.resumen).text(messages.resumen);
                $('#'+extraOptions.dni).val(btn.data('id'));
                $('#'+extraOptions.status).val(btn.data('status'));
        }   
    });
}
export const createOptions = (myData)=>{
    let fragment = document.createDocumentFragment(); 
    let defaultOption = document.createElement('option');
    defaultOption.value = 0;
    defaultOption.text = 'SELECCIONE';
    fragment.appendChild(defaultOption);
    $.each(myData, function(index, param) {
        let option = document.createElement('option');
        option.value = Object.values(param)[0];
        option.text = Object.values(param)[1].toUpperCase()+' - '+Object.values(param)[2];
        fragment.appendChild(option);
    });
    return fragment;
}
export const createPage = (datatable) =>{
    datatable.on('click','.printOrder',function(){
        let btn = $(this),fecha;
        fecha = new Date(btn.data('create'));
       
        const doc = new jsPDF();

        let x = 10;  // margen izquierdo
        let y = 10;  // margen superior
        const alturaCelda = 5;
        const textoDividido = doc.splitTextToSize(btn.data('description'), 200)
        // ======= TÍTULO DE OP =========
        // ======= NUMERO RECIBO =============
        doc.setFillColor(31, 94, 163); 
        doc.rect(x, y - 6, 190, 7, "F");
        doc.setFont(undefined, 'bold');
        doc.setFontSize(9);
        doc.setTextColor(255, 255, 255);
        doc.text("ORDEN DE PAGO  "+btn.data('correlative'), 105, y-1, { align: "center" });
        doc.setFont(undefined, 'normal');
        y += alturaCelda;

        // ======= PERIODO Y FECHA DE EMISION =============
        doc.setFillColor(236, 240, 241); 
        doc.rect(x, y-3, 40, 7, "F");
        doc.rect(51, y-3, 93, 7, "F");
        doc.rect(145, y-3, 55, 7, "F");
        doc.setFont(undefined, 'bold');
        doc.setFontSize(9);
        doc.setTextColor(0, 0, 0);
        doc.text("PERIODO - "+btn.data('period'),25, y+2, { align: "center" });
        doc.setFont(undefined, 'italic');
        doc.text("Fecha - "+fecha.toLocaleDateString(),180, y+2, { align: "center" });
        doc.setFont(undefined, 'normal');
        y += alturaCelda;

        // ======= TEXTO CAJERO Y HORA DE EMISION =============
        doc.setFillColor(236, 240, 241); 
        doc.rect(x, y, 134, 7, "F");
        doc.rect(145, y, 55, 7, "F");
        doc.setFontSize(9);
        doc.setFont(undefined, 'italic');
        doc.text("SR. CAJERO (A) SIRVASE EXTENDER EL RECIBO DE PAGO A FAVOR DE:",68, y+5, { align: "center" });
        doc.text("Hora - "+fecha.toLocaleTimeString(),180, y+5, { align: "center" });
        doc.setFont(undefined, 'normal');
        y += alturaCelda;

        
         // ======= NOMBRES DE USUARIO =============
        doc.setFillColor(236, 240, 241); 
        doc.rect(x, y+3, 134, 7, "F");
        doc.rect(145, y+3, 55, 7, "F");
        doc.setFontSize(9);
        doc.setFont(undefined, 'bold');
        doc.text("NOMBRE:",x+3, y+8);
        doc.setFont(undefined, 'normal');
        doc.text(btn.data('person'),67, y+8, { align: "center" });
        doc.setFont(undefined, 'normal');
        y += alturaCelda;

         // ======= TAZA DE PAGO =============
        doc.setFillColor(236, 240, 241); 
        doc.rect(x, y+6, 134, 7, "F");
        doc.setFillColor(247, 220, 111); 
        doc.rect(145, y+6, 55, 7, "F");
        doc.setFontSize(9);
        doc.setFont(undefined, 'bold');
        doc.text("CONCEPTO:",x+3, y+11);
        doc.setFont(undefined, 'normal');
        doc.text(btn.data('rate'),85, y+11, { align: "center" });
        doc.setFont(undefined, 'bold');
        doc.text("Monto S/."+btn.data('amount').toString(),175, y+11, { align: "center" });
        doc.setFont(undefined, 'normal');
        y += alturaCelda;

        // ======= DESCRIPCION DE LA ORDEN =============
        doc.setFillColor(236, 240, 241); 
        doc.rect(x, y+9, 134, 22, "F");
        doc.rect(145, y+9, 55, 22, "F");
        doc.setFontSize(9);
        doc.setFont(undefined, 'bold');
        doc.text("DESCRIPCION:",x+3, y+14);
        doc.setFont(undefined, 'normal');
        doc.text(textoDividido,80, y+18, { align: "center",  maxWidth: 200, lineHeightFactor: 1.5 });
        y += alturaCelda;

        // RECIBO 2
        // ======= NUMERO RECIBO =============
        doc.setFillColor(31, 94, 163); 
        doc.rect(x, y + 35, 190, 7, "F");
        doc.setFont(undefined, 'bold');
        doc.setFontSize(9);
        doc.setTextColor(255, 255, 255);
        doc.text("ORDEN DE PAGO  "+btn.data('correlative'), 105, y+40, { align: "center" });
        doc.setFont(undefined, 'normal');
        y += alturaCelda;

         // ======= PERIODO Y FECHA DE EMISION =============
        doc.setFillColor(236, 240, 241); 
        doc.rect(x, y+38, 40, 7, "F");
        doc.rect(51, y+38, 93, 7, "F");
        doc.rect(145, y+38, 55, 7, "F");
        doc.setFont(undefined, 'bold');
        doc.setFontSize(9);
        doc.setTextColor(0, 0, 0);
        doc.text("PERIODO - "+btn.data('period'),25, y+42, { align: "center" });
        doc.setFont(undefined, 'italic');
        doc.text("Fecha - "+fecha.toLocaleDateString(),180, y+42, { align: "center" });
        doc.setFont(undefined, 'normal');
        y += alturaCelda;

        // ======= TEXTO CAJERO Y HORA DE EMISION =============
        doc.setFillColor(236, 240, 241); 
        doc.rect(x, y+41, 134, 7, "F");
        doc.rect(145, y+41, 55, 7, "F");
        doc.setFontSize(9);
        doc.setFont(undefined, 'italic');
        doc.text("SR. CAJERO (A) SIRVASE EXTENDER EL RECIBO DE PAGO A FAVOR DE:",68, y+46, { align: "center" });
        doc.text("Hora - "+fecha.toLocaleTimeString(),180, y+46, { align: "center" });
        doc.setFont(undefined, 'normal');
        y += alturaCelda;
 
        
         // ======= NOMBRES DE USUARIO =============
        doc.setFillColor(236, 240, 241); 
        doc.rect(x, y+44, 134, 7, "F");
        doc.rect(145, y+44, 55, 7, "F");
        doc.setFontSize(9);
        doc.setFont(undefined, 'bold');
        doc.text("NOMBRE:",x+3, y+49);
        doc.setFont(undefined, 'normal');
        doc.text(btn.data('person'),67, y+49, { align: "center" });
        doc.setFont(undefined, 'normal');
        y += alturaCelda; 

         // ======= TAZA DE PAGO =============
        doc.setFillColor(236, 240, 241); 
        doc.rect(x, y+47, 134, 7, "F");
        doc.setFillColor(247, 220, 111); 
        doc.rect(145, y+47, 55, 7, "F");
        doc.setFontSize(9);
        doc.setFont(undefined, 'bold');
        doc.text("CONCEPTO:",x+3, y+52);
        doc.setFont(undefined, 'normal');
        doc.text(btn.data('rate'),85, y+52, { align: "center" });
        doc.setFont(undefined, 'bold');
        doc.text("Monto S/."+btn.data('amount').toString(),175, y+52, { align: "center" });
        doc.setFont(undefined, 'normal');
        y += alturaCelda; 

        // ======= DESCRIPCION DE LA ORDEN =============
        doc.setFillColor(236, 240, 241); 
        doc.rect(x, y+50, 134, 22, "F");
        doc.rect(145, y+50, 55, 22, "F");
        doc.setFontSize(9);
        doc.setFont(undefined, 'bold');
        doc.text("DESCRIPCION:",x+3, y+55);
        doc.setFont(undefined, 'normal');
        doc.text(textoDividido,80, y+59, { align: "center",  maxWidth: 200, lineHeightFactor: 1.5 });
        y += alturaCelda;
 
        // RECIBO 3
        // ======= NUMERO RECIBO =============
        doc.setFillColor(31, 94, 163); 
        doc.rect(x, y+77, 190, 7, "F");
        doc.setFont(undefined, 'bold');
        doc.setFontSize(9);
        doc.setTextColor(255, 255, 255);
        doc.text("ORDEN DE PAGO  "+btn.data('correlative'), 105, y+82, { align: "center" });
        doc.setFont(undefined, 'normal');
        y += alturaCelda;

        // ======= PERIODO Y FECHA DE EMISION =============
        doc.setFillColor(236, 240, 241); 
        doc.rect(x, y+80, 40, 7, "F");
        doc.rect(51, y+80, 93, 7, "F");
        doc.rect(145, y+80, 55, 7, "F");
        doc.setFont(undefined, 'bold');
        doc.setFontSize(9);
        doc.setTextColor(0, 0, 0);
        doc.text("PERIODO - "+btn.data('period'),25, y+85, { align: "center" });
        doc.setFont(undefined, 'italic');
        doc.text("Fecha - "+fecha.toLocaleDateString(),180, y+85, { align: "center" });
        doc.setFont(undefined, 'normal');
        y += alturaCelda;

        // ======= TEXTO CAJERO Y HORA DE EMISION =============
        doc.setFillColor(236, 240, 241); 
        doc.rect(x, y+83, 134, 7, "F");
        doc.rect(145, y+83, 55, 7, "F");
        doc.setFontSize(9);
        doc.setFont(undefined, 'italic');
        doc.text("SR. CAJERO (A) SIRVASE EXTENDER EL RECIBO DE PAGO A FAVOR DE:",68, y+88, { align: "center" });
        doc.text("Hora - "+fecha.toLocaleTimeString(),180, y+88, { align: "center" });
        doc.setFont(undefined, 'normal');
        y += alturaCelda; 

        
         // ======= NOMBRES DE USUARIO =============
        doc.setFillColor(236, 240, 241); 
        doc.rect(x, y+86, 134, 7, "F");
        doc.rect(145, y+86, 55, 7, "F");
        doc.setFontSize(9);
        doc.setFont(undefined, 'bold');
        doc.text("NOMBRE:",x+3, y+91);
        doc.setFont(undefined, 'normal');
        doc.text(btn.data('person'),67, y+91, { align: "center" });
        doc.setFont(undefined, 'normal');
        y += alturaCelda; 

         // ======= TAZA DE PAGO =============
        doc.setFillColor(236, 240, 241); 
        doc.rect(x, y+89, 134, 7, "F");
        doc.setFillColor(247, 220, 111); 
        doc.rect(145, y+89, 55, 7, "F");
        doc.setFontSize(9);
        doc.setFont(undefined, 'bold');
        doc.text("CONCEPTO:",x+3, y+94);
        doc.setFont(undefined, 'normal');
        doc.text(btn.data('rate'),85, y+94, { align: "center" });
        doc.setFont(undefined, 'bold');
        doc.text("Monto S/."+btn.data('amount').toString(),175, y+94, { align: "center" });
        doc.setFont(undefined, 'normal');
        y += alturaCelda; 

        // ======= DESCRIPCION DE LA ORDEN =============
        doc.setFillColor(236, 240, 241); 
        doc.rect(x, y+92, 134, 22, "F");
        doc.rect(145, y+92, 55, 22, "F");
        doc.setFontSize(9);
        doc.setFont(undefined, 'bold');
        doc.text("DESCRIPCION:",x+3, y+98);
        doc.setFont(undefined, 'normal');
        doc.text(textoDividido,80, y+102, { align: "center",  maxWidth: 200, lineHeightFactor: 1.5 });
        y += alturaCelda;  

        // ======= MOSTRAR VISOR PDF ============= 
        const blobUrl = doc.output("bloburl");
            window.open(blobUrl, '_blank', 'width=1000,height=700');
        });
}