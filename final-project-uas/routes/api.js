// import PatientController
const PatientController = require("../controllers/PatientController");

// import express
const express = require("express");

// membuat object router
const router = express.Router();

/**
 * Membuat routing
 */
router.get("/", (req, res) => {
	res.send("Hello Covid API Express");
});

// Membuat routing patient
router.get("/patients", PatientController.index); // Route Get all resource 
router.post("/patients", PatientController.store); // Route Add resource 
router.put("/patients/:id", PatientController.update); // Route Update resource
router.delete("/patients/:id", PatientController.destroy); // Route Delete
router.get("/patients/:id", PatientController.show); // Route Get one resource
router.get("/patients/search/:name", PatientController.search); // Route Search resource
router.get("/patients/status/positive", PatientController.positive); // Route Get positive resource 
router.get("/patients/status/recovered", PatientController.recovered); // Route Get recovered resource 
router.get("/patients/status/dead", PatientController.dead); // Route Get dead resource

// export router
module.exports = router;