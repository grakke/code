import Db from "../db";

export default {
  Query: {
    users: (parent, args) => Db.users({}),
    user: (parent, { id }) => Db.user({ id }),
  },
};
