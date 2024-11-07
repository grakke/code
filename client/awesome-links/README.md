# [Fullstack App With TypeScript, PostgreSQL, Next.js, Prisma & GraphQL: Data Modeling](https://prisma.io/blog/fullstack-nextjs-graphql-prisma-oklidw1rhw)

- <https://github.com/m-abdelwahab/awesome-links>

```sh
git clone -b part-1 https://github.com/m-abdelwahab/awesome-links.git
cd awesome-links
npm install
npm run dev
```

## steps

- Data Modeling
  - `http://localhost:3000/about`
- GraphQL API
  - `http://localhost:3000/api/graphql/`
  - creating the schema and the resolvers manually can decrease developer productivity:
    - Resolvers must match the same structure as the schema and vice-versa. Otherwise, you can end up with buggy and unpredictable behavior. These two components can accidentally go out of sync when the schema evolves or the resolver implementation changes.
    - The GraphQL schema is defined as strings, so no auto-completion and build-time error checks for the SDL code.
  - Pothos is a GraphQL schema construction library where you define your GraphQL schema using code.
- fetching data server-side

```sh
npm install --save-dev prisma
npx prisma init

npx prisma db seed

npx prisma migrate dev --name init
npx prisma db seed

npx prisma generate
```

```graphql
query allLinksQuery($first: Int, $after: ID) {
  links(first: $first, after: $after) {
    pageInfo {
      endCursor
      hasNextPage
    }
    edges {
      cursor
      node {
        id
        imageUrl
        title
        description
        url
        category
      }
    }
  }
}
```
