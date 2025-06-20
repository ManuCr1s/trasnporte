import 'datatables.net-dt/css/dataTables.dataTables.css';
import DataTable  from "datatables.net-dt";
export const allTables = (element,data,column,extraOptions = {}) => {
    if ($.fn.DataTable.isDataTable(element)) {
        $(element).DataTable().destroy(); 
        $(element).empty();
    }
    const options = {
        data:data,
        columns:column,
        ...extraOptions
    };
    const datatables = new DataTable(element,options);
    return datatables;
};
