const Student = require("../models/Student");

class StudentController {
  async index(req, res) {
    const students = await Student.all();

    if (students.length > 0) {
      const data = {
        message: "Menampilkkan semua students",
        data: students,
      };

      return res.status(200).json(data);
    } else {
      const data = {
        message: "Students is empty"
      };

      return res.status(200).json(data);
    }
  }

  async store(req, res) {
    const { nama, nim, email, jurusan } = req.body;

    if (!nama || !nim || !email || !jurusan) {
      const data = {
        message: "Semua data harus dikirim"
      };

      return res.status(422).json(data);
    } else {
      const student = await Student.create(req.body);
      const data = {
        message: "Menambahkan data student",
        data: student,
      };

      res.status(201).json(data);
    }
  }

  async update(req, res) {
    const { id } = req.params;
    const student = await Student.find(id);

    if(student) {
      const student = await Student.update(id, req.body);
      const data = {
        message: "Mengedit data student",
        data: student
      };

      res.status(200).json(data);
    } else {
      const data = {
        message: "Student not found",
      };

      res.status(404).json(data);
    }
  }

  async destroy(req, res) {
    const { id } = req.params;
    const student = await Student.find(id);

    if (student) {
      await Student.delete(id);
      const data = {
        message: "Menghapus data student",
        data: student
      };

      res.status(200).json(data);
    } else {
      const data = {
        message: "Student not found"
      };

      res.status(404).json(data);
    }
  }

  async show(req, res) {
    const { id } = req.params;
    const student = await Student.find(id);

    if (student) {
      const data = {
        message: `Menampilkan detail student`,
        data: student
      };

      res.status(200).json(data);
    } else {
      const data = {
        message: "Student not found"
      };

      res.status(404).json(data);
    }
  }
}

const object = new StudentController();

module.exports = object;