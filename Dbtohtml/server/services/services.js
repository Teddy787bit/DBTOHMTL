
const axios = require('axios');

exports.homeRoute =(req,res)=>{
    res.render('index');
}

exports.updatecsv=(req,res)=>{
        res.render('index')
    
}

exports.showdata = (req, res) => {
    // Make a get request to /api/GetAll
    axios.get('http://localhost:3000/api/GetAll')
        .then(function(response){
            console.log(response.data)
            res.render('showdata', { medicine : response.data });
        })
        .catch(err =>{
            res.send(err);
        })

    
}
