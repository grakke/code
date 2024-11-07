# [Fullstack App With TypeScript, PostgreSQL, Next.js, Prisma & GraphQL: Data Modeling](https://prisma.io/blog/fullstack-nextjs-graphql-prisma-oklidw1rhw)

- <https://github.com/m-abdelwahab/awesome-links>
- `http://localhost:3000`

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
- fetching data server-side

```sh
npm install --save-dev prisma
npx prisma init

npx prisma db seed

npx prisma migrate dev --name init
npx prisma db seed
```
