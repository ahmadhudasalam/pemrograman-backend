// import express dan routing
const express = require("express");
const router = require("./routes/api");

// Membuat object express
const app = express();

// Menggunakan middleware
app.use(express.json());
app.use(express.urlencoded({ extended: true }));

// Menggunakan routing (router)
app.use(router);

// Mendefinisikan port.
app.listen(3000);