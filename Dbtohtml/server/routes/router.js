const express= require('express');
const controller = require('../controllers/controller');
const service = require('../services/services');
const route = express.Router();


//Render Files
route.get('/',service.homeRoute);
route.get('/uploadCsv',service.updatecsv);
route.get('/GetAll',service.showdata);

//API
route.get('/api/GetAll',controller.find);
route.post('/api/uploadCsv',controller.create);

module.exports=route;

