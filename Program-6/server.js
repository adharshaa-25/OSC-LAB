const express = require('express');
const app = express();

app.use(express.urlencoded({ extended: true }));

app.get('/', (req, res) => {
    res.sendFile(__dirname + '/index.html');
});

app.post('/view', (req, res) => {
    var name = req.body.name;
    var rollno = req.body.rollno;
    var department = req.body.department;
    res.send(`<h1>Student Details</h1><p>Name: ${name}</p><p>Roll No: ${rollno}</p><p>Department: ${department}</p>`);
});



app.listen(5000, () => {
    console.log('Server is running on port 5000');
});