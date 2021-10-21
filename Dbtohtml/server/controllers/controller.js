var Mongoodb = require('../models/model');
const csv = require('csvtojson');
const Medicinedb = require('../models/model');
var csvfile = `${__dirname}/MedicineDataSet.csv`;
var fs = require('fs');
const route = require('../routes/router');
const connectDB = require('../database/connection')

exports.create = (req, res) => {
    csv()  
    .fromFile(csvfile)  
    .then(function jobj(jsonObj){  
        console.log(jsonObj)
        Medicinedb.insertMany(jsonObj,(err,data)=>{
            if(err){  
                console.log(err);  
            }else{  
                res.redirect('/');  
            }  
        })

    })
    
      }

exports.find = (req, res) => {
    Medicinedb.find()
        .then(medicine => {
            res.send(medicine);
        })
        .catch(err => {
            res.status(500).send({ message: err.message || "Error Occurred while retriving user information" })
        })

}
