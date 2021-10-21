const mongoose = require('mongoose');
var schema = mongoose.Schema(
    {
        c_name:{type:String,required:true},
        c_batch_no : {type:String,required:true},
        d_expiry_date: {type:String,required:true},
        n_balance_qty: {type:String,required:true},
        c_packaging	: {type:String,required:true},
        c_unique_code: {type:String,required:true},
        c_schemes: {type:String},
        n_mrp: {type:String,required:true},
        c_manufacturer: {type:String,required:true},
        hsn_code: {type:String,required:true},
});
const Medicinedb= mongoose.model('MedicineDB',schema);
module.exports=Medicinedb;