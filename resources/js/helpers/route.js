const APP_NAME = '';
const route ={
    login:`${APP_NAME}/login`,
    indexUser:`${APP_NAME}/admin/users/index`,
    createUser:`${APP_NAME}/admin/users`,
    dni:`${APP_NAME}/dni`,
    destroy:`${APP_NAME}/admin/users/destroy`,
    showPeriod:`${APP_NAME}/user/periods/create`,
    createPeriod :`${APP_NAME}/user/periods`,
    indexPeriod:`${APP_NAME}/user/periods/index`,
    destroyPeriod:`${APP_NAME}/user/periods/destroy`,
    selectPeriod:`${APP_NAME}/user/periods/show`,
    createRate:`${APP_NAME}/user/rates`,
    showRates:`${APP_NAME}/user/rates/show`,
    indexRate:`${APP_NAME}/user/rates/index`,
    updateRate:`${APP_NAME}/user/rates/update`,
    destroyRate:`${APP_NAME}/user/rates/destroy`,
    indexOrder:`${APP_NAME}/user/orders/index`,
    createOrder:`${APP_NAME}/user/orders`,
    destroyOrder:`${APP_NAME}/user/orders/destroy`,
    updateOrder:`${APP_NAME}/user/orders/update`,
    passUser:`${APP_NAME}/newpass`
};
export default route;   