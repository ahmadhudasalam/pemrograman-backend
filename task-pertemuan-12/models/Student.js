// import database
const db = require("../config/database");

// membuat class Model Student
class Student {
  /**
   * Membuat method static all.
   */
  static all() {
    // return Promise sebagai solusi Asynchronous
    return new Promise((resolve, reject) => {
      const sql = "SELECT * from students";
      /**
       * Melakukan query menggunakan method query.
       * Menerima 2 params: query dan callback
       */
      db.query(sql, (err, results) => {
        resolve(results);
      });
    });
  }

  /**
   * TODO 1: Buat fungsi untuk insert data.
   * Method menerima parameter data yang akan diinsert.
   * Method mengembalikan data student yang baru diinsert.
   */
  static create(req, res) {
    return new Promise((resolve, reject) => {
      const { nama, nim, email, jurusan } = req.body;
      const sql = `INSERT INTO students (nama, nim, email, jurusan, created_at, updated_at)
                    VALUES ("${nama}", "${nim}", "${email}", "${jurusan}", now(), now())`;

      db.query(sql, (err, results) => {
        resolve({
          id: results.insertId,
          nama: nama,
          nim: nim,
          email: email,
          jurusan: jurusan,
        });

      });
    });
  }
}

// export class Student
module.exports = Student;