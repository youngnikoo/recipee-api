Capstone Project Back-End for Dicoding

Data source from : https://github.com/tomorisakura/unofficial-masakapahariini-api

Technology using : Deploy on Heroku, Database MySQL, Framework Laravel, Cloud for Image using Cloudinary

### Endpoint Usage
### USING POSTMAN
---
**Base Url** : `http://api-recipee.herokuapp.com/` 

| Endpoint | Usage | Example |
|----------|-------|---------|
| recipes | `/api/posts` | - |
| recipes limit | `/api/posts/limit/:limitsize` | `/api/posts/limit/5` |
| recipes by category | `/api/posts/category/:id` | `/api/posts/category/4 (4,14,24,34,54...) (+10)` |
| recipes category | `/api/categories` | - |
| recipe detail | `/api/posts/:id` | `api/posts/4 (4,14,24,34,54...) (+10)` |
| get all comments | `/api/comments/:post_id` | `/api/comments/4 (4,14,24,34,54...) (+10)` |
| create comments | `/api/comments` | - |
| search posts | `/api/search/posts?q=query` | `/api/search/posts?q=strawberry (by title & desc)` |
