const express= require('express');
const router=express.Router();

const mysql = require('mysql');



router.post('/',(req,res,next) =>{
	var con = mysql.createConnection({
	  host: "u0zbt18wwjva9e0v.cbetxkdyhwsb.us-east-1.rds.amazonaws.com",
	  user: "lf7jfljy0s7gycls",
	  password: "qzzxe2oaj0zj8q5a",
	  database : "c0t1o13yl3wxe2h3"
	});


	con.connect(function(err) {
	  if (err) res.status(200).json({
	  	error:err
	  });
	  con.query(`SELECT * FROM USER WHERE USERNAME='${req.body.username}'`, function (err, result, fields) {
	    if (err) throw err;
	    console.log(result);
	    res.status(200).json({
	    	success: true,
	    	res : result
	    });
	  });


	});

})

module.exports = router;