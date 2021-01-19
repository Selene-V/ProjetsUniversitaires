function User(_, args){
    const users = require('../../data/users.json');
    return users.filter(function (u){
        if (u.id === args.id) {
            return true;
        }
        return false;
    })[0];
}

module.exports = User;