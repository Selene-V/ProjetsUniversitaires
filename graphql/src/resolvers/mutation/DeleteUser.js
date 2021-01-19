const fs = require("fs");

function DeleteUser(_, { id }){
    const users = require(__dirname + '../../../data/users.json');
    const newUsers = [];

    users.forEach(function (user) {
        if (user.id !== id) {
            newUsers.push(user);
        }
    });

    fs.writeFileSync(
        __dirname + "../../../data/users.json",
        JSON.stringify(newUsers)
    );

    return true;
}

module.exports = DeleteUser;