const express = require('express');
const mongoose = require('mongoose');
const app = express();
app.use(express.urlencoded({
    extended: true
}));

mongoose.connect('mongodb://localhost:27017/employee')
    .then(() => { console.log('MongoDB Connected') })
    .catch((err) => { console.log(err) });

const employeeSchema = new mongoose.Schema({
    empid: String,
    name: String,
    department: String,
});

const Employee = mongoose.model('Employee', employeeSchema);

app.get('/', (req, res) => {
    res.sendFile(__dirname + "/index.html")
});

app.post("/add", async (req, res) => {
    try {
        await Employee.create({
            empid: req.body.empid,
            name: req.body.name,
            department: req.body.department
        });
res.redirect("/view");
    }
    catch (err) {
        res.send(err);
    }
});

app.get("/view", async (req, res) => {
    const employee = await Employee.find();
    let result = `<table>
        <tr>
            <th>Employee ID</th>
            <th>Name</th>
            <th>Department</th>
        </tr>`;
    employee.forEach(emp => {
        result += `<tr>
            <td>${emp.empid}</td>
            <td>${emp.name}</td>
            <td>${emp.department}</td>
            <td><a href ="/delete/${emp._id}">Delete</a></td>
        </tr>`;
    });
    result += `</table>`;
    res.send(result);
});

app.get("/delete/:id", async (req, res) => {
    try{
        await Employee.findByIdAndDelete(req.params.id);
        res.redirect("/view");
    }
    catch(err){
        res.send(err);
    }
});



app.listen(3000, () => {
    console.log("Server is running on port 3000");
});