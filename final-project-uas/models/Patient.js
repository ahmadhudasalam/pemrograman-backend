// import database
const db = require("../config/database");

// membuat class Model Student
class Patient {

    // Membuat method static all
    static all() {
        return new Promise((resolve, reject) => {
            const query = "SELECT * FROM patients";
            /**
             * Melakukan query menggunakan method query
             * Meneruma 2 params: query dan callback
             */
            db.query(query, (err, results) => {
                resolve(results);
            });
        });
    }

    // Membuat method static all
    static async create(data, callback) {
        const id = await new Promise((resolve, reject) => {
            const sql = "INSERT INTO patients SET ?";
            db.query(sql, data, (err, results) => {
                resolve(results.insertId);
            });
        });
        const patient = this.find(id);
        return patient;
    }

    // Membuat method static update
    static async update(id, data) {
        await new Promise((resolve, reject) => {
            const sql = "UPDATE patients SET ? WHERE id=?";
            db.query(sql, [data, id], (err, results) => {
                resolve(results);
            });
        });
        const patient = await this.find(id);
        return patient;
    }

    // Membuat method static delete
    static delete(id) {
        return new Promise((resolve, reject) => {
            const sql = "DELETE FROM patients WHERE id=?";
            db.query(sql, id, (err, results) => {
                resolve(results);
            });
        });
    }

    // Membuat method static find
    static find(id) {
        return new Promise((resolve, reject) => {
            const sql = "SELECT * FROM patients WHERE id = ?";
            db.query(sql, id, (err, results) => {
                const [patients] = results;
                resolve(patients);
            });
        });
    }

    // Membuat method static search
    static search(name) {
        return new Promise((resolve, reject) => {
            const sql = `SELECT * FROM patients WHERE name LIKE "%" ? "%"`;
            db.query(sql, name, (err, results) => {
                resolve(results);
            });
        });
    }
    
    // Membuat method static findBbyStatus (Positive, Recovered, Dead)
    static findByStatus(status) {
        return new Promise((resolve, reject) => {
            const sql = `SELECT * FROM patients WHERE status = ?`;
            db.query(sql, status, (err, results) => {
                resolve(results);
            });
        });
    }
}

// export class Student
module.exports = Patient;