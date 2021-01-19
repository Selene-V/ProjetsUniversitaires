const fs = require('fs');
const express = require('express');
const { graphqlHTTP } = require('express-graphql');
const graphql = require('graphql');
const { makeExecutableSchema } = require('@graphql-tools/schema');

const UsersResolver = require('./src/resolvers/query/Users.js');
const UserResolver = require('./src/resolvers/query/User.js');
const DeleteUserResolver = require('./src/resolvers/mutation/DeleteUser.js');
const CreateUserResolver = require('./src/resolvers/mutation/CreateUser.js');

const typeDefs = '' + fs.readFileSync(__dirname + '/schema.graphql');

const resolvers = {
  Query: {
    Hello: function () {
      return 'Hello World!';
    },
    Age: function (_, {age}) {
      return age;
    },
    Users: UsersResolver,
    User: UserResolver,
  },
  Mutation: {
    DeleteUser: DeleteUserResolver,
    CreateUser: CreateUserResolver,
  },
};

const schema = makeExecutableSchema({
  typeDefs,
  resolvers,
});

const app = express();

app.use(
  '/api',
  graphqlHTTP({
    schema,
    graphiql: true,
  })
);

const port = 4000;
app.listen(port, function () {
  console.log(`Listening on port ${port}`);
});
