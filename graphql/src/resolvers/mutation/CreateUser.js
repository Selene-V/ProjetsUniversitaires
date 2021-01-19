const fs = require("fs");

function CreateUser(_, { data }){
    const users = require(__dirname + '../../../data/users.json');
   let id = 0;
   users.forEach(function (user) {
       if (user.id > id) {
       id = user.id;
    }
   });

    const user = {
        id: id + 1,
        firstName: data.firstName,
        lastName: data.lastName
    }

    users.push(user);

    fs.writeFileSync(
        __dirname + '../../../data/users.json',
        JSON.stringify(users)
    );

    return user;
}

module.exports = CreateUser;