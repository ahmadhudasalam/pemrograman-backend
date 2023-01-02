// import mysql
const mysql = require("mysql");

// import dotenv & running method congig
require("dotenv").config();

// destruction object process .env
const { DB_HOST,
		DB_PORT,
		DB_USERNAME,
		DB_PASSWORD,
		DB_DATABASE
	} = process.env;

// update database configuration from .env file
const db = mysql.createConnection({
	host: DB_HOST,
	port: DB_PORT,
	user: DB_USERNAME,
	password: DB_PASSWORD,
	database: DB_DATABASE,
});

/**
 * Menghubungkan ke database menggunakan method connect.
 * Menerima parameter callback
 */
db.connect((err) => {
	if (err) {
		console.log("Error connecting " + err.stack);
		return;
	} else {
		console.log("Connected to database");
		return;
	}
});

// Export module database
module.exports = db;