const fs = require("fs");
const file1="mca.txt";
const data=`Student: Adharshaa`;

fs.writeFile(file1,data,function(err)
{
    if(err)
    {
        console.log(err);
    }
    else
    {
        console.log("File created successfully");
    }

fs.readFile(file1,function(err,data)
{
    if(err)
    {
        console.log(err);
    }
    else
    {
     console.log(data);
  }
});
});

 console.log(data);