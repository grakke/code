import merge from "lodash/merge";

import Hello from "./Hello.js";
import Query from "./Query.js";
import Mutation from "./Mutation.js";
import Subscription from "./Subscription.js";

const PureObj = Object.create(null);

export default merge(PureObj, Hello, Query, Mutation, Subscription);
