<?php
// لاتنسونا من صالح دعائكم
//لو جبنا اربع مبرمجين وعطينا لك واحد منهم تاسك - حنلاقي كل واحد عملها بشكل مختلف وكلاهما صحيح من حيث التطبيق انما الفكرة واحده  -  وهنا قدمنا الفكرة للمشروع علي قدر الجهد والوقت والمعلومة المتاحة  ولم نكتم معلومة واحدة
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    LoginController,
    DashboardController,
    Admin_panel_settingsController,
    TreasuriesController,
    Sales_matrial_typesController,
    StoresController,
    Inv_UomController,
    Inv_itemcard_categories,
    InvItemCardController,
    AccountsController,
    Account_types_controller,
    CustomerController,
    SupplierCategoriesController,
    SuppliersController,
    Suppliers_with_ordersController,
    AdminController,
    Admins_ShiftsContoller,
    CollectController,
    ExchangeController,
    SalesInvoicesController,
    DelegatesController,
    Suppliers_with_ordersGeneralRetuen,
    ItemcardBalanceController,
    SalesReturnInvoicesController,
    FinancialReportController,
    ServicesController,
    Services_with_ordersController,
    Inv_stores_inventoryController,
    Inv_production_orderController,
    Inv_production_linesController,
    Inv_production_exchangeController,
    inv_production_ReceiveController,
    Inv_stores_transferController,
    Inv_stores_transferIncomingController,
    Permission_rolesController,
    Permission_main_menuesController,
    Permission_sub_menuesController,
};


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

define('PAGINATION_COUNT', 11);
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    Route::resource('adminPanelSetting',Admin_panel_settingsController::class);
    /*   ═══════ ೋღ  start treasuries  ღೋ ═══════                */
    Route::resource('treasuries',TreasuriesController::class);
    Route::post('/treasuries/ajax_search', [TreasuriesController::class, 'ajax_search'])->name('treasuries.ajax_search');
    Route::get('/treasuries/details/{id}', [TreasuriesController::class, 'details'])->name('treasuries.details');
    Route::get('/treasuries/Add_treasuries_delivery/{id}', [TreasuriesController::class, 'Add_treasuries_delivery'])->name('treasuries.Add_treasuries_delivery');
    Route::post('/treasuries/store_treasuries_delivery/{id}', [TreasuriesController::class, 'store_treasuries_delivery'])->name('treasuries.store_treasuries_delivery');
    Route::get('/treasuries/delete_treasuries_delivery/{id}', [TreasuriesController::class, 'delete_treasuries_delivery'])->name('treasuries.delete_treasuries_delivery');
    /*     ═══════ ೋღ  end treasuries    ღೋ ═══════                 */

    /*   ═══════ ೋღ  start sales_matrial_types  ღೋ ═══════                  */
    Route::resource('sales_matrial_types',Sales_matrial_typesController::class);
    /*   ═══════ ೋღ  end sales_matrial_types ღೋ ═══════                     */

    /*   ═══════ ೋღ  start stores   ღೋ ═══════                 */
    Route::resource('stores',StoresController::class);

    /*     ═══════ ೋღ  end stores ღೋ ═══════                 */

    /*     ═══════ ೋღ  start  Uoms  ღೋ ═══════                */
    Route::resource('uoms',Inv_UomController::class);
    Route::post('/uoms/ajax_search', [Inv_UomController::class, 'ajax_search'])->name('uoms.ajax_search');

    /*    ═══════ ೋღ  ღೋ ═══════       end Uoms    ═══════ ೋღ  ღೋ ═══════            */

    /*  ═══════ ೋღ  ღೋ ═══════       start  inv_itemcard_categories  ═══════ ೋღ  ღೋ ═══════ */
    Route::resource('/inv_itemcard_categories', Inv_itemcard_categories::class);

    /*    ═══════ ೋღ  End inv_itemcard_categories ღೋ ═══════       */

    /*      ═══════ ೋღ   start  Item Card   ღೋ ═══════             */
    Route::resource('/itemcard', InvItemCardController::class);

    Route::post('/itemcard/ajax_search', [InvItemCardController::class, 'ajax_search'])->name('itemcard.ajax_search');
    Route::post('/itemcard/ajax_search_movements', [InvItemCardController::class, 'ajax_search_movements'])->name('itemcard.ajax_search_movements');
    Route::post('/itemcard/ajax_check_barcode', [InvItemCardController::class, 'ajax_check_barcode'])->name('itemcard.ajax_check_barcode');
    Route::post('/itemcard/ajax_check_name', [InvItemCardController::class, 'ajax_check_name'])->name('itemcard.ajax_check_name');
    Route::get('/itemcard/generate_barcode/{id}', [InvItemCardController::class, 'generate_barcode'])->name('itemcard.generate_barcode');


    /*      ═══════ ೋღ  end Item Card  ღೋ ═══════              */

    /*     ═══════ ೋღ start  account types  ღೋ ═══════              */
    Route::get('/accountTypes/index', [Account_types_controller::class, 'index'])->name('accountTypes.index');
    /*       ═══════ ೋღ  end account types ღೋ ═══════                 */


    /*    ═══════ ೋღ start  accounts  ღೋ ═══════                    */
    Route::resource('/accounts', AccountsController::class);
    Route::post('/accounts/ajax_search', [AccountsController::class, 'ajax_search'])->name('accounts.ajax_search');
    /*      ═══════ ೋღ end accounts  ღೋ ═══════               */


    /*    ═══════ ೋღ  start  customer   ღೋ ═══════                 */
    Route::resource('/customer', CustomerController::class);
    Route::post('/customer/ajax_search', [CustomerController::class, 'ajax_search'])->name('customer.ajax_search');

    /*      ═══════ ೋღ end customer   ღೋ ═══════                    */

    /*      ═══════ ೋღ start suppliers_categories  ღೋ ═══════                 */
    Route::resource('/suppliers_categories', SupplierCategoriesController::class);
    /*         ═══════ ೋღ end suppliers_categories   ღೋ ═══════                  */

    /*       ═══════ ೋღ start  suppliers  ღೋ ═══════                 */
    Route::resource('/supplier', SuppliersController::class);
    Route::post('/supplier/ajax_search', [SuppliersController::class, 'ajax_search'])->name('supplier.ajax_search');
    /*     ═══════ ೋღ  end suppliers  ღೋ ═══════                     */

    /*     ═══════ ೋღ start  suppliers_orders   Purchases  ღೋ ═══════                */
    Route::resource('/suppliers_orders', Suppliers_with_ordersController::class);
    Route::post('/suppliers_orders/ajax_search', [Suppliers_with_ordersController::class, 'ajax_search'])->name('suppliers_orders.ajax_search');
    Route::post('/suppliers_orders/get_item_uoms', [Suppliers_with_ordersController::class, 'get_item_uoms'])->name('suppliers_orders.get_item_uoms');
    Route::post('/suppliers_orders/load_modal_add_details', [Suppliers_with_ordersController::class, 'load_modal_add_details'])->name('suppliers_orders.load_modal_add_details');
    Route::post('/suppliers_orders/add_new_details', [Suppliers_with_ordersController::class, 'add_new_details'])->name('suppliers_orders.add_new_details');
    Route::post('/suppliers_orders/reload_itemsdetials', [Suppliers_with_ordersController::class, 'reload_itemsdetials'])->name('suppliers_orders.reload_itemsdetials');
    Route::post('/suppliers_orders/reload_parent_pill', [Suppliers_with_ordersController::class, 'reload_parent_pill'])->name('suppliers_orders.reload_parent_pill');
    Route::post('/suppliers_orders/load_edit_item_details', [Suppliers_with_ordersController::class, 'load_edit_item_details'])->name('suppliers_orders.load_edit_item_details');
    Route::post('/suppliers_orders/edit_item_details', [Suppliers_with_ordersController::class, 'edit_item_details'])->name('suppliers_orders.edit_item_details');
    Route::get('/suppliers_orders/delete_details/{id}/{id_parent}', [Suppliers_with_ordersController::class, 'delete_details'])->name('suppliers_orders.delete_details');
    Route::post('/suppliers_orders/do_approve/{id}', [Suppliers_with_ordersController::class, 'do_approve'])->name('suppliers_orders.do_approve');
    Route::post('/suppliers_orders/load_modal_approve_invoice', [Suppliers_with_ordersController::class, 'load_modal_approve_invoice'])->name('suppliers_orders.load_modal_approve_invoice');
    Route::post('/suppliers_orders/load_usershiftDiv', [Suppliers_with_ordersController::class, 'load_usershiftDiv'])->name('suppliers_orders.load_usershiftDiv');
    Route::get('/suppliers_orders/printsaleswina4/{id}/{size}', [Suppliers_with_ordersController::class, 'printsaleswina4'])->name('suppliers_orders.printsaleswina4');
    /*     ═══════ ೋღ end suppliers_orders ღೋ ═══════                     */

    /*    ═══════ ೋღ start admins ღೋ ═══════                    */
    Route::resource('/admins_accounts', AdminController::class);
    Route::post('/admins_accounts/ajax_search', [AdminController::class, 'ajax_search'])->name('admins_accounts.ajax_search');
    Route::get('/admins_accounts/details/{id}', [AdminController::class, 'details'])->name('admins_accounts.details');
    Route::post('/admins_accounts/add_treasuries/{id}', [AdminController::class, 'add_treasuries'])->name('admins_accounts.add_treasuries');
    Route::get('/admins_accounts/delete_treasuries/{rowid}/{userid}', [AdminController::class, 'delete_treasuries'])->name('admins_accounts.delete_treasuries');
    Route::post('/admins_accounts/add_stores/{id}', [AdminController::class, 'add_stores'])->name('admins_accounts.add_stores');
    Route::get('/admins_accounts/delete_stores/{rowid}/{userid}', [AdminController::class, 'delete_stores'])->name('admins_accounts.delete_stores');


    /*     ═══════ ೋღ end admins  ღೋ ═══════                     */

    /*     ═══════ ೋღ  start admins shifts  ღೋ ═══════                  */
    Route::resource('/admin_shift', Admins_ShiftsContoller::class);
    Route::get('/admin_shift/finish/{id}', [Admins_ShiftsContoller::class, 'finish'])->name('admin_shift.finish');
    Route::get('/admin_shift/print_details/{id}', [Admins_ShiftsContoller::class, 'print_details'])->name('admin_shift.print_details');
    Route::post('/admin_shift/review_now', [Admins_ShiftsContoller::class, 'review_now'])->name('admin_shift.review_now');
    Route::post('/admin_shift/ajax_search', [Admins_ShiftsContoller::class, 'ajax_search'])->name('admin_shift.ajax_search');
    Route::post('/admin_shift/do_review_now/{shiftid}', [Admins_ShiftsContoller::class, 'do_review_now'])->name('admin_shift.do_review_now');



    /*     ═══════ ೋღ end admins shifts    ღೋ ═══════                     */

    /*     ═══════ ೋღ  start  collect_transaction ღೋ ═══════                   */
    Route::resource('/collect_transaction', CollectController::class);
    Route::post('/collect_transaction/get_account_blance', [CollectController::class, 'get_account_blance'])->name('collect_transaction.get_account_blance');
    Route::post('/collect_transaction/ajax_search', [CollectController::class, 'ajax_search'])->name('collect_transaction.ajax_search');
    /*     ═══════ ೋღ  end  collect_transaction ღೋ ═══════                       */

    /*     ═══════ ೋღ start  exchange_transaction  ღೋ ═══════                   */
    Route::resource('/exchange_transaction', ExchangeController::class);
    Route::post('/exchange_transaction/get_account_blance', [ExchangeController::class, 'get_account_blance'])->name('exchange_transaction.get_account_blance');
    Route::post('/exchange_transaction/ajax_search', [ExchangeController::class, 'ajax_search'])->name('exchange_transaction.ajax_search');
    /*      ═══════ ೋღ   end  exchange_transaction  ღೋ ═══════                    */

    /*     ═══════ ೋღ start  sales Invoices   المبيعات  ღೋ ═══════                */
    Route::resource('/SalesInvoices', SalesInvoicesController::class);
    Route::post('/SalesInvoices/get_item_uoms', [SalesInvoicesController::class, 'get_item_uoms'])->name('SalesInvoices.get_item_uoms');
    Route::post('/SalesInvoices/get_item_batches', [SalesInvoicesController::class, 'get_item_batches'])->name('SalesInvoices.get_item_batches');
    Route::post('/SalesInvoices/get_item_unit_price', [SalesInvoicesController::class, 'get_item_unit_price'])->name('SalesInvoices.get_item_unit_price');
    Route::post('/SalesInvoices/get_Add_new_item_row', [SalesInvoicesController::class, 'get_Add_new_item_row'])->name('SalesInvoices.get_Add_new_item_row');
    Route::post('/SalesInvoices/load_modal_addMirror', [SalesInvoicesController::class, 'load_modal_addMirror'])->name('SalesInvoices.load_modal_addMirror');
    Route::post('/SalesInvoices/load_modal_addActiveInvoice', [SalesInvoicesController::class, 'load_modal_addActiveInvoice'])->name('SalesInvoices.load_modal_addActiveInvoice');
    Route::post('/SalesInvoices/store', [SalesInvoicesController::class, 'store'])->name('SalesInvoices.store');
    Route::post('/SalesInvoices/load_invoice_update_modal', [SalesInvoicesController::class, 'load_invoice_update_modal'])->name('SalesInvoices.load_invoice_update_modal');
    Route::post('/SalesInvoices/Add_item_to_invoice', [SalesInvoicesController::class, 'Add_item_to_invoice'])->name('SalesInvoices.Add_item_to_invoice');
    Route::post('/SalesInvoices/reload_items_in_invoice', [SalesInvoicesController::class, 'reload_items_in_invoice'])->name('SalesInvoices.reload_items_in_invoice');
    Route::post('/SalesInvoices/recalclate_parent_invoice', [SalesInvoicesController::class, 'recalclate_parent_invoice'])->name('SalesInvoices.recalclate_parent_invoice');
    Route::post('/SalesInvoices/remove_active_row_item', [SalesInvoicesController::class, 'remove_active_row_item'])->name('SalesInvoices.remove_active_row_item');
    Route::post('/SalesInvoices/DoApproveInvoiceFinally', [SalesInvoicesController::class, 'DoApproveInvoiceFinally'])->name('SalesInvoices.DoApproveInvoiceFinally');
    Route::post('/SalesInvoices/load_usershiftDiv', [SalesInvoicesController::class, 'load_usershiftDiv'])->name('SalesInvoices.load_usershiftDiv');
    Route::post('/SalesInvoices/load_invoice_details_modal', [SalesInvoicesController::class, 'load_invoice_details_modal'])->name('SalesInvoices.load_invoice_details_modal');
    Route::post('/SalesInvoices/ajax_search', [SalesInvoicesController::class, 'ajax_search'])->name('SalesInvoices.ajax_search');
    Route::post('/SalesInvoices/do_add_new_customer', [SalesInvoicesController::class, 'do_add_new_customer'])->name('SalesInvoices.do_add_new_customer');
    Route::post('/SalesInvoices/get_last_added_customer', [SalesInvoicesController::class, 'get_last_added_customer'])->name('SalesInvoices.get_last_added_customer');
    Route::post('/SalesInvoices/searchforcustomer', [SalesInvoicesController::class, 'searchforcustomer'])->name('SalesInvoices.searchforcustomer');
    Route::post('/SalesInvoices/searchforitems', [SalesInvoicesController::class, 'searchforitems'])->name('SalesInvoices.searchforitems');
    Route::get('/SalesInvoices/printsaleswina4/{id}/{size}', [SalesInvoicesController::class, 'printsaleswina4'])->name('SalesInvoices.printsaleswina4');
    /*       ═══════ ೋღ sales Invoices   المبيعات   ღೋ ═══════                     */

    /*      ═══════ ೋღ start  delegates   ღೋ ═══════                 */
    Route::resource('/delegates', DelegatesController::class);
    Route::post('/delegates/ajax_search', [DelegatesController::class, 'ajax_search'])->name('delegates.ajax_search');
    /*     ═══════ ೋღ      end delegates       ღೋ ═══════           */

    /*     ═══════ ೋღ start  suppliers_orders Gernal Return   مرتجع المشتريات العام  ღೋ ═══════                */
    Route::resource('/suppliers_orders_general_return', Suppliers_with_ordersGeneralRetuen::class);

    Route::post('/suppliers_orders_general_return/ajax_search', [Suppliers_with_ordersGeneralRetuen::class, 'ajax_search'])->name('suppliers_orders_general_return.ajax_search');
    Route::post('/suppliers_orders_general_return/get_item_uoms', [Suppliers_with_ordersGeneralRetuen::class, 'get_item_uoms'])->name('suppliers_orders_general_return.get_item_uoms');
    Route::post('/suppliers_orders_general_return/load_modal_add_details', [Suppliers_with_ordersGeneralRetuen::class, 'load_modal_add_details'])->name('suppliers_orders_general_return.load_modal_add_details');
    Route::post('/suppliers_orders_general_return/Add_item_to_invoice', [Suppliers_with_ordersGeneralRetuen::class, 'Add_item_to_invoice'])->name('suppliers_orders_general_return.Add_item_to_invoice');
    Route::post('/suppliers_orders_general_return/reload_itemsdetials', [Suppliers_with_ordersGeneralRetuen::class, 'reload_itemsdetials'])->name('suppliers_orders_general_return.reload_itemsdetials');
    Route::post('/suppliers_orders_general_return/reload_parent_pill', [Suppliers_with_ordersGeneralRetuen::class, 'reload_parent_pill'])->name('suppliers_orders_general_return.reload_parent_pill');
    Route::post('/suppliers_orders_general_return/load_edit_item_details', [Suppliers_with_ordersGeneralRetuen::class, 'load_edit_item_details'])->name('suppliers_orders_general_return.load_edit_item_details');
    Route::post('/suppliers_orders_general_return/edit_item_details', [Suppliers_with_ordersGeneralRetuen::class, 'edit_item_details'])->name('suppliers_orders_general_return.edit_item_details');
    Route::get('/suppliers_orders_general_return/delete_details/{id}/{id_parent}', [Suppliers_with_ordersGeneralRetuen::class, 'delete_details'])->name('suppliers_orders_general_return.delete_details');
    Route::post('/suppliers_orders_general_return/do_approve/{id}', [Suppliers_with_ordersGeneralRetuen::class, 'do_approve'])->name('suppliers_orders_general_return.do_approve');
    Route::post('/suppliers_orders_general_return/load_modal_approve_invoice', [Suppliers_with_ordersGeneralRetuen::class, 'load_modal_approve_invoice'])->name('suppliers_orders_general_return.load_modal_approve_invoice');
    Route::post('/suppliers_orders_general_return/load_usershiftDiv', [Suppliers_with_ordersGeneralRetuen::class, 'load_usershiftDiv'])->name('suppliers_orders_general_return.load_usershiftDiv');
    Route::post('/suppliers_orders_general_return/get_item_batches', [Suppliers_with_ordersGeneralRetuen::class, 'get_item_batches'])->name('suppliers_orders_general_return.get_item_batches');
    Route::get('/suppliers_orders_general_return/printsaleswina4/{id}/{size}', [Suppliers_with_ordersGeneralRetuen::class, 'printsaleswina4'])->name('suppliers_orders_general_return.printsaleswina4');
    /*        ═══════ ೋღ end  suppliers_orders Gernal Return  ღೋ ═══════                  */

    /*      ═══════ ೋღ  start    itemcardBalance  ღೋ ═══════                 */
    Route::get('/itemcardBalance/index', [ItemcardBalanceController::class, 'index'])->name('itemcardBalance.index');
    Route::post('/itemcardBalance/ajax_search', [ItemcardBalanceController::class, 'ajax_search'])->name('itemcardBalance.ajax_search');
    /*     ═══════ ೋღ   end    itemcardBalance     ღೋ ═══════              */

    /*     ═══════ ೋღ start  sales Invoices   مرتجع المبيعات العام  ღೋ ═══════                */
    Route::resource('/SalesReturnInvoices', SalesReturnInvoicesController::class);

    Route::post('/SalesReturnInvoices/get_item_uoms', [SalesReturnInvoicesController::class, 'get_item_uoms'])->name('SalesReturnInvoices.get_item_uoms');
    Route::post('/SalesReturnInvoices/get_item_batches', [SalesReturnInvoicesController::class, 'get_item_batches'])->name('SalesReturnInvoices.get_item_batches');
    Route::post('/SalesReturnInvoices/get_item_unit_price', [SalesReturnInvoicesController::class, 'get_item_unit_price'])->name('SalesReturnInvoices.get_item_unit_price');
    Route::post('/SalesReturnInvoices/get_Add_new_item_row', [SalesReturnInvoicesController::class, 'get_Add_new_item_row'])->name('SalesReturnInvoices.get_Add_new_item_row');
    Route::post('/SalesReturnInvoices/load_modal_addMirror', [SalesReturnInvoicesController::class, 'load_modal_addMirror'])->name('SalesReturnInvoices.load_modal_addMirror');
    Route::post('/SalesReturnInvoices/load_modal_addActiveInvoice', [SalesReturnInvoicesController::class, 'load_modal_addActiveInvoice'])->name('SalesReturnInvoices.load_modal_addActiveInvoice');
    Route::post('/SalesReturnInvoices/load_invoice_update_modal', [SalesReturnInvoicesController::class, 'load_invoice_update_modal'])->name('SalesReturnInvoices.load_invoice_update_modal');
    Route::post('/SalesReturnInvoices/Add_item_to_invoice', [SalesReturnInvoicesController::class, 'Add_item_to_invoice'])->name('SalesReturnInvoices.Add_item_to_invoice');
    Route::post('/SalesReturnInvoices/reload_items_in_invoice', [SalesReturnInvoicesController::class, 'reload_items_in_invoice'])->name('SalesReturnInvoices.reload_items_in_invoice');
    Route::post('/SalesReturnInvoices/recalclate_parent_invoice', [SalesReturnInvoicesController::class, 'recalclate_parent_invoice'])->name('SalesReturnInvoices.recalclate_parent_invoice');
    Route::post('/SalesReturnInvoices/remove_active_row_item', [SalesReturnInvoicesController::class, 'remove_active_row_item'])->name('SalesReturnInvoices.remove_active_row_item');
    Route::post('/SalesReturnInvoices/DoApproveInvoiceFinally', [SalesReturnInvoicesController::class, 'DoApproveInvoiceFinally'])->name('SalesReturnInvoices.DoApproveInvoiceFinally');
    Route::post('/SalesReturnInvoices/load_usershiftDiv', [SalesReturnInvoicesController::class, 'load_usershiftDiv'])->name('SalesReturnInvoices.load_usershiftDiv');
    Route::post('/SalesReturnInvoices/load_invoice_details_modal', [SalesReturnInvoicesController::class, 'load_invoice_details_modal'])->name('SalesReturnInvoices.load_invoice_details_modal');
    Route::post('/SalesReturnInvoices/ajax_search', [SalesReturnInvoicesController::class, 'ajax_search'])->name('SalesReturnInvoices.ajax_search');
    Route::post('/SalesReturnInvoices/do_add_new_customer', [SalesReturnInvoicesController::class, 'do_add_new_customer'])->name('SalesReturnInvoices.do_add_new_customer');
    Route::post('/SalesReturnInvoices/get_last_added_customer', [SalesReturnInvoicesController::class, 'get_last_added_customer'])->name('SalesReturnInvoices.get_last_added_customer');
    Route::post('/SalesReturnInvoices/searchforcustomer', [SalesReturnInvoicesController::class, 'searchforcustomer'])->name('SalesReturnInvoices.searchforcustomer');
    Route::post('/SalesReturnInvoices/searchforitems', [SalesReturnInvoicesController::class, 'searchforitems'])->name('SalesReturnInvoices.searchforitems');
    Route::get('/SalesReturnInvoices/printsaleswina4/{id}/{size}', [SalesReturnInvoicesController::class, 'printsaleswina4'])->name('SalesReturnInvoices.printsaleswina4');
    /*  ═══════ ೋღ  sales Invoices   المبيعات                ღೋ ═══════        */

    /*  ═══════ ೋღ start  FinancialReportController تقاير الحسابات  ღೋ ═══════ */
    Route::get('/FinancialReport/supplieraccountmirror', [FinancialReportController::class, 'supplier_account_mirror'])->name('FinancialReport.supplieraccountmirror');
    Route::post('/FinancialReport/supplieraccountmirror', [FinancialReportController::class, 'supplier_account_mirror'])->name('FinancialReport.supplieraccountmirror');
    Route::get('/FinancialReport/customeraccountmirror', [FinancialReportController::class, 'customer_account_mirror'])->name('FinancialReport.customeraccountmirror');
    Route::post('/FinancialReport/customeraccountmirror', [FinancialReportController::class, 'customer_account_mirror'])->name('FinancialReport.customeraccountmirror');
    Route::post('/FinancialReport/searchforcustomer', [FinancialReportController::class, 'searchforcustomer'])->name('FinancialReport.searchforcustomer');
    Route::get('/FinancialReport/delegateaccountmirror', [FinancialReportController::class, 'delegate_account_mirror'])->name('FinancialReport.delegateaccountmirror');
    Route::post('/FinancialReport/delegateaccountmirror', [FinancialReportController::class, 'delegate_account_mirror'])->name('FinancialReport.delegateaccountmirror');
    /*  ═══════ ೋღ end  FinancialReportController ღೋ ═══════  */

    /*  ═══════ ೋღ start  Services  ღೋ ═══════                      */
    Route::resource('/Services', ServicesController::class);

    Route::post('/Services/ajax_search', [ServicesController::class, 'ajax_search'])->name('Services.ajax_search');
    /*      ═══════ ೋღ end Services  ღೋ ═══════                    */

    /*      ═══════ ೋღ  start  services_orders    ღೋ ═══════            */
    Route::resource('/Services_orders', Services_with_ordersController::class);

    Route::post('/Services_orders/ajax_search', [Services_with_ordersController::class, 'ajax_search'])->name('Services_orders.ajax_search');
    Route::post('/Services_orders/load_modal_add_details', [Services_with_ordersController::class, 'load_modal_add_details'])->name('Services_orders.load_modal_add_details');
    Route::post('/Services_orders/add_new_details', [Services_with_ordersController::class, 'add_new_details'])->name('Services_orders.add_new_details');
    Route::post('/Services_orders/reload_itemsdetials', [Services_with_ordersController::class, 'reload_itemsdetials'])->name('Services_orders.reload_itemsdetials');
    Route::post('/Services_orders/reload_parent_pill', [Services_with_ordersController::class, 'reload_parent_pill'])->name('Services_orders.reload_parent_pill');
    Route::post('/Services_orders/load_edit_item_details', [Services_with_ordersController::class, 'load_edit_item_details'])->name('Services_orders.load_edit_item_details');
    Route::post('/Services_orders/edit_item_details', [Services_with_ordersController::class, 'edit_item_details'])->name('Services_orders.edit_item_details');
    Route::get('/Services_orders/delete_details/{id}/{id_parent}', [Services_with_ordersController::class, 'delete_details'])->name('Services_orders.delete_details');
    Route::post('/Services_orders/do_approve/{id}', [Services_with_ordersController::class, 'do_approve'])->name('Services_orders.do_approve');
    Route::post('/Services_orders/load_modal_approve_invoice', [Services_with_ordersController::class, 'load_modal_approve_invoice'])->name('Services_orders.load_modal_approve_invoice');
    Route::post('/Services_orders/load_usershiftDiv', [Services_with_ordersController::class, 'load_usershiftDiv'])->name('Services_orders.load_usershiftDiv');
    Route::get('/Services_orders/printsaleswina4/{id}/{size}', [Services_with_ordersController::class, 'printsaleswina4'])->name('Services_orders.printsaleswina4');
    /*     ═══════ ೋღ  end services_orders       ღೋ ═══════              */

    /*      ═══════ ೋღ start  inv_stores_inventory  ღೋ ═══════              */
    Route::resource('/stores_inventory', Inv_stores_inventoryController::class);

    Route::post('/stores_inventory/ajax_search', [Inv_stores_inventoryController::class, 'ajax_search'])->name('stores_inventory.ajax_search');
    Route::post('/stores_inventory/add_new_details/{id}', [Inv_stores_inventoryController::class, 'add_new_details'])->name('stores_inventory.add_new_details');
    Route::post('/stores_inventory/load_edit_item_details', [Inv_stores_inventoryController::class, 'load_edit_item_details'])->name('stores_inventory.load_edit_item_details');
    Route::post('/stores_inventory/edit_item_details/{id}/{id_parent}', [Inv_stores_inventoryController::class, 'edit_item_details'])->name('stores_inventory.edit_item_details');
    Route::get('/stores_inventory/delete_details/{id}/{id_parent}', [Inv_stores_inventoryController::class, 'delete_details'])->name('stores_inventory.delete_details');
    Route::get('/stores_inventory/close_one_details/{id}/{id_parent}', [Inv_stores_inventoryController::class, 'close_one_details'])->name('stores_inventory.close_one_details');
    Route::get('/stores_inventory/do_close_parent/{id}', [Inv_stores_inventoryController::class, 'do_close_parent'])->name('stores_inventory.do_close_parent');
    Route::get('/stores_inventory/printsaleswina4/{id}/{size}', [Inv_stores_inventoryController::class, 'printsaleswina4'])->name('stores_inventory.printsaleswina4');
    /*     ═══════ ೋღ end sservices_orders   ღೋ ═══════                   */

    /*      ═══════ ೋღ start  inv_production_order ღೋ ═══════                   */
    Route::resource('/inv_production_order', Inv_production_orderController::class);

    Route::post('/inv_production_order/ajax_search', [Inv_production_orderController::class, 'ajax_search'])->name('inv_production_order.ajax_search');
    Route::post('/inv_production_order/show_more_detials', [Inv_production_orderController::class, 'show_more_detials'])->name('inv_production_order.show_more_detials');
    Route::get('/inv_production_order/do_approve/{id}', [Inv_production_orderController::class, 'do_approve'])->name('inv_production_order.do_approve');
    Route::get('/inv_production_order/do_closes_archive/{id}', [Inv_production_orderController::class, 'do_closes_archive'])->name('inv_production_order.do_closes_archive');
    /*    ═══════ ೋღ  end inv_production_order  ღೋ ═══════                     */

    /*     ═══════ ೋღ start  inv_production_lines    ღೋ ═══════                  */
    Route::resource('/inv_production_lines', Inv_production_linesController::class);

    Route::post('/inv_production_lines/ajax_search', [Inv_production_linesController::class, 'ajax_search'])->name('inv_production_lines.ajax_search');
    /*   ═══════ ೋღ end inv_production_lines    ღೋ ═══════                      */

    /*    ═══════ ೋღ start  Inv_production_exchange  ღೋ ═══════                  */
    Route::resource('/inv_production_exchange', Inv_production_exchangeController::class);

    Route::post('/inv_production_exchange/ajax_search', [Inv_production_exchangeController::class, 'ajax_search'])->name('inv_production_exchange.ajax_search');
    Route::post('/inv_production_exchange/get_item_uoms', [Inv_production_exchangeController::class, 'get_item_uoms'])->name('inv_production_exchange.get_item_uoms');
    Route::post('/inv_production_exchange/load_modal_add_details', [Inv_production_exchangeController::class, 'load_modal_add_details'])->name('inv_production_exchange.load_modal_add_details');
    Route::post('/inv_production_exchange/Add_item_to_invoice', [Inv_production_exchangeController::class, 'Add_item_to_invoice'])->name('inv_production_exchange.Add_item_to_invoice');
    Route::post('/inv_production_exchange/reload_itemsdetials', [Inv_production_exchangeController::class, 'reload_itemsdetials'])->name('inv_production_exchange.reload_itemsdetials');
    Route::post('/inv_production_exchange/reload_parent_pill', [Inv_production_exchangeController::class, 'reload_parent_pill'])->name('inv_production_exchange.reload_parent_pill');
    Route::post('/inv_production_exchange/load_edit_item_details', [Inv_production_exchangeController::class, 'load_edit_item_details'])->name('inv_production_exchange.load_edit_item_details');
    Route::post('/inv_production_exchange/edit_item_details', [Inv_production_exchangeController::class, 'edit_item_details'])->name('inv_production_exchange.edit_item_details');
    Route::get('/inv_production_exchange/delete_details/{id}/{id_parent}', [Inv_production_exchangeController::class, 'delete_details'])->name('inv_production_exchange.delete_details');
    Route::post('/inv_production_exchange/do_approve/{id}', [Inv_production_exchangeController::class, 'do_approve'])->name('inv_production_exchange.do_approve');
    Route::post('/inv_production_exchange/load_modal_approve_invoice', [Inv_production_exchangeController::class, 'load_modal_approve_invoice'])->name('inv_production_exchange.load_modal_approve_invoice');
    Route::post('/inv_production_exchange/load_usershiftDiv', [Inv_production_exchangeController::class, 'load_usershiftDiv'])->name('inv_production_exchange.load_usershiftDiv');
    Route::post('/inv_production_exchange/get_item_batches', [Inv_production_exchangeController::class, 'get_item_batches'])->name('inv_production_exchange.get_item_batches');
    Route::get('/inv_production_exchange/printsaleswina4/{id}/{size}', [Inv_production_exchangeController::class, 'printsaleswina4'])->name('inv_production_exchange.printsaleswina4');
    /*      ═══════ ೋღ end  Inv_production_exchange   ღೋ ═══════                  */

    /*     ═══════ ೋღ  start  inv_production_Receive        ღೋ ═══════      */
    Route::resource('/inv_production_Receive', inv_production_ReceiveController::class);

    Route::post('/inv_production_Receive/ajax_search', [inv_production_ReceiveController::class, 'ajax_search'])->name('inv_production_Receive.ajax_search');
    Route::post('/inv_production_Receive/get_item_uoms', [inv_production_ReceiveController::class, 'get_item_uoms'])->name('inv_production_Receive.get_item_uoms');
    Route::post('/inv_production_Receive/load_modal_add_details', [inv_production_ReceiveController::class, 'load_modal_add_details'])->name('inv_production_Receive.load_modal_add_details');
    Route::post('/inv_production_Receive/add_new_details', [inv_production_ReceiveController::class, 'add_new_details'])->name('inv_production_Receive.add_new_details');
    Route::post('/inv_production_Receive/reload_itemsdetials', [inv_production_ReceiveController::class, 'reload_itemsdetials'])->name('inv_production_Receive.reload_itemsdetials');
    Route::post('/inv_production_Receive/reload_parent_pill', [inv_production_ReceiveController::class, 'reload_parent_pill'])->name('inv_production_Receive.reload_parent_pill');
    Route::post('/inv_production_Receive/load_edit_item_details', [inv_production_ReceiveController::class, 'load_edit_item_details'])->name('inv_production_Receive.load_edit_item_details');
    Route::post('/inv_production_Receive/edit_item_details', [inv_production_ReceiveController::class, 'edit_item_details'])->name('inv_production_Receive.edit_item_details');
    Route::get('/inv_production_Receive/delete_details/{id}/{id_parent}', [inv_production_ReceiveController::class, 'delete_details'])->name('inv_production_Receive.delete_details');
    Route::post('/inv_production_Receive/do_approve/{id}', [inv_production_ReceiveController::class, 'do_approve'])->name('inv_production_Receive.do_approve');
    Route::post('/inv_production_Receive/load_modal_approve_invoice', [inv_production_ReceiveController::class, 'load_modal_approve_invoice'])->name('inv_production_Receive.load_modal_approve_invoice');
    Route::post('/inv_production_Receive/load_usershiftDiv', [inv_production_ReceiveController::class, 'load_usershiftDiv'])->name('inv_production_Receive.load_usershiftDiv');
    Route::post('/inv_production_Receive/get_item_batches', [inv_production_ReceiveController::class, 'get_item_batches'])->name('inv_production_Receive.get_item_batches');
    Route::get('/inv_production_Receive/printsaleswina4/{id}/{size}', [inv_production_ReceiveController::class, 'printsaleswina4'])->name('inv_production_Receive.printsaleswina4');
    /*      ═══════ ೋღ end  inv_production_Receive   ღೋ ═══════                   */

    /*     ═══════ ೋღ   start  inv_stores_transfer   ღೋ ═══════          Outgoing warehouse transfer orders   */
    Route::resource('/inv_stores_transfer', Inv_stores_transferController::class);

    Route::post('/inv_stores_transfer/ajax_search', [Inv_stores_transferController::class, 'ajax_search'])->name('inv_stores_transfer.ajax_search');
    Route::post('/inv_stores_transfer/get_item_uoms', [Inv_stores_transferController::class, 'get_item_uoms'])->name('inv_stores_transfer.get_item_uoms');
    Route::post('/inv_stores_transfer/load_modal_add_details', [Inv_stores_transferController::class, 'load_modal_add_details'])->name('inv_stores_transfer.load_modal_add_details');
    Route::post('/inv_stores_transfer/Add_item_to_invoice', [Inv_stores_transferController::class, 'Add_item_to_invoice'])->name('inv_stores_transfer.Add_item_to_invoice');
    Route::post('/inv_stores_transfer/reload_itemsdetials', [Inv_stores_transferController::class, 'reload_itemsdetials'])->name('inv_stores_transfer.reload_itemsdetials');
    Route::post('/inv_stores_transfer/reload_parent_pill', [Inv_stores_transferController::class, 'reload_parent_pill'])->name('inv_stores_transfer.reload_parent_pill');
    Route::post('/inv_stores_transfer/load_edit_item_details', [Inv_stores_transferController::class, 'load_edit_item_details'])->name('inv_stores_transfer.load_edit_item_details');
    Route::post('/inv_stores_transfer/edit_item_details', [Inv_stores_transferController::class, 'edit_item_details'])->name('inv_stores_transfer.edit_item_details');
    Route::get('/inv_stores_transfer/delete_details/{id}/{id_parent}', [Inv_stores_transferController::class, 'delete_details'])->name('inv_stores_transfer.delete_details');
    Route::get('/inv_stores_transfer/do_approve/{id}', [Inv_stores_transferController::class, 'do_approve'])->name('inv_stores_transfer.do_approve');
    Route::post('/inv_stores_transfer/get_item_batches', [Inv_stores_transferController::class, 'get_item_batches'])->name('inv_stores_transfer.get_item_batches');
    Route::get('/inv_stores_transfer/printsaleswina4/{id}/{size}', [Inv_stores_transferController::class, 'printsaleswina4'])->name('inv_stores_transfer.printsaleswina4');
    /*   ═══════ ೋღ end  inv_stores_transfer  ღೋ ═══════                      */

    /*    ═══════ ೋღ  start  inv_stores_transfer_incoming  ღೋ ═══════           Incoming warehouse transfer orders   */
    Route::resource('/inv_stores_transfer_incoming', Inv_stores_transferIncomingController::class);

    Route::post('/inv_stores_transfer_incoming/ajax_search', [Inv_stores_transferIncomingController::class, 'ajax_search'])->name('inv_stores_transfer_incoming.ajax_search');
    Route::get('/inv_stores_transfer_incoming/printsaleswina4/{id}/{size}', [Inv_stores_transferIncomingController::class, 'printsaleswina4'])->name('inv_stores_transfer_incoming.printsaleswina4');
    Route::get('/inv_stores_transfer_incoming/approve_one_details/{id}/{id_parent}', [Inv_stores_transferIncomingController::class, 'approve_one_details'])->name('inv_stores_transfer_incoming.approve_one_details');
    Route::get('/inv_stores_transfer_incoming/cancel_one_details/{id}/{id_parent}', [Inv_stores_transferIncomingController::class, 'cancel_one_details'])->name('inv_stores_transfer_incoming.cancel_one_details');
    Route::post('/inv_stores_transfer_incoming/load_cancel_one_details', [Inv_stores_transferIncomingController::class, 'load_cancel_one_details'])->name('inv_stores_transfer_incoming.load_cancel_one_details');
    Route::post('/inv_stores_transfer_incoming/do_cancel_one_details/{id}/{id_parent}', [Inv_stores_transferIncomingController::class, 'do_cancel_one_details'])->name('inv_stores_transfer_incoming.do_cancel_one_details');
    /*     ═══════ ೋღ  end  inv_stores_transfer_incoming   ღೋ ═══════                   */

    /*     ═══════ ೋღ start  permission  ღೋ ═══════              */
    Route::resource('/permission_roles', Permission_rolesController::class);

    Route::get('/permission_roles/details/{id}', [Permission_rolesController::class, 'details'])->name('permission_roles.details');
    Route::post('/permission_roles/Add_permission_main_menues/{id}', [Permission_rolesController::class, 'Add_permission_main_menues'])->name('permission_roles.Add_permission_main_menues');
    Route::get('/permission_roles/delete_permission_main_menues/{id}', [Permission_rolesController::class, 'delete_permission_main_menues'])->name('permission_roles.delete_permission_main_menues');
    Route::post('/permission_roles/load_add_permission_roles_sub_menu', [Permission_rolesController::class, 'load_add_permission_roles_sub_menu'])->name('permission_roles.load_add_permission_roles_sub_menu');
    Route::post('/permission_roles/add_permission_roles_sub_menu/{id}', [Permission_rolesController::class, 'add_permission_roles_sub_menu'])->name('permission_roles.add_permission_roles_sub_menu');
    Route::get('/permission_roles/delete_permission_sub_menues/{id}', [Permission_rolesController::class, 'delete_permission_sub_menues'])->name('permission_roles.delete_permission_sub_menues');
    Route::post('/permission_roles/load_add_permission_roles_sub_menues_actions', [Permission_rolesController::class, 'load_add_permission_roles_sub_menues_actions'])->name('permission_roles.load_add_permission_roles_sub_menues_actions');
    Route::post('/permission_roles/add_permission_roles_sub_menues_actions/{id}', [Permission_rolesController::class, 'add_permission_roles_sub_menues_actions'])->name('permission_roles.add_permission_roles_sub_menues_actions');
    Route::get('/permission_roles/delete_permission_sub_menues_actions/{id}', [Permission_rolesController::class, 'delete_permission_sub_menues_actions'])->name('permission_roles.delete_permission_sub_menues_actions');



    /*       ═══════ ೋღ  end permission ღೋ ═══════                 */

    /*     ═══════ ೋღ start  permission_main_menues  ღೋ ═══════              */
    Route::resource('/permission_main_menues', Permission_main_menuesController::class);
    /*       ═══════ ೋღ  end permission_main_menues ღೋ ═══════                 */

    /*     ═══════ ೋღ start  permission_sub_menues  ღೋ ═══════              */
    Route::resource('/permission_sub_menues', Permission_sub_menuesController::class);
    Route::post('/permission_sub_menues/ajax_search/', [Permission_sub_menuesController::class, 'ajax_search'])->name('permission_sub_menues.ajax_search');
    Route::post('/permission_sub_menues/ajax_do_add_permission/', [Permission_sub_menuesController::class, 'ajax_do_add_permission'])->name('permission_sub_menues.ajax_do_add_permission');
    Route::post('/permission_sub_menues/ajax_load_edit_permission/', [Permission_sub_menuesController::class, 'ajax_load_edit_permission'])->name('permission_sub_menues.ajax_load_edit_permission');
    Route::post('/permission_sub_menues/ajax_do_edit_permission/', [Permission_sub_menuesController::class, 'ajax_do_edit_permission'])->name('permission_sub_menues.ajax_do_edit_permission');
    Route::post('/permission_sub_menues/ajax_do_delete_permission/', [Permission_sub_menuesController::class, 'ajax_do_delete_permission'])->name('permission_sub_menues.ajax_do_delete_permission');


    /*       ═══════ ೋღ  end permission_sub_menues ღೋ ═══════                 */
});
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'guest:admin'], function () {
    Route::get('login', [LoginController::class, 'show_login_view'])->name('showlogin');
    Route::post('login', [LoginController::class, 'login'])->name('login');
});
