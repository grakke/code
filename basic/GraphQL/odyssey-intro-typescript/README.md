# (Odyssey Course) Intro to GraphQL with TypeScript

Welcome to the starter code for **Intro to GraphQL with TypeScript**. You can find the [course lessons and instructions](https://apollographql.com/tutorials/intro-typescript) on Odyssey, [Apollo](https://apollographql.com)'s learning platform.

* [Official TypeScript documentation](https://www.typescriptlang.org/docs/)

## How to use this repo

The course will walk you step by step on what to do. This codebase is the starting point of your journey!

Navigate to the root of the project directory, and run the following commands.

```sh
npm install && npm run dev

pnpm i --registry https://mirrors.huaweicloud.com/repository/npm/ @apollo/server graphql graphql-tag
```

* `localhost:4000`
* Exploring real data
  * REST API data source <https://rt-airlock-services-listing.herokuapp.com/`>
  * query arguments <https://rt-airlock-services-listing.herokuapp.com/listings/listing-1>

```graphql
query GetListing($listingId: ID!) {
  listing(id: $listingId) {
    title
    numOfBeds
    amenities {
      name
      category
    }
  }
}
```
