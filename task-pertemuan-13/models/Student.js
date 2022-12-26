const db = require("../config/database");

class Student {

  static all() {
    return new Promise((resolve, reject) => {
      const sql = "SELECT * from students";

      db.query(sql, (err, results) => {
        resolve(results);
      });
    });
  }

  static async create(data, callback) {
    const id = await new Promise((resolve, reject) => {
      const sql = "INSERT INTO students SET ?";

      db.query(sql, data, (err, results) => {
        resolve(results.insertId);
      });
    });

    const student = this.find(id);
    return student;
  }

  static find(id) {
    return new Promise((resolve, reject) => {
      const sql = "SELECT * FROM students WHERE id=?";

      db.query(sql, id, (err, results) => {
        const [students] = results;
        resolve(students);
      })
    });
  }

  static async update(id, data) {
    await new Promise((resolve, reject) => {
      const sql = "UPDATE students SET ? WHERE id=?";

      db.query(sql, [data, id], (err, results) => {
        resolve(results);
      });
    });

    const student = await this.find(id);
    return student;
  }

  static delete(id) {
    return new Promise((resolve, reject) => {
      const sql = "DELETE FROM students WHERE id=?";
      
      db.query(sql, id, (err, results) => {
        resolve(results);
      });
    });
  }
}

module.exports = Student;