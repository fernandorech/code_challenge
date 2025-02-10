
# Curotec project

This is a project design to impement user's story from the challenge kanban.

## Instalation

The project uses laravel sail to load all the dependencies, be sure to have docker installed locally.



## Setup

Run the project as follows below.

```bash
  ./vendor/bin/sail up -d
  ./vendor/bin/sail composer install
  ./vendor/bin/sail artisan key:generate
  ./vendor/bin/sail artisan migrate --seed
  ./vendor/bin/sail npm install
  ./vendor/bin/sail npm run dev
```

After instalation, just run http://localhost
## Project

I implemented the pagination card.

For the backend, I created a repository to handle pagination. I also added caching to avoid multiple unnecessary database queries.

On the frontend, I used Vue, set up the routes, and built a simple table displaying the paginated data.
Improvements made:

Here are some key improvements:

* When adding, editing or deleted a project, the cache should be cleared. The first page cache should be refreshed since it's the user's starting point.

* Query optimization can be improved using different fields. Using an ID in production systems is not always ideal for users. A better approach is to add an index to the updated_at field so that the most recently updated records always appear first, making the latest information quickly available to users.
